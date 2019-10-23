<template>
   
    <div class="col-12 scrolldiv2 pb-3 tab-content">
        
        <div class="col-12">
            <div class="col-md-12 fav-his-header">
                <svg xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="24" height="24" viewBox="0 0 172 172" style=" fill:#000000;"><g fill="none" fill-rule="nonzero" stroke="none" stroke-width="1" stroke-linecap="butt" stroke-linejoin="miter" stroke-miterlimit="10" stroke-dasharray="" stroke-dashoffset="0" font-family="none" font-weight="none" font-size="none" text-anchor="none" style="mix-blend-mode: normal"><path d="M0,172v-172h172v172z" fill="none"></path><g id="original-icon" fill="#c40000" opacity="0" visibility="hidden"><path d="M50.16667,78.83333h107.5v14.33333h-107.5zM50.16667,35.83333h107.5v14.33333h-107.5zM50.16667,121.83333h107.5v14.33333h-107.5zM21.5,75.25c-5.93706,0 -10.75,4.81294 -10.75,10.75c0,5.93706 4.81294,10.75 10.75,10.75c5.93706,0 10.75,-4.81294 10.75,-10.75c0,-5.93706 -4.81294,-10.75 -10.75,-10.75zM21.5,118.25c-5.93706,0 -10.75,4.81294 -10.75,10.75c0,5.93706 4.81294,10.75 10.75,10.75c5.93706,0 10.75,-4.81294 10.75,-10.75c0,-5.93706 -4.81294,-10.75 -10.75,-10.75zM21.5,32.25c-5.93706,0 -10.75,4.81294 -10.75,10.75c0,5.93706 4.81294,10.75 10.75,10.75c5.93706,0 10.75,-4.81294 10.75,-10.75c0,-5.93706 -4.81294,-10.75 -10.75,-10.75z"></path></g><g id="subtracted-icon" fill="#c40000"><path d="M50.16667,78.83333h107.5l0,10.81336c-1.5126,0.69131 -2.92913,1.65951 -4.17264,2.90462l-0.6155,0.61535h-102.71186zM50.16667,35.83333h107.5v14.33333h-107.5zM50.16667,121.83333h24.29256c-1.88479,4.7147 -1.16582,10.22759 2.1569,14.33333h-26.44946zM32.25,86c0,5.93706 -4.81294,10.75 -10.75,10.75c-5.93706,0 -10.75,-4.81294 -10.75,-10.75c0,-5.93706 4.81294,-10.75 10.75,-10.75c5.93706,0 10.75,4.81294 10.75,10.75zM32.25,129c0,5.93706 -4.81294,10.75 -10.75,10.75c-5.93706,0 -10.75,-4.81294 -10.75,-10.75c0,-5.93706 4.81294,-10.75 10.75,-10.75c5.93706,0 10.75,4.81294 10.75,10.75zM32.25,43c0,5.93706 -4.81294,10.75 -10.75,10.75c-5.93706,0 -10.75,-4.81294 -10.75,-10.75c0,-5.93706 4.81294,-10.75 10.75,-10.75c5.93706,0 10.75,4.81294 10.75,10.75zM123.60062,122.43755l-0.6045,-0.60422l1.20887,0z"></path></g><g><g id="Filled_3_" fill="#c40000"><path d="M123.60062,162.99169l-35.82908,-35.82908l10.13652,-10.13652l25.69256,25.69256l40.02993,-40.02993l10.13652,10.13652z"></path></g><g id="Filled_3_" fill="#000000" opacity="0"><path d="M183.90358,122.96087l-50.16644,50.16644c-2.79579,2.80295 -6.46615,4.20085 -10.13652,4.20085c-3.67037,0 -7.34073,-1.39789 -10.13652,-4.20085l-35.82908,-35.82908c-5.59874,-5.59874 -5.59874,-14.67429 0,-20.27304l10.13652,-10.13652c5.59157,-5.59874 14.68146,-5.59874 20.27304,0l15.55604,15.54887l29.89341,-29.88624c5.59157,-5.59874 14.68146,-5.59874 20.27304,0l10.13652,10.13652c5.59874,5.59874 5.59874,14.67429 0,20.27304z"></path></g></g></g></svg>
                &nbsp; <span class="font-weight-bold">お気に入り</span>
            </div>
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <router-link to="/">ホーム</router-link>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">病院のお気に入り</li>
                </ol>
            </nav>
        </div>
        <div class="row m-0">
            
            <form @submit.prevent="add" class="col-md-12 pad-free">
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
                                                        <td v-for="hos_profile in fav_hospital" :key="hos_profile.id">
                                                            <img class="img-fluid" v-bind:src="'/images/' + hos_profile.logo" alt style="width: 250px" />
                                                            <br>
                                                            <br>

                                                            <router-link :to="{name: 'profile', params: {cusid:hos_profile.customer_id, type: 'hospital'}}" >{{hos_profile.name}}</router-link>

                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td v-for="hos_profile in fav_hospital" :key="hos_profile.id">
                                                            <div style="width:250px;">
                                                                <button class="btn btn-danger all-btn hos-btn m-t-8 m-b-3" @click="deleteLocalSto(hos_profile.id)">最近見た施設から削除</button>
                                                                <label class="btn all-btn secondary-bg-color hos-btn">
                                                                    <input type="checkbox" value="documentation" name="documentation" class="checkbox2"> <span class="checkmark"></span>資料請求</label>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td v-for="hos_profile in fav_hospital" :key="hos_profile.id">
                                                            <div style="width:250px;"> <a href="#" target="_blank">{{hos_profile.website}}</a></div>
                                                        </td>
                                                    </tr>
                                                    
                                                    <tr>
                                                        <td v-for="hos_profile in fav_hospital" :key="hos_profile.id">
                                                            <div style="width:250px;">{{hos_profile.medical_department}}</div>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td v-for="hos_profile in fav_hospital" :key="hos_profile.id">
                                                            <div style="width:250px;">{{hos_profile.phone}}</div>
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td v-for="hos_profile in fav_hospital" :key="hos_profile.id">
                                                            <div style="width:250px;">{{hos_profile.access}}</div>
                                                        </td>
                                                    </tr>

                                                     <tr>
                                                        <td v-for="hos_profile in fav_hospital" :key="hos_profile.id">
                                                            <div style="width:250px;">{{hos_profile.email}}</div>
                                                        </td>
                                                    </tr>

                                                      <tr>
                                                        <td v-for="hos_profile in fav_hospital" :key="hos_profile.id">
                                                            <div style="width:250px;">{{hos_profile.subject}}</div>
                                                        </td>
                                                    </tr>

                                                     <tr>
                                                        <td v-for="hos_profile in fav_hospital" :key="hos_profile.id">
                                                            <div style="width:250px;">{{hos_profile.township_name}}, {{hos_profile.city_name}}</div>
                                                        </td>
                                                    </tr>

                                                     <tr>
                                                        <td v-for="hos_profile in fav_hospital" :key="hos_profile.id">
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
               windowSize: 1,
               paginationFactor: 220,
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