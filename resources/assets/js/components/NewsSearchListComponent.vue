<template>
    <div class="col-sm-12 pad-free">
        <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item">
                    <a href="/">ホーム</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page"> ニュース検索</li>
            </ol>
        </nav>

        <div class="row">
            <div class="col-12">           
                <div class="col-12">
                    <form class="col-lg-12 mb-2 pad-free">
                        <div class="col-md-6 offset-6 pad-free">
                            <div class="row ">
                                <div class="col-md-9">
                                    <input v-if="status == '0'" type="text" placeholder="検索" aria-label="検索" class="form-control col-lg mr-sm-3 d-flex p-2 form-control" id="search-word" v-bind:value="first_search_word">
                                    <input v-if="status == '1'" type="text" placeholder="検索" aria-label="検索" class="form-control col-lg mr-sm-3 d-flex p-2 form-control" id="search-word" v-bind:value="search_word">
                                </div>
                                <div class="col-md-3">
                                    <span class="btn btn my-2 col-md-12 my-sm-0 all-btn secondary-bg-color btn-secondary" @click="searchCategory()"><i class="fas fa-search"></i> 検索</span>
                                </div>
                            </div>
                        </div>             
                    </form>

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

export default {
        props:{
                first_search_word:String
        },

        data() {
            return {
               post_groups:[],
               search_word:'',
               status:'0'
            }
        },
        created() {
            var  search_word = $('#search-word').val();
            this.axios
                .post('/api/news/search/'+search_word)
                .then(response=>{
                    this.post_groups = this.groupBy(response.data, 'name');                       
                });
        },

  methods: {
    changeRoute(e){
        this.$router.push({name:'home',params:{page:e.target.hash}});
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
    imgUrlAlt(event) {
        event.target.src = "images/noimage.jpg"
    },
    searchCategory: function() {
        if($('#search-word').val() == ''){
            window.location.reload();
        }
        else {
            this.status = 1;
            var  search = $('#search-word').val();
            this.search_word = search;

            this.axios
                .post('/api/news/search/'+this.search_word)
                .then(response=>{
                this.post_groups = this.groupBy(response.data, 'name');
                });
        }
    }
  }

}

 </script>
