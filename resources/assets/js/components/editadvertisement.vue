<template>
     <div class="row">
      <div class="col-12">
          <div class="card">
              <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h4 class="page-header header">広告更新</h4>
                            <br>
                        </div>
                        <div class="col-md-12">
                             <form @submit.prevent="updateAds">
                            <div class="form-group">
                                                <label>広告題名 : <span class="error">*</span></label>
                                                <input type="title" class="form-control box" id="title"  name="title" v-model="advertisement.title" placeholder="広告タイトルを入力してください。">
                                                <span v-if="errors.includes('title')" class="error">題名が必須です。</span>
                                    </div>
                            <div class="form-group">
                                            <label>説明 : <span class="error"></span></label>
                                            <textarea name="description" class="form-control" cols="50" rows="5" v-model="advertisement.description"></textarea>
                                    </div>
                            <div class="form-group">
                                <label>広告リンク : <span class="error"></span></label>
                                <input type="link" class="form-control box" id="link"  name="link" v-model="advertisement.link" placeholder="広告リンクを入力してください。">
                            </div>
                            <div class="form-group">
                                     <label>表示するロケーション : <span class="error">*</span></label><br/>
                                <div class="col-sm-9" v-for="advertisements in advertisement.location" :key="advertisements.id">
                                    <label class="form-check-label control control--checkbox">
                                        <input type = "checkbox" value ="topbar" id="tbar" name="top_bar" v-model="advertisements.topbars"> <strong>トップバー </strong> (240px*120px 300円)
                                        <div class="control__indicator"></div>
                                        </label><br/>
                                    <label class="form-check-label control control--checkbox">
                                        <input type = "checkbox"  value ="sidebar" id="sbar" name="side_bar" v-model="advertisements.sidebars" ><strong> サイドバー </strong>(167px*100px 200円)
                                        <div class="control__indicator"></div>
                                    </label>
                                    <!-- <span class="error">{{errors.location}}</span> -->
                                </div>
                            </div>
                            <div class="form-group" id="showimage">
                                <label>写真 : <span class="error">*</span></label><br/>
                                <div class="custom-file">
                                    <input type="file" ref="file" accept="image/*" id="upd_img" @change ="fileSelected">
                                   <!-- <span v-if="errors.photo" class="error">{{errors.photo}}</span> -->
                                   <span v-if="errors.includes('photo')" class="error">写真が必須です。</span>
                                </div>
                            </div>
                            <div class="image_show" v-if="update_img && upload_img">
                                <div class='col-md-2'>
                                    <!-- <span class='img-close-btn' v-on:click="removeUpload()">X</span> -->
                                    <img :src="upload_img" class='show-img'>
                                </div>

                            </div>

                            <div class="form-group image_update" v-if="!update_img" id="x-image" >
                                <div class="col-md-12" >
                                    <div id='x-image' class='col-md-2'>
                                        <span class='img-close-btn' v-on:click='closeBtnMethod(advertisement.photo)'>X</span>
                                        <img :src="'/upload/advertisement/'+ advertisement.photo" class='show-img' alt="ads">
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" v-model="old_photo" >
                            <div class="form-group">
                                 <span class="btn main-bg-color white all-btn" @click="clickValidation()" >更新する</span>
                                <router-link to="/ads" class="btn btn-danger all-btn">キャンセル</router-link>
                            </div>
                                </form>
                            </div>
                         </div>
                    </div>
            </div>
          </div>
      </div>
</template>
<script>
export default {
          data() {
            return {
                errors: [],
                advertisement: {
                    title: '',
                    description:'',
                    link:'',
                    location : [{
                        topbars: false,
                        sidebars:false
                    }],
                    photo:'',
                },
                ischeck:'',
                old_photo: "",
                upload_img:'',
                update_img: false,
            }
        },
        created() {
            this.axios
                .get(`/api/advertisement/edit/${this.$route.params.id}`)
                .then((response) => {
                    this.advertisement.title = response.data.title;
                    this.advertisement.description = response.data.description;
                    this.advertisement.link = response.data.link;
                    this.ischeck = response.data.location;
                    this.updateCheck(this.ischeck);
                    this.advertisement.photo=response.data.photo;
                });
        },
         methods: {
            fileSelected(){
                this.advertisement.photo = event.target.files[0];
                this.upload_img = URL.createObjectURL(event.target.files[0]);
                this.update_img = true;
            },

            closeBtnMethod: function(old_photo) {
                this.update_img = true;
                if(this.advertisement.photo)
                {
                    var image_x = document.getElementById('x-image');
                    image_x.parentNode.removeChild(image_x);
                }
            },
            updateCheck: function (check){
                this.advertisement.location.shift()
               if(check == "topbar"){
                 this.advertisement.location.push({
                    topbars: 1,
                    sidebars:0
                });
               }
               else if(check == "sidebar"){
                    this.advertisement.location.push({
                        topbars: 0,
                        sidebars:1
                    });
               }
               else{
                    this.advertisement.location.push({
                        topbars: 1,
                        sidebars:1
                    });
                }
            },

            updateAds() {
                if( `${this.$route.params.id}` && this.errors.length == 0){
                    this.$swal({
                        title: "確認",
                        text: "更新よろしいでしょうか",
                        type: "success",
                        width: 350,
                        height: 200,
                        showCancelButton: true,
                        confirmButtonColor: "#6cb2eb",
                        cancelButtonColor: "#b1abab",
                        cancelButtonTextColor: "#000",
                        confirmButtonText: "更新",
                        cancelButtonText: "キャンセル",
                        confirmButtonClass: "all-btn",
                        cancelButtonClass: "all-btn"
                    }).then(response => {
                        this.errors = [];
                        let adsData = new FormData();
                        var arr = this.advertisement.location;
                        for(var i=0;i<arr.length;i++)
                        {
                            if(arr[i]['topbars'] == 1 && arr[i]['sidebars'] == 0)
                            {
                                adsData.append('location', 'topbar');
                            }
                            else if(arr[i]['sidebars'] == 1 && arr[i]['topbars'] == 0)
                            {
                                adsData.append('location', 'sidebar');
                            }
                            else if(arr[i]['sidebars'] == 1 && arr[i]['topbars'] == 1)
                            {
                                adsData.append('location', 'sidebar,topbar');
                            }
                        }
                        //console.log(this.advertisement.photo);
                        adsData.append('title',this.advertisement.title)
                        adsData.append('description',this.advertisement.description)
                        adsData.append('link',this.advertisement.link)
                        adsData.append('photo',this.advertisement.photo)
                        adsData.append('old_photo',this.old_photo)
                        //ads.photo=this.advertisement.photo
                        this.axios.post(`/api/advertisement/update/${this.$route.params.id}`, adsData)
                        .then((response) => {
                            // alert('Successfully Updated!')
                            this.$swal({
                                position: 'top-end',
                                type: 'success',
                                title: '更新されました。',
                                // showConfirmButton: false,
                                // timer: 1500,
                                confirmButtonText: "はい",
                                confirmButtonColor: "#6cb2eb",
                                width: 250,
                                height: 200,
                            })
                            this.$router.push({name: 'ads'});
                        }).catch(error=>{
                        if(error.response.status == 422){
                            this.errors = error.response.data.errors
                        }
                    })
                });
             }

            },

            clickValidation() {
                if(this.advertisement.title){
                    if(this.update_img){
                        if($('input[type="file"]').val() == null || $('input[type="file"]').val() == ''){
                            this.errors = [];
                            this.errors.push("photo");
                        }
                        else{
                            this.errors = [];
                            this.updateAds();
                        }
                    }
                    else{
                        this.errors = [];
                        this.updateAds();
                    }
                }else {
                    this.errors = [];
                    this.errors.push("title");
                    if(this.update_img){
                        if($('input[type="file"]').val() == null || $('input[type="file"]').val() == ''){
                            this.errors.push("photo");
                        }
                    }
                }

            }

        }
}
</script>
