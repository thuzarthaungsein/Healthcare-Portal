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
            <i class="fas fa-plus-circle"></i> 新しい投稿を作成
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
              <i class="fas fa-plus-circle"></i> 新しい投稿を作成
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
                  </div>
                  <!-- <div class="col-6 row align-items-baseline">
                    <div class="col-md-3">
                      <label for="selectBox col-form-label">カテゴリー</label>
                    </div>
                    <div class="col-md-9">
                      <select class="form-control" id="selectBox" @change="searchbyCategory()">
                        <option selected="selected" value>全て</option>
                        <option
                          v-for="category in categories"
                          :key="category.id"
                          v-bind:value="category.id"
                        >{{category.name}}</option>
                      </select>
                    </div>
                  </div>-->
                </div>
              </div>
            </div>
            <hr />
            <h5 class="header">求人採用一覧</h5>
            <table class="table table-hover custom-table">
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
                  <th>{{job.title}}</th>
                  <th>{{job.description}}</th>
                  <th>{{job.employment_status}}</th>
                  <th class="text-right">
                    <!-- <button class="btn btn-sm btn-primary all-btn" v-if="getUser.status == 1">Approved</button> -->
                    <small>
                      <router-link
                        :to="{name: 'joboffercreate', params:{id:job.id}}"
                        class="btn edit-borderbtn"
                      >編集</router-link>
                    </small>
                    <small>
                      <a class="btn text-danger delete-borderbtn" @click="deleteJob(job.id)">削除</a>
                    </small>
                  </th>
                </tr>
              </tbody>
            </table>
            <!-- <div class="card card-default m-b-20" v-for="job in jobs" :key="job.id">
              <div class="card-body">
                <div class="row">
                  <div class="col-md-9 m-t-8">
                    <label>
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
                    </small>
                  </div>
                </div>
              </div>
            </div>-->
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
      jobs: []
    };
  },
  created() {

    this.axios.get("/api/job/index").then(response => {
      console.log(response);
      this.jobs = response.data.jobs;
    });
    this.axios.get("/api/user").then(response => {
      //     console.log(response.data.id)
    });
  },
  methods: {
    deleteJob(id) {
      if (confirm("Are you sure you want to delete?")) {
        this.axios.delete(`/api/job/delete/${id}`).then(response => {
          alert("Delete Successfully!");
          let i = this.jobs.map(item => item.id).indexOf(id); // find index of your object
          this.jobs.splice(i, 1);
        });
      }
    },
    searchJobOffer() {
      var search_word = $("#search-item").val();
       let fd = new FormData();
      fd.append("search_word", search_word);
      this.axios.post("/api/job/search", fd).then(response => {
        this.jobs = response.data;
      });
    }
  }
};
</script>
