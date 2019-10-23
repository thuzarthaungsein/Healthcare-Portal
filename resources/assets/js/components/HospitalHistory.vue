<template>
    <div>

        <div class="col-12 scrolldiv2 pb-3 tab-content">
            <div class="col-12">
                <div class="col-md-12 fav-his-header">
                    <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 172 172" style=" fill:#000000;">
                        <g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal">
                            <path d="M0,172v-172h172v172z" fill="none"></path>
                            <g fill="#c40000">
                                <path d="M86,15.0472l-78.83333,70.9528h21.5v64.5h59.44694c-1.3545,-4.54367 -2.11361,-9.3525 -2.11361,-14.33333h-43v-63.14225l43,-38.6888l57.61328,51.66439h21.22006zM136.19466,100.24935c-19.78717,0 -35.83333,16.04617 -35.83333,35.83333c0,19.78717 16.04617,35.83333 35.83333,35.83333c19.78717,0 35.83333,-16.04617 35.83333,-35.83333c0,-19.78717 -16.04617,-35.83333 -35.83333,-35.83333zM150.89193,119.24382l10.02213,10.03613l-28.30274,28.30274l-21.13606,-21.13607l10.02213,-10.03613l11.11393,11.11393z"></path>
                            </g>
                        </g>
                    </svg>
                    &nbsp;<span class="font-weight-bold"> 最近見た施設</span>
                </div>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <router-link to="/">ホーム</router-link>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">病院の歴史</li>
                    </ol>
                </nav>
            </div>
            <label class="btn all-btn secondary-bg-color hos-btn2">
                <input type="checkbox" value="documentation" name="documentation" class="checkbox2"> <span class="checkmark"></span>すべての資料請求にチェックを入れる</label>
            <div class="col-12" style="margin-top: 20px;" id="fav-history-page">
                <div class="row">
                    <div class="card-carousel-wrapper">

                        <div class="card-carousel--nav__left" @click="moveCarousel(-1)" :disabled="atHeadOfList"></div>
                        <div class="card-carousel">
                            <div class="card-carousel--overflow-container">
                                <div class="card-carousel-cards col-3" :style="{ transform: 'translateX' + '(' + currentOffset + 'px' + ')'}">
                                    <div class="card-carousel--card">
                                        <div class="card-carousel--card--footer">

                                            <table class="table table-bordered">
                                                <tr>
                                                    <td v-for="hos_profile in hos_profiles" :key="hos_profile.id">
                                                        <img class="img-fluid" v-bind:src="'/images/' + hos_profile.logo" alt style="width: 250px" />
                                                        <br>
                                                        <br>

                                                        <router-link :to="{name: 'profile', params: {cusid:hos_profile.customer_id, type: 'hospital'}}">{{hos_profile.name}}</router-link>

                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td v-for="hos_profile in hos_profiles" :key="hos_profile.id">
                                                        <div style="width:250px;">
                                                            <button class="btn btn-danger all-btn hos-btn m-t-8 m-b-3" @click="deleteLocalSto(hos_profile.id)">最近見た施設から削除</button>
                                                            <label class="btn all-btn secondary-bg-color hos-btn">
                                                                <input type="checkbox" value="documentation" name="documentation" class="checkbox2"> <span class="checkmark"></span>資料請求</label>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td v-for="hos_profile in hos_profiles" :key="hos_profile.id">
                                                        <div style="width:250px;"> <a href="#" target="_blank">{{hos_profile.website}}</a></div>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td v-for="hos_profile in hos_profiles" :key="hos_profile.id">
                                                        <div style="width:250px;">{{hos_profile.medical_department}}</div>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td v-for="hos_profile in hos_profiles" :key="hos_profile.id">
                                                        <div style="width:250px;">{{hos_profile.phone}}</div>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td v-for="hos_profile in hos_profiles" :key="hos_profile.id">
                                                        <div style="width:250px;">{{hos_profile.access}}</div>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td v-for="hos_profile in hos_profiles" :key="hos_profile.id">
                                                        <div style="width:250px;">{{hos_profile.email}}</div>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td v-for="hos_profile in hos_profiles" :key="hos_profile.id">
                                                        <div style="width:250px;">{{hos_profile.subject}}</div>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td v-for="hos_profile in hos_profiles" :key="hos_profile.id">
                                                        <div style="width:250px;">{{hos_profile.township_name}}, {{hos_profile.city_name}}</div>
                                                    </td>
                                                </tr>

                                                <tr>
                                                    <td v-for="hos_profile in hos_profiles" :key="hos_profile.id">
                                                        <div style="width:250px;">
                                                            <ul class="fac_container">
                                                                <li v-for="feature in hos_profile.special_features" :key="feature.id">{{ feature.short_name }}</li>
                                                            </ul>
                                                        </div>
                                                    </td>
                                                </tr>
                                            </table>

                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card-carousel--nav__right" @click="moveCarousel(1)" :disabled="atEndOfList"></div>
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
                    specialfeature: [],
                    local_sto: "",
                    type: 'nursing',
                    specialfeature: [],
                    currentOffset: 0,
                    windowSize: 5,
                    paginationFactor: 267,
                };
            },
            computed: {
                atEndOfList() {
                        return this.currentOffset <= (this.paginationFactor * -1) * (this.hos_profiles.length - this.windowSize);
                    },
                    atHeadOfList() {
                        return this.currentOffset === 0;
                    },
            },
            created() {
                this.local_sto = localStorage.getItem("hospital_history");
                this.getAllCustomer(this.local_sto);
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
                    // changeRoute(){
                    //     this.$router.push({name:'home', params: {page:'subtab2'}});
                    // },
                    getAllCustomer: function(local_storage) {
                        this.axios
                            .post("/api/hospital_history/" + local_storage)
                            .then(response => {
                                console.log(response);
                                this.hos_profiles = response.data;
                            });
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
                                localStorage.setItem('hospital_history', new_local);
                                this.local_sto = localStorage.getItem("hospital_history");
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
            }
    };
</script>