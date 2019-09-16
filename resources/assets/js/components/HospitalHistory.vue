<template>
  <div class="row">
    <div class="col-12">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="/">ホーム</a>
          </li>
          <li class="breadcrumb-item">
            <a href="/">新しい詳細</a>
          </li>
          <li class="breadcrumb-item active" aria-current="page">就職活動リスト</li>
        </ol>
      </nav>
    </div>

    <div class="col-12 scrolldiv2">
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
              <button class="btn btn-info all-btn hos-btn">検討リストに追加</button>
            </div>
            <div class="col-lg-5 col-md-12 m-b-10">
              <div class="pad-free mb-2">
                <h4 class="pc">
                  <a href="#">{{hos_profile.name}}</a>
                </h4>
                <strong>Website :</strong>
                <a href>{{hos_profile.website}}</a>
                <br />
                <a>
                  <strong>Medical Department :</strong>
                  {{hos_profile.medical_department}}
                </a>
                <br />
                <a>
                  <strong>Phone :</strong>
                  {{hos_profile.phone}}
                </a>
                <br />
                <a>
                  <strong>Access :</strong>
                  {{hos_profile.access}}
                </a>
                <br />
                <a>
                  <strong>Email :</strong>
                  {{hos_profile.email}}
                </a>
                <br />
                <a>
                  <strong>Details :</strong>
                  {{hos_profile.details_info}}
                </a>
                <br />
                <a>
                  <strong>Subjects :</strong>
                  {{hos_profile.subject}}
                </a>
                <br />
                <a>
                  <strong>Location :</strong>
                  {{hos_profile.township_name}}, {{hos_profile.city_name}}
                </a>
                <br />
              </div>
            </div>
            <div class="col-lg-4 col-md-12">
              <div
                class="fac_container"
                v-for="feature in hos_profile.special_features"
                :key="feature.id"
              >
                <ul class="equipment">
                  <li>{{ feature }}</li>
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