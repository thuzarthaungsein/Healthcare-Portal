<template>
  <div id="Profile-page">
    <div v-if="type == 'nursing'">
      
      <ul class="nav nav-tabs nursing-tabColor" role="tablist" id="profilenav" v-bind:style="{width:width}" >
        <li role="presentation" class="subtab1 nav-item" v-if="loginuser">
          <label for="hospital" class="typelabel nav-link" id="hospital-lbl">
            <i class="fa fa-plus-circle"></i>
            <input type="radio" v-model="btntype" value="create" v-on:change="changeBtnType('hospital-lbl','nursing-lbl')" name="btntype" id="hospital" />
            作成
          </label>
        </li>

        <li role="presentation" class="subtab2 nav-item">
          <label for="nursing" class="typelabel dim-btn nav-link active" id="nursing-lbl">
            
            <input type="radio" v-model="btntype" value="view" v-on:change="changeBtnType('nursing-lbl','hospital-lbl')" name="btntype" id="nursing" />
            <span v-if="loginuser"><i class="fas fa-id-badge"></i> myページ</span>
            <span v-if="!loginuser"><i class="fas fa-home"></i></span>
          </label>
        </li>
        <span  class="btn fav-profile fav-item fav-color" v-if="!view_pro_id" @click="favAddFun('add');view_pro_id = !view_pro_id"><i class="fas fa-plus-square" style="color:#c40000!important;"></i>&nbsp; お気に入りに追加</span>
        <span  class="btn fav-profile fav-item fav-color" v-if="view_pro_id" @click="favAddFun('remove');view_pro_id = !view_pro_id"><i class="fas fa-check-double" style="color:#c40000!important;"></i>&nbsp; 追加済み</span>
      </ul>

      <div class="tab-content nursing-borderColor tab-content1 tabs">
        <form class="col-md-12 pad-free">
          <div class="col-md-12 pad-free tab-pane" v-if="btntype == 'create'">
            <nursingProfile :cusid="cusid" :type="type"></nursingProfile>
          </div>

          <div class="col-md-12 pad-free" v-if="btntype == 'view'">
            <profilePublish :cusid="cusid" :type="type"></profilePublish>
          </div>
        </form>
      </div>
      
    </div>

    <div v-if="type == 'hospital'">
      <ul class="nav nav-tabs hospital-tabColor" role="tablist" id="profilenav"  v-bind:style="{width:width}">
        <li role="presentation" class="subtab1 nav-item" v-if="loginuser">
          <label for="hospital" class="typelabel nav-link" id="hospital-lbl">
            <i class="fa fa-plus-circle"></i>

            <input type="radio" v-model="btntype" value="create" v-on:change="changeBtnType('hospital-lbl','nursing-lbl')" name="btntype" id="hospital" />
            作成
          </label>
        </li>

        <li role="presentation" class="subtab2 nav-item">
          <label for="nursing" class="typelabel nav-link active" id="nursing-lbl">
            
            <input type="radio" v-model="btntype" value="view" v-on:change="changeBtnType('nursing-lbl','hospital-lbl')" name="btntype" id="nursing" />
            <span v-if="loginuser"><i class="fas fa-id-badge"></i> myページ</span>
            <span v-if="!loginuser"><i class="fas fa-home"></i></span>
          </label>
        </li>

        <span style="cursor: pointer; box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12) !important; position: fixed; right: 12%; color:#333; font-weight:bold;z-index:1000;" class="btn fav-item fav-color" v-if="!view_pro_id" @click="favAddFun('add');view_pro_id = !view_pro_id"><i class="fas fa-plus-square" style="color:#c40000!important;"></i>&nbsp; お気に入りに追加</span>
        <span style="cursor: pointer; box-shadow: 0 2px 4px 0 rgba(0, 0, 0, 0.16), 0 2px 10px 0 rgba(0, 0, 0, 0.12) !important; position: fixed; right: 12%; color:#aaa; font-weight:bold;z-index:1000;" class="btn fav-item fav-color" v-if="view_pro_id" @click="favAddFun('remove');view_pro_id = !view_pro_id"><i class="fas fa-check-double" style="color:#c40000!important;"></i>&nbsp; 追加済み</span>
      </ul>

      <div class="tab-content hospital-borderColor tab-content1 tabs">
        <form class="col-md-12 pad-free">
          <div class="col-md-12 pad-free tab-pane" v-if="btntype == 'create'">
            <hospitalProfile></hospitalProfile>
          </div>

          <div class="col-md-12 pad-free" v-if="btntype == 'view'">
            <profilePublish :cusid="cusid" :type="type"></profilePublish>
          </div>
        </form>
      </div>
    </div>
  </div>
</template>



<script>
import hospitalProfile from "./HospitalProfile.vue";

import nursingProfile from "./NursingProfile.vue";

import profilePublish from "./ProfilePublish.vue";

export default {
  ready: function() {
    Vue.nextTick(function() {}.bind(this));
  },
  components: {
    hospitalProfile,
    nursingProfile,
    profilePublish
  },
  data() {
    return {
        type: null,
        cusid: null,
        btntype: "view",
        width: "",
        loginuser: true,
        l_storage_hos_history: [],
        l_storage_nus_history: [],
        l_storage_hos_fav: [],
        l_storage_nus_fav: [],
        view_pro_id: false,
        pro_id:0,
    };
  },
  created() {
    this.axios.get('/api/user').then(response => {
        this.pro_id = response.data.lat_lng[0].id;
        this.loginuser = true;

        localStorage.setItem("cusId", response.data.user.customer_id);
        localStorage.setItem("lat_num", response.data.lat_lng[0].latitude);
        localStorage.setItem("lng_num", response.data.lat_lng[0].longitude);

        // localStorage.setItem("hospital_fav", this.l_storage_hos_fav);
        // localStorage.setItem("nursing_fav", this.l_storage_nus_fav);
        // localStorage.setItem("nursing_history", this.l_storage_nus_history);
        // localStorage.setItem("hospital_history", this.l_storage_hos_history);

        if(response.data.user.type_id == 2){
            localStorage.setItem("cusType", 'hospital');
            this.type = 'hospital';
        }
        else{
            localStorage.setItem("cusType", 'nursing');
            this.type = 'nursing';
        }            
        this.cusid = response.data.user.customer_id;
    }).catch((error) => {
        
        this.loginuser = false;
        if (this.$route.params.type) {
        this.type = this.$route.params.type;
        localStorage.setItem("cusType", this.type);         
        }
        if (this.$route.params.cusid) {
        this.cusid = this.$route.params.cusid;
        localStorage.setItem("cusId", this.cusid);
        }
        this.type = localStorage.getItem("cusType");
        this.cusid = Number(localStorage.getItem("cusId"));

        this.axios.get(`/api/profile_view/${this.cusid}/${this.type}`).then(response => {
            this.pro_id = response.data[0].pro_id;
            localStorage.setItem("lat_num", response.data[0].latitude);
            localStorage.setItem("lng_num", response.data[0].longitude);

            if(this.type == 'hospital'){
                if(localStorage.getItem("hospital_history")) {
                    var hos_his_arr = JSON.parse("[" + localStorage.getItem("hospital_history") + "]");
                    hos_his_arr.push(response.data[0].pro_id);
                    hos_his_arr = [...new Set(hos_his_arr)]; 
                    localStorage.setItem("hospital_history", hos_his_arr);       
                    $("#hos-his-local").html(hos_his_arr.length);        
                }
                else{
                    var hos_his_arr = [response.data[0].pro_id];
                    localStorage.setItem("hospital_history", hos_his_arr);
                    $("#hos-his-local").html(hos_his_arr.length);   
                    // if(hos_his_arr.length == 0){

                    // }
                }
                if(localStorage.getItem("hospital_fav")){
                    var nus_fav_arr = JSON.parse("[" + localStorage.getItem("hospital_fav") + "]");
                    this.view_pro_id = nus_fav_arr.includes(response.data[0].pro_id);
                }
            }
            else{
                if(localStorage.getItem("nursing_history")) {
                    var nus_his_arr = JSON.parse("[" + localStorage.getItem("nursing_history") + "]");
                    nus_his_arr.push(response.data[0].pro_id);
                    nus_his_arr = [...new Set(nus_his_arr)]; 
                    localStorage.setItem("nursing_history", nus_his_arr); 
                    $("#nus-his-local").html(nus_his_arr.length);              
                }
                else{
                    var nus_his_arr = [response.data[0].pro_id];
                    localStorage.setItem("nursing_history", nus_his_arr);
                    $("#nus-his-local").html(nus_his_arr.length);   
                }

                if(localStorage.getItem("nursing_fav")){
                    var nus_fav_arr = JSON.parse("[" + localStorage.getItem("nursing_fav") + "]");
                    this.view_pro_id = nus_fav_arr.includes(response.data[0].pro_id);
                }
            }
        });
    })
    
    this.scrollTop();   

    var new_width = $("#content-all").width();
    var fixed_width = new_width - 49.5;
    this.width = fixed_width + "px";   

  },
  methods: {
    changeBtnType(a,b) {
      this.scrollTop();
        document.getElementById(a).classList.add("active");
        document.getElementById(b).classList.remove("active");

        
      // if (this.btntype == "create") {
      //   document.getElementById("hospital-lbl").classList.add("dim-btn");
      //   document.getElementById("nursing-lbl").classList.remove("dim-btn");
      // } else {
      //   document.getElementById("nursing-lbl").classList.add("dim-btn");
      //   document.getElementById("hospital-lbl").classList.remove("dim-btn");
      // }
    },
    favAddFun(status){
        if(this.type == 'nursing'){
            var locReplace = "nursing_fav";
            var varReplace = "#nus-fav-local";
        } 
        else{
            var locReplace = "hospital_fav";
            var varReplace = "#hos-fav-local";
        } 
        
        if(status == 'add'){
            if(localStorage.getItem(locReplace)){
                var fav_arr = JSON.parse("[" + localStorage.getItem(locReplace) + "]");
                fav_arr.push(this.pro_id);
                fav_arr = [...new Set(fav_arr)]; 
                localStorage.setItem(locReplace, fav_arr); 
                $(varReplace).html(fav_arr.length);
            }
            else{
                var fav_arr = [this.pro_id];
                localStorage.setItem(locReplace, fav_arr); 
                $(varReplace).html(fav_arr.length);
            }
        }
        else{
            var fav_arr = JSON.parse("[" + localStorage.getItem(locReplace) + "]");
            var index = fav_arr.indexOf(this.pro_id);
            if (index > -1) {
                fav_arr.splice(index, 1);
                localStorage.setItem(locReplace, fav_arr); 
            }
            $(varReplace).html(fav_arr.length);
        }
    },
    scrollTop(){
      $("html, body").animate({ scrollTop: 0 }, "slow");
    }
  }
};
</script>

<style >
.hospital-tabColor .nav-link {
        background: #63b7ff !important;
        color: #fff;
        border-right: 1px solid #fff;
}
.nursing-tabColor .nav-link {
        background: #ff9563 !important;
        color: #fff !important;
        border-right: 1px solid #fff;
}
.hospital-borderColor {
        border: 1px solid #63b7ff !important;
}
.nursing-borderColor {
        border: 1px solid #ff9563 !important;
}
</style>