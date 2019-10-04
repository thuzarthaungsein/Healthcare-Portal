<template>
        <div class="col-sm-12 pad-free">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="/">ホーム</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">新しい検索</li>
            </ol>
          </nav>

        <div class="row">
            <div class="col-12">
                <div class="col-12">
                    <form class="form-inline col-lg-12 form-inline mb-2 pad-free">
                            <input v-if="status == '0'" type="text" placeholder="検索" aria-label="検索" class="form-control col-lg mr-sm-3 d-flex p-2 form-control" id="search-word" v-bind:value="first_search_word">
                            <input v-if="status == '1'" type="text" placeholder="検索" aria-label="検索" class="form-control col-lg mr-sm-3 d-flex p-2 form-control" id="search-word" v-bind:value="search_word">

                        <span class="btn btn my-2 my-sm-0 all-btn secondary-bg-color btn-secondary" @click="searchCategory()"><i class="fas fa-search"></i> 検索</span>
                    </form>

                    <div class="col-md-12 category_box"  v-for="(group,index) in post_groups" :key="index">
                        <h4 class="category_news_title"><span>{{group.name}}</span></h4>
                            <div class="row m-lr-0">
                                <div class="col-md-3 p-l-0" v-for="item in posts" :key="item.id" v-if="item.cat_id == group.cat_id">
                                    <div class="col-md-12 row m-b-10 adslist-card m-lr-0" style="background-color: #eee;box-shadow: 0 0 2px #bfb9b9;">
                                        <div class="col-md-4 img-box">
                                            <router-link :to="'/newsdetails/'+item.id">
                                                <img v-bind:src="'/upload/news/' + item.photo" class="fit-image" style="height:5rem;width:6rem" @error="imgUrlAlt">
                                            </router-link>
                                        </div>
                                        <div class="col-md-8 txt-box">
                                            <router-link :to="'/newsdetails/'+item.id">
                                                <p class="news-title smallads-title"> {{item.title}} </p>
                                            </router-link>
                                        </div>
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
import News from './News.vue'

export default {
         props:{
                first_search_word:String
        },

        data() {
            return {
               post_groups:[],
               posts:[],
               search_word:'',
               status:'0'
            }
        },
        created() {
            this.posts = [];
                    
            this.axios
                .post('/api/news/search/'+this.first_search_word)
                .then(response=>{
                        this.post_groups = response.data;
                        for(var i=0; i< this.post_groups.length; i++) {
                            var id_arr = this.post_groups[i]['id'].split(',');
                            if(id_arr.length>0) {
                                var title_arr = this.post_groups[i]['title'].split(',');
                                var photo_arr = this.post_groups[i]['photo'].split(',');
                                for(var j=0; j< id_arr.length; j++) { 
                                    this.posts.push({id:id_arr[j],title:title_arr[j],photo:photo_arr[j],cat_id:this.post_groups[i]['cat_id']}); 
                                }
                            }
                        }
                });
            },
        methods: {
                searchCategory: function() {
                    this.posts = [];
                    this.status = 1;

                    var  search = $('#search-word').val();
                    this.search_word = search;

                    this.axios
                        .post('/api/news/search/'+this.search_word)
                        .then(response=>{
                                this.post_groups = response.data;
                                for(var i=0; i< this.post_groups.length; i++) {
                                    var id_arr = this.post_groups[i]['id'].split(',');
                                    if(id_arr.length>0) {
                                        var title_arr = this.post_groups[i]['title'].split(',');
                                        var photo_arr = this.post_groups[i]['photo'].split(',');
                                        for(var j=0; j< id_arr.length; j++) { 
                                            this.posts.push({id:id_arr[j],title:title_arr[j],photo:photo_arr[j],cat_id:this.post_groups[i]['cat_id']}); 
                                        }
                                    }
                                }
                        });
                }
        }
}
</script>