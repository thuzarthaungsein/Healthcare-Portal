<template>
    <div class="row">
        <div class="col-12">
            <div class="row m-b-10" v-if="this.jobs.length !== 0">
                <div class="col-md-12">
                    <router-link to="/joboffercreate" class="float-right main-bg-color create-btn all-btn" style="color: blue;">
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
                                        <input type="text" class="form-control" placeholder="検索" id="search-item" @keyup="searchJobOffer()" />
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
                        <div class="card card-default m-b-20" v-for="job in displayItems" :key="job.id">
                            <div class="card-body joboffer-body">
                                <div class="row">
                                    <div class="col-md-12 m-t-8">
                                        <div class="joboffer-header">
                                            <h5 class="joboffer-tit clearfix">
                            <router-link :to="{name: 'job_details', params:{id:job.id,loginuser:loginuser}}">{{job.title}} </router-link>
                            <!-- <span class="job_id">jobapplylistcount{{job.count}}</span> -->
                            <span class="text-orange"><span class="job_count">{{job.count}}件</span></span>
                            <label class="switch">
                                <input type="checkbox">
                                <span class="slider round"></span>
                            </label>

                            <span class="job_id">求人番号：{{job.jobid}}</span>
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
                                                <li><a class="btn text-success active-borderbtn">Disabled</a></li>
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
                        <div class="offset-md-4 col-md-8 mt-3" v-if="pagination">
                            <nav aria-label="Page navigation example">
                                <ul class="pagination">
                                    <li class="page-item">
                                        <span class="spanclass" @click="first"><i class='fas fa-angle-double-left'></i> 最初</span>
                                    </li>
                                    <li class="page-item">
                                        <span class="spanclass" @click="prev"><i class='fas fa-angle-left'></i> 前へ</span>
                                    </li>
                                    <li class="page-item" v-for="(i,index) in displayPageRange" :key="index" :class="{active_page: i-1 === currentPage}">
                                        <span class="spanclass" @click="pageSelect(i)">{{i}}</span>
                                    </li>
                                    <li class="page-item">
                                        <span class="spanclass" @click="next">次へ <i class='fas fa-angle-right'></i></span>
                                    </li>
                                    <li class="page-item">
                                        <span class="spanclass" @click="last">最後 <i class='fas fa-angle-double-right'></i></span>
                                    </li>
                                </ul>
                            </nav>
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
                    count: "",
                    job_id: [],
                    currentPage: 0,
                    size: 10,
                    pageRange: 5,
                    items: [],
                    pagination: false,
                    loginuser: true
                };
            },
            
            created() {
                this.axios.get("/api/job/index").then(response => {
                    console.log(response.data);
                    this.jobs = response.data.profilejob;
                    this.customer_id = response.data.user;
                    if (this.jobs.length > this.size) {
                    this.pagination = true;
                    } else {
                        this.pagination = false;
                    }

                });

                this.axios.get('/api/user').then(response => {
                this.pro_id = response.data.lat_lng[0].id;
                this.loginuser = true;
                }).catch((error) => {
                    this.loginuser = false;
                })

                // this.countJobapplylist(this.job_id);
            },
            computed: {
            pages() {
                    return Math.ceil(this.jobs.length / this.size);
                },
                displayPageRange() {
                    const half = Math.ceil(this.pageRange / 2);
                    const isEven = this.pageRange / 2 == 0;
                    const offset = isEven ? 1 : 2;
                    let start, end;
                    if (this.pages < this.pageRange) {
                        start = 1;
                        end = this.pages;
                    } else if (this.currentPage < half) {
                        start = 1;
                        end = start + this.pageRange - 1;
                    } else if (this.pages - half < this.currentPage) {
                        end = this.pages;
                        start = end - this.pageRange + 1;
                    } else {
                        start = this.currentPage - half + offset;
                        end = this.currentPage + half;
                    }
                    let indexes = [];
                    for (let i = start; i <= end; i++) {
                        indexes.push(i);
                    }
                    return indexes;
                },
                displayItems() {
                    const head = this.currentPage * this.size;
                    return this.jobs.slice(head, head + this.size);
                },
                isSelected(page) {
                    return page - 1 == this.currentPage;
                }
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
                                        title: "削除済",
                                        text: "仕事を削除されました。",
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
                            if (this.jobs.length > this.size) {
                            this.pagination = true;
                            } else {
                                this.pagination = false;
                            }
                        });
                    },
                first() {
                    this.currentPage = 0;
                },
                last() {
                    this.currentPage = this.pages - 1;
                },
                prev() {
                    if (0 < this.currentPage) {
                        this.currentPage--;
                    }
                },
                next() {
                    if (this.currentPage < this.pages - 1) {
                        this.currentPage++;
                    }
                },
                pageSelect(index) {
                    this.currentPage = index - 1;
                },
            }
    };
</script>
<style>
.switch {
  position: relative;
  display: inline-block;
  width: 47px;
  height: 26px;
}

/* Hide default HTML checkbox */
.switch input {
  opacity: 0;
  width: 0;
  height: 0;
}

/* The slider */
.slider {
  position: absolute;
  cursor: pointer;
  top: 0;
  left: 0;
  right: 0;
  bottom: 0;
  background-color: #0cc72c;
  -webkit-transition: .4s;
  transition: .4s;
}

.slider:before {
  position: absolute;
  content: "";
  height: 20px;
  width: 20px;
  left: 3px;
  bottom: 3px;
  background-color: white;
  -webkit-transition: .4s;
  transition: .4s;
}

input:checked + .slider {
  background-color: #ccc;
}

input:focus + .slider {
  box-shadow: 0 0 1px #ccc;
}

input:checked + .slider:before {
  -webkit-transform: translateX(20px);
  -ms-transform: translateX(20px);
  transform: translateX(20px);
}

/* Rounded sliders */
.slider.round {
  border-radius: 30px;
}

.slider.round:before {
  border-radius: 50%;
}
</style>