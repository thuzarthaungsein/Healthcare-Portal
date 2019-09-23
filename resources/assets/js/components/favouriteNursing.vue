<template>
  <div class="row m-0">
    <div class="col-12 scrolldiv2 pb-5">
      <form @submit.prevent="add" class="col-md-12">
        <!-- <label class="btn btn my-2 my-sm-0 all-btn secondary-bg-color btn-secondary">
          <input type="checkbox" class="select_all" />
          <span class="checkmark"></span>すべての見学予約・資料請求にチェックを入れる
        </label>-->
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
          <div v-for="nur_profile in fav_nursing" :key="nur_profile.id" class="col-lg-12 pt-3 bd">
            <div class="row m-0">
              <h5 class="m-b-10 col-12 hos-tit">
                <a href="#">{{nur_profile.name}}</a>
              </h5>
              <div class="col-lg-2 col-md-12 mb-5">
                <div class="hos-img">
                  <img class="col-md-12" v-bind:src="'/images/' + nur_profile.logo" alt style />
                </div>
                <button
                  class="btn btn-danger all-btn hos-btn"
                  @click="removeFav(nur_profile.customer_id)"
                >最近見た施設から削除</button>
                <div class="row mt-2">
                  <div class="col-6">
                    <label class="btn news-post-btn all-btn hos-btn">
                      <!-- <input type="checkbox" class="checkbox" id="rcheck" value="reservation" name="reservation" v-model="mailStatus.rchecked"> -->
                      <input
                        type="checkbox"
                        class="checkbox"
                        value="reservation"
                        name="reservation"
                        v-model="reserv_status[nur_profile.id]"
                      />
                      <span class="checkmark"></span>見学予約
                    </label>
                  </div>
                  <div class="col-6">
                    <label class="btn all-btn secondary-bg-color hos-btn">
                      <input
                        type="checkbox"
                        class="checkbox"
                        value="documentation"
                        name="documentation"
                        v-model="decument_status[nur_profile.id]"
                      />
                      <span class="checkmark"></span>資料請求
                    </label>
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
                      <a href="#" target="_blank">{{nur_profile.website}}</a>
                    </p>
                  </div>
                </div>
                <div class="row list-wrap">
                  <div class="col-lg-3 col-md-4 col-sm-12">
                    <p>
                      <strong>Phone</strong>
                    </p>
                  </div>
                  <div class="col-lg-9 col-md-8 col-sm-12">
                    <p>{{nur_profile.phone}}</p>
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
                  <h4>
                    <a href="#">{{nur_profile.name}}</a>
                  </h4>
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
                  <li
                    v-for="feature in nur_profile.special_features"
                    :key="feature.id"
                  >{{ feature }}</li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <span class="btn btn-success mt-5 float-right" @click="addingMail()">この内容で送信</span>
      </form>
    </div>
  </div>
</template>

<script>
    export default {

        data() {
                return {
                    errors: [],
                    fav_nursing: [],
                    local_sto: '',
                    post_list: [],
                    city_list: [],
                    post: '',
                    selectedCity: '',
                    zipStreet: '',
                    zipPref: '',
                    selectedValue: 0,
                    fav_email: [],
                    arr_email: [],
                    reserv_status: [],
                    decument_status: [],
                    all_check: []

                }
            },

            created() {
                this.axios.get('/api/hospital/postList')
                    .then(response => {
                        this.post_list = response.data;
                        //console.log(this.post_list); 
                    });
                this.local_sto = localStorage.getItem("nursing_fav");
                this.getAllFavourite(this.local_sto);
                this.axios.get('/api/hospital/citiesList')
                    .then(response => {
                        this.city_list = response.data;
                    });
            },

            methods: {
                getAllFavourite: function(local_storage) {
                    this.axios
                        .post('/api/nursing_fav/' + local_storage)
                        .then(response => {
                            this.fav_nursing = response.data;
                        });

                },
                removeFav(nur) {
                    if (confirm("Are you sure you want to delete?")) {
                        this.fav_nursing.splice(nur, 1);
                        var splitarray = this.local_sto.split(",");
                        splitarray = splitarray.splice(nur.toString(), 1);
                        localStorage.setItem('nursing_fav', splitarray);

                    }

                },
                addDistributionGroup: function() {
                    var selectedId = this.post;
                    this.axios
                        .post('/api/hospital/selectedCity/' + selectedId)
                        .then(response => {
                            this.zipStreet = response.data[0].street;
                            this.zipPref = response.data[0].pref;
                            this.selectedValue = response.data[0].c_Id;
                        });
                },
                addingMail() {
                    for (var i = 0; i < this.fav_nursing.length; i++) {
                        this.fav_email.push({
                            'email': this.fav_nursing[i]['email'],
                            'arr_reserve': this.reserv_status,
                            'arr_document': this.decument_status
                        });
                    }
                    // console.log('reserv', this.reserv_status)
                    // console.log('document', this.decument_status)
                    // console.log('email', this.fav_email);
                    localStorage.setItem("item", JSON.stringify(this.fav_email));
                    // console.log(JSON.parse(localStorage.getItem("item")));
                    this.$router.push({
                        name: 'nursingFavouriteMail',
                        // params: { favmail: this.fav_email},
                        // props: true
                    });

                },
            }
};
</script>