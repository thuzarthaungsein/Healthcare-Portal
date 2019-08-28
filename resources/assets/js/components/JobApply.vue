<template>
<div class="col-md-12 scrolldiv">
    <h4 class="h_4 text-center">Job Apply Form</h4>
    <div class="col-md-7 offset-md-3">
        <form @submit.prevent="apply">
        <div class="form-group">
            <input type="text" class="form-control box" id="name" placeholder="name" v-model="jobApply.name" >
            <!-- <div v-if="errors && errors.name" class="text-danger">{{ errors.name[0] }}</div> -->
        </div>
        <div class="form-group">
            <input type="text" class="form-control box" id="birth" placeholder="birthday" v-model="jobApply.birthday" >
            <!-- <div v-if="errors && errors.birthday" class="text-danger">{{ errors.birthday[0] }}</div> -->
        </div>
        <div class="form-group">
            <input type="text" id="address"  class="form-control box" placeholder="address" v-model="jobApply.address">
            <!-- <div v-if="errors && errors.address" class="text-danger">{{ errors.address[0] }}</div> -->
        </div>
        <div class="form-group">
            <input type="tel" class="form-control box" id="phone" placeholder="phone"  v-model="jobApply.phone">
            <!-- <div v-if="errors && errors.phone" class="text-danger">{{ errors.phone[0] }}</div> -->
        </div>
        <div class="form-group">
            <input type="email" class="form-control box" id="email" placeholder="email"  v-model="jobApply.email">
            <!-- <div v-if="errors && errors.email" class="text-danger">{{ errors.email[0] }}</div> -->
        </div>
         <div class="form-group">
            <label>Work Time</label>
            <input type="time" class="form-control box" id="time"  v-model="jobApply.work_time">
            <!-- <div v-if="errors && errors.work_time" class="text-danger">{{ errors.work_time[0] }}</div> -->
        </div>
        <div class="row">
            <div class="col-md-12" style=" columns: 2;-webkit-columns: 2;-moz-columns: 2;">
                    <div class="form-group" v-for="job in jobApply.fields" :key="job.id">
                        <label><input type="checkbox" v-bind:value="{ id: job.skills }"  v-model="job.skills" > {{job}} </label>
        </div>
            </div>
        </div>

          <!-- <div class="">
            <div  class="card card-default m-b-20">
                <div class="col-md-6">
                    <div v-for="job in jobs" :key="job.skills">
                        <label> {{job.skills}}</label> -->
                        <!-- <label><input type="checkbox" v-model="job.skills" ></label> -->
<!--
                    </div>

                </div>

            </div>
        </div> -->


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
                        fields:[{
                            skills:[],
                            id:''
                        }],
                    },


            }
    },
     created(){
        this.axios
                .get('http://localhost:8000/api/getskill')
                .then(response => {
                 this.jobApply.fields = response.data;

                });

    },
    methods: {
            apply() {

                this.axios.post('http://localhost:8000/api/jobapply', this.jobApply)
                    .then((response) => {
                    alert('Successful Apply')
                    console.log(response);
                    //console.log(this.jobApply.toString());
                    this.jobApply = response.data;
                    })
            }

        }
}
</script>
