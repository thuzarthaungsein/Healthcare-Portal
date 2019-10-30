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
        <span style=" position: fixed; right: 12%; " class="btn fav-item fav-color all-btn">Add</span>
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
      <span style=" position: fixed; right: 12%; " class="btn fav-item fav-color all-btn">Add</span>
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
    };
  },
  created() {
    this.axios.get('/api/user').then(response => {
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
            localStorage.setItem("lat_num", response.data[0].latitude);
            localStorage.setItem("lng_num", response.data[0].longitude);

            if(this.type == 'hospital'){
                if(localStorage.getItem("hospital_history")) {
                    var hos_his_arr = JSON.parse("[" + localStorage.getItem("hospital_history") + "]");
                    hos_his_arr.push(response.data[0].pro_id);
                    hos_his_arr = [...new Set(hos_his_arr)]; 
                    localStorage.setItem("hospital_history", hos_his_arr);               
                }
                else{
                    var hos_his_arr = [response.data[0].pro_id];
                    localStorage.setItem("hospital_history", hos_his_arr);
                }
            }
            else{
                if(localStorage.getItem("nursing_history")) {
                    var nus_his_arr = JSON.parse("[" + localStorage.getItem("nursing_history") + "]");
                    nus_his_arr.push(response.data[0].pro_id);
                    nus_his_arr = [...new Set(nus_his_arr)]; 
                    localStorage.setItem("nursing_history", nus_his_arr);               
                }
                else{
                    var nus_his_arr = [response.data[0].pro_id];
                    localStorage.setItem("nursing_history", nus_his_arr);
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