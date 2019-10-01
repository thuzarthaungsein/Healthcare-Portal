
<template>
  <div class="row">
    <div class="col-12">
      <div class="row m-b-15" v-if="this.advertisements.length !== 0">
        <div class="col-md-12">
          <router-link
            to="/advertisement"
            class="float-right main-bg-color create-btn all-btn"
            style="color: blue;"
          >
            <i class="fas fa-plus-circle"></i> 広告を作成する
          </router-link>
        </div>
      </div>

      <div class="col-md-12 col-md-12 tab-content tab-content1 tabs pad-free border-style">
        <div class="scrolldiv col-12">
          <div v-if="!this.advertisements.length" class="card card-default card-wrap">
            <p class="record-ico">
              <i class="fa fa-exclamation"></i>
            </p>
            <p>OOPS!!</p>
            <p class="record-txt01">表示するデータありません</p>
            <p>表示するデータありません‼新しいデータを作成してください。</p>
            <a href="/advertisement" class="main-bg-color create-btn all-btn">
              <i class="fas fa-plus-circle"></i> 新しいデータ作成
            </a>
          </div>
          <div v-else class="container-fuid">
            <h4 class="main-color m-b-10">広告検索</h4>
            <div class="row">
              <div class="col-md-12">
                <input
                  type="text"
                  class="form-control"
                  placeholder="検索"
                  id="search-item"
                  @keyup="searchAdvertisment()"
                />
              </div>
            </div>
            <hr />
            <h5 class="header">広告</h5>
            <div v-for="ads in advertisements" :key="ads.id" class="card card-default m-b-20">
              <div class="card-body news-post">
                <div class="row">
                  <div class="col-md-2">
                    <img :src="'/upload/advertisement/'+ ads.photo" class="img-fluid" alt="ads" />
                  </div>
                  <div class="row col-md-10">
                    <div class="col-md-2 max-width16">
                      <strong>タイトル :</strong>
                    </div>
                    <div class="col-md-10">{{ads.title}}</div>
                    <!-- <div class="col-md-2 max-width16"><strong>描写  :</strong></div><div class="col-md-10">{{ads.description}}</div> -->

                    <div class="row col-12 mt-2">
                      <div class="col-4 col-offset-4 pl-3">
                        <router-link
                          :to="{name: 'editadvertisement', params: { id: ads.id }}"
                          class="btn edit-borderbtn"
                        >編集</router-link>
                        <button class="btn delete-borderbtn" @click="deleteAds(ads.id)">削除</button>
                        <!-- <button class="btn delete-borderbtn" @click="toggleModal">削除</button>                                 -->
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
  </div>
</template>
<script>
export default {
  data() {
    return {
      advertisements: [],
      isOpen: false
    };
  },
  created() {
    this.axios.get("/api/advertisement/ads").then(response => {
      this.advertisements = response.data;
    });
  },

  methods: {
    // toggleModal() {
    //     this.isOpen = !this.isOpen;
    // },
    deleteAds(id) {
      this.$swal({
        title: "確認",
        text: "削除よろしいでしょうか",
        type: "warning",
        width: 350,
        height: 200,
        showCancelButton: true,
        confirmButtonColor: "#dc3545",
        cancelButtonColor: "#b1abab",
        cancelButtonTextColor: "#000",
        confirmButtonText: "削除",
        cancelButtonText: "キャンセル",
        confirmButtonClass: "all-btn",
        cancelButtonClass: "all-btn"
      }).then(response=>{
        this.axios.delete(`/api/advertisement/delete/${id}`).then(response => {
          //alert("Delete Successfully!");
          let a = this.advertisements.map(item => item.id).indexOf(id);
          this.advertisements.splice(a, 1);
          this.$swal({
              title: "削除された",
              text: "ファイルが削除されました。",
              type: "success",
              width: 350,
              height: 200,
              confirmButtonText: "はい",
              confirmButtonColor: "#dc3545"
            });
        });
      })

      },


    searchAdvertisment() {
      var search_word = $("#search-item").val();
      let fd = new FormData();
      fd.append("search_word", search_word);
      this.axios.post("/api/advertisement/search", fd).then(response => {
        this.advertisements = response.data;
      });
    }
     }
  }
</script>

