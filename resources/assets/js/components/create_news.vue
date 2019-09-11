<template>
    <!-- Page Content  -->
    <div id="content" class="row">
        <div class="col-md-12">
            <div class="card  text-dark">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h4 class="page-header header">ニュース投稿を作成</h4>
                            <br>
                        </div>

                        <form @submit.prevent="add" class="col-md-12">
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
                                <span v-if="errors.category_id" class="error">{{errors.category_id[0]}}</span>
                            </div>
                            <div class="form-group">
                                <label>内容:<span class="error">*</span></label>                                
                                    <textarea class="form-control rounded-0" id="exampleFormControlTextarea1" rows="10" placeholder="内容を入力してください。" v-model="news.body"></textarea>
                                    <span v-if="errors.body" class="error">{{errors.body[0]}}</span>
                            </div>
                            <div class="form-group">
                                <label class="">メディア:</label>
                                <div>
                                <input type="file" class="" value="Upload Photo" id="upload_file" @change="preview_image();">
                                </div>
                                <div class="col-md-12">
                                    <div class="row" id="image_preview"></div>
                                </div>

                            </div>
                            <div class="form-group">

                                <router-link :to="{name: 'news_list'}" class="btn btn-danger all-btn">戻る</router-link>
                                <button class="btn news-post-btn all-btn" type="submit"> ニュースを投稿する</button>
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
                    category_id: '-1',
                    errors: [],
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
                    }
                }
            },
            created() {
                axios.get('/api/category/category_list')
                    .then(function(response) {
                        this.categories = response.data;
                    }.bind(this));
            },
            methods: {
                preview_image() {
                        $('#image_preview').html("<div class='col-md-2'><img src='" + URL.createObjectURL(event.target.files[0]) + "' class='show-news-img'></div>");
                        this.news.image = event.target.files[0]
                    },
                    add() {
                        let fData = new FormData();
                        fData.append('image', this.news.image)
                        fData.append('title', this.news.title)
                        fData.append('main_point', this.news.main_point)
                        fData.append('body', this.news.body)
                        fData.append('category_id', this.news.category_id)
                        axios.post('/api/new/add', fData)
                            .then(response => {
                                this.$router.push({
                                    name: 'news_list'
                                })
                            }).catch(error=>{
                        
                    if(error.response.status == 422){
                      
                        this.errors = error.response.data.errors       
                          
                    }
                })
                    },
                    getstates: function() {

                        this.news.category_id = this.category_id;

                    },

            }
    }
</script>