<template>
    <!-- Page Content  -->
    <div class="row">
        <div class="col-12">
            <div class="row m-b-10">
                <div class="col-md-12">
                    <router-link to="/create_news" class="float-right main-bg-color create-btn all-btn" style="color: blue;"><i class="fas fa-plus-circle"></i> 新しい投稿を作成</router-link>
                </div>
                <!-- <a href="/joboffer" class="float-right" style="color: blue;"></a> -->
            </div>
            <div class="col-md-12 col-md-12 tab-content tab-content1 tabs pad-free border-style">
                 <h4 class="main-color m-b-10">ニュース検索</h4>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <!-- <button class="btn main-bg-color white dropdown-toggle all-btn" type="button" data-toggle="dropdown"> 種類
                                    <span class="caret"></span>
                                </button> -->
                                <div class="col-6 float-left">
                                     <input type="text" class="form-control" placeholder="検索" id="search-item"  @keyup="searchbyCategory()">
                                </div>
                                <div class="col-6 float-right row align-items-baseline">
                                    <label for="selectBox col-2 col-form-label">カテゴリー</label>
                                    <div class="col-10">
                                        <select class="form-control" id="selectBox" @change="searchbyCategory()" >
                                        <option selected="selected" value="">全て</option>
                                        <option v-for="category in categories" :key="category.id" v-bind:value="category.id">
                                            {{category.name}}
                                        </option>
                                    </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <hr>
                <h5 class="header">ニュース一覧</h5>
                <div class="col-12 scrolldiv">
                    <div v-if="!this.news_list.length" class="card card-default m-b-20" style="padding-top:30px; height:700px; text-align:center ">

                          No record data

                    </div>
                    <div v-else v-for="newsList in news_list" :key="newsList.id" class="card card-default m-b-20">
                    <div class="card-body news-post">
                        <div class="row">
                            <div class="col-md-2" v-if="newsList.photo">

                                <img :src="'/upload/news/'+ newsList.photo" alt="" class="img-fluid">
                            </div>
                             <div class="col-md-2" v-else></div>
                            <div class="col-md-10">
                                <div class="col-sm-8 pad-free mb-2"><b>
                                    <router-link :to="{name: 'newdetails', params:{id:newsList.id}}" class="mr-auto">{{newsList.title}}</router-link>
                                    <!-- <router-link :to="{name: 'job_details', params:{id:news_list.id}}" class="mr-auto">{{news_list.title}}<router-link> -->
                                    <!-- <a hrဖef="../news/news_details.html" class="mr-auto">{{newsList.title}} </a> -->
                                    </b></div>
                                <p>{{newsList.main_point}}</p>
                                 <div class="row col-12 mt-2">
                                <router-link :to="{name: 'editPost', params: {id: newsList.id}}" class="btn edit-borderbtn">編集</router-link>&nbsp;
                                <!-- <a class="mr-auto text-danger btn delete-borderbtn" @click="deletePost(newsList.id)">削除</a> -->
                                 <div class="mr-auto text-danger btn delete-borderbtn" @click="deletePost(newsList.id)">削除</div>                                
                            </div>
                            </div>

                        </div>
                    </div>
                </div>
                </div>

            </div>
        </div>
    </div>
    <!-- Page Content end  -->
</template>

<script>
import modal from './modal.vue';
export default {
        components:{
            modal
        },

        data() {
            return {
                news_list:[],
                categories:{
                  id: '',
                  name: ''
              },
               isOpen: false,
            }
        },
        created(){
            this.axios
                 .get('/api/news_list')
                 .then(response=>{
                     this.news_list = response.data;
                 });
        },
        mounted() {
            this.axios
                .get('/api/category/category_list')
                .then(function(response) {
                    this.categories = response.data;
                }.bind(this));
        },
         methods: {
            // toggleModal() {
            //     this.$emit('toggleModal');
            // },
            deletePost(id){
                this.$swal({
                    title: '確認',
                    text: "削除よろしいでしょうか",
                    type: 'warning',
                    width: 350,
                    height: 200,
                    showCancelButton: true,
                    confirmButtonColor: '#dc3545',
                    cancelButtonColor: '#b1abab',
                    cancelButtonTextColor:'#000',
                    confirmButtonText: '削除',
                    cancelButtonText: 'キャンセル',
                    confirmButtonClass: 'all-btn',
                    cancelButtonClass: 'all-btn'
                    
                    }).then(response => {
                        this.axios.delete(`/api/new/delete/${id}`).then(response => {
                            
                                let i = this.news_list.map(item => item.id).indexOf(id); 
                                this.news_list.splice(i, 1);
                                this.$swal({
                                    title:'削除された',
                                    text:'ファイルが削除されました。',
                                    type: 'success',
                                    width: 350,
                                    height: 200,
                                    confirmButtonText: 'はい',
                                    confirmButtonColor: '#dc3545',
                                })
                            }).catch(()=>{
                                this.$swal("Failed","wrong");
                            });
                  
                })
            },
                      
            // deletePost(id) {                
            //     this.axios
            //         .delete(`/api/new/delete/${id}`)
            //         .then(response => {
            //             // alert('Delete Successfully!');
            //             let i = this.news_list.map(item => item.id).indexOf(id); // find index of your object
            //             this.news_list.splice(i, 1)
            //         });  
            // },
            searchbyCategory() {
                var search_word = $('#search-item').val();

                var selected_category  = document.getElementById("selectBox").value;
                let fd = new FormData();
                    fd.append('search_word', search_word)
                    fd.append('selected_category' ,selected_category )
                this.axios.post('/api/news_list/search', fd)
                    .then(response => {
                        this.news_list = response.data;
                    });
            }
        }

    }
</script>
<style>

</style>