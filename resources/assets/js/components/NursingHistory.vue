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

        <div class=" col-12 scrolldiv2">
                <div v-for="nur_profile in nur_profiles" :key="nur_profile.id" class="card card-default m-b-20 scrolldiv">
                        <div class="card-body news-post">
                                <div class="row">
                                        <div class="col-md-3" >
                                                <img class="col-md-12" v-bind:src="'/images/' + nur_profile.logo" alt="" style="">
                                                <button class="btn btn-danger all-btn" style="margin-top: 10px;margin-left: 15px;display:block;align:center;width: 200px;">最近見た施設から削除 </button>
                                                <button class="btn btn-info all-btn" style="margin-top: 10px; margin-left: 15px;width: 200px;">検討リストに追加</button>
                                        </div>
                                        <div class="col-md-5">
                                                <div class="pad-free mb-2 ">
                                                        <h4> <a href="#"> {{nur_profile.name}} </a></h4>
                                                        <strong>Website  :</strong><a href=""> {{nur_profile.website}}</a><br/>
                                                        <a><strong>Location    :</strong>{{nur_profile.township_name}}, {{nur_profile.city_name}}</a><br/>
                                                        <a><strong>Phone    :</strong>{{nur_profile.phone}}</a><br/>
                                                        <a><strong>Access  :</strong>{{nur_profile.access}}</a><br/>
                                                        <a><strong>Email  :</strong>{{nur_profile.email}}</a><br/>
                                                        <a><strong>Occupancy Condition  :</strong>{{nur_profile.occupancy_condition}}</a><br/>
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
 </div>
</template>
<script>
export default {
        data() {
            return {
                nur_profiles: []
            }
        },
        created() {
                this.getAllCustomer();
        },
        methods: {
                getAllCustomer: function() {
                     this.axios
                        .get('/api/nursing_history')
                        .then(response => {
                                this.nur_profiles = response.data;
                        });
                }
        }

        
}

</script>