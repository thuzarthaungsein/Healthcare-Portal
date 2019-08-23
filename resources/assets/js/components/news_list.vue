<template>
    <!-- Page Content  -->
    <div id="content">
        <div class="container">
            <div class="card card-default m-b-20">

                <div class="card-body">
                    <h4 class="main-color">ニュース役職の検索</h4>
                    <div class="row">
                        <div class="col-md-10">
                            <input type="text" class="form-control" placeholder="検索">
                        </div>
                        <div class="col-md-2">
                            <button class="btn secondary-bg-color all-btn white">検索</button>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-md-12 scroll2">
                <div v-for="newsList in news_list" :key="newsList.id" class="card card-default m-b-20">
                    <div class="card-body news-post">
                        <div class="row">
                            <div class="col-md-2">
                                <img src="/images/nursing1.jpg" class="col-md-12" alt="">
                            </div>
                            <div class="col-md-10">
                                <div class="col-sm-8 pad-free mb-2"><b>
                                    <router-link :to="{name: 'newdetails', params:{id:newsList.id}}" class="mr-auto">{{newsList.title}}</router-link>
                                    <!-- <router-link :to="{name: 'job_details', params:{id:news_list.id}}" class="mr-auto">{{news_list.title}}<router-link> -->
                                    <!-- <a href="../news/news_details.html" class="mr-auto">{{newsList.title}} </a> -->
                                    </b></div>
                                <p>{{newsList.main_point}}</p>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <small><router-link :to="{name: 'editPost', params: {id: newsList.id}}" class="mr-auto text-warning">編集</router-link></small> &nbsp;
                                        <small><a class="mr-auto text-danger" @click="deletePost(newsList.id)">削除</a></small>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- <div class="card card-default m-b-20">
                    <div class="card-body news-post">
                        <div class="row">
                            <div class="col-md-2">
                                <img src="/images/day1.jpg" class="col-md-12" alt="">
                            </div>
                            <div class="col-md-10">
                                <div class="col-sm-8 pad-free mb-2"><b><a href="../news/news_details.html" class="mr-auto">介護事業所、67%が「人手不足」と回答　悪化止まらず　ヘルパーは8割超 </a></b></div>
                                <p>「介護職員が足りない…」。そう感じている事業所が近年で最悪の67.2%にのぼっていることが、介護労働安定センターによる最新の実態調査で明らかにされた。 内訳は「大いに不足」が10.5%、「不足」が23.1%、「やや不足」が33.6%。「大いに不足」と「不足」の2つで3分の1を上回った。足りない要因では「採用が困難」が大多数を占めている。

                                </p>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <small><a href="" class="mr-auto text-warning">編集</a></small> &nbsp;
                                        <small><a href="" class="mr-auto text-danger">削除</a></small>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->

                <!-- <div class="card card-default m-b-20">
                    <div class="card-body news-post">
                        <div class="row">
                            <div class="col-md-2">
                                <img src="/images/day2.jpg" class="col-md-12" alt="">
                            </div>
                            <div class="col-md-10">
                                <div class="col-sm-8 pad-free mb-2"><b><a href="../news/news_details.html" class="mr-auto">『介護用おむつセンサー』8月20日開催の第２回介護事業者向け最新介護機器等展示交流・情報交換会に出展 </a></b></div>
                                <p>Lorem Ipsumは、紀元前45年に書かれたCiceroの（善と悪の極限）のセクション1.10.32と1.10.33から来ています。 この本は、ルネサンス時代に非常に人気のある、倫理理論に関する論文です。</p>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <small><a href="" class="mr-auto text-warning">編集</a></small> &nbsp;
                                        <small><a href="" class="mr-auto text-danger">削除</a></small>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
                <!-- <div class="card card-default m-b-20">
                    <div class="card-body news-post">
                        <div class="row">
                            <div class="col-md-2">
                                <img src="/images/day3.jpg" class="col-md-12" alt="">
                            </div>
                            <div class="col-md-10">
                                <div class="col-sm-8 pad-free mb-2"><b><a href="../news/news_details.html" class="mr-auto">[介護] ベトナムから12人の介護実習生が来日</a></b></div>
                                <p>医療事務、介護、保育サービスを提供する株式会社ソラストは4月24日、外国人技能実習制度に基づき、介護職種のベトナム人技能実習生（12人）の受け入れをスタートした。ベトナム人の実習生は、20歳代前半の女性9人、男性3人で、介護の仕事に就くことはもちろん、来日も初めてだという。</p>
                                <div class="row">
                                    <div class="col-sm-4">
                                        <small><a href="" class="mr-auto text-warning">編集</a></small> &nbsp;
                                        <small><a href="" class="mr-auto text-danger">削除</a></small>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </div>
    <!-- Page Content end  -->
</template>

<script>
export default {
       
        data() {
            return {
                news_list:[]
            }
        },
        created(){
            this.axios
                 .get('http://localhost:8000/api/news_list')
                 .then(response=>{
                     this.news_list = response.data;
                 });
        },
         methods: {
            deletePost(id) {
                if(confirm("Are you sure you want to delete?"))
                {
                     this.axios
                    .delete(`http://localhost:8000/api/new/delete/${id}`)
                    .then(response => {
                        alert('Delete Successfully!');
                        let i = this.news_list.map(item => item.id).indexOf(id); // find index of your object
                        this.news_list.splice(i, 1)
                    });
                }
               
            }
        }

    }
</script>