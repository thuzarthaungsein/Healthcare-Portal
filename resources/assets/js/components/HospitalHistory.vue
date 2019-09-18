<template>
  <div class="row m-0">
    <div class="col-12 scrolldiv2">
      <div class="row">
        <div class="col-12">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="/">ホーム</a>
              </li>
              <li class="breadcrumb-item active" aria-current="page">病院の歴史</li>
            </ol>
          </nav>
        </div>
      </div>
      <div
        v-for="hos_profile in hos_profiles"
        :key="hos_profile.id"
        class="card card-default m-b-20 scrolldiv"
      >
        <div class="card-body news-post">
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
              <!-- <div
                class="fac_container"
                v-for="feature in hos_profile.special_features"
                :key="feature.id"
              >
                <ul class="equipment">
                  <li>{{ feature }}</li>
                </ul>
              </div>-->
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
      local_sto: ""
    };
  },
  created() {
    this.local_sto = localStorage.getItem("hospital_history");
    this.getAllCustomer(this.local_sto);
  },
  methods: {
    getAllCustomer: function(local_storage) {
      this.axios
        .post("/api/hospital_history/" + local_storage)
        .then(response => {
          this.hos_profiles = response.data;
        });
    }
  }
};
</script>
