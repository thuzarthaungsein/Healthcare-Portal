<template>
<div class="card profile">
        <div class="card-header"><h4 class="col-md-12"><a href="#!" class="onepage"> マイページ</a></h4>
                 <div class="form-group">
                        <!-- <label>Type<span class="error">*</span></label> -->
                        <label for="hospital" class="typelabel " id="hospital-lbl">
                                <input type="radio" v-model="type"  value="hospital" onChange ="changeType()" name="type" id="hospital"> Create
                        </label>
                        <label for="nursing" class="typelabel dim-btn" id="nursing-lbl">
                                <input type="radio" v-model="type" value="nursing" onChange ="changeType()" name="type" id="nursing"> View
                        </label>
                </div>
                </div>
        <div class="card-body scrolldiv2">
               
                
                <form class="col-md-12">                         

                        <div class="col-md-12 pad-free" v-if="type == 'hospital'">
                             <nursingProfile></nursingProfile>
                        </div>
                        

                        <div class="col-md-12 pad-free" v-if="type == 'nursing'">
                                <ProfilePublish></ProfilePublish>
                        </div>
                              <!-- <div class="col-md-12 pad-free" v-if="type == 'hospital'"> -->
                             <!-- <ProfilePublish></ProfilePublish> -->
                        
                             <!-- <span @click = "callLocal()"></span> -->
                        <!-- </div>                 -->
                        
                </form>
        </div>
</div>
</template>

<script>
import hospitalProfile from './HospitalProfile.vue'
import nursingProfile from './NursingProfile.vue'
import ProfilePublish from './ProfilePublish.vue'

export default {
        components: {
              hospitalProfile,
              nursingProfile,
              ProfilePublish,

        },
       data() {
                return {
                         type: 'hospital',
                         type: 'nursing',      
                }
        },
        created(){
                this.scrollSection();
        //       this.axios
        //         .get('http://localhost:8000/api/authget')
        //         .then(response=>{
        //         //  console.log(response);
        //         // this.fac_list = response.data;
        //         });
        },
        methods: {
                // changeType() {
                //         if(this.type == 'nursing') {
                //                 document.getElementById("hospital-lbl").classList.add("dim-btn");
                //                 document.getElementById("nursing-lbl").classList.remove("dim-btn");
                //                 this.scrollSection();
                //         }
                //         else{
                //                document.getElementById("nursing-lbl").classList.add("dim-btn"); 
                //                document.getElementById("hospital-lbl").classList.remove("dim-btn");
                //                this.scrollSection();
                //         }
                // },
                // callLocal(){
                //         console.log(typeof(localStorage.getItem("hospital_history")));
                //         console.log(localStorage.getItem("hospital_history"));
                // },
                // scrollSection() {
                //         if($('.detal_wrap').length){
   
                //                 $(".a_sp a[href^='#']").click(function () { 
                                
                //                 var speed = 600;
                //                 var href = $(this).attr("href");
                //                 var target = $(href === "#" || href === "" ? 'html' : href);
                //                 var position = target.offset().top;
                //                 $("html, body, .scrolldiv2").animate({scrollTop: position - 60}, speed, "swing" );
                //                 //return false;
                //                 });
                //         }
                // }
                
        }
}




</script>
