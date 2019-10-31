<template>
    <div class="col-12 scrolldiv2 pb-3 tab-content" id="hospital">
        <div class="col-12 pl-0">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <router-link to="/">ホーム</router-link>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">病院のお気に入り</li>
                </ol>
            </nav>
        </div>
        <div class="col-12">
            <div class="col-md-12 fav-his-header">
                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 172 172" style=" fill:#000000;">
                    <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal">
                        <path d="M0,172v-172h172v172z" fill="none"></path>
                        <g id="original-icon" fill="#c40000" opacity="0" visibility="hidden">
                            <path d="M50.16667,78.83333h107.5v14.33333h-107.5zM50.16667,35.83333h107.5v14.33333h-107.5zM50.16667,121.83333h107.5v14.33333h-107.5zM21.5,75.25c-5.93706,0 -10.75,4.81294 -10.75,10.75c0,5.93706 4.81294,10.75 10.75,10.75c5.93706,0 10.75,-4.81294 10.75,-10.75c0,-5.93706 -4.81294,-10.75 -10.75,-10.75zM21.5,118.25c-5.93706,0 -10.75,4.81294 -10.75,10.75c0,5.93706 4.81294,10.75 10.75,10.75c5.93706,0 10.75,-4.81294 10.75,-10.75c0,-5.93706 -4.81294,-10.75 -10.75,-10.75zM21.5,32.25c-5.93706,0 -10.75,4.81294 -10.75,10.75c0,5.93706 4.81294,10.75 10.75,10.75c5.93706,0 10.75,-4.81294 10.75,-10.75c0,-5.93706 -4.81294,-10.75 -10.75,-10.75z"></path>
                        </g>
                        <g id="subtracted-icon" fill="#c40000">
                            <path d="M50.16667,78.83333h107.5l0,10.81336c-1.5126,0.69131 -2.92913,1.65951 -4.17264,2.90462l-0.6155,0.61535h-102.71186zM50.16667,35.83333h107.5v14.33333h-107.5zM50.16667,121.83333h24.29256c-1.88479,4.7147 -1.16582,10.22759 2.1569,14.33333h-26.44946zM32.25,86c0,5.93706 -4.81294,10.75 -10.75,10.75c-5.93706,0 -10.75,-4.81294 -10.75,-10.75c0,-5.93706 4.81294,-10.75 10.75,-10.75c5.93706,0 10.75,4.81294 10.75,10.75zM32.25,129c0,5.93706 -4.81294,10.75 -10.75,10.75c-5.93706,0 -10.75,-4.81294 -10.75,-10.75c0,-5.93706 4.81294,-10.75 10.75,-10.75c5.93706,0 10.75,4.81294 10.75,10.75zM32.25,43c0,5.93706 -4.81294,10.75 -10.75,10.75c-5.93706,0 -10.75,-4.81294 -10.75,-10.75c0,-5.93706 4.81294,-10.75 10.75,-10.75c5.93706,0 10.75,4.81294 10.75,10.75zM123.60062,122.43755l-0.6045,-0.60422l1.20887,0z"></path>
                        </g>
                        <g>
                            <g id="Filled_3_" fill="#c40000">
                                <path d="M123.60062,162.99169l-35.82908,-35.82908l10.13652,-10.13652l25.69256,25.69256l40.02993,-40.02993l10.13652,10.13652z"></path>
                            </g>
                            <g id="Filled_3_" fill="#000000" opacity="0">
                                <path d="M183.90358,122.96087l-50.16644,50.16644c-2.79579,2.80295 -6.46615,4.20085 -10.13652,4.20085c-3.67037,0 -7.34073,-1.39789 -10.13652,-4.20085l-35.82908,-35.82908c-5.59874,-5.59874 -5.59874,-14.67429 0,-20.27304l10.13652,-10.13652c5.59157,-5.59874 14.68146,-5.59874 20.27304,0l15.55604,15.54887l29.89341,-29.88624c5.59157,-5.59874 14.68146,-5.59874 20.27304,0l10.13652,10.13652c5.59874,5.59874 5.59874,14.67429 0,20.27304z"></path>
                            </g>
                        </g>
                    </g>
                </svg>
                &nbsp; <span class="font-weight-bold">お気に入りリスト</span>
            </div>
        </div>
        <div class="row m-0">

            <form @submit.prevent="add" class="col-md-12 pad-free">
                <div class="col-12" style="margin-top: 20px;" id="fav-history-page">
                    <div class="row">
                        <div class="card-carousel-wrapper">

                            <div class="nav-box"  @click="moveCarousel(-1)" :disabled="atHeadOfList">
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
                                                        <td v-for="hos_profile in fav_hospital" :key="hos_profile.id">
                                                            <img class="profile_wd m-b-15" v-bind:src="'/images/' + hos_profile.logo" alt  />
                                                            <br>
                                                            <router-link :to="{name: 'profile', params: {cusid:hos_profile.customer_id, type: 'hospital'}}" class="pseudolink">{{hos_profile.name}}</router-link>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td v-for="hos_profile in fav_hospital" :key="hos_profile.id">
                                                            <p class="profile_wd">
                                                                <button class="btn btn-danger all-btn hos-btn m-t-8 m-b-3" @click="deleteLocalSto(hos_profile.id)">お気に入りリストから削除</button>
                                                            </p>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td v-for="hos_profile in fav_hospital" :key="hos_profile.id" style="word-wrap: break-word;">
                                                            <div class="profile_wd"> <a :href="hos_profile.website" target="_blank" class="profile_wd">{{hos_profile.website}}</a></div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td v-for="hos_profile in fav_hospital" :key="hos_profile.id">
                                                            <dl>
                                                                <dt style="text-align:left;">住所</dt>
                                                                <dd>{{hos_profile.township_name}} {{hos_profile.city_name}}</dd>
                                                            </dl>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td v-for="hos_profile in fav_hospital" :key="hos_profile.id">
                                                            <dl>
                                                                <dt style="text-align:left;">交通アクセス</dt>
                                                                <dd class="profile_wd" v-html="hos_profile.access"></dd>
                                                            </dl>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td v-for="hos_profile in fav_hospital" :key="hos_profile.id">
                                                            <dl>
                                                                <dt style="text-align:left;">電話番号</dt>
                                                                <dd class="profile_wd">{{hos_profile.phone}}</dd>
                                                            </dl>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td v-for="hos_profile in fav_hospital" :key="hos_profile.id">
                                                            <div class="profile_wd">
                                                                <ul class="fac_container">
                                                                    <h6 style="text-align:left;font-weight:bold;">特長</h6>
                                                                    <li v-for="feature in hos_profile.special" :key="feature.id">{{ feature.short_name }}</li>
                                                                </ul>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td v-for="hos_profile in fav_hospital" :key="hos_profile.id">
                                                            <dl>
                                                                <dt style="text-align:left;">診療科目</dt>
                                                                <dd class="profile_wd" v-for="subject in hos_profile.sub" :key="subject.id">{{ subject.name }}</dd>
                                                            </dl>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td v-for="hos_profile in fav_hospital" :key="hos_profile.id">
                                                            <dl>
                                                                <dt style="text-align:left;">専門医</dt>
                                                                <dd v-if="hos_profile.specialist != null">{{hos_profile.specialist}}</dd>
                                                                <dd v-else>-</dd>
                                                            </dl>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td v-for="hos_profile in fav_hospital" :key="hos_profile.id">
                                                            <dl>
                                                                <dt style="text-align:left;">医療部</dt>
                                                                <dd class="profile_wd">{{hos_profile.medical_department}}</dd>
                                                            </dl>
                                                        </td>
                                                    </tr>                                                    
                                                    <tr>
                                                        <td v-for="hos_profile in fav_hospital" :key="hos_profile.id">
                                                            <dl>
                                                                <dt style="text-align:left;">診療時間</dt>
                                                            </dl>
                                                            <table class="table table-bordered">
                                                                <thead>
                                                                    <tr class="first-row">
                                                                        <th>日付</th>
                                                                        <th>午前</th>
                                                                        <th>午後</th>
                                                                    </tr>
                                                                </thead>
                                                                <tbody>
                                                                    <tr>
                                                                        <th class="second-row text-center">月</th>
                                                                        <td v-for="am in hos_profile.schedule_am" :key="am.id">{{am.mon}}</td>
                                                                        <td v-for="pm in hos_profile.schedule_pm" :key="pm.id">{{pm.mon}}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th class="second-row text-center">火</th>
                                                                        <td v-for="am in hos_profile.schedule_am" :key="am.id">{{am.tue}}</td>
                                                                        <td v-for="pm in hos_profile.schedule_pm" :key="pm.id">{{pm.tue}}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th class="second-row text-center">水</th>
                                                                        <td v-for="am in hos_profile.schedule_am" :key="am.id">{{am.wed}}</td>
                                                                        <td v-for="pm in hos_profile.schedule_pm" :key="pm.id">{{pm.wed}}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th class="second-row text-center">木</th>
                                                                        <td v-for="am in hos_profile.schedule_am" :key="am.id">{{am.thu}}</td>
                                                                        <td v-for="pm in hos_profile.schedule_pm" :key="pm.id">{{pm.thu}}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th class="second-row text-center">金</th>
                                                                        <td v-for="am in hos_profile.schedule_am" :key="am.id">{{am.fri}}</td>
                                                                        <td v-for="pm in hos_profile.schedule_pm" :key="pm.id">{{pm.fri}}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th class="second-row text-center">土</th>
                                                                        <td v-for="am in hos_profile.schedule_am" :key="am.id">{{am.sat}}</td>
                                                                        <td v-for="pm in hos_profile.schedule_pm" :key="pm.id">{{pm.sat}}</td>
                                                                    </tr>
                                                                    <tr>
                                                                        <th class="second-row text-center">日</th>
                                                                        <td v-for="am in hos_profile.schedule_am" :key="am.id">{{am.sun}}</td>
                                                                        <td v-for="pm in hos_profile.schedule_pm" :key="pm.id">{{pm.sun}}</td>
                                                                    </tr>
                                                                </tbody>
                                                            </table>
                                                        </td>
                                                    </tr>
                                                </table>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="nav-box" @click="moveCarousel(1)" :disabled="atEndOfList">
                                <div class="nav-content ml-2">
                                <div class="card-carousel--nav__right"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

</template>

<script>
    export default {

        data() {
                return {
                    errors: [],
                    fav_hospital: [],
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
                    type: 'nursing',
                    specialfeature: [],
                    currentOffset: 0,
                    windowSize: 5,
                    paginationFactor: 267,
                };
            },
            computed: {
                atEndOfList() {
                        return this.currentOffset <= (this.paginationFactor * -1) * (this.fav_hospital.length - this.windowSize);
                    },
                    atHeadOfList() {
                        return this.currentOffset === 0;
                    },
            },
            created() {
                this.local_sto = localStorage.getItem("hospital_fav");
                this.getAllFavourite(this.local_sto);
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
                        if (confirm("Are you sure you want to delete?")) {
                            alert('Delete Successfully!');
                            var l_sto = this.local_sto;
                            var l_sto_arr = l_sto.split(",");
                            var rm_id = id.toString();
                            var index = l_sto_arr.indexOf(rm_id);
                            if (index > -1) {
                                l_sto_arr.splice(index, 1);
                                var new_local = l_sto_arr.toString();
                                localStorage.setItem('hospital_fav', new_local);
                                this.local_sto = localStorage.getItem("hospital_fav");
                                if (this.local_sto) {
                                    this.getAllFavourite(this.local_sto);
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
                        }

                    },
                    getAllFavourite: function(local_storage) {
                        this.axios
                            .post('/api/favHospital/' + local_storage)
                            .then(response => {
                                console.log(response.data);
                                this.fav_hospital = response.data;
                            });
                    },
            }
    };
</script>
<style>
    .first-row {
        color: #fff;
        background-color: #a2a7a1;
        border-bottom: 1px solid #ccc;
        border-right: 1px solid #ccc;
        text-align: center;
        padding: 10px;
        font-size: 100%;
    }
    
    .second-row {
        background-color: #eff7ec;
    }
</style>