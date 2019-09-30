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
        <div class="row m-lr-0">
                        <div class="row col-md-12 text-center m-lr-0"><h4 class="h_4 next-title">関連ニュース</h4></div>
                          <div v-if="!this.customers.length"  class="col-sm-3  col-md-3 mt-2" style="padding-top:30px; height:700px; text-align:center ">
                           
                          No record data 
                          
                        </div>
                        <div v-else class="col-sm-3  col-md-3 mt-2" v-for="customer in customers" :key="customer.id">
                                <div class="hovereffect fit-image">
                                        <!-- <img v-bind:src="'/images/' + latest_post_all_cat.photo" class="source-img img-responsive" style="width:100%;height:80%" > -->
                                        <img class="img-responsive fit-image" v-bind:src="'/images/' + customer.logo" alt="">
                                        <div class="overlay">
                                                <h2></h2>
                                                <span class="btn btn-sm all-btn secondary-bg-color" @click="goProfile()">Profile</span>
                                        </div>
                                        <div class="info">
                                                <div class="row">
                                                        <div class="col-12">
                                                                <p class=" p_3">
                                                                        {{ customer.name }}
                                                                </p>
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
                customers: []
            }
        },
        created() {
                this.getAllCustomer();
        },
        methods: {
                getAllCustomer: function() {
                     this.axios
                        .get('/api/customers')
                        .then(response => {
                                this.customers = response.data;
                        });
                },
                goProfile() {
                        // console.log("Go");
                }
        }
}
</script>
