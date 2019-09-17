<template>

<div class="card profile" style="border:none;">
        <div class="card-header"><h4 class="col-md-12">マイページ</h4></div>
        <div class="card-body">
                
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
        <div class="card-body">
               
                <form class="col-md-12">                         

                        <div class="col-md-12 pad-free" v-if="type == 'hospital'">
                                <nursingProfile></nursingProfile> 
                        </div>
                        

                        <div class="col-md-12 pad-free" v-if="type == 'nursing'">
                            
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
        ready: function(){
                // this.scrollTab();
                var profilePublish = $("#profilePublish");
    stickyDiv = "sticky";
    header = $('.header').height();
   

$('.scrolldiv2').scroll(function() {
  if( $(this).scrollTop() > header ) {
    profilePublish.addClass(stickyDiv);
  } else {
    profilePublish.removeClass(stickyDiv);
  }
});
    
    $(".a_sp a[href^='#']").click(function () { 
    var speed = 600;
    var href = $(this).attr("href");
    var target = $(href === "#" || href === "" ? 'html' : href);
    var position = target.offset().top;
    $("html, body, .scrolldiv2").animate({scrollTop: position - 60}, speed, "swing" );
    
    });
        },
        components: {
              hospitalProfile,
              nursingProfile,
              profilePublish,
            
        },
       data() {
                return {
                        //  type: 'nursing',
                         type: 'hospital',
                }
        },
        created(){
             
        //       this.scrollSection();
              this.axios
                .get('/api/authget')
                .then(response=>{
                //   console.log(response);
                // this.fac_list = response.data;
                });
                this.scrollTab();
        },
        methods: {
                getType(aa){
                        alert('a');
                        // console.log(aa);

                },
                scrollTab(){
                        // console.log('scroll');
                        // $("p").css('color','red');
                        $('#a').on('click',function(){
                                // console.log('onclick');
                        });
                        
                        if($('.detal_wrap').length){   
                                // console.log('Hello'); 
                                $(".a_sp a[href^='#']").click(function () { 
                                // console.log("a_sp");
                                var speed = 600;
                                var href = $(this).attr("href");
                                var target = $(href === "#" || href === "" ? 'html' : href);
                                var position = target.offset().top;
                                $("html, body, .scrolldiv2").animate({scrollTop: position - 60}, speed, "swing" );
                                //return false;
                                });
                        }
                }
                // changeType() {
                //         console.log('change');
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




