<template>
<div class="row justify-content-md-center">                                
                <div class="col-12">
                        <form class="form-inline col-lg-12 form-inline mb-2 pad-free"><input type="text" placeholder="検索" aria-label="検索" class="form-control col-lg mr-sm-3 d-flex p-2 form-control" id="search-word" > 
                                <span class="btn btn my-2 my-sm-0 all-btn secondary-bg-color btn-secondary" @click="searchCategory()"><i class="fas fa-search"></i> 検索</span>
                        </form>
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
                                                        <div class="active-users col-md-4">
                                                                <router-link :to="'/newsdetails/'+latest_post.id">
                                                                        <img v-if="latest_post.photo" v-bind:src="'/upload/news/' + latest_post.photo" class="source-img img-responsive" style="width:100%;height:200px"/>
                                                                        <p class="source-title" v-if="latest_post.title" aria-label="">{{ latest_post.title }}</p>
                                                                        <p class="source-subtitle" v-if="latest_post.created_at">
                                                                                <img v-if="latest_post.created_at" alt="" src="/images/5.png" class="source-img">{{ latest_post.created_at }}
                                                                        </p>
                                                                </router-link>
                                                        </div>
                                                        <div class="col-md-8 news-wrapper">
                                                                <ul class="list-group list-group-flush all-item" v-for="post in posts" :key="post.id">
                                                                        <li  class="list-group-item p-t-5 p-b-5"  v-if = "posts[0].id != post.id">
                                                                                 <router-link :to="{name:'newdetails', params: {id:post.id}}">
                                                                                
                                                                                        <img src="/images/1.jpg" alt="" style="width:16px; height: 16px;" class="img-responsive float-right">
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
                                               
                <div class="col-md-12 pad-free m-lr-0">
                        <div class="row col-md-12 text-center m-lr-0"><h4 class="h_4 next-title">関連ニュース</h4></div>
                        <div class="row col-md-12">
                                <div class="col-sm-3  col-md-3 mt-2" v-for="latest_post_all_cat in latest_post_all_cats" :key="latest_post_all_cat.id">
                                <div class="hovereffect fit-image">
                                        <!-- <img v-bind:src="'/images/' + latest_post_all_cat.photo" class="source-img img-responsive" style="width:100%;height:80%" > -->
                                        <img class="img-responsive fit-image" v-bind:src="'/upload/news/' + latest_post_all_cat.photo" alt="">
                                        <div class="overlay">
                                                <h2></h2>
                                                <router-link class="btn btn-sm all-btn secondary-bg-color" :to="'/newsdetails/'+ latest_post_all_cat.id">{{ latest_post_all_cat.title }}</router-link>
                                                <!-- <a class="btn btn-sm all-btn secondary-bg-color" v-bind:href="'/newsdetails/' + latest_post_all_cat.id"></a> -->
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

                <div class="row m-lr-0" v-for="(arr,catId) in tmp_arr" :key="arr.id" :catId="catId">
                        <div class="row col-md-12 text-center m-lr-0"><h4 class="h_4 next-title">Latest News By Category "{{arr.name}}"</h4></div>
                        <div class="row col-md-12">
                                <div class="row col-md-6 dd" v-for="inx in index" :key="inx">
                                        <div class="col-md-6" >
                                                <router-link :to="'/newsdetails/'+id_arr[catId][inx]">
                                                        <img v-if="photo_arr[catId][inx]" v-bind:src="'/upload/news/' + photo_arr[catId][inx]" class="img-responsive fit-image">
                                                        <p class="source-title"> {{title_arr[catId][inx]}}</p>
                                                 </router-link>
                                               
                                        </div>
                                        <div class="row col-md-6">
                                                <ul class="list-group list-group-flush all-item">
                                                        <span v-if="inx == 0">
                                                                <li class="list-group-item p-t-5 p-b-5" v-for="sec_index in second_index" :key="sec_index">
                                                                        <span v-if="(title_arr[catId][0] != title_arr[catId][sec_index]) && (title_arr[catId][3] != title_arr[catId][sec_index])">
                                                                                <div class="row"> 
                                                                                        <div class="col-md-4">
                                                                                                <router-link :to="'/newsdetails/'+id_arr[catId][sec_index]">
                                                                                                        <img v-if="photo_arr[catId][sec_index]" v-bind:src="'/upload/news/' + photo_arr[catId][sec_index]" class="fit-image" style="height:5rem;width:6rem">
                                                                                                </router-link>
                                                                                        </div>
                                                                                        <div class="col-md-8">
                                                                                                <router-link :to="'/newsdetails/'+id_arr[catId][sec_index]">
                                                                                                        <p class="news-title" style="padding-left:25px"> {{title_arr[catId][sec_index]}} </p>
                                                                                                </router-link>
                                                                                        </div>
                                                                                </div>
                                                                        </span>
                                                                </li>
                                                        </span>
                                                        <span v-if="inx == 3">
                                                                <li  class="list-group-item p-t-5 p-b-5" v-for="thd_index in third_index" :key="thd_index">
                                                                        <span v-if="(title_arr[catId][0] != title_arr[catId][thd_index]) && (title_arr[catId][3] != title_arr[catId][thd_index])">
                                                                                <div class="row">
                                                                                        <div class="col-md-4">
                                                                                                <router-link :to="'/newsdetails/'+id_arr[catId][thd_index]">
                                                                                                        <img v-if="photo_arr[catId][thd_index]" v-bind:src="'/upload/news/' + photo_arr[catId][thd_index]" class="fit-image" style="height:5rem;width:6rem">
                                                                                                </router-link>
                                                                                        </div>
                                                                                        <div class="col-md-8">
                                                                                                <router-link :to="'/newsdetails/'+id_arr[catId][thd_index]">
                                                                                                        <p class="news-title" style="padding-left:25px"> {{title_arr[catId][thd_index]}} </p>
                                                                                                </router-link>
                                                                                        </div>
                                                                                </div>
                                                                        </span>
                                                                </li>
                                                        </span>
                                                </ul>
                                        </div>
                                </div>
                        </div> 
                </div>
        </div>   
</template>
<style scoped>
div.tab-card-header > .card-header-tab > .nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active {   
    color: #fff !important;
    font-weight: bold;
    background-color: #1aa985  !important;
    border-top: 1px solid #1aa985  ;
    border-color: #1aa985   #ecede1   #1aa985   #1aa985  !important;
   
}
div.tab-card-header > .card-header-tab > .nav-tabs .nav-link {
    border: 1px solid #1aa985  !important;
  
}
div.tab-card-header > .card-header-tab > .nav-tabs .nav-item .nav-link, .nav-tabs .nav-link {   
   
    border-color: transparent   #ecede1   transparent   #ecede1   !important;
    
   
}

</style>
<script>
import News from './News.vue'
import hospitalSearch from './hospitalSearch.vue'
import nursingSearch from './nursingSearch.vue'
import jobSearch from './jobSearch.vue'
  
export default {
    components: {
     News,
     hospitalSearch,
     nursingSearch,
     jobSearch


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
                id_arr:[]
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

                getLatestPostsByCatID: function() {
                        this.axios
                        .get('/api/get_latest_posts_by_catId')
                        .then(response => {
                                console.log(response);
                                for(var i=0; i<response.data.length; i++) {
                                        this.tmp_title[i] = response.data[i].title;
                                        this.title_arr[i] = this.tmp_title[i].split(",");

                                        this.tmp_photo[i] = response.data[i].photo;
                                        this.photo_arr[i] = this.tmp_photo[i].split(",");

                                        this.tmp_post_id[i] = response.data[i].post_id;
                                        this.id_arr[i] = this.tmp_post_id[i].split(",");
                                }
                                this.tmp_arr = response.data;
                        });   
                },
              
                getPostByCatID: function(catId) {
                        if($('#search-word').val()) {
                                var search_word = $('#search-word').val();
                        } else {
                                var search_word = '';
                        }
                        if(catId) {
                                var cat_id = catId;
                        } else {
                                var cat_id = 1;
                        }
                        let fd = new FormData();
                                fd.append('search_word', search_word)
                                fd.append('category_id', cat_id)
                        
                        $('.search-item').css('display','none');
                        this.categoryId = cat_id;
                        axios.post("/api/posts/" , fd)
                        .then(response => {
                                this.posts = response.data;
                        }); 
                }, 

                getLatestPostByCatID: function(catId) {
                        if($('#search-word').val()) {
                                var search_word = $('#search-word').val();
                        } else {
                                var search_word = '';
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
                        axios.post("/api/get_latest_post/" , fd)
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
                        $('ul#myTab li a').removeClass('active');
                        $('ul#myTab li:first-child a').addClass('active');

                        var search_word = $('#search-word').val();
                        var categoryId = '1';

                        let fd = new FormData();
                                fd.append('search_word', search_word)
                                fd.append('selected_category', categoryId)
                                
                        this.axios.post('/api/search', fd)
                                .then(response => {
                                        if(response.data.length == '0') {
                                                this.posts = [];
                                                this.latest_post = [];
                                                
                                        } else {
                                                this.posts = response.data;
                                                this.latest_post = this.posts[0];
                                        }
                        });
                }
        }

}

 </script>
 