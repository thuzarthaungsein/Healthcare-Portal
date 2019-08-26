<template>
<div>
        <div class="row justify-content-md-center">    
                                 
                <div class="col-12">
                        <div class="card tab-card">
                                <div class="card-header tab-card-header">
                                        <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
                                                <li v-for="cat in cats" :key="cat.id" class="nav-item" v-on:click="getPostByCatID(cat.id);getLatestPostByCatID(cat.id);">
                                                        <a class="nav-link" href="#two" v-if = "cats[0].id != cat.id" id="one-tab" data-toggle="tab" role="tab" aria-controls="One" aria-selected="true" >
                                                                {{ cat.name }}</a>
                                                
                                                        <a class="nav-link active" href="#two" v-if = "cats[0].id == cat.id" id="one-tab" data-toggle="tab" role="tab" aria-controls="One" aria-selected="true" >
                                                                {{ cat.name }}</a>
                                                </li>
                                        </ul>
                                </div>

                                <div class="tab-content" id="myTabContent">
                                        <div class="tab-pane fade show active p-3" id="one" role="tabpanel" aria-labelledby="one-tab">

                                                <div class="row">
                                                        <div class="active-users col-md-4">
                                                                <a href="#"><router-link to="/newsdetails">
                                                                        <img v-bind:src="'/images/' + latest_post.photo" class="source-img img-responsive" style="width:100%;height:200px" >
                                                                        <p class="source-title" aria-label="">{{ latest_post.title }}</p>
                                                                        <p class="source-subtitle">
                                                                                <img alt="" src="/images/5.png" class="source-img">{{ latest_post.created_at }}
                                                                        </p>
                                                                </router-link></a>
                                                        </div>
                                                        <div class="col-md-8 news-wrapper">
                                                                <ul class="list-group list-group-flush" v-for="post in posts" :key="post.id">
                                                                        <li  class="list-group-item p-t-5 p-b-5"  v-if = "posts[0].id != post.id">
                                                                                <a href="#"><router-link to="/newsdetails">
                                                                                        <img src="/images/1.jpg" alt="" style="width:16px; height: 16px;" class="img-responsive float-right">
                                                                                                <span class="source-img-small d-inline-block text-truncate">{{ post.title }} </span>
                                                                                </router-link></a>
                                                                        </li>
                                                                </ul>
                                                        </div>
                                                </div>
                                        </div>
                                </div>
                        </div>
                </div>
                                               
                <div class="row m-lr-0">
                        <div class="row col-md-12 text-center m-lr-0"><h4 class="h_4 next-title">関連ニュース</h4></div>
                        <div class="col-sm-3  col-md-3 mt-2" v-for="latest_post_all_cat in latest_post_all_cats" :key="latest_post_all_cat.id">
                                <div class="hovereffect fit-image">
                                        <!-- <img v-bind:src="'/images/' + latest_post_all_cat.photo" class="source-img img-responsive" style="width:100%;height:80%" > -->
                                        <img class="img-responsive fit-image" v-bind:src="'/images/' + latest_post_all_cat.photo" alt="">
                                        <div class="overlay">
                                                <h2></h2>
                                                <a class="btn btn-sm all-btn secondary-bg-color" href="/newsdetails">{{ latest_post_all_cat.title }}</a>
                                        </div>
                                        <div class="info">
                                                <div class="row">
                                                        <div class="col-12">
                                                                <p class=" p_3">
                                                                        {{ latest_post_all_cat.main_point }}
                                                                </p>
                                                        </div>
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
        data() {
            return {
                cats: [],
                posts: [],
                latest_post: [],
                latest_post_all_cats: []
            }
        },
        created() {
            this.getAllCat();
            this.getPostByFirstCat();
            this.getLatestPostByFirstCatID();
            this.getLatestPostFromAllCat();
        },
        methods: {
                getAllCat: function() {
                     this.axios
                        .get('http://localhost:8000/api/home')
                        .then(response => {
                                this.cats = response.data;
                        });   
                },
                getPostByFirstCat: function() {
                         axios.get("http://localhost:8000/api/posts/1")
                        .then(response => {
                                this.posts = response.data;
                        });
                },
                getPostByCatID: function(cat_id) {
                        axios.get("http://localhost:8000/api/posts/" + cat_id)
                        .then(response => {
                                this.posts = response.data;
                        });
                },
                getLatestPostByFirstCatID: function() {
                        axios.get("http://localhost:8000/api/get_latest_post/1")
                        .then(response => {
                                this.latest_post = response.data;
                        });
                },
                getLatestPostByCatID: function(cat_id) {
                        axios.get("http://localhost:8000/api/get_latest_post/" + cat_id)
                        .then(response => {
                                this.latest_post = response.data;
                        });
                },
                getLatestPostFromAllCat: function() {
                        this.axios
                        .get('http://localhost:8000/api/get_latest_post_all_cat')
                        .then(response => {
                                this.latest_post_all_cats = response.data;
                        });
                }
        }
        
}
// alert(cats[0]);
</script>
<style scoped>
div.tab-card-header > .card-header-tab > .nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active {   
    color: #fff !important;
    font-weight: bold;
    background-color: #1aa985  !important;
    border-top: 1px solid #1aa985  ;
    border-color: #1aa985   #1aa985  #1aa985   #1aa985  !important;
   
}
div.tab-card-header > .card-header-tab > .nav-tabs .nav-link {
    border: 1px solid #1aa985  !important;
}
</style>


