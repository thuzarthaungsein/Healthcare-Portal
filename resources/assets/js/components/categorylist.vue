<template>
  <div class="row">
    <div class="col-12">
      <div class="row m-b-10" v-if="this.categories.length !== 0">
        <div class="col-md-12">
          <router-link to="/createcategory" class="float-right main-bg-color create-btn all-btn">
            <i class="fas fa-plus-circle"></i> 新しいカテゴリを作成
          </router-link>
        </div>
      </div>
      <!--card-->
      <div class="col-md-12 col-md-12 tab-content tab-content1 tabs pad-free border-style">
        <div class="col-md-12 scrolldiv">
          <div v-if="categories == 0" class="card card-default card-wrap">
            <p class="record-ico">
              <i class="fa fa-exclamation"></i>
            </p>
            <p>OOPS!!</p>
            <p class="record-txt01">表示するデータありません</p>
            <p>表示するデータありません‼新しいデータを作成してください。</p>
            <a href="/createcategory" class="main-bg-color create-btn all-btn">
              <i class="fas fa-plus-circle"></i> 新しいデータ作成
            </a>
          </div>
          <div v-else class="container-fuid">
            <h4 class="main-color m-b-10">カテゴ一覧 検索</h4>
            <div class="row">
              <div class="col-md-12">
                <input
                  type="text"
                  class="form-control"
                  placeholder="検索"
                  id="search-item"
                  @keyup="searchCategory()"
                />
              </div>
              <!-- <div class="col-md-2 text-right">
                    <button class="btn secondary-bg-color all-btn white" style="width:100%;"><i class="fas fa-search"></i> 検索</button>
              </div>-->
            </div>
            <hr />
            <h5 class="header">カテゴ一覧</h5>
            <div class="card card-default m-b-20" v-for="category in categories" :key="category.id">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-9 m-t-8">{{category.name}}</div>
                  <div class="col-md-3 text-right">
                    <small>
                      <router-link
                        :to="{name:'editcategory', params:{id : category.id}}"
                        class="btn edit-borderbtn"
                      >編集</router-link>
                    </small> &nbsp;
                    <small>
                      <a
                        class="btn text-danger delete-borderbtn"
                        @click="deleteCategory(category.id)"
                      >削除</a>
                    </small>
                  </div>
                </div>
              </div>
            </div>
          </div>
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
      categories: []
    };
  },

  created() {
    this.axios.get("/api/category/categories").then(response => {
      this.categories = response.data;
    });
    this.axios.get("/api/user").then(response => {
      // console.log(response);
    });
  },
  methods: {
    deleteCategory(id) {
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
          .delete(`/api/category//${id}`)
          .then(response => {
            //alert('Delete Successfully!');
            let i = this.categories.map(item => item.id).indexOf(id); // find index of your object
            this.categories.splice(i, 1);
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
    // if(confirm("Are you sure you want to delete?"))
    // {
    //      this.axios
    //     .delete(`/api/category/delete/${id}`)
    //     .then(response => {
    //         alert('Delete Successfully!');
    //         let i = this.categories.map(item => item.id).indexOf(id); // find index of your object
    //         this.categories.splice(i, 1)
    //     });
    //}

    //},

    searchCategory() {
      var search_word = $("#search-item").val();
      let fd = new FormData();
      fd.append("search_word", search_word);
      this.axios.post("/api/category/search", fd).then(response => {
        this.categories = response.data;
      });
    }
  }
};
</script>
