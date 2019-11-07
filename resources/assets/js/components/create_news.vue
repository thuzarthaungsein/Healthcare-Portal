<template>
    <!-- Page Content  -->
    <div class="row">
        <div class="col-md-12">
            <div class="card  text-dark">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h4 class="page-header header">ニュース作成</h4>
                            <br>
                        </div>

                        <form @submit.prevent="add" class="col-md-12">
                            <div class="form-group">
                                <label>題名:<span class="error">*</span></label>
                                <input type="text" class="form-control" placeholder="題名を入力してください。" v-model="news.title">
                                <span v-if="errors.title" class="error">{{errors.title}}</span>
                            </div>
                            <div class="form-group">
                                <label>主情報:<span class="error">*</span></label>
                                <input type="text" class="form-control" placeholder="ニュースの主情報を入力してください。" v-model="news.main_point">
                                <span v-if="errors.main_point" class="error">{{errors.main_point}}</span>
                            </div>
                            <div class="form-group">
                                <!-- <button class="btn main-bg-color white all-btn" type="button">
                                                    種類
                                                <span class="caret"></span>
                                            </button> --> 
                                <label> カテゴリー:<span class="error">*</span></label>
                                <select v-model="category_id" id="categories" class="form-control" @change='getstates()'>
                                    <option v-bind:value="-1">選択してください。</option>
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
                            <div class="form-group">
                                <label class="">写真:</label>
                                <div>
                                <input type="file" class="" value="Upload Photo" id="upload_file" @change="preview_image();" ref="fileInput">
                                </div>
                                <div class="col-md-12">
                                    <div class="row" id="image_preview">
                                        <div class='col-md-2' v-if="upload_img">
                                            <span class='img-close-btn' v-on:click="removeUpload()">X</span>
                                            <img :src="upload_img" class="show-news-img">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="row col-md-12">
                                <label> 関連ニュース:<span class="error">*</span></label>
                                <div class="col-md-4">

                                <select v-model="category_id_1" id="categories" class="form-control" @change='getPostsByCatId()'>
                                    <option v-for="category in categories" :key="category.id" v-bind:value="category.id">
                                        {{category.name}}
                                    </option>
                                </select>
                                <span v-if="errors.related_news" class="error">{{errors.related_news[0]}}</span>
                                </div>
                                <div class="col-md-6">
                                    <input type="text" placeholder="関連ニュース検索" aria-label="search" id="search-word" class="form-control" @keyup='getPostsByCatId()'>
                                </div>
                            </div>
                            <br/>
                            <div class="row col-md-12">
                                <div class="col-md-4" v-for="news in related_news" :key="news.id">
                                    <label class="form-check-label control control--checkbox">
                                        <input type="checkbox" :value="news.id" v-model="checkedNews">
                                        <div class="col-md-12 card card-default" style="float:left;height:150px;cursor:pointer;">
                                            <div class="card-body news-post">
                                                <div class="row">
                                                    <div class="col-md-3 pad-free" >
                                                        <img :src="'/upload/news/'+ news.photo" class="img-fluid" alt="news">
                                                    </div>
                                                    <div class="col-md-9">
                                                        {{news.title}}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="control__indicator"></div>
                                    </label>
                                 </div>
                            </div>
                            <input type="hidden" v-model="checkedNews">

                            <div class="form-group">
                                <span class="btn main-bg-color white all-btn" @click="checkValidate()"> ニュースを投稿する</span>
                                <router-link :to="{name: 'news_list'}" class="btn btn-danger all-btn">キャンセル</router-link>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- {{ related_news }} -->
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        data() {
                return {
                    category_id: '-1',
                    errors: {
                        title: "",
                        main_point: "",
                        body: "",
                        category_id: "",
                    },
                    news: {
                        title: '',
                        main_point: '',
                        body: '',
                        category_id: '',
                        user_id: '',
                        recordstatus: '',
                        image: ''
                    },
                    Userdrp: "選択してください。",
                    categories: {
                        id: '',
                        name: ''
                    },
                    category_id_1: '1',
                    search_word:'',
                    related_news: [],
                    checkedNews: [],
                    upload_img: null,
                }
            },
            created() {
                this.axios.get('/api/category/category_list')
                    .then(function(response) {
                        this.categories = response.data;
                    }.bind(this));
                this.getPostsByCatId();
            },
            methods: {
                    preview_image(e) {
                        // $('#image_preview').html("<div class='col-md-2'><img src='" + URL.createObjectURL(event.target.files[0]) + "' class='show-news-img'></div>");
                        this.news.image = event.target.files[0];
                        this.upload_img = URL.createObjectURL(event.target.files[0]);
                    },
                    removeUpload(e) {
                        this.news.image = '';
                        this.upload_img = '';
                        this.reset();
                    },
                    reset() {
                        const input = this.$refs.fileInput;
                        input.type = 'text';
                        input.type = 'file';
                    },
                        add() {
                            this.$swal({
                            title: "確認",
                            text: "作成よろしでしょうか。",
                            type: "info",
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
                        let fData = new FormData();
                        fData.append('photo', this.news.image)
                        fData.append('title', this.news.title)
                        fData.append('main_point', this.news.main_point)
                        fData.append('body', this.news.body)
                        fData.append('category_id', this.news.category_id)
                        fData.append('related_news', this.checkedNews)
                        this.axios.post('/api/new/add', fData)
                            .then(response => {
                            this.name = ''
                            console.log(response);
                            this.$swal({
                            position: 'top-end',
                            type: 'success',
                            title: '作成されました。',
                            confirmButtonText: "はい",
                            confirmButtonColor: "#6cb2eb",
                            // showConfirmButton: false,
                            // timer: 1800,
                            width: 250,
                            height: 200,
                        })
                                this.$router.push({
                                    name: 'news_list'
                                })
                            }).catch(error=>{

                            if(error.response.status == 422){

                                this.errors = error.response.data.errors
                            }});
                        
                        })
                    },
                    getstates: function() {
                        this.news.category_id = this.category_id;
                    },
                    getPostsByCatId: function() {
                        var cat_id = this.category_id_1;
                        if(this.search_word == '') {
                            var search_word = this.search_word;
                        }  else {
                            var search_word = $('#search-word').val();
                        }

                        let fd = new FormData();
                        fd.append("search_word", search_word);
                        fd.append("selected_category", cat_id);
                        this.axios.post("/api/news_list/search", fd).then(response => {
                            this.related_news = response.data;
                        });
                        this.search_word = '1';
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
                        this.add();
                    }
                },
            }
    }
</script>
