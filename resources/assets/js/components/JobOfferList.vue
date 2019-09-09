<template>
 <div class="row">
      <div class="col-12">
            <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="../index.html">ホーム</a></li>
                            <li class="breadcrumb-item"><a href="../news/news_details.html"> 新しい詳細</a></li>
                            <li class="breadcrumb-item active" aria-current="page">
                                            就職活動リスト</li>

                    </ol>
           

            </nav>
      
        <router-link to= 'joboffercreate' class="nav-link ml-auto pull-right float-right">Create New Job</router-link>
            <div class="scroll col-12">
                      
                    <div v-for="job in jobs" :key="job.id" class="card card-default m-b-20">
                            <div class="card-body news-post">
                            <div class="row">
                                    <!-- <div class="col-md-2">
                                               <img  :src="'images/'+ (job.location)" class="col-md-12" alt="" />
                                    </div> -->
                                    <div class="col-md-10">
                                            <div class="col-sm-8 pad-free mb-2"><b>
                                                    <router-link :to="{name: 'job_details', params:{id:job.id}}" class="mr-auto">{{job.title}}</router-link>
                                                    <!-- <a href="../jobs/job_search_details.html" class="mr-auto">{{job.title}} </a> -->
                                                    </b></div>
                                            <p>{{job.description}}</p>
                                            <p>{{job.working_hours}}</p>
                                            <div class="row">
                                                    <div class="col-sm-4">
                                                            <router-link :to="{name: 'joboffercreate', params:{id:job.id}}" class="btn main-bg-color white all-btn">Edit</router-link>
                                                              <button class="btn btn-danger all-btn"   @click="deleteJob(job.id)" >Delete</button>
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
            }
        },
        created() {
            this.axios
                .get('/api/job/index')
                .then(response => {
                    this.jobs = response.data;
                });
                this.axios
                .get('/api/user')
                .then(response => {
                    console.log(response.data.id)
                });
        },
        methods:{
                   deleteJob(id) {
                if(confirm("Are you sure you want to delete?"))
                {
                     this.axios
                    .delete(`/api/job/delete/${id}`)
                    .then(response => {
                        alert('Delete Successfully!');
                        let i = this.jobs.map(item => item.id).indexOf(id); // find index of your object
                        this.jobs.splice(i, 1)
                    });
                }

            }
        }
}
</script>
