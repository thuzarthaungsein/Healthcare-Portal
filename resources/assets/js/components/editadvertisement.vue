<template>
     <div class="row">
      <div class="col-12">
          <div class="card">
              <div class="card-body">
                    <div class="row">

                        <div class="col-md-12">
                            <h4 class="page-header header">広告を編集</h4>
                            <br>
                        </div>
                        <div class="col-md-12">
                             <form @submit.prevent="updateAds">
                            <div class="form-group">

                                                <label>タイトル : <span class="error">*</span></label>
                                                <input type="title" class="form-control box" id="title"  name="title" v-model="advertisement.title">
                                                <span v-if="errors.title" class="error">{{errors.title[0]}}</span>

                                    </div>
                            <div class="form-group">

                                            <label>描写 : <span class="error"></span></label>
                                            <textarea name="description" class="form-control" cols="50" rows="5" v-model="advertisement.description"></textarea>

                                    </div>
                            <div class="form-group">
                                <label>リンク : <span class="error"></span></label>
                                <input type="link" class="form-control box" id="link"  name="link" v-model="advertisement.link">

                            </div>
                            <div class="form-group">
                                     <label>ロケーション : <span class="error">*</span></label><br/>
                                <div class="col-sm-9" v-for="advertisements in advertisement.location" :key="advertisements.id">
                                    <label> <input type = "checkbox" value ="topbar" id="tbar" name="top_bar" v-model="advertisements.topbars" > <strong>Top Bar </strong> (240px*120px 300円)</label><br/>
                                    <label> <input type = "checkbox"  value ="sidebar" id="sbar" name="side_bar" v-model="advertisements.sidebars"><strong> Side Bar </strong>(167px*100px 200円)</label>
                                    <span v-if="errors.location" class="error">{{errors.location[0]}}</span>
                                </div>
                            </div>

                            <!-- <div class="form-group" id="showimage">
                                <label class="">メディア:<span class="error">*</span></label>
                                <div class="custom-file">
                                    <input type="file" ref="file" accept="image/*" @change="fileSelected" required>
                                </div>
                            </div>
                            <div class="image_show" v-if="upload_img">
                                <div class='col-md-2'>
                                    <span class='img-close-btn' v-on:click="removeUpload()">X</span>
                                    <img :src="upload_img" class='show-img'>
                                </div>
                            </div>
                            <div class="form-group image_update" id="x-image">
                                <div class="col-md-12" >
                                    <div id='x-image' class='col-md-2'>
                                        <span class='img-close-btn' v-on:click='closeBtnMethod(advertisement.photo)'>X</span>
                                        <img :src="'/upload/advertisement/'+ advertisement.photo" class='show-img' alt="ads">
                                    </div>
                                </div>
                            </div>
                            <input type="hidden" v-model="old_photo" > -->
                            <div class="form-group" style="display:none" id="showimage">
                                <label>メディア : <span class="error">*</span></label><br/>
                                <div class="custom-file">
                                    <input type="file"  ref="file" accept="image/*" @change ="fileSelected" required>
                                    <!-- <span v-if="errors.photo" class="error">{{errors.photo[0]}}</span> -->
                                </div>
                            </div>
                            <div class="image_show"></div>
                            <div class="form-group image_update" id="x-image"> </div>

                            <div class="form-group">
                                <router-link to="/ads" class="btn btn-danger all-btn">戻る</router-link>
                                <button class="btn news-post-btn all-btn">更新</button>
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
                   // old_photo: "",
                    upload_img:null,
                    //deleteImage:'',
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
                     //console.log(this.advertisement.photo);
                     this.updateselected();
                });

        },

         methods: {
              fileSelected(){

                     $('.image_show').html("<div class='col-md-2'><img src='"+URL.createObjectURL(event.target.files[0])+"' class='show-img'></div>");

                     this.advertisement.photo = event.target.files[0]
                    // this.advertisement.photo = event.target.files[0];
                    // this.upload_img = URL.createObjectURL(event.target.files[0]);
              },
              updateselected()
              {
                   $('.image_update').append("<div id='x-image' class='col-md-2'><span class='img-close-btn' onClick='closeBtnMethod()'>X</span><img src= upload/advertisement/"+this.advertisement.photo+" class='show-img''></div>");
              },
             removeUpload(e) {
                        this.advertisement.photo = '';
                        this.upload_img = '';
                    },

              updateCheck: function (check){
                     this.advertisement.location.shift()
               if(check == "topbar"){
                 this.advertisement.location.push({
                            topbars: 1,
                            sidebars:0   });
               }
               else if(check == "sidebar"){
                    this.advertisement.location.push({
                            topbars: 0,
                            sidebars:1  });
               }
               else{
                    this.advertisement.location.push({
                            topbars: 1,
                            sidebars:1
                        });
                     }
                },
            updateAds() {
                let adsData = new FormData();

            // if(this.deleteImage == 'Delete')
            //     {
            //         alert('Please Select New Image');
            //     }

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
             adsData.append('title',this.advertisement.title)
             adsData.append('description',this.advertisement.description)
             adsData.append('link',this.advertisement.link)
             adsData.append('photo',this.advertisement.photo)
            //ads.photo=this.advertisement.photo
                this.axios.post(`/api/advertisement/update/${this.$route.params.id}`, adsData)
                    .then((response) => {
                         // alert('Successfully Updated!')
                        this.$swal({
                            position: 'top-end',
                            type: 'success',
                            title: '更新されました',
                            showConfirmButton: false,
                            timer: 1500,
                            width: 250,
                            height: 200,

                        })
                        this.$router.push({name: 'ads'});
                    }).catch(error=>{

                    if(error.response.status == 422){

                        this.errors = error.response.data.errors

                    }
                })
            },
        }
}
</script>
