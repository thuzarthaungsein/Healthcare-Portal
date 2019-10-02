<template>
  <div class="row">
    <div class="col-12">
      <div class="row m-b-10" v-if="this.features.length !== 0">
        <div class="col-md-12">
          <router-link to="/specialfeature" class="float-right main-bg-color create-btn all-btn">
            <i class="fas fa-plus-circle"></i> 特殊機能を作成
          </router-link>
        </div>
      </div>
      <!--card-->
      <div class="col-md-12 col-md-12 tab-content tab-content1 tabs pad-free border-style">
        <div class="col-md-12 scrolldiv">
          <div v-if="!this.features.length" class="card card-default card-wrap">
            <p class="record-ico">
              <i class="fa fa-exclamation"></i>
            </p>
            <p>OOPS!!</p>
            <p class="record-txt01">表示するデータありません</p>
            <p>表示するデータありません‼新しいデータを作成してください。</p>
            <a href="/specialfeature" class="main-bg-color create-btn all-btn">
              <i class="fas fa-plus-circle"></i> 新しいデータ作成
            </a>
          </div>
          <div v-else class="container-fuid">
            <h4 class="main-color m-b-10">検索特徴リスト</h4>
            <div class="row">
              <div class="col-md-12">
                <input
                  type="text"
                  class="form-control"
                  placeholder="検索"
                  id="search-item"
                  @keyup="searchFeature()"
                />
              </div>
            </div>
            <hr />
            <h5 class="header">特徴リスト</h5>
            <div class="col-md-12 pad-free scrolldiv">
              <div
                v-if="!this.features.length"
                class="container-fuid"
                style="padding-top:30px; height:700px; text-align:center ">No Record Data</div>
              <div v-else class="container-fuid">
                <table class="table table-hover custom-table">
                  <thead style="background-color:rgb(183, 218, 210);">
                    <tr>
                      <th>機能名</th>
                      <th>略称</th>
                      <th>種類</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="feature in features" :key="feature.id">
                      <th>{{feature.name}}</th>
                      <th>{{feature.short_name}}</th>
                      <th>{{feature.type}}</th>
                      <th class="text-right">
                        <!-- <button class="btn btn-sm btn-primary all-btn" v-if="getUser.status == 1">Approved</button> -->
                        <router-link
                          :to="{name:'specialfeature', params:{id : feature.id}}"
                          class="btn edit-borderbtn"
                        >編集</router-link>
                        <a
                          class="btn text-danger delete-borderbtn"
                          @click="deleteFeature(feature.id)"
                        >削除</a>
                      </th>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>
          <!--end card-->
        </div>
      </div>
      <!--end card-->
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      features: []
    };
  },

  created() {
    this.axios.get("/api/feature/featurelist").then(response => {
      this.features = response.data;
    });
  },
  methods: {
    deleteFeature(id) {
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
         this.axios.delete(`/api/feature/delete/${id}`).then(response => {
      //   alert("Delete Successfully!");
          let i = this.features.map(item => item.id).indexOf(id); // find index of your object
          this.features.splice(i, 1);
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

    searchFeature() {
      var search_word = $("#search-item").val();
      let fd = new FormData();
      fd.append("search_word", search_word);
      this.axios.post("/api/Feature/search", fd).then(response => {
        this.categories = response.data;
      });
    }
  }
};
</script>
