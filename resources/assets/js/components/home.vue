<template>
<div>                                
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
                   <!-- <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item active"><router-link to="/hospitalSearch" ><i class="fas fa-home"></i>   ホーム</router-link>
                      </li>
                    </ol>
                  </nav> -->
                  <News></News>
               
        
                </div>
                <div role="tabpanel" class="tab-pane fade" id="tab2">   <hospitalSearch></hospitalSearch></div>
                <div role="tabpanel" class="tab-pane fade" id="tab3"><nursingSearch></nursingSearch></div>
                <div role="tabpanel" class="tab-pane fade" id="tab4"></div>
                <div role="tabpanel" class="tab-pane fade" id="tab4"><jobSearch></jobSearch></div>
              </div>
            <!--end Tab panes-->                              
        </div>   
        <!-- {{ l_storage_hos_history }} -->
</template>

<script>
import News from './News.vue'
import hospitalSearch from './hospitalSearch.vue'
import nursingSearch from './nursingSearch.vue'
import jobSearch from './jobSearch.vue'
// import ProfilePublish from './ProfilePublish.vue'
  
export default {
    components: {
     News,
     hospitalSearch,
     nursingSearch,
     jobSearch
    },
     mounted() {
                // console.log[l_storage_hos_history];
        },
        data() {
            return {
                cats: [],
                posts: [],
                latest_post: [],
                latest_post_all_cats: [],
                
                l_storage_hos_history: [],
                l_storage_nus_history: [],
                l_storage_hos_fav: [],
                l_storage_nus_fav: [],
            }
        },
        created() {
                // Push data
                this.l_storage_hos_fav.push(1);
                this.l_storage_nus_fav.push(1);
                this.l_storage_hos_history.push(2);
                this.l_storage_nus_history.push(1);

                this.l_storage_hos_fav.push(2);
                this.l_storage_nus_fav.push(2);
                this.l_storage_hos_history.push(1);
                this.l_storage_nus_history.push(2);

                // Set LocalStorage data
               localStorage.setItem("hospital_history",this.l_storage_hos_history);
               localStorage.setItem("nursing_history",this.l_storage_nus_history);
               localStorage.setItem("hospital_fav",this.l_storage_hos_fav);
               localStorage.setItem("nursing_fav",this.l_storage_nus_fav);

        //        localStorage.setItem('name', 'SNY');
        //        const person = {
        //                name: "SNY",
        //                location: "Ygn",
        //        }
        //        localStorage.setItem('user', JSON.stringify(person));
                
            this.getAllCat();
            this.getPostByFirstCat();
            this.getLatestPostByFirstCatID();
            this.getLatestPostFromAllCat();
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
                        .get('/api/get_latest_post_all_cat')
                        .then(response => {
                                this.latest_post_all_cats = response.data;
                        });
                },
        }

}

 </script>


