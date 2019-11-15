<template>
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-12">
                            <h4 class="page-header header">広告作成</h4>
                        </div>
                        <div class="col-12">
                            <form @submit.prevent="add">
                                <div class="form-group">

                                    <label>広告題名 : <span class="error">*</span></label>
                                    <input type="title" class="form-control box" id="title" name="title" v-model="ads.title" placeholder="広告タイトルを入力してください。">
                                    <span v-if="errors.title" class="error">{{errors.title}}</span>

                                </div>
                                <div class="form-group">

                                    <!-- <label for="description"><strong>描写:</strong></label> -->
                                    <label>説明 : <span class="error"></span></label>
                                    <textarea name="description" class="form-control" cols="50" rows="5" v-model="ads.description"></textarea>
                                </div>
                                <div class="form-group">

                                    <!-- <label for="link"><strong>リンク:</strong></label> -->
                                    <label>広告リンク : <span class="error"></span></label>
                                    <input type="link" class="form-control box" id="link" name="link" v-model="ads.link" placeholder="広告リンクを入力してください。">

                                </div>
                                <div class="form-group">
                                    <!-- <label for ="location" ><strong></strong> ロケーション :</strong>  </label><label> -->
                                        <label>表示するロケーション : <span class="error">*</span></label><br />
                                        <label class="form-check-label control control--checkbox">
                                            <input type="checkbox" value="topbar" name="top_bar" v-model="ads.location"> <strong>トップバー </strong> (240px*120px 300円)
                                            <div class="control__indicator"></div>
                                        </label><br />
                                        <label class="form-check-label control control--checkbox">
                                            <input type="checkbox" value="sidebar" name="side_bar" v-model="ads.location"><strong> サイドバー </strong>(167px*100px 200円)
                                             <div class="control__indicator"></div>
                                        </label>
                                    <span v-if="errors.location" class="error">{{errors.location}}</span>
                                </div>
                                <div class="form-group">
                                    <!-- <label for ="photo" ><strong> メディア :</strong>  </label><br> -->
                                    <label>写真 : <span class="error">*</span></label><br />
                                    <input type="file" id="upload" accept="image/*" @change="uploadImage">
                                    <span v-if="errors.photo" class="error">{{errors.photo}}</span>
                                    <!-- <label class="" for="file">No file chosen</label> -->
                                    <div class="col-md-12" id="par">
                                        <div class="row image_preview"></div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <span class="btn main-bg-color white all-btn" @click="checkValidate()"> 作成する</span>
                                    <router-link class="btn btn-danger all-btn" to="/ads"> キャンセル </router-link>
                                    <!-- <button class="btn news-post-btn all-btn">作成する</button> -->
                                    
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
                errors: {
                    title:"",
                    location:"",
                    photo:""
                },
                ads: {
                    title: '',
                    description: '',
                    link: '',
                    location: [],
                    photo: ''
                }
            }

        },
        methods: {
              checkValidate() {
                     if (this.ads.title) {
                        // console.log('exist');
                        this.errors.title = "";
                    } else {
                        // console.log('null');
                        this.errors.title = " 題名が必須です。";
                    }
                     if (this.ads.location.length != 0) {
                        console.log(this.ads.location.length);
                        
                        this.errors.location = "";
                    } else {
                        
                        this.errors.location = "";
                    }
                     if (this.ads.photo) {
                     
                        this.errors.photo = "";
                    } else {
                      
                        this.errors.photo = "写真が必須です。";
                    }
                   if (
                        !this.errors.title &&
                        !this.errors.photo
                        
                    ) {
                        this.add();
                    }
                },
            uploadImage() {
                $('.image_preview').html("<div class='col-md-2'><img src='" + URL.createObjectURL(event.target.files[0]) + "' class='show-img'></div>");
                this.ads.photo = event.target.files[0]

            },
            add() {
                  this.$swal({
                            title: "作成",
                            text: "作成よろしでしょうか。",
                            type: "success",
                            width: 350,
                            height: 200,
                            showCancelButton: true,
                            confirmButtonColor: "#6cb2eb",
                            cancelButtonColor: "#b1abab",
                            cancelButtonTextColor: "#000",
                            confirmButtonText: "作成",
                            cancelButtonText: "キャンセル",
                            confirmButtonClass: "all-btn",
                            cancelButtonClass: "all-btn"
                        }).then(response => { 
                             let adsData = new FormData();
                adsData.append('title', this.ads.title)
                adsData.append('description', this.ads.description)
                adsData.append('link', this.ads.link)
                adsData.append('location', this.ads.location)
                adsData.append('photo', this.ads.photo)

                this.axios.post('/api/advertisement/add', adsData)
                    .then((response) => {
                        //alert('Successfully Created')
                        this.$swal({
                            position: 'top-end',
                            type: 'success',
                            title: '作成されました。',
                            confirmButtonText: "はい",
                            confirmButtonColor: "#6cb2eb",
                            width: 250,
                            height: 200,

                        })
                        this.$router.push({
                            name: 'ads'
                        });
                    }).catch(error => {

                        if (error.response.status == 422) {

                            this.errors = error.response.data.errors

                        }
                         });
               
                    })
            },
        }
    }
</script>


