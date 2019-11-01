<template>
  <div class="row">
    <div class="col-12">
      <div class="row m-b-10" v-if="this.jobs.length !== 0">
        <div class="col-md-12">
          <router-link
            to="/joboffercreate"
            class="float-right main-bg-color create-btn all-btn"
            style="color: blue;"
          >
            <i class="fas fa-plus-circle"></i> 新しい求人票を作成
          </router-link>
        </div>
      </div>
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <!-- <li class="breadcrumb-item"><a href="../index.html">ホーム</a></li>
                            <li class="breadcrumb-item"><a href="../news/news_details.html"> 新しい詳細</a></li>
                            <li class="breadcrumb-item active" aria-current="page">
          就職活動リスト</li>-->
        </ol>
      </nav>
      <div class="col-md-12 col-md-12 tab-content tab-content1 tabs pad-free border-style">
        <div class="col-md-12 scrolldiv">
         <div v-if="!this.jobs.length" class="card card-default m-b-20 card-wrap">
            <p class="record-ico">
              <i class="fa fa-exclamation"></i>
            </p>
            <p>OOPS!!</p>
            <p class="record-txt01">表示するデータありません</p>
            <p>表示するデータありません‼新しいデータを作成してください。</p>
            <a href="/joboffercreate" class="main-bg-color create-btn all-btn">
              <i cl ass="fas fa-plus-circle"></i> 新しい求人票を作成
            </a>
          </div>

          <div v-else class="container-fuid">
            <h4 class="main-color m-b-10">求人採用検索</h4>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group row">
                  <div class="col-12">
                    <input
                      type="text"
                      class="form-control"
                      placeholder="検索"
                      id="search-item"
                      @keyup="searchJobOffer()"
                    />
                    <input type="hidden" class="form-contrl" id="customer-id" v-model="customer_id" />
                  </div>
                </div>
              </div>
            </div>
            <hr />
            <h5 class="header">求人採用一覧</h5>
            <!-- <table class="table table-hover custom-table">
              <thead style="background-color:rgb(183, 218, 210);">
                <tr>
                  <th>施設種別</th>
                  <th>仕事内容</th>
                  <th>雇用形態</th>
                 <th></th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="job in jobs" :key="job.id">
                  <th>
                    <p> {{job.title}}</p>
                  </th>
                  <th>
                    <p>{{job.description}}</p>
                  </th>
                  <th>{{job.employment_status}}</th>
                  <th class="text-right">

                    <small>
                      <router-link
                        :to="{name: 'joboffercreate', params:{id:job.id}}"
                        class="btn edit-borderbtn"
                      >編集</router-link>
                    </small>
                    <small>
                      <a class="btn text-danger delete-borderbtn" @click="deleteJob(job.id)">削除</a>
                    </small>
                   <router-link
                        :to="{name: 'jobapplylist', params:{id:job.id}}"
                        class="btn edit-borderbtn">jobapplylist</router-link>

                  </th>
                </tr>
              </tbody>
            </table> -->
            <div class="card card-default m-b-20" v-for="job in jobs" :key="job.id">
              <div class="card-body joboffer-body">
                <div class="row">
                  <div class="col-md-12 m-t-8">
                    <div class="joboffer-header">
                        <h5 class="joboffer-tit clearfix">
                            <router-link :to="{name: 'job_details', params:{id:job.id}}">{{job.title}} </router-link>
                            <!-- <span class="job_id">jobapplylistcount{{job.count}}</span> -->
                            <span class="text-orange"><span class="job_count">{{job.count}}件</span></span>

                            <span class="job_id">求人番号：{{job.job_number}}</span>
                        </h5>
                    </div>

                    <div class="joboffer-body">

                        <p class="mb-2"><span class="text-orange"><span class="job_ico">&#xa5;</span>給料 :</span><span class=""> {{job.salary}}</span></p>
                        <p class="mb-2"><span class="text-orange"><span class="job_ico">★</span> スキル :</span><span class=""> {{job.skills}}</span></p>
                        <ul class="btn-list mt-4">
                            <li>
                                <router-link :to="{name: 'joboffercreate', params:{id:job.id}}" class="btn edit-borderbtn">編集</router-link>
                            </li>
                            <li>
                                <router-link :to="{name: 'jobapplylist', params:{id:job.id}}" class="btn confirm-borderbtn confirmed">求人応募一覧ページへ</router-link>
                            </li>
                            <li><a class="btn text-danger delete-borderbtn" @click="deleteJob(job.id)">削除</a></li>
                        </ul>
                    </div>

                    <!-- <label>
                      <strong>Title :</strong>
                      {{job.title}}
                    </label>
                    <br />
                    <label>
                      <strong>Description :</strong>
                      {{job.description}}
                    </label>
                    <br />
                    <label>
                      <strong>Type :</strong>
                      {{job.employment_status}}
                    </label>
                    <br />
                    <small>
                      <router-link
                        :to="{name: 'joboffercreate', params:{id:job.id}}"
                        class="btn edit-borderbtn"
                      >編集</router-link>
                    </small> &nbsp;
                    <small>
                      <a class="btn text-danger delete-borderbtn" @click="deleteJob(job.id)">削除</a>
                    </small> -->
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
    //  mounted(){

    //     this.count = this.countJobapplylist()

    // },
  data() {
    return {
      jobs: [],
      customer_id: "",
      count:"",
      job_id: []
    };
  },
  created() {
    this.axios.get("/api/job/index").then(response => {
      this.jobs = response.data.profilejob;
      this.customer_id = response.data.user;
      console.log(this.jobs)

    });
    
    // this.countJobapplylist(this.job_id);
  },
  methods: {

    deleteJob(id) {
      this.$swal({
        title: "確認",
        text: "削除よろしいでしょうか",
        type: "warning",
        width: 350,
        height: 200,
        showCancelButton: true,
        reverseButtons: true,
        confirmButtonColor: "#dc3545",
        cancelButtonColor: "#b1abab",
        cancelButtonTextColor: "#000",
        confirmButtonText: "削除",
        cancelButtonText: "キャンセル",
        confirmButtonClass: "all-btn",
        cancelButtonClass: "all-btn"
      }).then(response => {
        this.axios
          .delete(`/api/job/delete/${id}`)
          .then(response => {
            let i = this.jobs.map(item => item.id).indexOf(id); // find index of your object
            this.jobs.splice(i, 1);
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
    searchJobOffer() {
      var search_word = $("#search-item").val();
      var customer_id = $("#customer-id").val();

      let fd = new FormData();
      fd.append("search_word", search_word);
      fd.append("customer_id", customer_id);
      this.axios.post("/api/job/search", fd).then(response => {
        this.jobs = response.data;
      });
    }
  }
};
</script>
