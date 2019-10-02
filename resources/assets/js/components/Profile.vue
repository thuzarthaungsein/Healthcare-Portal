<template>
<div>
        <div v-if="type == 'nursing'">
                <ul class="nav nav-tabs card-head-tabs fixed-ads" role="tablist">
                        <li role="presentation" class="subtab1 nav-item">

                        <label for="hospital" class="typelabel nav-link" id="hospital-lbl">
                                <i class="fa fa-plus-circle"></i>
                                <input type="radio" v-model="btntype"  value="create" v-on:change ="changeBtnType()" name="btntype" id="hospital"> 作成
                        </label>
                        </li>

                         <li role="presentation" class="subtab2 nav-item">
                        <label for="nursing" class="typelabel dim-btn nav-link" id="nursing-lbl">
                                <i class="fas fa-id-badge"></i>
                                <input type="radio" v-model="btntype" value="view" v-on:change ="changeBtnType()" name="btntype" id="nursing"> myページ
                        </label>
                         </li>
                </ul>
                <!-- <div class="form-group">
                        <label for="hospital" class="typelabel" id="hospital-lbl">
                                <input type="radio" v-model="btntype"  value="create" v-on:change ="changeBtnType()" name="btntype" id="hospital"> Create
                        </label>
                        <label for="nursing" class="typelabel dim-btn" id="nursing-lbl">
                                <input type="radio" v-model="btntype" value="view" v-on:change ="changeBtnType()" name="btntype" id="nursing"> View
                        </label>
                </div> -->
                <div class="tab-content tab-content1 tabs">
                <form class="col-md-12 pad-free">

                        <div class="col-md-12 pad-free tab-pane" v-if="btntype == 'create'">
                             <nursingProfile></nursingProfile>
                        </div>

                        <div class="col-md-12 pad-free" v-if="btntype == 'view'">
                             <profilePublish :cusid = cusid :type= type></profilePublish>
                        </div>

                </form>
                </div>
        </div>

        <div v-if="type == 'hospital'" >
                <ul class="nav nav-tabs card-head-tabs fixed-ads" role="tablist">
                        <li role="presentation" class="subtab1 nav-item">
                        
                       <label for="hospital" class="typelabel nav-link" id="hospital-lbl">
                               <i class="fa fa-plus-circle"></i>
                                <input type="radio" v-model="btntype"  value="create" v-on:change ="changeBtnType()" name="btntype" id="hospital"> 作成
                        </label>
                        </li>

                         <li role="presentation" class="subtab2 nav-item">
                        <label for="nursing" class="typelabel dim-btn nav-link" id="nursing-lbl">
                                 <i class="fas fa-id-badge"></i>
                                <input type="radio" v-model="btntype" value="view" v-on:change ="changeBtnType()" name="btntype" id="nursing"> myページ
                        </label>
                         </li>
                </ul>
                <!-- <div class="form-group">
                        <label for="hospital" class="typelabel" id="hospital-lbl">
                                <input type="radio" v-model="btntype"  value="create" v-on:change ="changeBtnType()" name="btntype" id="hospital"> Create
                        </label>
                        <label for="nursing" class="typelabel dim-btn" id="nursing-lbl">
                                <input type="radio" v-model="btntype" value="view" v-on:change ="changeBtnType()" name="btntype" id="nursing"> View
                        </label>
                </div> -->
                <div class="tab-content tab-content1 tabs">  
                <form class="col-md-12 pad-free "> 
                        <div class="col-md-12 pad-free tab-pane" v-if="btntype == 'create'">
                             <hospitalProfile></hospitalProfile>
                        </div>

                        <div class="col-md-12 pad-free" v-if="btntype == 'view'">
                             <profilePublish :cusid = cusid :type= type></profilePublish>
                        </div>
                </form>
                </div>
        </div>
</div>
</template>

<script>
import hospitalProfile from './HospitalProfile.vue'
import nursingProfile from './NursingProfile.vue'
import profilePublish from './ProfilePublish.vue'
export default {
        ready: function() {
                Vue.nextTick(function () {
                }.bind(this))
        },
        components: {
              hospitalProfile,
              nursingProfile,
              profilePublish,
        },
       data() {
                return {
                        type: 'nursing',
                        btntype: 'view',
                }
        },
        created(){
                if(this.$route.params.type) {
                        this.type = this.$route.params.type;
                        console.log(this.type);
                }       
                if(this.$route.params.cusid) {
                        this.cusid = this.$route.params.cusid;
                }
                else{
                        this.cusid = 1;
                }    
                
        },
        methods: {
                changeBtnType() {
                        if(this.btntype == 'create') {
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
