<template>
<div>
        <!-- <adsSlider></adsSlider> -->
        <!--menu tabs-->
        <ul class="nav nav-tabs news-tabColor" role="tablist" id="navtab">
        <li role="presentation"  class="subtab1 nav-item" :class="subtab1active"><a @click="changeRoute('news')" href="#tab1" role="tab" data-toggle="tab" class="nav-link" :class="subtab1active"><i class="fas fa-newspaper"></i> ニュース</a></li>
        <li role="presentation"  class="subtab2 nav-item" :class="subtab2active"><a @click="changeRoute('hospital')" href="#tab2" role="tab" data-toggle="tab" class="nav-link" :class="subtab2active"><i class="fas fa-briefcase-medical"></i> 病院検索</a></li>
        <li role="presentation"  class="subtab3 nav-item" :class="subtab3active"><a @click="changeRoute('nursing')" href="#tab3" role="tab" data-toggle="tab" class="nav-link" :class="subtab3active"><i class="fas fa-user-md"></i> 介護検索</a></li>
        <li role="presentation"  class="subtab5 nav-item" :class="subtab4active"><a @click="changeRoute('job')" href="#tab4" role="tab" data-toggle="tab" class="nav-link" :class="subtab4active"><i class="fas fa-users"></i> 求人検索</a></li>
        </ul>
        <!--end menu tabs-->
        <!-- Tab panes -->
              <div class="tab-content tab-content1 tabs upper-tab" id="upper-tab">
               <div role="tabpanel"  class="tab-pane" id="tab1" :class="{active:subtab1active, fade:fade1}"> <News></News> </div>
                <div role="tabpanel" class="tab-pane" id="tab2" :class="{active:subtab2active, fade:fade2}"><hospitalSearch></hospitalSearch></div>
                <div role="tabpanel" class="tab-pane" id="tab3" :class="{active:subtab3active, fade:fade3}"><nursingSearch></nursingSearch></div>
                <div role="tabpanel" class="tab-pane" id="tab4" :class="{active:subtab4active, fade:fade4}"><jobSearch></jobSearch></div>
              </div>
            <!--end Tab panes-->
        </div>
        <!-- {{ l_storage_hos_history }} -->
</template>

<script>
import News from "./News.vue";
import hospitalSearch from "./hospitalSearch.vue";
import nursingSearch from "./nursingSearch.vue";
import jobSearch from "./jobSearch.vue";
import adsSlider from "./ads_slider.vue";
// import ProfilePublish from './ProfilePublish.vue'

export default {
    components: {
     News,
     hospitalSearch,
     nursingSearch,
     jobSearch,
     adsSlider
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
                subtab1active: '',
                subtab2active: '',
                subtab3active: '',
                subtab4active: '',
                fade1: true,
                fade2: true,
                fade3: true,
                fade4: true,
            }
        },
        created() {
                this.start();
                console.log(localStorage.getItem("hospital_fav"));
                console.log(localStorage.getItem("nursing_fav"));
                console.log(localStorage.getItem("nursing_history"));
                console.log(localStorage.getItem("hospital_history"));

                // Push data
                this.l_storage_hos_fav.push(2);
                this.l_storage_hos_fav.push(4);
                
                this.l_storage_hos_history.push(2);
                this.l_storage_hos_history.push(4);

                
                this.l_storage_nus_fav.push(1);
                this.l_storage_nus_fav.push(3);
                this.l_storage_nus_fav.push(5);
                this.l_storage_nus_fav.push(6);

                this.l_storage_nus_history.push(1);
                this.l_storage_nus_history.push(3);
                this.l_storage_nus_history.push(5);

                localStorage.setItem("hospital_fav", this.l_storage_hos_fav);
                localStorage.setItem("nursing_fav", this.l_storage_nus_fav);
                localStorage.setItem("nursing_history", this.l_storage_nus_history);
                localStorage.setItem("hospital_history", this.l_storage_hos_history);
                
            this.getAllCat();
            this.getPostByFirstCat();
            this.getLatestPostByFirstCatID();
            this.getLatestPostFromAllCat();
        },
        methods: {
                start() {
                      
                        if(this.$route.params.page) {
                               //console.log(this.$route.params.page)
                               if(this.$route.params.page == 'subtab2') {
                                       this.fade2 = false;
                                       this.subtab2active = 'active';
                               }
                               else if(this.$route.params.page == 'subtab3') {
                                       this.fade3 = false;
                                       this.subtab3active = 'active';
                               }
                               else if(this.$route.params.page == '#tab2'){
                                        this.fade1 = false;
                                        this.fade2 = false;
                                        this.fade3 = false;
                                        this.fade4 = false;
                                        this.subtab2active = 'active';
                               }
                               else if(this.$route.params.page == '#tab3'){
                                        this.fade1 = false;
                                        this.fade2 = false;
                                        this.fade3 = false;
                                        this.fade4 = false;
                                        this.subtab3active = 'active';
                               }
                               else if(this.$route.params.page == '#tab4'){
                                        this.fade1 = false;
                                        this.fade2 = false;
                                        this.fade3 = false;
                                        this.fade4 = false;
                                        this.subtab4active = 'active';
                               }
                               else if(this.$route.params.page == '#tab1'){
                                        this.fade1 = false;
                                        this.fade2 = false;
                                        this.fade3 = false;
                                        this.fade4 = false;
                                        this.subtab1active = 'active';
                               }

                        }
                        else{
                                this.fade1 = false;
                                this.subtab1active = 'active';
                        }


                //     this.$route.params.page? (this.$route.params.page == 'subtab2'? (this.subtab2active = 'active') : (this.subtab3active = 'active')) : (this.subtab1active = 'active');
                },
                getAllCat: function() {
                     this.axios
                        .get('/api/home')
                        .then(response => {
                                this.cats = response.data;
                        });
                },
                getPostByFirstCat: function() {
                         this.axios.get("/api/posts/1")
                        .then(response => {
                                this.posts = response.data;
                        });
                },
                getPostByCatID: function(cat_id) {
                        this.axios.get("/api/posts/" + cat_id)
                        .then(response => {
                                this.posts = response.data;
                        });
                },
                getLatestPostByFirstCatID: function() {
                        this.axios.get("/api/get_latest_post/1")
                        .then(response => {
                                this.latest_post = response.data;
                        });
                },
                getLatestPostByCatID: function(cat_id) {
                        this.axios.get("/api/get_latest_post/" + cat_id)
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
                changeRoute(tab){
                        // $('[class^="-tabColor"]').removeClass();
                        $('#navtab').removeClass('news-tabColor hospital-tabColor nursing-tabColor job-tabColor');                        
                        $('#navtab').addClass(tab+'-tabColor');
                        $('.tab-content').removeClass('news-borderColor job-borderColor nursing-borderColor hospital-borderColor');                        
                        $('#upper-tab').addClass(tab+'-borderColor');                        
                   // console.log(e.target.tagName);
                    //this.$router.push({name:'home'});
                },
        }

}

</script>

<style >
.hospital-tabColor .nav-link {
        background: #63b7ff !important;
        color: #fff;
        border-right: 1px solid #fff;
}
.news-tabColor .nav-link {
        background: #75b777 !important;
        color: #fff;
        border-right: 1px solid #fff;
}
.nursing-tabColor .nav-link {
        background: #ff9563 !important;
        color: #fff;
        border-right: 1px solid #fff;
}
.job-tabColor .nav-link{
        background: #828282 !important;
        color: #fff;
        border-right: 1px solid #fff;
}

.job-borderColor {
        border: 1px solid #828282 !important;
}
.news-borderColor {
        border: 1px solid #75b777 !important;
}
.hospital-borderColor {
        border: 1px solid #63b7ff !important;
}
.nursing-borderColor {
        border: 1px solid #ff9563 !important;
}

</style>
