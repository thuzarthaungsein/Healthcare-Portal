<template>
  <!-- Page Content  -->

  <div class="row m-0">
    <!-- <div class="col-12">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <a href="../index.html">ホーム</a>
          </li>

          <li class="breadcrumb-item">
            <a href="../news/news_details.html">新しい詳細</a>
          </li>

          <li class="breadcrumb-item active" aria-current="page">就職活動リスト</li>
        </ol>
      </nav>
    </div>

    <button class="btn btn my-2 my-sm-0 all-btn secondary-bg-color btn-secondary">
      <input type="checkbox" class="select_all" />

      <span class="checkmark"></span>すべての見学予約・資料請求にチェックを入れる
    </button>-->
    <div class="col-12 scrolldiv2 pb-5">
      <div class="d-flex justify-content-between">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <a href="/">ホーム</a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">病院の歴史</li>
          </ol>
        </nav>
        <div class="select_all">
          <button class="btn btn my-2 my-sm-0 all-btn secondary-bg-color btn-secondary">
            <input type="checkbox" />
            <span class="checkmark"></span>すべての見学予約・資料請求にチェックを入れる
          </button>
        </div>
      </div>
      <div class="row m-0">
        <div v-for="hos_profile in fav_hospital" :key="hos_profile.id" class="col-lg-12 pt-3 bd">
          <div class="row m-0">
            <h5 class="m-b-10 col-12 hos-tit">
              <a href="#">{{hos_profile.name}}</a>
            </h5>
            <div class="col-lg-2 col-md-12 mb-5">
              <div class="hos-img">
                <img class="col-md-12" v-bind:src="'/images/' + hos_profile.logo" alt />
              </div>
              <button
                class="btn btn-danger all-btn hos-btn"
                @click="removeFav(hos_profile.customer_id)"
              >最近見た施設から削除</button>
              <div class="row mt-2">
                <div class="col-6">
                  <button class="btn news-post-btn all-btn hos-btn">
                    <input type="checkbox" class="checkbox" value="1" />
                    <span class="checkmark"></span>見学予約
                  </button>
                </div>
                <div class="col-6">
                  <button class="btn all-btn secondary-bg-color hos-btn">
                    <input type="checkbox" class="checkbox" value="2" />
                    <span class="checkmark"></span>資料請求
                  </button>
                </div>
              </div>
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
          </div>
        </div>
      </div>
      <button class="btn btn-success mt-5 float-right" type="submit">この内容で送信</button>
    </div>
  </div>

  <!-- Page Content end  -->
</template>



<script>
export default {
  data() {
    return {
      errors: [],

      fav_hospital: [],

      post_list: [],

      city_list: [],

      local_sto: "",

      post: "",

      selectedCity: "",

      zipStreet: "",

      zipPref: "",

      selectedValue: 0
    };
  },

  created() {
    this.axios
      .get("/api/hospital/postList")

      .then(response => {
        this.post_list = response.data;

        //console.log(this.post_list);
      });

    this.local_sto = localStorage.getItem("hospital_fav");

    this.getAllFavourite(this.local_sto);

    this.axios
      .get("/api/hospital/citiesList")

      .then(response => {
        this.city_list = response.data;
      });
  },

  methods: {
    getAllFavourite: function(local_storage) {
      this.axios

        .post("/api/favHospital/" + local_storage)

        .then(response => {
          this.fav_hospital = response.data;

          console.log(this.fav_hospital);
        });
    },

    removeFav(fav) {
      if (confirm("Are you sure you want to delete?")) {
        this.fav_hospital.splice(fav, 1);

        var splitarray = this.local_sto.split(",");

        splitarray = splitarray.splice(fav.toString(), 1);

        localStorage.setItem("hospital_fav", splitarray);
      }
    },

    // getCities: function() {

    //         this.city_list.id = this.city_id;

    //     },

    addDistributionGroup: function() {
      var selectedId = this.post;

      this.axios

        .post("/api/hospital/selectedCity/" + selectedId)

        .then(response => {
          this.zipStreet = response.data[0].street;

          this.zipPref = response.data[0].pref;

          this.selectedValue = response.data[0].c_Id;
        });
    }
  }
};
</script>