<template>
    <!-- Page Content  -->
    <div id="content" class="row">
        <div class="col-md-12">
            <div class="card  text-dark">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h4 class="page-header header">ニュース更新</h4>
                        </div>
                        <form @submit.prevent="updatepost" class="col-md-12">
                            <div class="form-group">
                                <label>題名:<span class="error">*</span></label>
                                <input type="text" class="form-control" placeholder="題名を入力してください。" v-model="news.title">
                                <span v-if="errors.title" class="error">{{errors.title}}</span>
                            </div>

                            <div class="form-group" id="showimage">
                                <label class="">写真:</label>
                                <div class="custom-file">
                                    <input type="file" ref="file" accept="image/*" @change="fileSelected">
                                </div>
                            </div>

                            <div class="image_show" v-if="upload_img">
                                <div class='col-md-2'>
                                    <span class='img-close-btn' v-on:click="removeUpload()">X</span>
                                    <img :src="upload_img" class='show-img'>
                                </div>
                            </div>
                            <div class="form-group image_update" id="x-image" v-if="news.photo && !upload_img && !old_photo">
                                <div class="col-md-12" >
                                    <div id='x-image' class='col-md-2'>
                                        <span class='img-close-btn' v-on:click='closeBtnMethod(news.photo)'>X</span>
                                        <img :src="'/upload/news/'+ news.photo" class='show-img' alt="news" @error="imgUrlAlt">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>主な情報:<span class="error">*</span></label>
                                <input type="text" class="form-control" placeholder="ニュースの主な情報を入力してください。" v-model="news.main_point">
                                <span v-if="errors.main_point" class="error">{{errors.main_point}}</span>
                            </div>
                            <div class="form-group">
                                <label>カテゴリー:<span class="error">*</span></label>
                                <select v-model="selectedValue" class="form-control" @change='getstates()'>
                                    <option v-bind:value="0">選択してください。</option>
                                    <option v-for="category in categories" :key="category.id" v-bind:value="category.id">
                                        {{category.name}}
                                    </option>
                                </select>
                                <span v-if="errors.category_id" class="error">{{errors.category_id}}</span>
                            </div>
                            <div class="form-group">
                    
                                <label>内容:<span class="error">*</span></label>
                                <textarea class="form-control rounded-0" id="exampleFormControlTextarea1" rows="10" placeholder="内容を入力してください。" v-model="news.body"></textarea>
                                <span v-if="errors.body" class="error">{{errors.body}}</span>
                            </div>
                  
                            <input type="hidden" v-model="old_photo" >
                            <div class="form-group">
                                <label> カテゴリー:<span class="error">*</span></label>
                                <select v-model="category_id_1" id="categories" class="form-control" @change='getPostsByCatId()'>
                                    <option v-for="category in categories" :key="category.id" v-bind:value="category.id">
                                        {{category.name}}
                                    </option>
                                </select>
                            </div>

                            <div class="row col-md-12">
                                <div class="col-md-4" v-for="news in related_news" :key="news.id">
                                    <label>
                                        <input type="checkbox" :value="news.id" id="aaa" v-model="checkedNews">
                                        <div class="col-md-12 card card-default" style="float:left;height:150px;cursor:pointer;">
                                            <div class="card-body news-post">
                                                <div class="row">
                                                    <div class="col-md-3" >
                                                        <img :src="'/upload/news/'+ news.photo" class="img-fluid" alt="news">
                                                    </div>
                                                    <div class="col-md-9">
                                                        {{news.title}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </label>
                                 </div>
                            </div>
                            <input type="hidden" v-model="checkedNews" >

                            <div class="form-group">
                                <span class="btn main-bg-color white all-btn" @click="checkValidate()"> 更新する</span>
                                <router-link :to="{name: 'news_list'}" class="btn btn-danger all-btn">キャンセル</router-link>
                            </div>
                        </form>
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
                    selectedValue: 0,
                    arr: [],
                    errors: {
                        title: "",
                        main_point: "",
                        body: "",
                        category_id: "",
                    },
                    news: {
                        title: '',
                        mainPoint: '',
                        body: '',
                        category_id: '',
                        category_name: '',
                        related_news: '',
                        photo: '',
                    },
                    categories: {
                        id: '',
                        name: ''
                    },
                    category_id_1: '1',
                    related_news: [],
                    checkedNews: [],
                    old_photo: "",
                    upload_img: null,
                }
            },
            created() {
                this.axios
                    .get(`/api/new/editPost/${this.$route.params.id}`)
                    .then((response) => {
                        this.news = response.data;
                        this.checkedNews = [];
                        if(this.news.related_news != undefined){
                            this.checkedNews = this.news.related_news.split(',');
                        }
                        else{
                            this.checkedNews = [];
                        }

                        if(this.news.photo == null || this.news.photo == '') {
                            this.old_photo = '';
                        }
                        // console.log(this.news.photo);

                        // this.updateselected();
                        this.selectedValue = this.news.category_id;
                    });
                    this.getPostsByCatId();
            },
            mounted() {
                this.axios
                    .get(`/api/category/category_list`)
                    .then(function(response) {
                        this.categories = response.data;
                    }.bind(this));
            },
            methods: {
                    fileSelected(e) {
                        // $('.image_show').html("<div class='col-md-2'><img src='" + URL.createObjectURL(event.target.files[0]) + "' class='show-img'></div>");

                        // this.upload_img = this.news.photo;

                        this.news.photo = event.target.files[0];
                        this.upload_img = URL.createObjectURL(event.target.files[0]);
                        
                    },
                    // updateselected() {
                    //     $('.image_update').html("<div id='x-image' class='col-md-2'><span class='img-close-btn' onClick='closebtn()'>X</span><img src= upload/news/" + this.news.photo + " class='show-img''></div>");
                    // },
                    removeUpload(e) {
                         this.$swal({
                            title: "確認",
                            text: "削除よろしいでしょうか",
                            type: "warning",
                            width: 350,
                            height: 200,
                            showCancelButton: true,
                            confirmButtonColor: "#dc3545",
                            cancelButtonColor: "#b1abab",
                            cancelButtonTextColor: "#000",
                            confirmButtonText: "削除",
                            cancelButtonText: "キャンセル",
                            confirmButtonClass: "all-btn",
                            cancelButtonClass: "all-btn"
                        }).then(response => {
                            
                                this.$swal({
                                        title: "削除されました",
                                        text: "ニュース削除されました。",
                                        type: "success",
                                        width: 350,
                                        height: 200,
                                        confirmButtonText: "はい",
                                        confirmButtonColor: "#dc3545"
                                    });
                           });
                        this.news.photo = '';
                        this.upload_img = '';
                        this.reset();
                    },
                    reset() {
                        const input = this.$refs.file;
                        input.type = 'text';
                        input.type = 'file';
                    },
                    updatepost() {
                         this.$swal({
                            title:"確認",
                            text: "更新よろしいでしょうか。",
                            type: "info",
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
                              let fData = new FormData();
                        fData.append('photo', this.news.photo)
                        fData.append('title', this.news.title)
                        fData.append('main_point', this.news.main_point)
                        fData.append('body', this.news.body)
                        fData.append('category_id', this.news.category_id)
                        fData.append('related_news', this.checkedNews)
                        fData.append('old_photo',this.old_photo)

                        this.axios.post(`/api/new/update/${this.$route.params.id}`, fData)
                         this.$swal({
                            position: 'top-end',
                            type: 'success',
                            title: '更新されました。',
                            confirmButtonText: "はい",
                            confirmButtonColor: "#6cb2eb",
                            width: 250,
                            height: 200,

                        })
                        //alert('Successfully Updated!')
                        this.$router.push({
                            name: 'news_list'
                        })
                        .catch(error=>{

                        if(error.response.status == 422){

                            this.errors = error.response.data.errors

                        }
                        });

                      
                    });
                    },
                    getstates: function() {
                        this.news.category_id = this.selectedValue;
                    },
                    getPostsByCatId: function() {
                        var cat_id = this.category_id_1;
                        this.axios
                        .post('/api/new/getPostsByCatId/' + cat_id)
                        .then(response => {
                            this.related_news = response.data;
                        });
                    },
                    closeBtnMethod: function(old_photo) {
                        // console.log(old_photo);
                        if(confirm)
                        {
                            this.$swal({
                            title: "削除",
                            text: "削除よろしいでしょうか。",
                            type: "warning",
                            width: 350,
                            height: 200,
                            showCancelButton: true,
                            confirmButtonColor: "#d41010",
                            cancelButtonColor: "#b1abab",
                            cancelButtonTextColor: "#000",
                            confirmButtonText: "削除",
                            cancelButtonText: "キャンセル",
                            confirmButtonClass: "all-btn",
                            cancelButtonClass: "all-btn"
                            }).then(response =>{ 
                            var image_x = document.getElementById('x-image');
                            image_x.parentNode.removeChild(image_x);
                            document.getElementById('showimage').style.display = 'block';
                           
                            
                            
                           }).then(response => {
                            
                                this.$swal({
                                        title: "削除されました",
                                        text: "ニュース削除されました。",
                                        type: "success",
                                        width: 350,
                                        height: 200,
                                        confirmButtonText: "はい",
                                        confirmButtonColor: "#dc3545"
                                    });
                                    this.old_photo = old_photo;
                                    this.getPostsByCatId;
                           });
                             
                        }
                     
                        
                    
                    },
                    checkValidate() {
                        if (this.news.title) {
                            this.errors.title = "";
                        } else {
                            this.errors.title = "ニュースの題名が必須です。";
                        }
                        if (this.news.main_point) {
                            this.errors.main_point = "";
                        } else {
                            this.errors.main_point = "ニュースの主な情報が必須です。";
                        }
                        if (this.news.body) {
                            this.errors.body = "";
                        } else {
                            this.errors.body = "ニュースの内容が必須です。";
                        }
                        if (this.news.category_id) {
                            this.errors.category_id = "";
                        } else {
                            this.errors.category_id = "ニュースのカテゴリーが必須です。";
                        }
                        if (
                            !this.errors.title &&
                            !this.errors.main_point &&
                            !this.errors.body &&
                            !this.errors.category_id
                        ) {
                            this.updatepost();
                        }
                    },
                imgUrlAlt(event) {
                event.target.src = "images/noimage.jpg"
            }
			
            }
    }
</script>
