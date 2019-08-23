<template>
    
        <div class="row justify-content-md-center">
            <div class="col-md container cont-pad">
                <div class="row m-b-20">
                    <div class="col-md-12 scroll2">
                        <h4 class="h_4">{{job_details.title}}</h4>
                        <img src="/images/img1.jpg" class="img-responsive img_6" height="" width="15%">
                        <div class="col-md-12">
                             <div class="topic b"> 
                                 <h4 class="item text-center">仕事内容</h4> 
                                <!-- <dd  class="data"> -->
                                    <p class="data" style="width:50%">{{job_details.description}}</p>
                                <!-- </dd> -->
                             </div> 
                             <div class="topic b"> 
                                 <h4 class="item text-center">経験・スキル</h4> 
                                <!-- <dd  class="data"> -->
                                    <p class="data" style="width:50%">{{job_details.skills}}</p>
                                <!-- </dd> -->
                             </div>
                             <div class="topic b"> 
                                 <h4 class="item text-center">勤務地</h4> 
                                <!-- <dd  class="data"> -->
                                    <p class="data" style="width:50%">{{job_details.location}}</p>
                                <!-- </dd> -->
                             </div>
                             <div class="topic b"> 
                                 <h4 class="item text-center">最寄り駅</h4> 
                                <!-- <dd  class="data"> -->
                                    <p class="data" style="width:50%">{{job_details.nearest_station}}</p>
                                <!-- </dd> -->
                             </div>
                             <div class="topic b"> 
                                 <h4 class="item text-center">雇用形態</h4> 
                                <!-- <dd  class="data"> -->
                                    <p class="data" style="width:50%">{{job_details.employment_status}}</p>
                                <!-- </dd> -->
                             </div>
                             <div class="topic b"> 
                                 <h4 class="item text-center">給与</h4> 
                                <!-- <dd  class="data"> -->
                                    <p class="data" style="width:50%">{{job_details.salary}}</p>
                                <!-- </dd> -->
                             </div>
                             <div class="topic b"> 
                                 <h4 class="item text-center">諸手当</h4> 
                                <!-- <dd  class="data"> -->
                                    <p class="data" style="width:50%">{{job_details.allowances}}</p>
                                <!-- </dd> -->
                             </div>
                             <div class="topic b"> 
                                 <h4 class="item text-center">各種保険</h4> 
                                <!-- <dd  class="data"> -->
                                    <p class="data" style="width:50%">{{job_details.insurance}}</p>
                                <!-- </dd> -->
                             </div>
                             <div class="topic b"> 
                                 <h4 class="item text-center">就業時間</h4> 
                                <!-- <dd  class="data"> -->
                                    <p class="data" style="width:50%">{{job_details.working_hours}}</p>
                                <!-- </dd> -->
                             </div>
                             <div class="topic b"> 
                                 <h4 class="item text-center">休日休暇</h4> 
                                <!-- <dd  class="data"> -->
                                    <p class="data" style="width:50%">{{job_details.holidays}}</p>
                                <!-- </dd> -->
                             </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 text-center">
                        <!-- <button type="button" class="btn btn-warning btn-width white">戻る</button> -->
                        <a href="#" class="btn main-bg-color white all-btn"><router-link to="/jobapply">この案件に応募</router-link></a>
                    </div>
                </div>
            </div>
        </div>
    
</template>

<script>
    export default {
       
        data() {
            return {
                job_details:[]
            }
        },
        created(){
            this.axios
                 .get(`http://localhost:8000/api/job_details/${this.$route.params.id}`)
                 .then(response=>{
                     console.log(response.data);
                     this.job_details = response.data;
                 });
        }

    }
</script>
