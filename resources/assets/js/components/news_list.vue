<template>
    <!-- Page Content  -->
    <div id="content" class="row">
        <div class="col-12">
            <div class="card card-default m-b-20">

                <div class="card-body">
                    <h4 class="main-color">ニュース検索</h4>
                    <div class="row">
                        <div class="col-md-10">
                            <input type="text" class="form-control" placeholder="検索">
                        </div>
                        <div class="col-md-2 text-right">
                            <button class="btn secondary-bg-color all-btn white" style="width:100%;"><i class="fas fa-search"></i> 検索</button>
                        </div>
                    </div>
                </div>

            </div>
            <div class="row m-b-15 m-r-5">
                <div class="col-md-12">
                    <router-link to="/create_news" class="float-right main-bg-color create-btn all-btn" style="color: blue;"><i class="fas fa-plus-circle"></i> 新しい投稿を作成</router-link>
                </div>
                <!-- <a href="/joboffer" class="float-right" style="color: blue;"></a> -->
            </div>
            <div class="col-md-12 scrolldiv border-style">
                <h5 class="main-color header">ニュース一覧</h5>
                <div v-for="newsList in news_list" :key="newsList.id" class="card card-default m-b-20">
                    <div class="card-body news-post">
                        <div class="row">
                            <div class="col-md-2" v-if="newsList.photo">

                                <img :src="'/upload/news/'+ newsList.photo" alt="" class="img-fluid"> 
                            </div>
                             <div class="col-md-2" v-else></div>
                            <div class="col-md-8">
                                <div class="col-sm-8 pad-free mb-2"><b>
                                    <router-link :to="{name: 'newdetails', params:{id:newsList.id}}" class="mr-auto">{{newsList.title}}</router-link>
                                    <!-- <router-link :to="{name: 'job_details', params:{id:news_list.id}}" class="mr-auto">{{news_list.title}}<router-link> -->
                                    <!-- <a href="../news/news_details.html" class="mr-auto">{{newsList.title}} </a> -->
                                    </b></div>
                                <p>{{newsList.main_point}}</p>   
                            </div>
                            <div class="col-sm-2 align-self-center">
                                <router-link :to="{name: 'editPost', params: {id: newsList.id}}" class="btn edit-borderbtn">編集</router-link>&nbsp;
                                <a class="mr-auto text-danger btn delete-borderbtn" @click="deletePost(newsList.id)">削除</a>
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
export default {
       
        data() {
            return {
                news_list:[]
            }
        },
        created(){
            this.axios
                 .get('http://localhost:8000/api/news_list')
                 .then(response=>{
                     this.news_list = response.data;
                 });
        },
         methods: {
            deletePost(id) {
                if(confirm("Are you sure you want to delete?"))
                {
                     this.axios
                    .delete(`http://localhost:8000/api/new/delete/${id}`)
                    .then(response => {
                        alert('Delete Successfully!');
                        let i = this.news_list.map(item => item.id).indexOf(id); // find index of your object
                        this.news_list.splice(i, 1)
                    });
                }
               
            }
        }

    }
</script>