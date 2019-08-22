<template>
<!-- Page Content  -->
        <div id="content">
            <div class="container">
                <div class="col-md-12">
                    <div class="card  text-dark">
                        <div class="card-body">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h4 class="page-header">ニュース投稿を作成</h4>
                                        <br>
                                    </div>
                                    <form @submit.prevent="add" enctype="multipart/form-data">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>題名:<span class="error">*</span></label>
                                            <input type="text" class="form-control" placeholder="題名を入力してください。" v-model="news.title">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>主な情報:<span class="error">*</span></label>
                                            <input type="text" class="form-control"  placeholder="ニュースの主な情報を入力してください。" v-model="news.main_point">
                                        </div>
                                    </div>
                                    <!-- <div class="col-md-12">
                                        <div class="btn-group">
                                            <button class="btn main-bg-color white dropdown-toggle all-btn" type="button" data-toggle="dropdown">
                                                    種類
                                                <span class="caret"></span>
                                            </button>
                                            <ul class="dropdown-menu">
                                                <li><a href="#">Doctor</a></li>
                                                <li><a href="#">Nurse</a></li>
                                                <li><a href="#">Pharmacist</a></li>
                                                <li><a href="#">Administrative Staff</a></li>
                                                <li><a href="#">Therapists</a></li>
                                            </ul>
                                        </div>
                                    </div> -->
                                     <div class="col-md-12">
                                        <div class="form-group">
                                            <br>
                                            <label>内容:<span class="error">*</span></label>
                                            <textarea class="form-control rounded-0" id="exampleFormControlTextarea1" rows="10" placeholder="内容を入力してください。" v-model="news.body"></textarea>
                                        </div>
                                    </div> 
                                    <div class="col-md-12">
                                        <div class="col-sm-2 imgUp">
                                            <br>
                                            <label class="menu-pos">メディア:<span class="error">*</span></label>
                                            <br>
                                            <label class="btn bg-color all-btn">
                                                    写真/画像を投稿する
                                                 <input type="file" class="uploadFile img" v-on:change="onImageChange">
                                            </label>
                                            <div class="imagePreview"></div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-12">
                                            <br>
                                            <button class="btn news-post-btn all-btn"> ニュースを投稿する</button>
                                            <!-- <a href="" class="btn news-post-btn all-btn">ニュースを投稿する</a> -->
                                        </div>
                                    </div>
                                    </form>
                                </div>
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
                title: '',
                main_point: '',
                body: '',
                category_id: '',
                user_id: '',
                recordstatus: '',
                photo: ''
            }
        }
    },
    methods: {
    onImageChange(e){
        this.image = e.target.files[0];
    },
    add(){
      let formData = new FormData();
      formData.append('image',this.image);
        this.axios
                    .post('http://localhost:8000/api/new/add', this.news)
                    .then(response => {
                        
                        this.$router.push({name: 'news_list'})
                         console.log(response);
                        // console.log(response.data)
                    })
                    .catch(error => console.log(error))
                    .finally(() => this.loading = false)
    }
}
}

</script>

