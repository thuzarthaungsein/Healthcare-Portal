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

        <div class="col-12">
                <div v-for="hos_profile in hos_profiles" :key="hos_profile.id" class="card card-default m-b-20">
                        <div class="card-body news-post">
                                <div class="row">
                                        <div class="col-md-3" >
                                                <img class="col-md-12" v-bind:src="'/images/' + hos_profile.logo" alt="" style="">
                                                <button class="btn btn-danger all-btn" style="margin-top: 10px;margin-left: 15px;display:block;align:center;">最近見た施設から削除 </button>
                                                <button class="btn btn-info all-btn" style="margin-top: 10px; margin-left: 15px;">検討リストに追加</button>
                                        </div>
                                        <div class="col-md-9">
                                                <div class="col-sm-8 pad-free mb-2">
                                                        <h4> <a href="#"> {{hos_profile.name}} </a></h4>
                                                        <strong>Website  :</strong><a href=""> {{hos_profile.website}}</a><br/>
                                                        <a><strong>Medical Department    :</strong>{{hos_profile.medical_department}}</a><br/>
                                                        <a><strong>Logo     :</strong>{{hos_profile.logo}}</a><br/>
                                                        <a><strong>Phone    :</strong>{{hos_profile.phone}}</a><br/>
                                                        <a><strong>Access  :</strong>{{hos_profile.access}}</a><br/>
                                                        <a><strong>Email  :</strong>{{hos_profile.email}}</a><br/>
                                                        <a><strong>Details  :</strong>{{hos_profile.details_info}}</a><br/>
                                                        <a><strong>Subjects  :</strong>{{hos_profile.subject}}</a><br/>
                                                </div>
                                        </div>
                                </div>
                        </div>
                </div>
        </div>
        <pre> {{ hos_profiles }} </pre>
 </div>
</template>
<script>
export default {
        data() {
            return {
                hos_profiles: []
            }
        },
        created() {
                this.getAllCustomer();
        },
        methods: {
                getAllCustomer: function() {
                     this.axios
                        .get('http://localhost:8000/api/hospital_history')
                        .then(response => {
                                this.hos_profiles = response.data;
                        });
                }
        }

        
}

</script>
