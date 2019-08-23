<template>
<div class="col-md-12">
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
        <!-- <h5>Skills</h5> -->

         <!-- <div class="form-group">
            <input type="checkbox" name="skill1" v-model="JobApply.skill">Communication<br/>
            <input type="checkbox" name="skill2" v-model="JobApply.skill">Ethics<br/>
            <input type="checkbox" name="skill3" v-model="JobApply.skill">Critical Thinking<br/>
            <input type="checkbox" name="skill4" v-model="JobApply.skill">Attention To Detail<br/>
            <input type="checkbox" name="skill4" v-model="JobApply.skill">Commitment To Development<br/>
            <input type="checkbox" name="skill4" v-model="JobApply.skill">Responsibility
         </div> -->
           <!-- <div class="input-group mb-3">
            <div class="input-group-prepend">
                 <span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
            </div>
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="inputGroupFile01">
                <label class="custom-file-label" for="inputGroupFile01">No file chosen</label>
            </div>
        </div> -->
        <!-- <div class="from-group">
            <input type="file" class="" v-on:change="onImageChange">
        </div> <br/> -->
        <div class="control">
            <label class="checkbox">
                <input type="checkbox" v-model="jobApply.skill" value="promises">Communication </label><br/>
            <label class="checkbox">
                <input type="checkbox" v-model="jobApply.skill" value="testing">Ethics</label><br/>
            <label class="checkbox">
                <input type="checkbox" v-model="jobApply.skill" value="testing">Critical Thinking</label>
         </div>

            <button type="submit" class="btn main-bg-color white all-btn">Apply</button>

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
                        skill:false
                    },
            }
    },
    methods: {
            apply() {
                axios.post('http://localhost:8000/api/jobapply', this.jobApply)
                    .then((response) => {
                    alert('Successful Apply')
                    console.log(response);
                     //console.log(this.skill.toString());
                    this.jobApply = response.data;
                    })
            }

        }
}
</script>
