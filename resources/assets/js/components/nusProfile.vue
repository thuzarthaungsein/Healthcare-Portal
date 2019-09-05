<template>
<div class="card profile" style="border:none;">
        <div class="card-header"><h4 class="col-md-12">マイページ</h4></div>
        <div class="card-body scrolldiv2">
                <div class="form-group">
                        <!-- <label>Type<span class="error">*</span></label> -->
                        <label for="hospital" class="typelabel" id="hospital-lbl">
                                <input type="radio" v-model="type"  value="hospital" v-on:change ="changeType()" name="type" id="hospital"> Create
                        </label>
                        <label for="nursing" class="typelabel dim-btn" id="nursing-lbl">
                                <input type="radio" v-model="type" value="nursing" v-on:change ="changeType()" name="type" id="nursing"> View
                        </label>
                </div>
                
                <form class="col-md-12">                         

                        <div class="col-md-12 pad-free" v-if="type == 'hospital'">
                             <nursingProfile></nursingProfile>
                        </div>

                        <div class="col-md-12 pad-free" v-if="type == 'nursing'">
                             <!-- <profilePublish></profilePublish> -->
                             Profile Page View
                        </div>                
                        
                </form>
        </div>
</div>
</template>

<script>
$(document).ready(function(){
        $('#feature').summernote({
        placeholder: 'Write Feature',
        height: 200,
        });
});

import hospitalProfile from './HospitalProfile.vue'
import nursingProfile from './NursingProfile.vue'
import profilePublish from './ProfilePublish.vue'
export default {
        components: {
              hospitalProfile,
              nursingProfile,
              profilePublish,
        },
       data() {
                return {
                        type: 'hospital',
                }
        },
        created(){
              this.axios
                .get('http://localhost:8000/api/authget')
                .then(response=>{
                //  console.log(response);
                // this.fac_list = response.data;
                });
        },
        methods: {
                changeType() {
                        if(this.type == 'nursing') {
                                document.getElementById("hospital-lbl").classList.add("dim-btn");
                                document.getElementById("nursing-lbl").classList.remove("dim-btn");
                        }
                        else{
                               document.getElementById("nursing-lbl").classList.add("dim-btn"); 
                               document.getElementById("hospital-lbl").classList.remove("dim-btn");
                        }
                },
                callLocal(){
                        console.log(typeof(localStorage.getItem("hospital_history")));
                        console.log(localStorage.getItem("hospital_history"));
                },
                
        }
}

</script>
