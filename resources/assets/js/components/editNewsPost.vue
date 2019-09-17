<template>
    <!-- Page Content  -->
    <div id="content" class="row">
        <div class="col-md-12">
            <div class="card  text-dark">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h4 class="page-header header">ニュース投稿を作成</h4>
                        </div>
                        <form @submit.prevent="updatepost" class="col-md-12">
                            <div class="form-group">
                                <label>題名:<span class="error">*</span></label>
                                <input type="text" class="form-control" placeholder="題名を入力してください。" v-model="news.title">
                                <span v-if="errors.title" class="error">{{errors.title[0]}}</span>
                            </div>
                            <div class="form-group">
                                <label>主な情報:<span class="error">*</span></label>
                                <input type="text" class="form-control" placeholder="ニュースの主な情報を入力してください。" v-model="news.main_point">
                                <span v-if="errors.main_point" class="error">{{errors.main_point[0]}}</span>
                            </div>
                            <div class="form-group">
                                <label>カテゴリー:<span class="error">*</span></label>
                                <select v-model="selectedValue" class="form-control" @change='getstates()'>
                                    <option v-bind:value="0">選択してください。</option>
                                    <option v-for="category in categories" :key="category.id" v-bind:value="category.id">
                                        {{category.name}}
                                    </option>
                                </select>
                                <span v-if="errors.category_id" class="error">{{errors.category_id[0]}}</span>
                            </div>
                            <div class="form-group">
                                <label>内容:<span class="error">*</span></label>
                                <textarea class="form-control rounded-0" id="exampleFormControlTextarea1" rows="10" placeholder="内容を入力してください。" v-model="news.body"></textarea>
                                <span v-if="errors.body" class="error">{{errors.body[0]}}</span>
                            </div>
                            <div class="form-group" style="display:none" id="showimage">
                                <label class="">メディア:</label>
                                <div class="custom-file">
                                    <input type="file" ref="file" accept="image/*" @change="fileSelected">
                                </div>
                            </div>
                            
                            <div class="image_show"></div>
                            <div class="form-group image_update" id="x-image">
                                <div class="col-md-12">
                                   
                                </div>
                            </div>
                            <div class="form-group">
                                <label> カテゴリー:<span class="error">*</span></label>
                                <select v-model="category_id_1" id="categories" class="form-control" @change='getPostsByCatId()'>
                                    <option v-for="category in categories" :key="category.id" v-bind:value="category.id">
                                        {{category.name}}
                                    </option>
                                </select>
                                <!-- <span v-if="errors.category_id" class="error">{{errors.category_id[0]}}</span> -->
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
                                <router-link :to="{name: 'news_list'}" class="btn btn-danger all-btn">戻る</router-link>
                                <button class="btn news-post-btn all-btn">更新</button>
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
                    errors: [],
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
                    checkedNews: ""
                }
            },
            created() {
                this.axios
                    .get(`/api/new/editPost/${this.$route.params.id}`)
                    .then((response) => {
                        this.news = response.data;
                        this.checkedNews = [];
                        this.checkedNews = this.news.related_news.split(',');
                        this.updateselected();
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
                fileSelected() {

                        $('.image_show').html("<div class='col-md-2'><img src='" + URL.createObjectURL(event.target.files[0]) + "' class='show-img'></div>");
                        this.news.photo = event.target.files[0]
                    },
                    updateselected() {
                        $('.image_update').html("<div id='x-image' class='col-md-2'><span class='img-close-btn' onClick='closebtn()'>X</span><img src= upload/news/" + this.news.photo + " class='show-img''></div>");
                    },
                    updatepost() {

                        let fData = new FormData();

                        fData.append('photo', this.news.photo)
                        fData.append('title', this.news.title)
                        fData.append('main_point', this.news.main_point)
                        fData.append('body', this.news.body)
                        fData.append('category_id', this.news.category_id)
                        fData.append('related_news', this.checkedNews)

                        axios.post(`/api/new/update/${this.$route.params.id}`, fData)
                            .then((response) => {
                                alert('Successfully Updated!')
                                this.$router.push({
                                    name: 'news_list'
                                });
                            }).catch(error=>{
                        
                    if(error.response.status == 422){
                      
                        this.errors = error.response.data.errors       
                          
                    }
                })   ;
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
            }
    }
</script>