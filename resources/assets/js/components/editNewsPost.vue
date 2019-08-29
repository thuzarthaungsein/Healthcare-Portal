<template>
<!-- Page Content  -->
        <div id="content">
            <div class="container">
                <div class="col-md-12">
                    <div class="card  text-dark">
                        <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h4 class="page-header">ニュース投稿を作成</h4>
                                        <br>
                                    </div>
                                    <form @submit.prevent="updatePost" class="col-md-12">
                                        <div class="form-group">
                                            <label>題名:<span class="error">*</span></label>
                                            <input type="text" class="form-control" placeholder="題名を入力してください。" v-model="news.title">
                                        </div>
                                        <div class="form-group">
                                            <label>主な情報:<span class="error">*</span></label>
                                            <input type="text" class="form-control"  placeholder="ニュースの主な情報を入力してください。" v-model="news.main_point">
                                        </div>
                                        <div class="btn-group">
                                            <button class="btn main-bg-color white dropdown-toggle all-btn" type="button" data-toggle="dropdown">
                                                    種類
                                                <span class="caret"></span>
                                            </button>
                                            <select v-model="category_id" class="form-control">
                                                <!-- <option v-bind:value="-1">選択してください。</option> -->
                                             <option v-for="category in categories" :key="category.id" v-bind:value="category.id">
                                                    {{category.name}}
                                                </option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <br>
                                            <label>内容:<span class="error">*</span></label>
                                            <textarea class="form-control rounded-0" id="exampleFormControlTextarea1" rows="10" placeholder="内容を入力してください。" v-model="news.body"></textarea>
                                        </div>
                                        <div class="col-sm-2 imgUp">
                                            <br>
                                            <label class="menu-pos">メディア:<span class="error">*</span></label>
                                            <br>
                                            <!-- <label class="btn bg-color all-btn">
                                                    写真/画像を投稿する
                                                 <input type="file" class="uploadFile img" value="Upload Photo">
                                            </label> -->
                                            <label>
                                                    写真/画像を投稿する
                                                 <input type="file" accept="image/*" @change ="onFileSelected" id="file" ref="file">
                                            </label>
                                        </div>
                                    <div class="row">
                                            <br>
                                            <button class="btn news-post-btn all-btn"> ニュースを更新する</button>
                                            <!-- <a href="" class="btn news-post-btn all-btn">ニュースを投稿する</a> -->
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
    data(){
        return{
             errors: [],
            news:{
                post_title: '',
                post_mainPoint: '',
                post_body: '',
                category_id: '',
                category_name: '',
                post_photo: ''
            },
            categories:{
                  id: '',
                  name: ''
              }
        }
    },
    created() {
            this.axios
                .get(`http://localhost:8000/api/new/editPost/${this.$route.params.id}`)
                .then((response) => {
                    this.news = response.data;
                   
                });
        },
        mounted() {
            this.axios
                .get(`http://localhost:8000/api/category/category_list`)
                .then(function(response) {
                    this.categories = response.data;
                }.bind(this));
        },
    methods: {
        onFileSelected(event){
            this.news.image = event.target.files[0]
        },
    updatePost() {
        let fData = new FormData();
        fData.append('image',this.news.image)
        fData.append('title',this.news.title)
        fData.append('main_point',this.news.main_point)
        fData.append('body',this.news.body)
        axios.post(`http://localhost:8000/api/new/update/${this.$route.params.id}`, fData)
                    .then((response) => {
                          alert('Successfully Updated!')
                        this.$router.push({name: 'news_list'});
                        console.log(response);
                    });
            }
}
}

</script>

