<template>
<div class="col-md-12 scrolldiv">
    <h4 class="h_4 text-center header">Job Apply Form</h4>
    <div class="col-md-7 offset-md-3">
        <form @submit.prevent="apply">
        <div class="form-group">
            <input type="text" class="form-control box" id="name" placeholder="name" v-model="jobApply.name"  >
            <div v-if="errors && errors.name" class="text-danger">{{ errors.name[0] }}</div>
        </div>
        <div class="form-group">
            <input type="text" class="form-control box" id="birth" placeholder="birthday" v-model="jobApply.birthday" >
            <div v-if="errors && errors.birthday" class="text-danger">{{ errors.birthday[0] }}</div>
        </div>
        <div class="form-group">
            <input type="text" id="address"  class="form-control box" placeholder="address" v-model="jobApply.address">
             <div v-if="errors && errors.address" class="text-danger">{{ errors.address[0] }}</div>
        </div>
        <div class="form-group">
            <input type="tel" class="form-control box" id="phone" placeholder="phone"  v-model="jobApply.phone">
             <div v-if="errors && errors.phone" class="text-danger">{{ errors.phone[0] }}</div>
        </div>
        <div class="form-group">
            <input type="email" class="form-control box" id="email" placeholder="email"  v-model="jobApply.email">
             <div v-if="errors && errors.email" class="text-danger">{{ errors.email[0] }}</div>
        </div>
         <div class="form-group">
            <label>Work Time</label>
            <input type="time" class="form-control box" id="time"  v-model="jobApply.work_time">
            <!-- <div v-if="errors && errors.work_time" class="text-danger">{{ errors.work_time[0] }}</div> -->
        </div>
        <div class="row">
            <div class="col-md-12" style=" columns: 2;-webkit-columns: 2;-moz-columns: 2;">
                    <div class="form-group" v-for="job in Job.fields" :key="job.id">

                        <label><input type="checkbox"   @click="getcheckbox(job)"> {{job}}</label>
                    </div>
            </div>
        </div>

        <div class="text-center">
            <button type="submit" class="btn main-bg-color white all-btn ">Apply</button>
        </div>
             <!-- <div v-if="success" class="alert alert-success mt-3">Apply sent!</div> -->

            <!-- <router-link to="" class="btn main-bg-color white all-btn">Apply</router-link> -->
    </form>
    </div>
</div>
</template>
<script>
export default {
    data() {
            return {
                errors: [],

                jobApply: {
                        name: '',
                        birthday:'',
                        address: '',
                        phone:'',
                        email:'',
                        work_time:'',
                        skills:[]
                    },
                    Job:{
                        fields:[{
                            skills:[]
                        }],
                    }



            }
    },
     created(){
        this.axios
                .get('/api/getskill')
                .then(response => {
                 this.Job.fields = response.data;

                });

    },
    methods: {
            apply() {
                this.axios.post('/api/jobapply',this.jobApply)
                    .then((response) => {
                    alert('Successful Apply')
                    this.jobApply = response.data;

                    }).catch(error=>{

                    if(error.response.status == 422){

                        this.errors = error.response.data.errors

                    }
                })
            },
            getcheckbox(job)
            {
               this.jobApply.skills.push(job);

            },
        }
}
</script>
