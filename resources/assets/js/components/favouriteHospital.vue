<template>
    <div class="row m-0">
        <div class="col-12 scrolldiv2 pb-5">
            <form @submit.prevent="add" class="col-md-12">
                <div class="d-flex justify-content-between">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="/">ホーム</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">病院の歴史</li>
                        </ol>
                    </nav>
                </div>
                <div class="row m-0">
                    <div v-for="hos_profile in fav_hospital" :key="hos_profile.id" class="col-lg-12 pt-3 bd">
                        <div class="row m-0">
                            <h5 class="m-b-10 col-12 hos-tit">
                                <a href="#">{{hos_profile.name}}</a>
                            </h5>
                            <div class="col-lg-2 col-md-12 mb-5">
                                <div class="hos-img list-logo">
                                    <img v-bind:src="'/images/' + hos_profile.logo" alt style />
                                </div>
                                <button class="btn btn-danger all-btn hos-btn" @click="deleteLocalSto(hos_profile.id)">最近見た施設から削除</button>
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
                                            <strong>Occupancy Condition</strong>
                                        </p>
                                    </div>
                                    <div class="col-lg-9 col-md-8 col-sm-12">
                                        <p>{{hos_profile.occupancy_condition}}</p>
                                    </div>
                                </div>
                                <div class="row list-wrap">
                                    <div class="col-lg-3 col-md-4 col-sm-12">
                                        <p>
                                            <strong>Location</strong>
                                        </p>
                                    </div>
                                    <div class="col-lg-9 col-md-8 col-sm-12">
                                        <p>{{hos_profile.township_name}}, {{hos_profile.city_name}}</p>
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
                };
            },
            created() {
                this.axios.get('/api/hospital/postList')
                    .then(response => {
                        this.post_list = response.data; 
                    });
                this.local_sto = localStorage.getItem("hospital_fav");
                this.getAllFavourite(this.local_sto);
                this.axios.get('/api/hospital/citiesList')
                    .then(response => {
                        this.city_list = response.data;
                    });
            },
            methods: {
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
                        localStorage.setItem('hospital_fav', new_local);
                        this.local_sto = localStorage.getItem("hospital_fav");
                        if (this.local_sto) {
                            this.getAllFavourite(this.local_sto);
                        } else {
                            window.location.reload();
                        }
                    }
                },
                getAllFavourite: function(local_storage) {
                    this.axios
                        .post('/api/favHospital/' + local_storage)
                        .then(response => {
                            this.fav_hospital = response.data;
                        });
                },
            }
    };
</script>