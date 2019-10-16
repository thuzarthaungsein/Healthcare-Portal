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
            <i class="fas fa-id-badge"></i>
            <input type="radio" v-model="btntype" value="view" v-on:change="changeBtnType('nursing-lbl','hospital-lbl')" name="btntype" id="nursing" />
            myページ
          </label>
        </li>
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
            <i class="fas fa-id-badge"></i>
            <input type="radio" v-model="btntype" value="view" v-on:change="changeBtnType('nursing-lbl','hospital-lbl')" name="btntype" id="nursing" />
            myページ
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
    };
  },
  created() {
    this.axios.get('/api/user').then(response => {
      this.loginuser = true;
      
      localStorage.setItem("cusId", response.data.customer_id);
      if(response.data.type_id == 2){
        localStorage.setItem("cusType", 'hospital');
        this.type = 'hospital';
      }
      else{
        localStorage.setItem("cusType", 'nursing');
        this.type = 'nursing';
      }
            
      this.cusid = response.data.customer_id;
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