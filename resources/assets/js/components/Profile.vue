<template>
<div class="card profile">
        <div class="card-header"><h4 class="col-md-12">マイページ</h4></div>
        <div class="card-body scrolldiv2">
                <div class="form-group">
                        <!-- <label>Type<span class="error">*</span></label> -->
                        <label for="hospital" class="typelabel" id="hospital-lbl">
                                <input type="radio" v-model="type"  value="hospital" v-on:change ="changeType()" name="type" id="hospital"> 病院
                        </label>
                        <label for="nursing" class="typelabel dim-btn" id="nursing-lbl">
                                <input type="radio" v-model="type" value="nursing" v-on:change ="changeType()" name="type" id="nursing"> 介護
                        </label>
                </div>
                
                <form class="col-md-12">                         

                        <div class="col-md-12 pad-free" v-if="type == 'hospital'">
                             <hospitalProfile></hospitalProfile>
                        </div>

                        <div class="col-md-12 pad-free" v-if="type == 'nursing'">
                             <nursingProfile></nursingProfile>
                        </div>                
                        
                </form>
        </div>
</div>
</template>

<script>
import hospitalProfile from './HospitalProfile.vue'
import nursingProfile from './NursingProfile.vue'
export default {
        components: {
              hospitalProfile,
              nursingProfile,
        },
       data() {
                return {
                        type: 'hospital',
                }
        },
        created(){
              
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
                }
        }
}

</script>
