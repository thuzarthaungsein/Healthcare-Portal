<template>
  <div class="row">
    <div class="col-12">
      <div class="row m-b-15" v-if="norecord !== 0">
        <div class="col-md-12">
          <router-link
            class="float-right main-bg-color create-btn all-btn"
            style="color: blue;"
            to="/createfacility"
          >
            <i class="fas fa-plus-circle"></i> 新しい施設を作る
          </router-link>
        </div>
        <!-- <a href="/joboffer" class="float-right" style="color: blue;"></a> -->
      </div>

      <!--card-->
      <div class="col-md-12 col-md-12 tab-content tab-content1 tabs pad-free border-style">
        <div class="col-md-12 scrolldiv">
          <div v-if="norecord === 0" class="card card-default card-wrap">
            <p class="record-ico">
              <i class="fa fa-exclamation"></i>
            </p>
            <p>OOPS!!</p>
            <p class="record-txt01">表示するデータありません</p>
            <p>表示するデータありません‼新しいデータを作成してください。</p>
            <a href="/createfacility" class="main-bg-color create-btn all-btn">
              <i class="fas fa-plus-circle"></i> 新しいデータ作成
            </a>
          </div>
          <div v-else class="container-fuid">
            <h4 class="main-color m-b-10">施設一覧検索</h4>
            <div class="row">
              <div class="col-md-12">
                <input
                  type="text"
                  class="form-control"
                  placeholder="検索"
                  id="search-item"
                  @keyup="searchFacility()"
                />
              </div>
            </div>
            <hr />
            <h5 class="header">施設一覧</h5>
            <div class="card card-default m-b-20" v-for="facility in facilities" :key="facility.id">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-9 m-t-8">
                    <p>{{facility.description}}</p>
                  </div>
                  <div class="col-md-3 text-right" style="margin-top: 8px;">
                    <router-link
                      :to="{name: 'editfacility', params: { id: facility.id }}"
                      class="btn edit-borderbtn"
                    >編集</router-link>

                    <button class="btn delete-borderbtn" @click="deleteFacility(facility.id)">削除</button>
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
      facilities: [],
    };
  },
  created() {
    this.axios.get("/api/facility/facilities").then(response => {
      this.facilities = response.data;
      this.norecord = this.facilities.length;
    });
  },
  methods: {
    deleteFacility(id) {
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
          .delete(`/api/facility/delete/${id}`)
          .then(response => {
              this.facilities= response.data;
            this.norecord= this.facilities.length;
            //alert('Delete Successfully!');
            // let i = this.facilities.map(item => item.id).indexOf(id); // find index of your object
            // this.facilities.splice(i, 1);
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

    searchFacility() {
      var search_word = $("#search-item").val();
      let fd = new FormData();
      fd.append("search_word", search_word);
      this.axios.post("/api/facility/search", fd).then(response => {
        this.facilities = response.data;
      });
    }
  }
};
</script>
