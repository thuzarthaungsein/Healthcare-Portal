<template>
    <div class="col-12 scrolldiv2 pb-5 tab-content">
        <div class="row col-12">
            <div class="col-md-12">
                <div class="col-md-12 fav-his-header">
                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g id="original-icon" fill="#c40000" opacity="0" visibility="hidden"><path d="M50.16667,78.83333h107.5v14.33333h-107.5zM50.16667,35.83333h107.5v14.33333h-107.5zM50.16667,121.83333h107.5v14.33333h-107.5zM21.5,75.25c-5.93706,0 -10.75,4.81294 -10.75,10.75c0,5.93706 4.81294,10.75 10.75,10.75c5.93706,0 10.75,-4.81294 10.75,-10.75c0,-5.93706 -4.81294,-10.75 -10.75,-10.75zM21.5,118.25c-5.93706,0 -10.75,4.81294 -10.75,10.75c0,5.93706 4.81294,10.75 10.75,10.75c5.93706,0 10.75,-4.81294 10.75,-10.75c0,-5.93706 -4.81294,-10.75 -10.75,-10.75zM21.5,32.25c-5.93706,0 -10.75,4.81294 -10.75,10.75c0,5.93706 4.81294,10.75 10.75,10.75c5.93706,0 10.75,-4.81294 10.75,-10.75c0,-5.93706 -4.81294,-10.75 -10.75,-10.75z"></path></g><g id="subtracted-icon" fill="#c40000"><path d="M50.16667,78.83333h107.5l0,10.81336c-1.5126,0.69131 -2.92913,1.65951 -4.17264,2.90462l-0.6155,0.61535h-102.71186zM50.16667,35.83333h107.5v14.33333h-107.5zM50.16667,121.83333h24.29256c-1.88479,4.7147 -1.16582,10.22759 2.1569,14.33333h-26.44946zM32.25,86c0,5.93706 -4.81294,10.75 -10.75,10.75c-5.93706,0 -10.75,-4.81294 -10.75,-10.75c0,-5.93706 4.81294,-10.75 10.75,-10.75c5.93706,0 10.75,4.81294 10.75,10.75zM32.25,129c0,5.93706 -4.81294,10.75 -10.75,10.75c-5.93706,0 -10.75,-4.81294 -10.75,-10.75c0,-5.93706 4.81294,-10.75 10.75,-10.75c5.93706,0 10.75,4.81294 10.75,10.75zM32.25,43c0,5.93706 -4.81294,10.75 -10.75,10.75c-5.93706,0 -10.75,-4.81294 -10.75,-10.75c0,-5.93706 4.81294,-10.75 10.75,-10.75c5.93706,0 10.75,4.81294 10.75,10.75zM123.60062,122.43755l-0.6045,-0.60422l1.20887,0z"></path></g><g><g id="Filled_3_" fill="#c40000"><path d="M123.60062,162.99169l-35.82908,-35.82908l10.13652,-10.13652l25.69256,25.69256l40.02993,-40.02993l10.13652,10.13652z"></path></g><g id="Filled_3_" fill="#000000" opacity="0"><path d="M183.90358,122.96087l-50.16644,50.16644c-2.79579,2.80295 -6.46615,4.20085 -10.13652,4.20085c-3.67037,0 -7.34073,-1.39789 -10.13652,-4.20085l-35.82908,-35.82908c-5.59874,-5.59874 -5.59874,-14.67429 0,-20.27304l10.13652,-10.13652c5.59157,-5.59874 14.68146,-5.59874 20.27304,0l15.55604,15.54887l29.89341,-29.88624c5.59157,-5.59874 14.68146,-5.59874 20.27304,0l10.13652,10.13652c5.59874,5.59874 5.59874,14.67429 0,20.27304z"></path></g></g></g></svg>
                    &nbsp; <span class="font-weight-bold">お気に入り</span>
                </div>
            </div>
            <div class="col-md-8">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <router-link to="/">ホーム</router-link>
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
                                <router-link :to="{name: 'profile', params: {cusid:nur_profile.customer_id, type: 'nursing'}}" >{{nur_profile.name}}</router-link>
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
                                            <strong>公式サイト</strong>
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
                                            <strong>電話番号</strong>
                                        </p>
                                    </div>
                                    <div class="col-lg-9 col-md-8 col-sm-12">
                                        <p>{{nur_profile.phone}}</p>
                                    </div>
                                </div>
                                <div class="row list-wrap">
                                    <div class="col-lg-3 col-md-4 col-sm-12">
                                        <p>
                                            <strong>交通アクセス</strong>
                                        </p>
                                    </div>
                                    <div class="col-lg-9 col-md-8 col-sm-12">
                                        <p>{{nur_profile.access}}</p>
                                    </div>
                                </div>
                                <div class="row list-wrap">
                                    <div class="col-lg-3 col-md-4 col-sm-12">
                                        <p>
                                            <strong>メールアドレス</strong>
                                        </p>
                                    </div>
                                    <div class="col-lg-9 col-md-8 col-sm-12">
                                        <p>{{nur_profile.email}}</p>
                                    </div>
                                </div>
                                <div class="row list-wrap">
                                    <div class="col-lg-3 col-md-4 col-sm-12">
                                        <p>
                                            <strong>入居条件</strong>
                                        </p>
                                    </div>
                                    <div class="col-lg-9 col-md-8 col-sm-12">
                                        <p>{{nur_profile.occupancy_condition}}</p>
                                    </div>
                                </div>
                                <div class="row list-wrap">
                                    <div class="col-lg-3 col-md-4 col-sm-12">
                                        <p>
                                            <strong>住所</strong>
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
</template>

<script>
    export default {       
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
                // changeRoute(){
                //     this.$router.push({name:'home', params: {page:'subtab3'}});
                // },
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