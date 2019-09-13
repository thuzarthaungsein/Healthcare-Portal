<template>
    <div class="row">
        <div class="col-12">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="../index.html">ホーム</a></li>
                    <li class="breadcrumb-item"><a href="../news/news_details.html"> 新しい詳細</a></li>
                    <li class="breadcrumb-item active" aria-current="page">
                        就職活動リスト</li>
                </ol>
            </nav>
        </div>

  
            <button class="btn btn my-2 my-sm-0 all-btn secondary-bg-color btn-secondary">
                <input type="checkbox" class="select_all" />
                <span class="checkmark"></span>すべての見学予約・資料請求にチェックを入れる</button>
            <!-- <input type="checkbox" class="select_all" /> Select all -->
            <div v-for="nur_profile in fav_nursing" :key="nur_profile.id" class="card card-default m-b-20 scrolldiv m-t-20">
                <div class="card-body news-post">
                    <div class="row">
                        <div class="col-md-3">
                            <img class="col-md-12" v-bind:src="'/images/' + nur_profile.logo" alt="" style="">
                            <button class="btn btn-danger all-btn" @click="removeFav(nur_profile.customer_id)" style="margin-top: 10px;margin-left: 15px;display:block;align:center;width: 200px;">最近見た施設から削除 </button>
                            <br>
                            <button class="btn news-post-btn all-btn">
                                <input type="checkbox" class="checkbox" value="1">
                                <span class="checkmark"></span>見学予約</button>
                            <br>
                            <br>
                            <button class="btn btn my-2 my-sm-0 all-btn secondary-bg-color btn-secondary m-l-17">
                                <input type="checkbox" class="checkbox" value="2">
                                <span class="checkmark"></span>資料請求</button>

                        </div>
                        <div class="col-md-5">
                            <div class="pad-free mb-2 ">
                                <h4> <a href="#"> {{nur_profile.name}} </a></h4>
                                <strong>Website  :</strong><a href=""> {{nur_profile.website}}</a>
                                <br/>
                                <a><strong>Phone    :</strong>{{nur_profile.phone}}</a>
                                <br/>
                                <a><strong>Access  :</strong>{{nur_profile.access}}</a>
                                <br/>
                                <a><strong>Email  :</strong>{{nur_profile.email}}</a>
                                <br/>
                                <a><strong>Occupancy Condition  :</strong>{{nur_profile.occupancy_condition}}</a>
                                <br/>
                                <a><strong>Location    :</strong>{{nur_profile.township_name}}, {{nur_profile.city_name}}</a>
                                <br/>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="fac_container" v-for="feature in nur_profile.special_features" :key="feature.id">
                                <ul class="equipment">
                                    <li>{{ feature }}</li>
                                </ul>
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
                    errors: [],
                    fav_nursing: [],
                    local_sto: '',
                    post_list: [],
                    city_list: [],
                    post:'',
                    selectedCity: '',
                    zipStreet: '',
                    zipPref: '',
                    selectedValue: 0
                }
            },

            created() {
                this.axios.get('/api/hospital/postList')
                 .then(response=>{
                     
                     this.post_list = response.data;
                     //console.log(this.post_list); 
                    
                 });
                this.local_sto = localStorage.getItem("nursing_fav");
                this.getAllFavourite(this.local_sto);
                this.axios.get('/api/hospital/citiesList')
                .then(response=>{
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
                addDistributionGroup: function(){
                    var selectedId = this.post;
                     this.axios
                        .post('/api/hospital/selectedCity/'+selectedId)
                        .then(response => {
                            this.zipStreet = response.data[0].street;
                            this.zipPref = response.data[0].pref;
                            this.selectedValue = response.data[0].c_Id;
                        });
                   },
            }

    }
</script>