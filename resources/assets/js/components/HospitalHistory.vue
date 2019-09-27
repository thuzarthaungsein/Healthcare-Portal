<template>
  <div>
    <!-- news details-->
    <!--menu tabs-->
    <ul class="nav nav-tabs card-head-tabs" role="tablist" id="navtab">
      <li role="presentation" class="subtab1 nav-item"><a href="#tab1" role="tab" data-toggle="tab" class="nav-link"><i class="fas fa-newspaper"></i> ニュース</a></li>
      <li role="presentation" class="active subtab2 nav-item"><a href="#tab2" role="tab" data-toggle="tab" class="nav-link active"><i class="fas fa-briefcase-medical"></i> 病院</a></li>
      <li role="presentation" class="subtab3 nav-item"><a href="#tab3" role="tab" data-toggle="tab" class="nav-link"><i class="fas fa-user-md"></i> 介護</a></li>
      <li role="presentation" class="subtab5 nav-item"><a href="#tab4" role="tab" data-toggle="tab" class="nav-link"><i class="fas fa-users"></i> 求人</a></li>
    </ul>
    <!--end menu tabs-->

    <!-- Tab panes -->
    <div class="tab-content tab-content1 tabs">
      <div role="tabpanel" class="tab-pane fade" id="tab1"><News></News></div>
      <div role="tabpanel" class="tab-pane active" id="tab2">
        <div class="col-12 scrolldiv2 pb-3">
          <div class="col-12">
            <nav aria-label="breadcrumb">
              <ol class="breadcrumb">
                <li class="breadcrumb-item">
                  <span @click="changeRoute()" class="link-span">病院検索</span>
                </li>
                <li class="breadcrumb-item active" aria-current="page">病院の歴史</li>
              </ol>
            </nav>
          </div>
          <div class="row m-0">
            <div v-for="hos_profile in hos_profiles" :key="hos_profile.id" class="col-lg-12 pt-3 bd">
              <div class="row m-0">
                <h5 class="m-b-10 col-12 hos-tit">
                  <a href="#">{{hos_profile.name}}</a>
                </h5>
                <div class="col-lg-2 col-md-12 mb-5">
                  <div class="hos-img list-logo">
                    <img v-bind:src="'/images/' + hos_profile.logo" alt />
                  </div>
                  <button class="btn btn-danger all-btn hos-btn" @click="deleteLocalSto(hos_profile.id)">最近見た施設から削除</button>
                  <button class="btn fav-color all-btn hos-btn mt-2">検討リストに追加</button>
                </div>
                <div class="col-lg-7 col-md-12 mb-4">
                  <div class="row list-wrap">
                    <div class="col-lg-3 col-md-4 col-sm-12">
                      <p>
                        <strong>Website</strong>
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
                        <strong>Phone</strong>
                      </p>
                    </div>
                    <div class="col-lg-9 col-md-8 col-sm-12">
                      <p>{{hos_profile.phone}}</p>
                    </div>
                  </div>
                  <div class="row list-wrap">
                    <div class="col-lg-3 col-md-4 col-sm-12">
                      <p>
                        <strong>Access</strong>
                      </p>
                    </div>
                    <div class="col-lg-9 col-md-8 col-sm-12">
                      <p>{{hos_profile.access}}</p>
                    </div>
                  </div>
                  <div class="row list-wrap">
                    <div class="col-lg-3 col-md-4 col-sm-12">
                      <p>
                        <strong>Email</strong>
                      </p>
                    </div>
                    <div class="col-lg-9 col-md-8 col-sm-12">
                      <p>{{hos_profile.email}}</p>
                    </div>
                  </div>
                  <div class="row list-wrap">
                    <div class="col-lg-3 col-md-4 col-sm-12">
                      <p>
                        <strong>Details</strong>
                      </p>
                    </div>
                    <div class="col-lg-9 col-md-8 col-sm-12">
                      <p>{{hos_profile.details_info}}</p>
                    </div>
                  </div>
                  <div class="row list-wrap">
                    <div class="col-lg-3 col-md-4 col-sm-12">
                      <p>
                        <strong>Subjects</strong>
                      </p>
                    </div>
                    <div class="col-lg-9 col-md-8 col-sm-12">
                      <p>{{hos_profile.subject}}</p>
                    </div>
                  </div>
                  <div class="row list-wrap">
                    <div class="col-lg-3 col-md-4 col-sm-12">
                      <p>
                        <strong>Location</strong>
                      </p>
                    </div>
                    <div class="col-lg-9 col-md-8 col-sm-12">
                      <p>{{hos_profile.city_name}}</p>
                    </div>
                  </div>
                </div>
                <div class="col-lg-3 col-md-12">
                  <ul class="fac_container">
                    <li v-for="feature in hos_profile.special_features" :key="feature.id">{{ feature }}</li>
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
      <div role="tabpanel" class="tab-pane fade" id="tab3"><nursingSearch></nursingSearch></div>
      <div role="tabpanel" class="tab-pane fade" id="tab4"></div>
      <div role="tabpanel" class="tab-pane fade" id="tab4"><jobSearch></jobSearch></div>
    </div>
    <!--end Tab panes-->

    
  </div>
</template>
<script>
import News from './News.vue'
// import hospitalSearch from './hospitalSearch.vue'
import nursingSearch from './nursingSearch.vue'
import jobSearch from './jobSearch.vue'
    export default {
        components: {
                News,
                nursingSearch,
                jobSearch,
                // hospitalSearch
        },
  data() {
    return {
      hos_profiles: [],
      local_sto: ""
    };
  },
  created() {
    this.local_sto = localStorage.getItem("hospital_history");
    this.getAllCustomer(this.local_sto);
  },
  methods: {
    changeRoute(){
        this.$router.push({name:'home', params: {page:'subtab2'}});
    },
    getAllCustomer: function(local_storage) {
      this.axios
        .post("/api/hospital_history/" + local_storage)
        .then(response => {
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
