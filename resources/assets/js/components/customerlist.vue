<template>
  <div class="col-md-12 pad-free">
    <!-- <div class="col-12"> -->
    <!-- <div class="card card-default m-b-20">
            <div class="card-body">
                <h4 class="main-color">事業者検索</h4>
                <div class="row">
                    <div class="col-md-10">
                        <input type="text" class="form-control" placeholder="検索">
                    </div>
                    <div class="col-md-2 text-right">
                        <button class="btn secondary-bg-color all-btn white" style="width:100%;"><i class="fas fa-search"></i> 検索</button>
                    </div>
                </div>
        </div>

        </div>
    </div>-->

    <!-- <div class="col-12 m-b-10" v-if="this.customers.length !== 0">
      <router-link to="/createcustomer" class="float-right main-bg-color create-btn all-btn">
        <i class="fas fa-plus-circle"></i> 新しい事業者を作成
      </router-link>
    </div> -->

    <div class="col-md-12 col-md-12 tab-content tab-content1 tabs pad-free border-style">
      <div class="col-md-12 scrolldiv p-0">
        <div class="scrolldiv col-12">
          <div v-if="!this.customers.length" class="card card-default card-wrap">
            <p class="record-ico">
              <i class="fa fa-exclamation"></i>
            </p>
            <p>OOPS!!</p>
            <p class="record-txt01">表示するデータありません</p>
            <p>表示するデータありません‼新しいデータを作成してください。</p>
          </div>
          <div v-else class="container-fuid">
            <h4 class="main-color m-b-10">事業者検索</h4>
            <div class="row">
              <div class="col-md-12">
                <input
                  type="text"
                  class="form-control"
                  placeholder="事業者検索"
                  id="search-word"
                  @keyup="searchCustomer()"
                />
              </div>
            </div>
            <hr />
            <h5 class="header">事業者一覧</h5>
            <div v-for="customer in customers" :key="customer.id" class="card card-default m-b-20">
          
              <div class="card-body news-post">
                <div class="row">
                  <div class="col-md-2">
                    <!-- <img src="/images/hospitalpage.jpg" alt="" class="img-fluid"> -->
                    <!-- <img :src="(customer.logo)" class="col-md-12 " alt=" " style="height:150px;" > -->
                    <img :src="'/upload/hospital_profile/'+ customer.logo" class="img-fluid" alt="cust" v-if="customer.type_id == 2"  @error="imgUrlAlt"/>
                    <img :src="'/upload/nursing_profile/'+ customer.logo" class="img-fluid" alt="cust" v-if="customer.type_id != 2" @error="imgUrlAlt" />
                  </div>
                  <div class="row col-md-10">
                    <div class="col-md-2 max-width13">
                      <strong>名前:</strong>
                    </div>
                    <div class="col-md-10">{{customer.name}}</div>
                    <div class="col-md-2 max-width13">
                      <strong>メールアドレス:</strong>
                    </div>
                    <div class="col-md-10">{{customer.email}}</div>
                    <!-- <div class="col-md-2 max-width13"><strong>Logo:</strong></div><div class="col-md-10">{{customer.logo}}</div> -->
                    <div class="col-md-2 max-width13">
                      <strong>電話番号:</strong>
                    </div>
                    <div class="col-md-10">{{customer.phone}}</div>
                    <div class="col-md-2 max-width13">
                      <strong>住所:</strong>
                    </div>
                    <div class="col-md-10">{{customer.address}}</div>
                    <div class="row col-12 mt-2">
                      <div class="col-4 col-offset-4 pl-3">
                        <button class="btn delete-borderbtn" @click="deleteCustomer(customer.id)">削除</button>
                        <!-- <router-link :to="{name:'custedit',params:{id:customer.id}}" class="btn main-bg-color all-btn white">Edit</router-link> -->
                        <!-- <button class="btn confirm-borderbtn" v-if="customer.status == 0">確認済</button> -->
                    
                        <button
                          class="btn confirm-borderbtn" :id="'confirm-btn'+customer.id"
                          v-if="customer.status == 0"
                          @click="comfirm(customer.id)"
                        >確認</button>
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
      customers: []
    };
  },
  created() {
    this.axios.get("/api/customers").then(response => {
      this.customers = response.data;
    });    
  },
  methods: {
    deleteCustomer(id) {
      this.$swal({
        title: "確認",
        text: "削除よろしいでしょうか。",
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
        this.axios.delete(`/api/customer/delete/${id}`).then(response => {
          //flash("Delete Success", "success");
          let a = this.customers.map(item => item.id).indexOf(id);
          this.customers.splice(a, 1);
        });
      });
    },
    comfirm(id) {
      this.$loading(true);
      this.axios.get(`/api/confirm/${id}`).then(response => {
        console.log(response);
          this.$swal({
              title: "確認済",
              text: "メールを送信しました",
              type: "success",
              width: 350,
              height: 200,
              confirmButtonText: "はい",
              confirmButtonColor: "#dc3545"
            });
          this.$loading(false);
          $('#confirm-btn'+id).css('display','none');
      });
    },

    searchCustomer() {
      var search_word = $("#search-word").val();
      let fd = new FormData();
      fd.append("search_word", search_word);
      this.axios.post("/api/customer/search", fd).then(response => {
        this.customers = response.data;
      });
    },
    imgUrlAlt(event) {
                event.target.src = "images/noimage.jpg"
            }
  }
};
</script>
