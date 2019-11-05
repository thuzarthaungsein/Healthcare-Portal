<template>
  <div class="row">
    <div class="col-md-12">
      <div class="row m-b-10" v-if="norecord!== 0">
        <div class="col-md-12">
          <router-link to="/type" class="float-right main-bg-color create-btn all-btn">
            <i class="fas fa-plus-circle"></i>
            新しい事業者の種類を作成
          </router-link>
        </div>
      </div>
      <div class="col-md-12 col-md-12 tab-content tab-content1 tabs pad-free border-style">
        <div class="col-md-12 scrolldiv">
          <div v-if="norecord == 0" class="card card-default card-wrap">
            <p class="record-ico">
              <i class="fa fa-exclamation"></i>
            </p>
            <p>OOPS!!</p>
            <p class="record-txt01">表示するデータありません</p>
            <p>表示するデータありません‼新しいデータを作成してください。</p>
            <a href="/type" class="main-bg-color create-btn all-btn">
              <i class="fas fa-plus-circle"></i> 新しく作る
            </a>
          </div>
          <div v-else class="container-fuid">
            <h4 class="main-color m-b-10">事業者の種類検索</h4>
            <div class="row">
              <div class="col-md-12">
                <input
                  type="text"
                  class="form-control"
                  placeholder="事業者の種類検索"
                  id="search-item"
                  @keyup="searchType()"
                />
              </div>
            </div>
            <hr />
            <h5 class="header">事業者の種類一覧</h5>
            <div class="card card-default m-b-20" v-for="type in types" :key="type.id">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-9 m-t-8">{{type.name}}</div>
                  <div class="col-md-3 text-right">
                    <small>
                      <router-link
                        :to="{name:'type', params:{id : type.id}}"
                        class="btn edit-borderbtn"
                      >編集</router-link>
                    </small> &nbsp;
                    <small>
                      <a class="btn text-danger delete-borderbtn" @click="deleteType(type.id)">削除</a>
                    </small>
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
      types: [],
      norecord: 0
    };
  },
  created() {
    this.axios.get("/api/types/type").then(response => {
      this.types = response.data;
      this.norecord = this.types.length;
    });
  },
  methods: {
    deleteType(id) {
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
      }).then(response => {
        this.axios
          .delete(`/api/types/delete/${id}`)
          .then(response => {
            this.types = response.data;
            this.norecord = this.types.length;
            //    let i = this.types.map(item => item.id).indexOf(id); // find index of your object
            //     this.types.splice(i, 1);
            this.$swal({
              title: "削除された",
              text: "ファイルが削除されました。",
              type: "success",
              width: 350,
              height: 200,
              confirmButtonText: "はい",
              confirmButtonColor: "#dc3545"
            });
          })
          .catch(() => {
            this.$swal("Failed", "wrong");
          });
      });
    },
    searchType() {
      var search_word = $("#search-item").val();
      let fd = new FormData();
      fd.append("search_word", search_word);
      this.axios.post("/api/types/search", fd).then(response => {
        this.types = response.data;
      });
    }
  }
};
</script>
