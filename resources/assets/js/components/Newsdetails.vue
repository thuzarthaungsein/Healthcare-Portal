<template> 
<div>
<!-- news details-->
<!--menu tabs-->          
<ul class="nav nav-tabs card-head-tabs" role="tablist">
<li role="presentation" class="active subtab1 nav-item"><a href="#tab1" role="tab" data-toggle="tab" class="nav-link active"><i class="fas fa-newspaper"></i> ニュース</a></li>
<li role="presentation" class="subtab2 nav-item"><a href="#tab2" role="tab" data-toggle="tab" class="nav-link"><i class="fas fa-briefcase-medical"></i> 病院検索</a></li>
<li role="presentation" class="subtab3 nav-item"><a href="#tab3" role="tab" data-toggle="tab" class="nav-link"><i class="fas fa-user-md"></i> 介護検索</a></li>
<li role="presentation" class="subtab5 nav-item"><a href="#tab4" role="tab" data-toggle="tab" class="nav-link"><i class="fas fa-users"></i> 求人検索</a></li>
</ul>
<!--end menu tabs-->

<!-- Tab panes -->
<div class="tab-content tab-content1 tabs">
        <div role="tabpanel" class="tab-pane in active" id="tab1"> 
                <div class="row col-sm-12">
                        <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                        <li class="breadcrumb-item">
                                        <router-link to="/">ホーム</router-link></li>                                       
                                        <li class="breadcrumb-item active" aria-current="page"> 新しい詳細</li>
                                </ol>
                        </nav>
                </div>
                <div class="justify-content-md-center scrolldiv2">
                <div class="col-md-12">                        
                        <div class="row m-lr-0 mb-3">
                                <div class="col-md-12" >
                                        <h4 class="h_4 header">{{newdetails.title}}</h4>
                                        <p class="set-date"><time datetime="2012-01-04">{{newdetails.created_at}}</time></p>
                                </div>
                                <div class="col-md-6">
                                        <p class="p5">{{newdetails.body}}</p>
                                </div>
                                <div class="col-md-6  mt-2 related-area" >
                                        <img
                                                :src="'/images/'+ newdetails.photo"
                                                class="img-responsive img_2 news_photo"
                                                > 
                                        <p class="img_2">東京五輪開幕まで1年　メダルお披露目 <br> <span><time datetime="2019-06-07">2019年6月7日</time></span></p> 
                                        <p class="img_2 header" style="font-size:22px;">関連ニュース</p>
                                        <!-- 関連ニュース -->
                                        <a href="#" style="color:#000;">
                                                <p class="img_2">韓国人男女が日本総領事館に侵入し抗議　身柄を拘束 <br>
                                                <span><time datetime="2012-01-04">2012年1月4日</time></span>
                                                </p>                                                        
                                        </a>                                                
                                      
                                </div>
                               
                                <!--related news-->
                                <!-- <div class="row m-lr-0 pad-free">
                                        <div class="col-md-12 text-center"><h4 class="h_4 next-title">関連ニュース</h4></div>
                                        <div class="col-sm-3  col-md-3 mt-2">
                                                <div class="hovereffect fit-image">
                                                        <img class="img-responsive fit-image"
                                                                src="/images/day1.jpg"
                                                                alt="">
                                                        <div class="overlay">
                                                        <h2></h2>
                                                        <a class="btn btn-sm all-btn secondary-bg-color"
                                                                href="news_details.html">詳細を見る</a>
                                                        </div>
                                                        <div class="info">
                                                                <div class="row">
                                                                        <div class="col-12">
                                                                                <p class=" p_3">一般的な信念に反して、単なるランダムテキストではありません。
                                                                                                紀元前45年からの古典的なラテン文学の一部にルーツがあり、2ンプデン・</p>
                                                                        </div>
                                                                </div>
                                                        </div>
                                                </div>
                                        </div>
                                        <div class="col-sm-3  col-md-3 mt-2">
                                                <div class="hovereffect fit-image">
                                                        <img class="img-responsive fit-image"
                                                                src="/images/day1.jpg"
                                                                alt="">
                                                        <div class="overlay">
                                                                <h2></h2>
                                                                <a class="btn btn-sm all-btn secondary-bg-color"
                                                                        href="news_details.html">詳細を見る</a>
                                                        </div>
                                                        <div class="info">
                                                                <div class="row">
                                                                        <div
                                                                                class="col-12">
                                                                                <p
                                                                                        class=" p_3">
                                                                                        一般的な信念に反して、単なるランダムテキストではありません。
                                                                                        紀元前45年からの古典的なラテン文学の一部にルーツがあり、2ンプデン・
                                                                                </p>
                                                                        </div>
                                                                </div>
                                                        </div>
                                                </div>
                                        </div>
                                        <div class="col-sm-3  col-md-3 mt-2">
                                                <div class="hovereffect fit-image">
                                                        <img class="img-responsive fit-image"
                                                                src="/images/day1.jpg"
                                                                alt="">
                                                        <div class="overlay">
                                                                <h2></h2>
                                                                <a class="btn btn-sm all-btn secondary-bg-color"
                                                                        href="/">詳細を見る</a>
                                                        </div>
                                                        <div class="info">
                                                                <div class="row">
                                                                        <div
                                                                                class="col-12">
                                                                                <p
                                                                                        class=" p_3">
                                                                                        一般的な信念に反して、単なるランダムテキストではありません。
                                                                                        紀元前45年からの古典的なラテン文学の一部にルーツがあり、2ンプデン・
                                                                                </p>
                                                                        </div>
                                                                </div>
                                                        </div>
                                                </div>
                                        </div>
                                        <div class="col-sm-3  col-md-3 mt-2">
                                                <div class="hovereffect fit-image">
                                                        <img class="img-responsive fit-image"
                                                                src="/images/day1.jpg"
                                                                alt="">
                                                        <div class="overlay">
                                                                <h2></h2>
                                                                <a class="btn btn-sm all-btn secondary-bg-color"
                                                                        href="/">詳細を見る</a>
                                                        </div>
                                                        <div class="info">
                                                                <div class="row">
                                                                        <div
                                                                                class="col-12">
                                                                                <p
                                                                                        class=" p_3">
                                                                                        一般的な信念に反して、単なるランダムテキストではありません。
                                                                                        紀元前45年からの古典的なラテン文学の一部にルーツがあり、2ンプデン・
                                                                                </p>
                                                                        </div>
                                                                </div>
                                                        </div>
                                                </div>
                                        </div>
                                </div> -->
                                        <!--end related news-->
                                         <div class="row m-lr-0">
                        <div class="row col-md-12 text-center m-lr-0"><h4 class="h_4 next-title">関連ニュース</h4></div>
                        <div class="col-sm-3  col-md-3 mt-2" v-for="latest_post_all_cat in latest_post_all_cats" :key="latest_post_all_cat.id">
                                <div class="hovereffect fit-image">
                                        <!-- <img v-bind:src="'/images/' + latest_post_all_cat.photo" class="source-img img-responsive" style="width:100%;height:80%" > -->
                                        <img class="img-responsive fit-image" v-bind:src="'/images/' + latest_post_all_cat.photo" alt="">
                                        <div class="overlay">
                                                <h2></h2>
                        <router-link class="btn btn-sm all-btn secondary-bg-color" :to="'/newsdetails/'+ latest_post_all_cat.id">{{ latest_post_all_cat.title }}</router-link>
                                                <a href="'/newsdetails"></a>
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
        </div> 
        </div>
        
                </div>
                <div role="tabpanel" class="tab-pane fade" id="tab2"><hospitalSearch></hospitalSearch></div>
                <div role="tabpanel" class="tab-pane fade" id="tab3"><nursingSearch></nursingSearch></div>
                <div role="tabpanel" class="tab-pane fade" id="tab4"></div>
                <div role="tabpanel" class="tab-pane fade" id="tab4"><jobSearch></jobSearch></div>
              </div>
            <!--end Tab panes-->                              
        </div>   
<!-- end news details--> 
</template>

<script>
import hospitalSearch from './hospitalSearch.vue'
import nursingSearch from './nursingSearch.vue'
import jobSearch from './jobSearch.vue'
    export default {
        components: {
                hospitalSearch,
                nursingSearch,
                jobSearch
        },
       
        data() {
            return {
                newdetails:[],
                cats: [],
                posts: [],
                latest_post: [],
                latest_post_all_cats: []
            }
        },
        created(){
            this.getAllCat();
            this.getPostByFirstCat();
            this.getLatestPostByFirstCatID();
            this.getLatestPostFromAllCat();
            this.axios
                 .get(`/api/newdetails/${this.$route.params.id}`)
                 .then(response=>{
                      console.log(response.data); 
                     this.newdetails = response.data;
                //        console.log(response.data);
                 });
        },
    
        methods: {
                getAllCat: function() {
                     this.axios
                        .get('/api/home')
                        .then(response => {
                                this.cats = response.data;
                        });   
                },
                getPostByFirstCat: function() {
                         axios.get("/api/posts/1")
                        .then(response => {
                                this.posts = response.data;
                        });
                },
                getPostByCatID: function(cat_id) {
                        axios.get("/api/posts/" + cat_id)
                        .then(response => {
                                this.posts = response.data;
                        });
                },
                getLatestPostByFirstCatID: function() {
                        axios.get("/api/get_latest_post/1")
                        .then(response => {
                                this.latest_post = response.data;
                        });
                },
                getLatestPostByCatID: function(cat_id) {
                        axios.get("/api/get_latest_post/" + cat_id)
                        .then(response => {
                                this.latest_post = response.data;
                        });
                },
                getLatestPostFromAllCat: function() {
                        this.axios
                        .get(`/api/get_latest_post_all_cat/`)
                        .then(response => {
                                //console.log(response);
                                this.latest_post_all_cats = response.data;
                        });
                }
        },
     
        

    }
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    
    //     export default {
       
//         data() {
//             return {
//                 newdetails:[]
//             }
//         },
//         created(){
//             this.axios
//                  .get(`/api/newdetails/${this.$route.params.id}`)
//                  .then(response=>{
                       
//                      this.newdetails = response.data;
//                        console.log(response.data);
//                  });
                       
//         }
//         // methods: {
//         //         getPostById: function(id=1) {
//         //                 this.axios
//         //                 .get('/api/newdetails/'+id)
//         //                 .then(response=>{
//         //                         console.log(response.data.news_list);
//         //                 this.newdetails = response.data.news_list;
//         //                 });
//         //         },
//         // }
        

//     }
// </script>





