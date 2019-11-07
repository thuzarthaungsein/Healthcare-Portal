<template>
  <div class="col-12 scrolldiv2 pb-3 tab-content" id="nursing">
    <div class="col-12 pl-0">
      <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <router-link to="/">ホーム</router-link>
          </li>
          <li class="breadcrumb-item active" aria-current="page">介護の歴史</li>
        </ol>
      </nav>
      <div class="col-md-12">
          <div class="col-md-12 fav-his-header">
              <svg x="0px" y="0px" width="24" height="24" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g fill="#c40000"><path d="M86,15.0472l-78.83333,70.9528h21.5v64.5h59.44694c-1.3545,-4.54367 -2.11361,-9.3525 -2.11361,-14.33333h-43v-63.14225l43,-38.6888l57.61328,51.66439h21.22006zM136.19466,100.24935c-19.78717,0 -35.83333,16.04617 -35.83333,35.83333c0,19.78717 16.04617,35.83333 35.83333,35.83333c19.78717,0 35.83333,-16.04617 35.83333,-35.83333c0,-19.78717 -16.04617,-35.83333 -35.83333,-35.83333zM150.89193,119.24382l10.02213,10.03613l-28.30274,28.30274l-21.13606,-21.13607l10.02213,-10.03613l11.11393,11.11393z"></path></g></g></svg>
        &nbsp;<span class="font-weight-bold"> 最近見た施設リスト</span>
         &nbsp;<span class ="job_count"> {{his_nus}}件</span>
          <!-- &nbsp;<span style="color:#000;">件</span> -->
        </div>
      </div>
    </div>

    <!--modal-->
       <div class="modal fade bd-example-modal-google googlecheck" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display:none;">
                        <div class="modal-dialog modal-xl" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">交通アクセス／{{custname}}</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <button class="btn btn-secondary">閉じる&times;</button>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <GmapMap id="googlemap" ref="map" :center="center" :zoom="10">
                                        <GmapMarker v-for="(m, index) in markers" :key="index" :position="m.position" :clickable="true" :draggable="true" @click="center=m.position" />
                                    </GmapMap>
                                </div>
                                <div class="modal-body">
                                    <strong>住所</strong>
                                    <br>
                                    <span>{{address}}</span>
                                    <hr>
                                    <strong>最寄り駅</strong>
                                    <br>
                                    <p v-html="access"></p>
                                </div>
                                <div class="modal-body">

                                </div>
                            </div>
                        </div>
                    </div>

                     <!--monthly cost and expense cost -->
                    <div class="modal fade bd-example-modal-cost costcheck" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true" style="display:none;">
                        <div class="modal-dialog modal-xl" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">料金プラン（3件）／</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <button class="btn btn-secondary">閉じる&times;</button>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th scope="col">プラン名／居室詳細</th>
                                                <th scope="col">入居時費用</th>
                                                <th scope="col">月額費用</th>
                                            </tr>
                                        </thead>
                                        <tbody v-for="payment in payment_name" :key="payment.id">
                                            <tr>
                                                <td>【増税対応済】{{payment.payment_name}}
                                                    <br>
                                                    <small>[{{payment.living_room_type}}] {{payment.area}}</small>
                                                </td>
                                                <td style="font-size:large;color:#ff6117;">{{payment.expense_moving}}</td>
                                                <td style="font-size:large;color:#ff6117;">{{payment.monthly_fees}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- end monthly cost -->
                <div class="col-12" style="margin-top: 20px;" id="fav-history-page">
                    <div class="row justify-content-lg-center">
                        <div class="card-carousel-wrapper">

                            <div class="nav-box" @click="moveCarousel(-1)" :disabled="atHeadOfList">
                                <div class="nav-content mr-2">
                                    <div class="card-carousel--nav__left"></div>
                                </div>
                            </div>
                            <div class="card-carousel">
                                <div class="card-carousel--overflow-container">
                                    <div class="card-carousel-cards col-3" :style="{ transform: 'translateX' + '(' + currentOffset + 'px' + ')'}">
                                        <div class="card-carousel--card">
                                            <div class="card-carousel--card--footer">

                                                <table class="table table-bordered">
                                                    <tr>
                                                        <td v-for="nur_profile in nur_profiles" :key="nur_profile.id">
                                                            <img class="profile_wd m-b-15" v-bind:src="'/upload/nursing_profile/' + nur_profile.logo" alt @error="imgUrlAlt"/>
                                                            <br>

                                                            <router-link class="pseudolink" :to="{name: 'profile', params: {cusid:nur_profile.customer_id, type: 'nursing'}}" >{{nur_profile.name}}</router-link>

                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td v-for="nur_profile in nur_profiles" :key="nur_profile.id">
                                                            <div class="profile_wd">
                                                                <button class="btn btn-danger all-btn hos-btn m-t-8" @click="deleteLocalSto(nur_profile.id)">最近見た施設リストから削除</button>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td v-for="nur_profile in nur_profiles" :key="nur_profile.id">
                                                            <div class="profile_wd"> <a :href="nur_profile.website" target="_blank">{{nur_profile.website}}</a></div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td v-for="nur_profile in nur_profiles" :key="nur_profile.id">
                                                            <div style="width:250px;">{{nur_profile.email}}</div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                    <td v-for="nur_profile in nur_profiles" :key="nur_profile.id">
                                                        <dl>
                                                            <dt style="text-align:left;">住所</dt>
                                                            <dd style="width:250px;">{{nur_profile.township_name}} {{nur_profile.city_name}}</dd>
                                                        </dl>
                                                    </td>
                                                </tr>

                                                    <tr>
                                                        <td v-for="nur_profile in nur_profiles" :key="nur_profile.id">
                                                            <dl>
                                                                <dt style="text-align:left;">交通アクセス</dt>
                                                                <dd style="width:250px;"><p v-html="nur_profile.access"></p></dd>
                                                            </dl>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                    <td v-for="nur_profile in nur_profiles" :key="nur_profile.id">
                                                        <div style="width:250px;"><span class="pseudolink" @click="googlemap(nur_profile.id)" data-toggle="modal" data-target=".bd-example-modal-google"><i class="fa fa-search"></i>地図・交通アクセス</span></div>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td v-for="nur_profile in nur_profiles" :key="nur_profile.id">
                                                        <dl>
                                                            <dt style="text-align:left;">入居時の費用</dt>
                                                            <dd style="width:250px;color:#ff6117;font-size:large;"><strong>{{nur_profile.moving_in_from}}円~{{nur_profile.moving_in_to}}円</strong></dd>
                                                        </dl>
                                                    </td>
                                                </tr>

                                                 <tr>
                                                    <td v-for="nur_profile in nur_profiles" :key="nur_profile.id">
                                                        <dl>
                                                            <dt style="text-align:left;">月額の費用</dt>
                                                            <dd style="color:#ff6117;font-size:large;width:250px;"><strong>{{nur_profile.per_month_from}}円~{{nur_profile.per_month_to}}円</strong></dd>
                                                        </dl>
                                                    </td>
                                                </tr>

                                                 <tr>
                                                    <td v-for="nur_profile in nur_profiles" :key="nur_profile.id">
                                                        <div style="width:250px;"><span class="pseudolink" @click="monthlyCost(nur_profile.id)" data-toggle="modal" data-target=".bd-example-modal-cost"><i class="fa fa-search"></i>料金プランの詳細</span></div>
                                                    </td>
                                                </tr>

                                                 <tr>
                                                    <td v-for="nur_profile in nur_profiles" :key="nur_profile.id">
                                                        <dl>
                                                            <dt style="text-align:left;">入居条件</dt>
                                                            <dd style="width:250px">{{nur_profile.occupancy_condition }}</dd>
                                                        </dl>
                                                    </td>
                                                </tr>

                                                     <tr>
                                                        <td v-for="nur_profile in nur_profiles" :key="nur_profile.id">
                                                            <ul class="fac_container profile_wd">
                                                                <h6 style="text-align:left;font-weight:bold;">特長</h6>
                                                                <li v-for="feature in nur_profile.special" :key="feature.id">{{ feature.short_name }}</li>
                                                            </ul>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                    <td v-for="nur_profile in nur_profiles" :key="nur_profile.id" >
                                                        <dl>
                                                            <dt style="text-align:left;">定員</dt>
                                                            <dd v-if="nur_profile.capacity != null" style="width:250px;">{{nur_profile.capacity }} </dd>
                                                            <dd v-else style="width:250px;">-人</dd>
                                                        </dl>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td v-for="nur_profile in nur_profiles" :key="nur_profile.id">
                                                        <dl>
                                                            <dt style="text-align:left;">開設日</dt>
                                                            <dd style="width:250px;">{{nur_profile.date_of_establishment }}</dd>
                                                        </dl>
                                                    </td>
                                                </tr>

                                                </table>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="nav-box"  @click="moveCarousel(1)" :disabled="atEndOfList">
                                <div class="nav-content ml-2">
                                <div class="card-carousel--nav__right"></div>
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
      nur_profiles: [],
      modal_btn: false,

      local_sto: "",

      type: "nursing",

       iscompare: false,
                    markers: [{
                        position: {
                            lat: 0.0,
                            lng: 0.0
                        }
                    }],
                    center: {
                        lat: 0,
                        lng: 0
                    },
                    his_nus:'',
      address: '',
      access: '',
      custname: '',
      payment_name: [],
      specialfeature: [],
      currentOffset: 0,
      windowSize: 5,
      paginationFactor: 267,
    };
  },

  computed: {
                atEndOfList() {
                        return this.currentOffset <= (this.paginationFactor * -1) * (this.nur_profiles.length - this.windowSize);
                    },
                    atHeadOfList() {
                        return this.currentOffset === 0;
                    },
            },

  created() {
    this.local_sto = localStorage.getItem("nursing_history");
        if(this.local_sto){
            this.his_nus = this.local_sto.split(",").length;
        }

    this.getAllCustomer(this.local_sto);

    this.axios
      .get(`/api/profile/specialfeature/${this.type}`)
      .then(response => {
        this.specialfeature = response.data;
      });
  },

  methods: {

     moveCarousel(direction) {
    // Find a more elegant way to express the :style. consider using props to make it truly generic
        if (direction === 1 && !this.atEndOfList) {
            this.currentOffset -= this.paginationFactor;
        } else if (direction === -1 && !this.atHeadOfList) {
            this.currentOffset += this.paginationFactor;
        }
    },
   deleteLocalSto: function(id) {

            this.$swal({
            title: "確認",
            text: "削除よろしいでしょうか",
            type: "warning",
            width: 350,
            height: 200,
            showCancelButton: true,
            confirmButtonColor: "#dc3545",
            cancelButtonColor: "#b1abab",
            cancelButtonTextColor: "#000",
            confirmButtonText: "削除",
            cancelButtonText: "キャンセル",
            confirmButtonClass: "all-btn",
            cancelButtonClass: "all-btn"
        }).then(response => { 
            var l_sto = this.local_sto;
            var l_sto_arr = l_sto.split(",");
            var rm_id = id.toString();
            var index = l_sto_arr.indexOf(rm_id);
            if (index > -1) {
                l_sto_arr.splice(index, 1);
                $("#nus-his-local").html(l_sto_arr.length);
                if(l_sto_arr.length == 0){
                    $('.his-nursing-link-box>a').css({'cursor':'not-allowed','pointer-events':'none'})
                }
                else{
                    $('.his-nursing-link-box>a').css({'cursor':'pointer','pointer-events':'auto'})
                }
                var new_local = l_sto_arr.toString();
                localStorage.setItem('nursing_history', new_local);
                this.local_sto = localStorage.getItem("nursing_history");
                this.$swal({
              title: "削除された",
              text: "ファイルが削除されました。",
              type: "success",
              width: 350,
              height: 200,
              confirmButtonText: "はい",
              confirmButtonColor: "#dc3545"
            });
                if (this.local_sto) {
                    this.getAllCustomer(this.local_sto);
                } else {
                    // window.location.reload();
                    this.$router.push({
                        name: 'home',
                        params: {
                            page: 'subtab3'
                        }
                    });
                }
            }
         });
            
            
            if(this.local_sto){
                this.his_nus = this.local_sto.split(",").length;
            }
     
    },
    // changeRoute(){

    //     this.$router.push({name:'home', params: {page:'subtab3'}});

    // },

    getAllCustomer: function(local_storage) {
      this.axios

        .post("/api/nursing_history/" + local_storage)

        .then(response => {
          this.nur_profiles = response.data;
        });
    },

     googlemap: function(id) {
                        $('.googlecheck').css('display', 'block');
                        for (var i = 0; i < this.nur_profiles.length; i++) {
                            if (this.nur_profiles[i].id == id) {
                                this.address = this.nur_profiles[i].address;
                                this.access = this.nur_profiles[i].access;
                                this.markers[0]['position']['lat'] = this.nur_profiles[i].latitude;
                                this.markers[0]['position']['lng'] = this.nur_profiles[i].longitude;
                                this.center['lat'] = this.nur_profiles[i].latitude;
                                this.center['lng'] = this.nur_profiles[i].longitude;
                                this.custname = this.nur_profiles[i].name;
                            }
                        }
                    },
       monthlyCost: function(id) {
                        $('.costcheck').css('display', 'block');
                        for (var i = 0; i < this.nur_profiles.length; i++) {
                            if (this.nur_profiles[i].id == id) {
                                this.payment_name = this.nur_profiles[i].payment_method;
                            }
                        }
                    },
          imgUrlAlt(event) {
                event.target.src = "images/noimage.jpg"
            }


  }
};
</script>
