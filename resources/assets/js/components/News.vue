<template>
        <div class="m-lr-0 justify-content-md-center">
               
                <div class="row">
                        <div class="col-12">
                                <div class="col-12">  
                                        <!-- <form class="col-lg-12 mb-2 pad-free"> -->
                                                
                                                <div class="col-md-8 offset-4 pad-free m-b-15">
                                                        <div class="row ">
                                                            <div class="col-md-1 offset-1">
                                                                <span class="btn btn my-2 col-md-12 my-sm-0 danger-bg-color btn-danger" v-if="status == 1" @click="clearSearch()">X</span>
                                                            </div>
                                                            <div class="col-md-8">
                                                                <input type="text" placeholder="検索" aria-label="検索" class="form-control col-lg mr-sm-3 d-flex p-2 form-control" id="search-word" v-bind:value="search_word">
                                                            </div>
                                                            <div class="col-md-2">
                                                                <span class="btn btn my-2 col-md-12 my-sm-0 all-btn secondary-bg-color btn-secondary" @click="searchCategory()"><i class="fas fa-search"></i> 検索</span>
                                                            </div>
                                                        </div>
                                                </div>                                            
                                                
                                        <!-- </form>                                       -->
                                        <div v-if="status=='0'">
                                                <div class="card">
                                                        <div class="card-header tab-card-header">
                                                                <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
                                                                        <li v-for="cat in cats" :key="cat.id" class="nav-item nav-line" id="category-id" v-bind:value="cat.id" v-on:click="getPostByCatID(cat.id);getLatestPostByCatID(cat.id);">
                                                                                <a class="nav-link" href="#two" v-if = "cats[0].id != cat.id" id="one-tab" data-toggle="tab" role="tab" aria-controls="One" aria-selected="true" >
                                                                                {{ cat.name }}</a>

                                                                                <a class="nav-link active nav-line" href="#two" v-if = "cats[0].id == cat.id" id="one-tab" data-toggle="tab" role="tab" aria-controls="One" aria-selected="true" >
                                                                                {{ cat.name }}</a>
                                                                        </li>
                                                                </ul>
                                                        </div>
                                                        <div class="tab-content tab-content2 scroll2" id="myTabContent">
                                                                <div class="tab-pane fade show active p-1" id="one" role="tabpanel" aria-labelledby="one-tab">                                                                        
                                                                        <div class="row">
                                                                                <div class="active-users col-md-3">
                                                                                        <router-link :to="'/newsdetails/'+latest_post.id">
                                                                                                <img v-if="latest_post.photo" v-bind:src="'/upload/news/' + latest_post.photo" class="source-img img-responsive" style="width:100%;height:200px" @error="imgUrlAlt"/>
                                                                                                <p class="source-title" v-if="latest_post.title" aria-label="">{{ latest_post.title }}</p>
                                                                                                <p class="source-subtitle" v-if="latest_post.created_at">
                                                                                                        <img v-if="latest_post.created_at" alt="" src="/images/5.png" class="source-img" @error="imgUrlAlt">{{ latest_post.created_at }}
                                                                                                </p>
                                                                                        </router-link>
                                                                                </div>
                                                                                <div class="col-md-9 news-wrapper">
                                                                                        <ul class="list-group list-group-flush all-item" v-for="post in posts" :key="post.id">
                                                                                                <li  class="list-group-item p-t-5 p-b-5"  v-if = "posts[0].id != post.id">
                                                                                                        <router-link :to="{name:'newdetails', params: {id:post.id}}">
                                                                                                                <img src="/images/4.png" alt="" style="width:16px; height: 16px;" class="img-responsive float-right" @error="imgUrlAlt">
                                                                                                                <span class="source-img-small d-inline-block text-truncate">{{ post.title }} </span>
                                                                                                        </router-link>
                                                                                                </li>
                                                                                        </ul>
                                                                                </div>
                                                                        </div>
                                                                </div>
                                                        </div>
                                                </div>
                                        </div>
                                        <!-- <div v-else>
                                                <NewsSearchListComponent :first_search_word="first_search_word"></NewsSearchListComponent>
                                        </div> -->
                                </div>
                                <div class="col-md-12 m-lr-0" v-if="status =='0'">
                                        <div class="row col-md-12 text-center"><h4 class="h_4 next-title" style="border-left: 5px solid orange;">関連ニュース</h4></div>
                                        <div class="row col-md-12 pad-free">
                                                <div class="col-sm-3  col-md-3 mt-2" v-for="latest_post_all_cat in latest_post_all_cats" :key="latest_post_all_cat.id">
                                                        <div class="hovereffect fit-image">
                                                                <img class="img-responsive fit-image" :src="'/upload/news/' + latest_post_all_cat.photo " alt="" @error="imgUrlAlt">
                                                                <div class="overlay">
                                                                        <router-link class="btn btn-sm all-btn secondary-bg-color m-t-20" :to="'/newsdetails/'+ latest_post_all_cat.id">詳細</router-link>
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
                </div>

                    <div>
                        <div class="col-md-12 category_box" :class="'bordertop-color'+index" v-for="(group,name,index) in post_groups" :key="index">
                                <h4 class="category_news_title" :class="'h-color'+index"><span>{{name}}</span></h4>
                                <div class="row m-lr-0">
                                        <div class="col-md-3 p-l-0" v-for="(item,i) in group" :key="i">
                                                <div class="col-md-12 row m-b-10 adslist-card m-lr-0" style="background-color: #eee;box-shadow: 0 0 2px #bfb9b9;">
                                                        <div class="col-md-4 img-box">
                                                                <router-link :to="'/newsdetails/'+item.pid">
                                                                        <img v-bind:src="'/upload/news/' + item.photo" class="fit-image" style="height:5rem;width:6rem" @error="imgUrlAlt">
                                                                </router-link>
                                                        </div>

                                                        <div class="col-md-8 txt-box">
                                                                <router-link :to="'/newsdetails/'+item.pid">
                                                                        <p class="news-title smallads-title"> {{item.main_point}} </p>
                                                                </router-link>
                                                        </div>
                                                </div>
                                        </div>
                                </div>                             
                        </div>
                    </div>
                </div>
                <!-- <div v-else>
                        <NewsSearchListComponent></NewsSearchListComponent>
                        </div> -->
        
</template>

<script>
import News from './News.vue'
import hospitalSearch from './hospitalSearch.vue'
import nursingSearch from './nursingSearch.vue'
import jobSearch from './jobSearch.vue'
import asidebar from './aside.vue'
import NewsSearchListComponent from './NewsSearchListComponent.vue'

export default {
    components: {
     News,
     hospitalSearch,
     nursingSearch,
     NewsSearchListComponent,
     jobSearch,
     asidebar
    },
     mounted() {

    },
    data() {
        return {
            cats: [],
            posts: [],
            latest_post: [],
            latest_post_all_cats: [],
            search_posts:[],
            tmp_arr:[],
            categoryId: 1,
            index:[0,3],
            second_index:[1,2],
            third_index:[4,5],
            tmp_title:[],
            title_arr:[],
            tmp_photo:[],
            photo_arr:[],
            tmp_post_id:[],
            id_arr:[],
            post_groups : [],
            status:'0',
            search_word:null,
            first_search_word:''
        }
    },
    created() {
        this.getAllCat();
        this.getLatestPostsByCatID();
        this.getPostByCatID();
        this.getLatestPostByCatID();
        this.getLatestPostFromAllCat();
    //     this.categoryId();
    },
    methods: {
            getAllCat: function() {
                this.axios
                .get('/api/home')
                .then(response => {
                        // console.log(response);
                        this.cats = response.data;
                });
            },
            groupBy(array, key){
                const result = {}
                array.forEach(item => {
                if (!result[item[key]]){
                result[item[key]] = []
                }
                result[item[key]].push(item)
                })
                return result
            },
            getLatestPostsByCatID: function() {
                    
                if(this.search_word == null || this.search_word == '' || this.search_word == 'null'){
                    var searchword = 'all_news_search';
                }
                else{
                    var searchword = this.search_word;
                }
                this.axios
                .get('/api/get_latest_posts_by_catId/'+searchword)
                .then(response => {
                    this.post_groups = this.groupBy(response.data, 'name');
                });
            },

            getPostByCatID: function(catId=1) {
                if($('#search-word').val() != null) {
                    var search_word = $('#search-word').val();
                } else {
                    var search_word = null;
                }

                if(catId !== undefined) {
                    var cat_id = catId;
                } else {
                    var cat_id = 1;
                }

                let fd = new FormData();
                fd.append('search_word', search_word);
                fd.append('category_id', cat_id);

                $('.search-item').css('display','none');
                this.categoryId = cat_id;
                this.axios.post("/api/posts" , fd)
                .then(response => {
                    this.posts = response.data;
                });
            },

            getLatestPostByCatID: function(catId) {
                if($('#search-word').val()) {
                    var search_word = $('#search-word').val();
                } else {
                    var search_word = null;
                }
                if(catId){
                    var cat_id = catId;
                } else {
                    var cat_id = 1;
                }
                let fd = new FormData();
                    fd.append('search_word', search_word)
                    fd.append('category_id', cat_id)

                $('.search-item').css('display','none');
                this.categoryId = cat_id;
                this.axios.post("/api/get_latest_post" , fd)
                .then(response => {
                    this.latest_post = response.data;
                });
            },
            getLatestPostFromAllCat: function() {
                this.axios
                .get('/api/get_latest_post_all_cat')
                .then(response => {
                    this.latest_post_all_cats = response.data;
                });
            },

            searchCategory() {
                if($('#search-word').val() == null || $('#search-word').val() == '' || $('#search-word').val() == 'null'){
                    this.clearSearch();
                }
                else{
                    this.status = 1;
                    this.search_word = $('#search-word').val();
                    this.getLatestPostsByCatID();
                }
                    
            },

            clearSearch() {
                this.status = 0;
                this.search_word = '';
                this.getLatestPostsByCatID();
            },

            imgUrlAlt(event) {
                event.target.src = "images/noimage.jpg"
            }
    }

}

 </script>
