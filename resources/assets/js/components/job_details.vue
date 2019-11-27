<template>
  <div class="tab-content job-detail">
    <div class="col-md-12 pad-free m-b-20">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="/" class="router-link-active">ホーム</a></li>
          <li aria-current="page" class="breadcrumb-item active">仕事詳細</li>
        </ol>
      </nav>
    </div>
    <div class="row m-0" v-for="jobDetail in job_details" :key="jobDetail.id">
      <div class="col-12">
        <h4 class="job-title-color">{{jobDetail.title}} <label class="job_id" style="color:#000;">仕事番号: {{jobDetail.jobid}}</label></h4> 
        
      </div>
      <div class="col-sm-10 offset-1">
        <!-- <img src="/images/img1.jpg" class="img-responsive" style="width:150px;"> -->
        
        <div class="form-wrap mt-3 mb-3">
          <div class="form-group m-0 row bd">
            <div class="col-md-2 col-sm-12 form-left">
              <label><span class="job_ico"><i class="fa fa-file"></i></span>仕事内容</label>
            </div>
            <div class="col-md-10 col-sm-12 form-right">{{jobDetail.description}}</div>
          </div>
          <div class="form-group m-0 row bd">
            <div class="col-md-2 col-sm-12 form-left">
              <label><span class="job_ico"><i class="fa fa-star"></i></span>経験・スキル</label>
            </div>
            <div class="col-md-10 col-sm-12 form-right">{{jobDetail.skills}}</div>
          </div>
          <div class="form-group m-0 row bd">
            <div class="col-md-2 col-sm-12 form-left">
              <label><span class="job_ico"><i class="fa fa-map-marker-alt"></i></span>勤務地</label>
            </div>
            <div class="col-md-10 col-sm-12 form-right">{{jobDetail.location}}</div>
          </div>
          
          <div class="form-group m-0 row bd">
            <div class="col-md-2 col-sm-12 form-left">
              <label><span class="job_ico"><i class="fa fa-map-signs"></i></span>最寄り駅</label>
            </div>
            <div class="col-md-10 col-sm-12 form-right">{{jobDetail.nearest_station}}</div>
          </div>
          <div class="form-group m-0 row bd">
            <div class="col-md-2 col-sm-12 form-left">
              <label><span class="job_ico">類</span>雇用形態</label>
            </div>
            <div class="col-md-10 col-sm-12 form-right"><p class="job_status">{{jobDetail.employment_status}} </p></div>
          </div>
          <div class="form-group m-0 row bd">
            <div class="col-md-2 col-sm-12 form-left">
              <label><span class="job_ico">&#xa5;</span>給料</label>
            </div>
            <div class="col-md-10 col-sm-12 form-right"> {{jobDetail.salary_type}} : {{(Number(jobDetail.salary)).toLocaleString()}} 円  <span v-if="jobDetail.salary_remark"> ( {{ jobDetail.salary_remark }} ) </span></div>
          </div>
          <div class="form-group m-0 row bd">
            <div class="col-md-2 col-sm-12 form-left">
              <label><span class="job_ico"><i class="fa fa-briefcase"></i></span>特別な条件</label>
            </div>
            <div class="col-md-10 col-sm-12 form-right">{{jobDetail.allowances}}</div>
          </div>
          <div class="form-group m-0 row bd">
            <div class="col-md-2 col-sm-12 form-left">
              <label><span class="job_ico"><i class="fa fa-id-card"></i></span>各種保険</label>
            </div>
            <div class="col-md-10 col-sm-12 form-right">{{jobDetail.insurance}}</div>
          </div>
          <div class="form-group m-0 row bd">
            <div class="col-md-2 col-sm-12 form-left">
              <label><span class="job_ico"><i class="fa fa-clock"></i></span>就業時間</label>
            </div>
            <div class="col-md-10 col-sm-12 form-right">{{jobDetail.working_hours}}</div>
          </div>
          <div class="form-group m-0 row bd-all">
            <div class="col-md-2 col-sm-12 form-left">
              <label><span class="job_ico">休</span>休日休暇</label>
            </div>
            <div class="col-md-10 col-sm-12 form-right">{{jobDetail.holidays}}</div>
          </div>
          <!-- <h4 style="padding:3px;"></h4> -->
          <div class="row mt-4">
            <div class="col-md-12 text-center">
              <!-- <button type="button" class="btn btn-warning btn-width white">戻る</button> -->
              <!-- <span class="btn main-bg-color white all-btn" @click="jobApply()">確認画面へ進む</span> -->
              <router-link :to="{name: 'jobapply', params: { job_id: job_id }}" 
              class="btn white all-btn width17" style="background-color:#828282;">この案件に応募する</router-link>
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
      job_details: [],
      job_id: ""
    };
  },
  created() {
    this.axios
      .get(`/api/job_details/${this.$route.params.id}`)
      .then(response => {
        console.log(response.data);
        this.job_details = response.data;
      });
    this.job_id = this.$route.params.id;
  },
};
</script>
