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
                                            <select v-model="category_id" class="form-control" @change='getstates()'>
                                                <option v-bind:value="-1">{{news.category_name}}</option>
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
                                                 <!-- <input type="file" accept="image/*" @change ="onFileSelected" id="file" ref="file"> -->
                                                 <input type="file" class="" v-bind:alt="news.photo" id="upload_file"  @change="preview_image();"> 
                                                 <p> {{news.photo}} </p>

                                        <div class="col-md-12">
                                                <div class="row image_preview">
                                                  
                                                  
                                                </div>
                                        </div>
                                            </label>
                                        </div>
                                    <div class="row">
                                            <br>
                                            <router-link :to="{name: 'news_list'}" class="btn btn-warning">戻る</router-link>
                                            <button class="btn news-post-btn all-btn"> ニュースを更新する</button>
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
            category_id: '-1',
            arr: [],
             errors: [],
            news:{
                post_title: '',
                post_mainPoint: '',
                post_body: '',
                category_id: '',
                category_name: '',
                photo: '',
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
                 console.log(this.news.photo);
                  this.preview_image1();
                });
           
        },
        mounted() {
            this.axios
                .get(`http://localhost:8000/api/category/category_list`)
                .then(function(response) {
                    this.categories = response.data;
                    for(var i=0;i<=this.categories.length;i++){
                        if (this.news.category_id == this.categories[i].id){
                            this.news.category_name = this.categories[i].name
                        }
                    }
                }.bind(this));
        },
    methods: {
        // onFileSelected(event){
        //     this.news.image = event.target.files[0]
        // },
         preview_image() 
                {    
                        this.news.photo = '';
                        $('.image_preview').append("<div class='col-md-2'><span class='img-close-btn' onClick='closebtn()'>X</span><img src='"+URL.createObjectURL(event.target.files[0])+"' class='show-news-img'></div>");
                        this.news.photo = event.target.files[0];
                       
                },
                preview_image1() 
                {    
                       
                        $('.image_preview').append("<div  class='col-md-2'><span class='img-close-btn' onClick='closebtn()'>X</span> <img src= upload/news/" + this.news.photo +" class='show-news-img'></div>");
                        
                },
    updatePost() {
        let fData = new FormData();
        fData.append('image',this.news.image)
        fData.append('title',this.news.title)
        fData.append('main_point',this.news.main_point)
        fData.append('body',this.news.body)
        fData.append('category_id',this.news.category_id)
        axios.post(`http://localhost:8000/api/new/update/${this.$route.params.id}`, fData)
                    .then((response) => {
                          alert('Successfully Updated!')
                        this.$router.push({name: 'news_list'});
                        console.log(response);
                    });
            },
            getstates: function(){
           this.news.category_id = this.category_id;
       },
}
}

</script>

