<template>
  
<layout>
  <div>
    <!-- news details-->

    <!-- Tab panes -->
    <div class="tab-content1 tabs">
      <div role="tabpanel" class="tab-pane active" id="tab1">
        <div class="col-sm-12 pad-free">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <router-link to="/">ホーム</router-link>
              </li>
              <li class="breadcrumb-item active" aria-current="page">ニュース詳細</li>
            </ol>
          </nav>
        </div>
        <div class="justify-content-md-center scrolldiv2">
          <div class="col-md-12">
            <div class="row m-lr-0 mb-3">
              <!-- <div class="col-md-12">
                <h4 class="h_4 header">{{newdetails.title}}</h4>
                <p class="set-date">
                  <small style="color:#aaa;">
                    <i class="fa fa-calendar-alt"></i>
                    &nbsp;&nbsp;{{newdetails.created_at}}
                  </small>
                </p>
              </div>
              <div class="col-md-8">
                <p class="p5">{{newdetails.body}}</p>
              </div>
              <div class="col-md-4 mt-2 related-area">
                <img
                  :src="'/upload/news/'+ newdetails.photo"
                  class="img-responsive img_2 news_photo"
                />
                <p class="img_2">
                  {{newdetails.main_point}}
                  <br />

                </p>
                <p class="img_2 header" style="font-size:22px;">もっと記事を見る</p>

                <div
                  class="col-sm-12 pad-free"
                  v-for="latest_new in latest_news"
                  :key="latest_new.id"
                >
                  <router-link :to="'/newsdetails/'+ latest_new.id">
                    <span>{{ latest_new.main_point }}</span>
                  </router-link>
                </div>
              </div>-->
              <div class="row">
                <div class="col-md-12">
                  <h4 class="h_4 header">{{newdetails.title}}</h4>
                  <p class="set-date">
                    <small style="color:#aaa;">
                      <i class="fa fa-calendar-alt"></i>
                      &nbsp;&nbsp;{{newdetails.created_at}}
                    </small>
                  </p>
                </div>
                <div class="col-12">
                  <div class="float-left mr-4" style="max-width:500px;">
                    <div
                      class="img-wrap mb-2"
                      style="width:100%;text-align: center;padding: 30px;"
                    >
                      <img
                        :src="'/upload/news/'+ newdetails.photo"
                        class="img-responsive img_2"
                        style="max-width:100%;"
                        @error="imgUrlAlt"
                      />
                    </div>
                    <p class="img_2 mb-1">{{newdetails.main_point}}</p>
                  </div>
                  <div>
                    <p class="p5 mb-2">{{newdetails.body}}</p>
                  </div>
                </div>
                <div class="col-md-12 mt-2 related-area">
                  <p
                    class="img_2 header"
                    style="font-size:22px;width:20%;line-height:1;margin-bottom:10px;"
                  >記事をもっと見る</p>
                  <br />
                  <!-- 関連ニュース -->
                  <div
                    class="pad-free"
                    v-for="latest_new in latest_news"
                    :key="latest_new.id"
                    style="display:inline;margin-right:10px;"
                  >
                    <router-link :to="'/newsdetails/'+ latest_new.id">
                      <span>{{ latest_new.main_point }} |</span>
                    </router-link>
                  </div>
                </div>
              </div>
              <div
                class="row col-md-12 m-lr-0 m-t-15 pad-free"
                style="border-top: 2px dashed #eee;"
              >
                <div class="row col-md-12 text-center m-lr-0 pad-free">
                  <h4 class="h_4 next-title" style="border-left: 5px solid orange;">関連ニュース</h4>
                </div>
                <div
                  class="col-sm-3 col-md-3 m-t-15 mt-2"
                  v-for="latest_post_all_cat in latest_post_all_cats"
                  :key="latest_post_all_cat.id"
                >
                  <router-link :to="'/newsdetails/'+ latest_post_all_cat.id">
                    <div class="hovereffect fit-image" style="cursor:pointer;">
                      <img
                        class="img-responsive fit-image"
                        v-bind:src="'/upload/news/' + latest_post_all_cat.photo"
                        alt="img"
                         @error="imgUrlAlt"
                      />
                      <div class="overlay">
                        <span class="btn btn-sm all-btn secondary-bg-color m-t-20">詳細</span>
                      </div>
                      <div class="info">
                        <div class="row">
                          <div class="col-12">
                            <p class="p_3">{{ latest_post_all_cat.main_point }}</p>
                          </div>
                        </div>
                      </div>
                    </div>
                  </router-link>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
     
    </div>
    <!--end Tab panes-->
  </div>
  <!-- end news details-->
  </layout>
</template>

<script>
import layout from '../components/home.vue'
export default {
  components: {
    layout
  },

  data() {
    return {
      newdetails: [],
      latest_post_all_cats: [],
      latest_news: []
    };
  },
  created() {
    //this.getLatestPostFromAllCat();

    this.axios
      .get(`/api/newdetails/${this.$route.params.id}`)
      .then(response => {
        this.newdetails = response.data;
      });
    // alert(this.$route.params.id);
    this.relatedNews(this.$route.params.id);
  },

  methods: {
    imgUrlAlt(event) {
                event.target.src = "images/noimage.jpg"
            },

    // getLatestPostFromAllCat: function() {

    //         this.axios
    //         .get(`/api/get_latest_post_all_cat`)
    //         .then(response => {
    //                 //console.log(response);
    //                 //this.latest_post_all_cats = response.data;
    //         });
    // },
    relatedNews: function(pid) {
      // this.axios
      // .get(`/api/newsdetailsrelated/${id}`).then(response => {
      //     console.log(response);
      //     this.latest_post_all_cats= response.data;
      // });
      this.axios.get(`/api/relatednews/${pid}`).then(response => {
        this.latest_post_all_cats = response.data.related_news;
        this.latest_news = response.data.latest_news;
      });
    },
    changeRoute(e,tab){
        $('#navtab').removeClass('news-tabColor hospital-tabColor nursing-tabColor job-tabColor');                        
        $('#navtab').addClass(tab+'-tabColor');
        $('.tab-content').removeClass('news-borderColor job-borderColor nursing-borderColor hospital-borderColor');                        
        $('.tab-content').addClass(tab+'-borderColor'); 
          this.$router.push({name:'home',params:{page:e.target.hash}});   
    },
    imgUrlAlt(event) {
        event.target.src = "/images/noimage.jpg"
    },
  }
};
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
        border: 1px solid #ccc !important;
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