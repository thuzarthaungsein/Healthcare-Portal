<template>
  <div>
    <!-- news details-->
    <!--menu tabs-->
    <ul class="nav nav-tabs card-head-tabs" role="tablist" id="navtab">
            <li role="presentation" class="subtab1 nav-item"><a href="#tab1" role="tab" data-toggle="tab" class="nav-link"><i class="fas fa-newspaper"></i> ニュース</a></li>
            <li role="presentation" class="subtab2 nav-item"><a href="#tab2" role="tab" data-toggle="tab" class="nav-link"><i class="fas fa-briefcase-medical"></i> 病院検索</a></li>
            <li role="presentation" class="active subtab3 nav-item"><a href="#tab3" role="tab" data-toggle="tab" class="nav-link active"><i class="fas fa-user-md"></i> 介護検索</a></li>
            <li role="presentation" class="subtab5 nav-item"><a href="#tab4" role="tab" data-toggle="tab" class="nav-link"><i class="fas fa-users"></i> 求人検索</a></li>
    </ul>
    <!--end menu tabs-->
    <!-- Tab panes -->
        <div class="tab-content tab-content1 tabs">
            <div role="tabpanel" class="tab-pane fade" id="tab1"><News></News></div>
            <div role="tabpanel" class="tab-pane fade" id="tab2"><hospitalSearch></hospitalSearch></div>
            <div role="tabpanel" class="tab-pane active" id="tab3">
              <div class="col-12 scrolldiv2 pb-3">
                <div class="col-12">
                  <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item">
                        <span @click="changeRoute()" class="link-span">介護検索</span>
                      </li>
                      <li class="breadcrumb-item active" aria-current="page">介護の歴史</li>
                    </ol>
                  </nav>
                </div>
                <div class="row m-0">
                  <div v-for="nur_profile in nur_profiles" :key="nur_profile.id" class="col-lg-12 pt-3 bd">
                    <div class="row m-0">
                      <h5 class="m-b-10 col-12 hos-tit">
                        <a href="#">{{nur_profile.name}}</a>
                      </h5>
                      <div class="col-lg-2 col-md-12 mb-5">
                        <div class="hos-img list-logo">
                          <img v-bind:src="'/images/' + nur_profile.logo" alt />
                        </div>
                        <button class="btn btn-danger all-btn hos-btn">最近見た施設から削除</button>
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
                              <a href="#" target="_blank">{{nur_profile.website}}</a>
                            </p>
                          </div>
                        </div>
                        <div class="row list-wrap">
                          <div class="col-lg-3 col-md-4 col-sm-12">
                            <p>
                              <strong>Access</strong>
                            </p>
                          </div>
                          <div class="col-lg-9 col-md-8 col-sm-12">
                            <p>{{nur_profile.access}}</p>
                          </div>
                        </div>
                        <div class="row list-wrap">
                          <div class="col-lg-3 col-md-4 col-sm-12">
                            <p>
                              <strong>Email</strong>
                            </p>
                          </div>
                          <div class="col-lg-9 col-md-8 col-sm-12">
                            <p>{{nur_profile.email}}</p>
                          </div>
                        </div>
                        <div class="row list-wrap">
                          <div class="col-lg-3 col-md-4 col-sm-12">
                            <p>
                              <strong>Occupancy Condition</strong>
                            </p>
                          </div>
                          <div class="col-lg-9 col-md-8 col-sm-12">
                            <p>{{nur_profile.occupancy_condition}}</p>
                          </div>
                        </div>
                        <div class="row list-wrap">
                          <div class="col-lg-3 col-md-4 col-sm-12">
                            <p>
                              <strong>Location</strong>
                            </p>
                          </div>
                          <div class="col-lg-9 col-md-8 col-sm-12">
                            <p>{{nur_profile.township_name}}, {{nur_profile.city_name}}</p>
                          </div>
                        </div>
                        <!-- <div class="pad-free mb-2">
                          <strong>Website :</strong>
                          <a href>{{nur_profile.website}}</a>
                          <br />
                          <a>
                            <strong>Phone :</strong>
                            {{nur_profile.phone}}
                          </a>
                          <br />
                          <a>
                            <strong>Access :</strong>
                            {{nur_profile.access}}
                          </a>
                          <br />
                          <a>
                            <strong>Email :</strong>
                            {{nur_profile.email}}
                          </a>
                          <br />
                          <a>
                            <strong>Occupancy Condition :</strong>
                            {{nur_profile.occupancy_condition}}
                          </a>
                          <br />
                          <a>
                            <strong>Location :</strong>
                            {{nur_profile.township_name}}, {{nur_profile.city_name}}
                          </a>
                          <br />
                        </div>-->
                      </div>
                      <div class="col-lg-3 col-md-12">
                        <ul class="fac_container">
                          <li v-for="feature in nur_profile.special_features" :key="feature.id">{{ feature.short_name }}</li>
                        </ul>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div role="tabpanel" class="tab-pane fade" id="tab4"></div>
            <div role="tabpanel" class="tab-pane fade" id="tab4"><jobSearch></jobSearch></div>
        </div>
        <!--end Tab panes-->     
  </div>
</template>
<script>
import News from './News.vue'
import hospitalSearch from './hospitalSearch.vue'
// import nursingSearch from './nursingSearch.vue'
import jobSearch from './jobSearch.vue'
export default {
    components: {
            News,
            // nursingSearch,
            jobSearch,
            hospitalSearch,
    },
  data() {
    return {
      nur_profiles: [],
      local_sto: "",
      type : 'nursing',
      specialfeature:[]
    };
  },
  created() {
    this.local_sto = localStorage.getItem("nursing_history");
    this.getAllCustomer(this.local_sto);

    this.axios.get(`/api/profile/specialfeature/${this.type}`) .then(response => {
    this.specialfeature = response.data;
                });
  },
  methods: {
    changeRoute(){
        this.$router.push({name:'home', params: {page:'subtab3'}});
    },
    getAllCustomer: function(local_storage) {
      this.axios
        .post("/api/nursing_history/" + local_storage)
        .then(response => {
          this.nur_profiles = response.data;
        });
    }
  }
};
</script>
