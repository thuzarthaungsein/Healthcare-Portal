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
                    <div class="col-12 scrolldiv2 pb-5">
                        <div class="row col-12">
                            <div class="col-md-8">
                                <nav aria-label="breadcrumb">
                                    <ol class="breadcrumb">
                                        <li class="breadcrumb-item">
                                            <span @click="changeRoute()" class="link-span">介護検索</span>
                                        </li>
                                        <li class="breadcrumb-item active" aria-current="page">介護のお気に入り</li>
                                    </ol>
                                </nav>
                            </div>
                            <div class="col-md-4">
                                <div class="select_all float-right">
                                    <label class="btn btn my-2 my-sm-0 all-btn secondary-bg-color btn-secondary">
                                        <input type="checkbox" @change="checkAll()" class="check-all-btn" />
                                        <span class="checkmark"></span>すべての見学予約・資料請求にチェックを入れる
                                    </label>
                                </div>
                            </div>                       
                        </div>
                        <div class="row m-0">
                            <form @submit.prevent="add" class="col-md-12 pad-free">
                                <!-- <div class="d-flex justify-content-between">                                
                                    <div class="select_all">
                                        <label class="btn btn my-2 my-sm-0 all-btn secondary-bg-color btn-secondary">
                                            <input type="checkbox" @change="checkAll()" class="check-all-btn" />
                                            <span class="checkmark"></span>すべての見学予約・資料請求にチェックを入れる
                                        </label>
                                    </div>
                                </div> -->
                                <div class="row m-0">
                                    <div v-for="nur_profile in fav_nursing" :key="nur_profile.id" class="col-lg-12 pt-3 bd">
                                        <div class="row m-0">
                                            <h5 class="m-b-10 col-12 hos-tit">
                                                <router-link :to="{name: 'profile', params: {cusid:1, type: 'nursing'}}" >{{nur_profile.name}}</router-link>
                                            </h5>
                                            <div class="col-lg-2 col-md-12 mb-5">
                                                <div class="hos-img list-logo">
                                                    <img v-bind:src="'/images/' + nur_profile.logo" alt style />
                                                </div>
                                                <button class="btn btn-danger all-btn hos-btn" @click="deleteLocalSto(nur_profile.id)">最近見た施設から削除</button>
                                                <div class="row mt-2">
                                                    <div class="col-6">
                                                        <label class="btn news-post-btn all-btn hos-btn">
                                                            <input type="checkbox" class="checkbox1" name="reservation" v-model="reserv_status[nur_profile.id]" @change="checkSingle()"/>
                                                            <span class="checkmark"></span>見学予約
                                                        </label>
                                                    </div>
                                                    <div class="col-6">
                                                        <label class="btn all-btn secondary-bg-color hos-btn">
                                                            <input type="checkbox" class="checkbox2" value="documentation" name="documentation" v-model="document_status[nur_profile.id]" @change="checkSingle()"/>
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
                                            </div>
                                            <div class="col-lg-3 col-md-12">
                                                <ul class="fac_container">
                                                     <li v-for="feature in nur_profile.special_features" :key="feature.id">{{ feature.short_name }}</li>
                                                    <!-- <li v-for="special in specialfeature" :key="special.id">{{special.short_name}}</li> -->
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <span class="btn btn-success mt-5 float-right" @click="addingMail()">この内容で送信</span>
                            </form>
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
                    errors: [],
                    fav_nursing: [],
                    local_sto: "",
                    post_list: [],
                    city_list: [],
                    post: "",
                    selectedCity: "",
                    zipStreet: "",
                    zipPref: "",
                    selectedValue: 0,
                    fav_email: [],
                    arr_email: [],
                    reserv_status: [],
                    document_status: [],
                    type : 'nursing',
                    specialfeature:[]
                };
            },
            created() {
                $('.checkbox1').prop("checked", true);
                this.local_sto = localStorage.getItem("nursing_fav");
                this.getAllFavourite(this.local_sto);
                    
                // this.axios.get(`/api/profile/specialfeature/${this.type}`) .then(response => {
                //     this.specialfeature = response.data;
                // });
            },
            methods: {
                changeRoute(){
                    this.$router.push({name:'home', params: {page:'subtab3'}});
                },
                deleteLocalSto: function(id) {
                    if (confirm("Are you sure you want to delete?")) {
                        alert('Delete Successfully!');
                    }
                    var l_sto = this.local_sto;
                    var l_sto_arr = l_sto.split(",");
                    var rm_id = id.toString();
                    var index = l_sto_arr.indexOf(rm_id);
                    if (index > -1) {
                        l_sto_arr.splice(index, 1);
                        var new_local = l_sto_arr.toString();
                        localStorage.setItem('nursing_fav', new_local);
                        this.local_sto = localStorage.getItem("nursing_fav");
                        if (this.local_sto) {
                            this.getAllFavourite(this.local_sto);
                        } else {
                            window.location.reload();
                        }
                    }
                },
                getAllFavourite: function(local_storage) {
                    this.axios
                        .post('/api/nursing_fav/' + local_storage)
                        .then(response => {
                            this.fav_nursing = response.data;
                            for (var i = 0; i < this.fav_nursing.length; i++) {
                                var j = this.fav_nursing[i].id;
                                this.reserv_status[j] = true;
                            }
                            console.log('fav',this.fav_nursing)
                        });
                },
                addingMail() {
                    for (var i = 0; i < this.fav_nursing.length; i++) {
                        this.fav_email.push({
                            'id': this.fav_nursing[i]['id'],
                            'email': this.fav_nursing[i]['email'],
                            'name': this.fav_nursing[i]['name']
                        });
                    }
                    localStorage.setItem("reserve", JSON.stringify(this.reserv_status));
                    localStorage.setItem("document", JSON.stringify(this.document_status));
                    localStorage.setItem("item", JSON.stringify(this.fav_email));
                    this.$router.push({
                        name: 'nursingFavouriteMail',
                        // params: { favmail: this.fav_email},
                        // props: true
                    });
                },
                checkAll() {

                    if ($('.check-all-btn').is(":checked")) {
                        $('.checkbox1').prop("checked", true);
                        $('.checkbox2').prop("checked", true);
                    } else {
                        $('.checkbox1').prop("checked", false);
                        $('.checkbox2').prop("checked", false);
                    }
                    for (var i = 0; i < this.fav_nursing.length; i++) {
                        var j = this.fav_nursing[i].id;
                        if ($('.check-all-btn').is(":checked")) {
                            this.document_status[j] = true;
                            this.reserv_status[j] = true;
                        }
                        else{
                            this.document_status[j] = false;
                            this.reserv_status[j] = false;
                        }
                    }

                },
                checkSingle() {
                    for (var i = 0; i < this.fav_nursing.length; i++) {
                        var j = this.fav_nursing[i].id;
                        if (this.document_status[j] == true && this.reserv_status[j] == true)  {
                            $('.check-all-btn').prop("checked", true);
                        }
                        else if (this.document_status[j] == false && this.reserv_status[j] == false){
                            $('.check-all-btn').prop("checked", false);
                        }else{
                            $('.check-all-btn').prop("checked", false);
                        }
                    }
                }
            }
    };
</script>
