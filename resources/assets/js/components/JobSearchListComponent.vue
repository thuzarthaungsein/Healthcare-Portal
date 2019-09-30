<template>
 <div class="row">
      <div class="col-12">
            <nav aria-label="breadcrumb">
                     <ol class="breadcrumb" v-if="this.profile == profile">
                            <h2> Job Offer </h2>
                     </ol>
                    <ol class="breadcrumb" v-else>
                            <li class="breadcrumb-item"><a href="../index.html">ホーム</a></li>
                            <li class="breadcrumb-item"><a href="../news/news_details.html"> 新しい詳細</a></li>
                            <li class="breadcrumb-item active" aria-current="page">
                                            就職活動リスト</li>   
                    </ol>
            </nav>

            <div class="scroll col-12">
                   
                     <div v-if="!this.jobs.length" class="card card-default m-b-20" style="padding-top:30px; height:700px; text-align:center ">
                           
                          No Record Data 
                          
                    </div>
                    <div v-else v-for="job in jobs" :key="job.id" class="card card-default m-b-20">
                            <div class="card-body news-post">
                            <div class="row">
                                    <div class="col-md-2">
                                               <img  :src="'images/'+ (job.logo)" class="col-md-12" alt="" />
                                    </div>
                                    <div class="col-md-10">
                                            <div class="col-sm-8 pad-free mb-2"><b>
                                                    <router-link :to="{name: 'job_details', params:{id:job.id}}" class="mr-auto">{{job.title}}</router-link>
                                                    <!-- <a href="../jobs/job_search_details.html" class="mr-auto">{{job.title}} </a> -->
                                                    </b></div>
                                            <p>{{job.description}}</p>
                                            <div class="row">
                                                    <div class="col-sm-4">
                                                            <router-link :to="{name: 'job_details', params:{id:job.id}}" class="btn btn all-btn secondary-bg-color white">詳細を見る</router-link>
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
            }
        },
        created() {
               if(this.profile == "profile")
               {
                        this.axios .get('/api/job/index') .then(response => {
                        this.jobs = response.data.profilejob;
                        });
               }
               else{
                        this.axios .get('/api/job/index') .then(response => {
                        this.jobs = response.data.jobs;
                        });
               }
           
        },
        props:{
                profile:String
                
        }
}
</script>
