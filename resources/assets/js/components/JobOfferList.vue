<template>
  <div class="row">
    <div class="col-12">
      <div class="row m-b-10" v-if="this.jobs.length !== 0">
        <!-- <div class="col-md-12">
          <router-link
            to="/joboffercreate"
            class="float-right main-bg-color create-btn all-btn"
            style="color: blue;"
          >
            <i class="fas fa-plus-circle"></i> 新しい投稿を作成
          </router-link>
        </div> -->
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
        <div class="scroll col-12">
          <div v-if="!this.jobs.length" class="card card-default m-b-20 card-wrap">
            <p class="record-ico">
              <i class="fa fa-exclamation"></i>
            </p>
            <p>OOPS!!</p>
            <!-- <p style="font-size:30px;color:#69C1A8;font-weight:bold;margin:20px 0;">
            <span style="font-size:50px;">NO</span>
            <span style="color:#769BD0;">RECORD</span> DATA
            </p>-->
            <p class="record-txt01">表示するデータありません</p>
            <p>表示するデータありません‼新しいデータを作成してください。</p>
            <a href="/joboffercreate" class="main-bg-color create-btn all-btn">
              <i class="fas fa-plus-circle"></i> 新しい投稿を作成
            </a>
          </div>

          <div v-else class="card card-default m-b-20">
            <h4 class="main-color m-b-10">ニュース検索</h4>
            <div class="row">
              <div class="col-md-12">
                <div class="form-group">
                  <div class="col-6 float-left">
                    <input
                      type="text"
                      class="form-control"
                      placeholder="検索"
                      id="search-item"
                      @keyup="searchbyCategory()"
                    />
                  </div>
                  <div class="col-6 float-right row align-items-baseline">
                    <label for="selectBox col-2 col-form-label">カテゴリー</label>
                    <div class="col-10">
                      <select class="form-control" id="selectBox" @change="searchbyCategory()">
                        <option selected="selected" value>全て</option>
                        <option
                          v-for="category in categories"
                          :key="category.id"
                          v-bind:value="category.id"
                        >{{category.name}}</option>
                      </select>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <hr />
            <h5 class="header">ニュース一覧</h5>
            <div v-for="job in jobs" :key="job.id" class="card card-default m-b-20">
              <div class="card-body news-post">
                <div class="row">
                  <div class="col-sm-4">
                    <router-link
                      :to="{name: 'joboffercreate', params:{id:job.id}}"
                      class="btn main-bg-color white all-btn">編集</router-link>
                    <button class="btn btn-danger all-btn" @click="deleteJob(job.id)">削除</button>
                    <!-- <router-link :to="{name: 'job_details', params:{id:job.id}}" class="btn btn all-btn secondary-bg-color white">Delete</router-link> -->
                    <!-- <a href="../jobs/job_search_details.html"  class="btn btn all-btn secondary-bg-color white">詳細を見る</a> -->
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
      jobs: []
    };
  },
  created() {
    this.axios.get("/api/job/index").then(response => {
      console.log(response.data.jobs);
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
    }
  }
};
</script>