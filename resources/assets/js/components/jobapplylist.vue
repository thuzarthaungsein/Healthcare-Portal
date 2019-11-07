<template>

    <div class="row">

        <div class="col-12">

            <div class="row m-b-10">

                <!-- <div class="col-md-12">

          <router-link

            to="/joboffercreate"

            class="float-right main-bg-color create-btn all-btn"

            style="color: blue;">

            <i class="fas fa-plus-circle"></i> 新しい投稿を作成

          </router-link>

        </div> -->

            </div>

            <div class="col-md-12 col-md-12 tab-content tab-content1 tabs pad-free border-style">

                <div class="col-md-12 scrolldiv">

                    <!-- <h4 class="main-color m-b-10">検索</h4> -->

                    <!-- <div class="row">

                            <div class="col-md-12">

                                <div class="form-group row">

                                    <div class="col-12">

                                        <input type="text" class="form-control" placeholder="検索" id="search-item"/>

                                        <input type="hidden" class=form-contrl id="customer-id">

                                    </div>

                                </div>

                            </div>

                        </div> -->

                    <!-- <h4 class="header">求人応募一覧</h4> -->
                    <div v-if="this.jobapplies == ''" class="card card-default m-b-20 nocard-wrap">
                        <p class="nouser-ico">
                            <!-- <i class="fa fa-user-times"></i> -->
                            <img src="/images/user-male-30.png">
                        </p>
                        <!-- <img src="/images/user-male-30.png"> -->
                        <p class="nouser-txt01">応募者がありません。</p>

                        <div class="form-group mt-3 pb-5">
                            <router-link class="btn main-bg-color white all-btn btn_custom" to="/jobofferlist">求人採用一覧ページに進む</router-link>
                        </div>

                    </div>
                    <div class="container-fluid" v-else>
                        <h4 class="main-color m-b-10">求人応募検索</h4>
                        <div class="row">

                            <div class="col-md-12">

                                <div class="form-group row">

                                    <div class="col-12">

                                        <input type="text" class="form-control" placeholder="検索" id="search-item" />

                                        <input type="hidden" class=form-contrl id="customer-id">

                                    </div>

                                </div>

                            </div>

                        </div>
                        <h4 class="header">求人応募一覧</h4>

                        <table class="table table-hover custom-table">

                            <thead style="background-color:rgb(183, 218, 210);">

                                <tr>

                                    <th>姓</th>

                                    <th>名</th>

                                    <th>生年月日</th>

                                    <th>性別</th>

                                    <th>郵便番号</th>

                                    <th>街路住所</th>

                                    <th>自宅住所</th>

                                    <th>電話番号</th>

                                    <th>メールアドレス</th>

                                </tr>

                            </thead>

                            <tbody>

                                <tr v-for="jobapply in jobapplies" :key="jobapply.id">

                                    <th>{{jobapply.first_name}}</th>

                                    <th>{{jobapply.last_name}}</th>

                                    <th>{{jobapply.birthday}}</th>

                                    <th>{{jobapply.gender}}</th>

                                    <th>{{jobapply.postal}}</th>

                                    <th>{{jobapply.street_address}}</th>

                                    <th>{{jobapply.home_address}}</th>

                                    <th>{{jobapply.phone}}</th>

                                    <th>{{jobapply.email}}</th>

                                </tr>

                            </tbody>

                        </table>
                        <div class="form-group mt-3 pb-5">

                            <router-link class="btn main-bg-color white all-btn btn_custom" to="/jobofferlist">求人採用一覧ページに戻す</router-link>
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

                    jobapplies: [],

                };

            },

            created() {

                if (this.$route.params.id) {

                    this.axios.get(`/api/jobapplylist/` + this.$route.params.id).then(response => {

                        this.jobapplies = response.data;
                    });

                }

            }

    }
</script>
