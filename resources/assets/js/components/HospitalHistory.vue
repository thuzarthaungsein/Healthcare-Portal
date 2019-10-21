<template>
  <div>
   
        <div class="col-12 scrolldiv2 pb-3 tab-content">
          <div class="col-12">
            <div class="col-md-12 fav-his-header">
                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#c40000"><path d="M86,15.0472l-78.83333,70.9528h21.5v64.5h59.44694c-1.3545,-4.54367 -2.11361,-9.3525 -2.11361,-14.33333h-43v-63.14225l43,-38.6888l57.61328,51.66439h21.22006zM136.19466,100.24935c-19.78717,0 -35.83333,16.04617 -35.83333,35.83333c0,19.78717 16.04617,35.83333 35.83333,35.83333c19.78717,0 35.83333,-16.04617 35.83333,-35.83333c0,-19.78717 -16.04617,-35.83333 -35.83333,-35.83333zM150.89193,119.24382l10.02213,10.03613l-28.30274,28.30274l-21.13606,-21.13607l10.02213,-10.03613l11.11393,11.11393z"></path></g></g></svg>
                &nbsp;<span class="font-weight-bold"> 最近見た施設</span>
            </div>
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <router-link to="/">ホーム</router-link>
                </li>
                <li class="breadcrumb-item active" aria-current="page">病院の歴史</li>
              </ol>
            </nav>
          </div>
          <div class="row m-0">
            <div v-for="hos_profile in hos_profiles" :key="hos_profile.id" class="col-lg-12 pt-3 bd">
              <div class="row m-0">
                <h5 class="m-b-10 col-12 hos-tit">
                  <!-- <a href="#">{{hos_profile.name}}</a>  -->
                  <router-link :to="{name: 'profile', params: {cusid:hos_profile.customer_id, type: 'hospital'}}" >{{hos_profile.name}}</router-link>
                </h5>
                <div class="col-lg-2 col-md-12 mb-5">
                  <div class="hos-img list-logo">
                    <img v-bind:src="'/images/' + hos_profile.logo" alt />
                  </div>
                  <button class="btn btn-danger all-btn hos-btn" @click="deleteLocalSto(hos_profile.id)">最近見た施設から削除</button>
                  <button class="btn btn-success all-btn hos-btn mt-2">検討リストに追加</button>
                </div>
                <div class="col-lg-7 col-md-12 mb-4">
                  <div class="row list-wrap">
                    <div class="col-lg-3 col-md-4 col-sm-12">
                      <p>
                        <strong>公式サイト</strong>
                      </p>
                    </div>
                    <div class="col-lg-9 col-md-8 col-sm-12">
                      <p>
                        <a href="#" target="_blank">{{hos_profile.website}}</a>
                      </p>
                    </div>
                  </div>
                  <div class="row list-wrap">
                    <div class="col-lg-3 col-md-4 col-sm-12">
                      <p>
                        <strong>Medical Departement</strong>
                      </p>
                    </div>
                    <div class="col-lg-9 col-md-8 col-sm-12">
                      <p>{{hos_profile.medical_department}}</p>
                    </div>
                  </div>
                  <div class="row list-wrap">
                    <div class="col-lg-3 col-md-4 col-sm-12">
                      <p>
                        <strong>電話番号</strong>
                      </p>
                    </div>
                    <div class="col-lg-9 col-md-8 col-sm-12">
                      <p>{{hos_profile.phone}}</p>
                    </div>
                  </div>
                  <div class="row list-wrap">
                    <div class="col-lg-3 col-md-4 col-sm-12">
                      <p>
                        <strong>交通アクセス</strong>
                      </p>
                    </div>
                    <div class="col-lg-9 col-md-8 col-sm-12">
                      <p>{{hos_profile.access}}</p>
                    </div>
                  </div>
                  <div class="row list-wrap">
                    <div class="col-lg-3 col-md-4 col-sm-12">
                      <p>
                        <strong>メールアドレス</strong>
                      </p>
                    </div>
                    <div class="col-lg-9 col-md-8 col-sm-12">
                      <p>{{hos_profile.email}}</p>
                    </div>
                  </div>
                  <!-- <div class="row list-wrap">
                    <div class="col-lg-3 col-md-4 col-sm-12">
                      <p>
                        <strong>Details</strong>
                      </p>
                    </div>
                    <div class="col-lg-9 col-md-8 col-sm-12">
                      <p>{{hos_profile.details_info}}</p>
                    </div>
                  </div> -->
                  <div class="row list-wrap">
                    <div class="col-lg-3 col-md-4 col-sm-12">
                      <p>
                        <strong>診療科目</strong>
                      </p>
                    </div>
                    <div class="col-lg-9 col-md-8 col-sm-12">
                      <p>{{hos_profile.subject}}</p>
                    </div>
                  </div>
                  <div class="row list-wrap">
                    <div class="col-lg-3 col-md-4 col-sm-12">
                      <p>
                        <strong>住所</strong>
                      </p>
                    </div>
                    <div class="col-lg-9 col-md-8 col-sm-12">
                      <p>{{hos_profile.city_name}}</p>
                    </div>
                  </div>
                </div>
                <div class="col-lg-3 col-md-12">
                  <ul class="fac_container">
                    <li v-for="feature in hos_profile.special_features" :key="feature.id">{{ feature.short_name }}</li>
                  </ul>
                </div>
                <!-- <div class="card-body news-post">
                  <div class="row">
                    <div class="col-lg-3 col-md-12 m-b-20 pad-free">
                      <h4 class="m-b-20 text-center sp">
                        <a href="#">{{hos_profile.name}}</a>
                      </h4>
                      <img class="col-md-12 hos-img" v-bind:src="'/images/' + hos_profile.logo" alt />
                      <button class="btn btn-danger all-btn hos-btn">最近見た施設から削除</button>
                      <button class="btn fav-color all-btn hos-btn">検討リストに追加</button>
                    </div>
                    <div class="col-lg-9 col-md-12 m-b-10">
                      <div class="pad-free mb-2">
                        <h4 class="m-b-20 pc">
                          <a href="#">{{hos_profile.name}}</a>
                        </h4>
                        <div class="row m-0">
                          <div class="hos-l">
                            <strong>Website</strong>
                          </div>
                          <div class="hos-r">
                            <a href>{{hos_profile.website}}</a>
                          </div>
                        </div>
                        <div class="row m-0">
                          <div class="hos-l">
                            <strong>Medical Department</strong>
                          </div>
                          <div class="hos-r">{{hos_profile.medical_department}}</div>
                        </div>
                        <div class="row m-0">
                          <div class="hos-l">
                            <strong>Phone</strong>
                          </div>
                          <div class="hos-r">{{hos_profile.phone}}</div>
                        </div>
                        <div class="row m-0">
                          <div class="hos-l">
                            <strong>Access</strong>
                          </div>
                          <div class="hos-r">{{hos_profile.access}}</div>
                        </div>
                        <div class="row m-0">
                          <div class="hos-l">
                            <strong>Email</strong>
                          </div>
                          <div class="hos-r">{{hos_profile.email}}</div>
                        </div>
                        <div class="row m-0">
                          <div class="hos-l">
                            <strong>Details</strong>
                          </div>
                          <div class="hos-r">{{hos_profile.details_info}}</div>
                        </div>
                        <div class="row m-0">
                          <div class="hos-l">
                            <strong>Subjects</strong>
                          </div>
                          <div class="hos-r">{{hos_profile.subject}}</div>
                        </div>
                        <div class="row m-0">
                          <div class="hos-l">
                            <strong>Location</strong>
                          </div>
                          <div class="hos-r">{{hos_profile.township_name}}, {{hos_profile.city_name}}</div>
                        </div>
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="fac-wrap">
                        <ul class="fac_container">
                          <li
                            v-for="feature in hos_profile.special_features"
                            :key="feature.id"
                          >{{ feature }}</li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>-->
              </div>
            </div>
          </div>
        </div>
  
  </div>
</template>
<script>
 export default {
      
  data() {
    return {
      hos_profiles: [],
      specialfeature:[],
      local_sto: ""
    };
  },
  created() {
    this.local_sto = localStorage.getItem("hospital_history");
    this.getAllCustomer(this.local_sto);
  },
  methods: {
    // changeRoute(){
    //     this.$router.push({name:'home', params: {page:'subtab2'}});
    // },
    getAllCustomer: function(local_storage) {
      this.axios
        .post("/api/hospital_history/" + local_storage)
        .then(response => {
          console.log(response);
          this.hos_profiles = response.data;
        });
    },
    deleteLocalSto: function(id) {
      var l_sto = this.local_sto;
      var l_sto_arr = l_sto.split(",");
      var rm_id = id.toString();
      var index = l_sto_arr.indexOf(rm_id);
      if (index > -1) {
        l_sto_arr.splice(index , 1);
        var new_local = l_sto_arr.toString();
        localStorage.setItem('hospital_history', new_local);
        this.local_sto = localStorage.getItem("hospital_history");
        if(this.local_sto) {
          this.getAllCustomer(this.local_sto);
        }
        else {
          window.location.reload();
        }
      }
    }
  }
};
</script>
