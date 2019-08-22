<template>
<div>
        <div class="row justify-content-md-center">                                
                <div class="col-12">
                        <div class="card tab-card">
                                <div class="card-header tab-card-header">
                                        <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
                                                <li class="nav-item">
                                                        <a class="nav-link active" id="one-tab" data-toggle="tab" href="#one" role="tab" aria-controls="One" aria-selected="true">
                                                                ニュース 1</a>
                                                </li>
                                                <li class="nav-item">
                                                        <a class="nav-link" id="two-tab" data-toggle="tab" href="#two" role="tab" aria-controls="Two" aria-selected="false">
                                                                ニュース 2</a>
                                                </li>
                                                <li class="nav-item">
                                                        <a class="nav-link" id="three-tab" data-toggle="tab" href="#three" role="tab" aria-controls="Three" aria-selected="false">
                                                                ニュース 3</a>
                                                </li>
                                        </ul>
                                </div>

                                <div class="tab-content" id="myTabContent">
                                        <div class="tab-pane fade show active p-3" id="one" role="tabpanel" aria-labelledby="one-tab">

                                                <div class="row">
                                                        <div class="col-xl-4 col-sm-12 col-md-3 col-lg-3 col-12">
                                                                <a href="/newsdetails">
                                                                        <img src="/images/h4.jpg" alt="" style="width:100%" class="img-responsive">
                                                                        <p class="source-title" aria-label="">
                                                                                ニュースタイトル
                                                                        </p>
                                                                        <p class="source-subtitle">
                                                                                <img alt="" src="/images/5.png" class="source-img">日刊スポーツ
                                                                        </p>
                                                                </a>
                                                        </div>
                                                        <div class="col-xl-8 col-lg-6 col-md-6 col-sm-12 col-12 news-wrapper">
                                                                <ul class="list-group list-group-flush">
                                                                        <li class="list-group-item p-t-5 p-b-5">
                                                                                <a><router-link to="/job_details">
                                                                                        <img src="/images/1.jpg" alt="" style="width:16px; height: 16px;" class="img-responsive float-right">
                                                                                                <span class="source-img-small d-inline-block text-truncate">Lorem Ipsumは、印刷および植字業界の単なるダミーテキストです。 Lorem Ipsumは、1500年代以来、業界の標準的なダミーテキストであり、未知のプリンターがタイプのギャレーを取り、それをスクランブルしてタイプ見本帳を作成していました。 5世紀だけでなく、電子組版への飛躍も生き残り、本質的に変化していません。</span>
                                                                                </router-link></a>
                                                                        </li>
                                                                        <li class="list-group-item p-t-5 p-b-5">
                                                                                <a><router-link to="/newsdetails">
                                                                                        <img src="/images/2.png" alt="" style="width:16px; height: 16px;" class="img-responsive float-right">
                                                                                        <span class="source-img-small">日刊スポーツ</span>
                                                                                </router-link></a>
                                                                        </li>
                                                                        <li class="list-group-item p-t-5 p-b-5">
                                                                                <a ><router-link to="/facilitieslist">
                                                                                        <img src="/images/3.png" alt="" style="width:16px; height: 16px;" class="img-responsive float-right">
                                                                                        <span class="source-img-small">日刊スポーツ</span>
                                                                                </router-link></a>
                                                                        </li>

                                                                        <li class="list-group-item p-t-5 p-b-5">
                                                                                <a href="./news/news_details.html">
                                                                                        <img src="/images/4.png" alt="" style="width:16px; height: 16px;" class="img-responsive float-right">
                                                                                        <span class="source-img-small">日刊スポーツ</span>
                                                                                </a>
                                                                        </li>
                                                                        <li class="list-group-item p-t-5 p-b-5">
                                                                                <a href="./news/news_details.html">
                                                                                        <img src="/images/5.png" alt="" style="width:16px; height: 16px;" class="img-responsive float-right">
                                                                                        <span class="source-img-small">日刊スポーツ</span>
                                                                                </a>
                                                                        </li>
                                                                        <li class="list-group-item p-t-5 p-b-5">
                                                                                <a href="./news/news_details.html">
                                                                                        <img src="/images/h2.jpg" alt="" style="width:16px; height: 16px;" class="img-responsive float-right">
                                                                                        <span class="source-img-small">日刊スポーツ</span>
                                                                                </a>
                                                                        </li>
                                                                        <li class="list-group-item p-t-5 p-b-5">
                                                                                <a href="./news/news_details.html">
                                                                                        <img src="/images/news_search.png" alt="" style="width:16px; height: 16px;" class="img-responsive float-right">
                                                                                        <span class="source-img-small">日刊スポーツ</span>
                                                                                </a>
                                                                        </li>
                                                                        <li class="list-group-item p-t-5 p-b-5">
                                                                                <a href="./news/news_details.html">
                                                                                        <img src="/images/h1.jpg" alt="" style="width:16px; height: 16px;" class="img-responsive float-right">
                                                                                        <span class="source-img-small">日刊スポーツ</span>
                                                                                </a>
                                                                        </li>
                                                                        <li class="list-group-item p-t-5 p-b-5">
                                                                                <a href="./news/news_details.html">
                                                                                        <img src="/images/2.png" alt="" style="width:16px; height: 16px;" class="img-responsive float-right">
                                                                                        <span class="source-img-small">日刊スポーツ</span>
                                                                                </a>
                                                                        </li>
                                                                </ul>
                                                        </div>
                                                </div>

                                        </div>
                                        <div class="tab-pane fade p-3" id="two" role="tabpanel" aria-labelledby="two-tab">
                                                <div class="row">
                                                        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                                                                <a href="./news/news_details.html">
                                                                        <img src="/images/h9.jpg" alt="" style="width:100%" class="img-responsive">
                                                                        <p class="source-title" aria-label="">
                                                                                ニュースタイトル
                                                                        </p>
                                                                        <p class="source-subtitle">
                                                                                <img alt="" src="/images/5.png" class="source-img">日刊スポーツ
                                                                        </p>
                                                                </a>
                                                        </div>
                                                        <div class="col-xl-8 col-lg-6 col-md-6 col-sm-12 col-12 news-wrapper">
                                                                <ul class="list-group list-group-flush">
                                                                        
                                                                        <li class="list-group-item p-t-5 p-b-5">
                                                                                <a href="./news/news_details.html">
                                                                                        <img src="/images/3.png" alt="" style="width:16px; height: 16px;" class="img-responsive float-right">
                                                                                        <span class="source-img-small">日刊スポーツ</span>
                                                                                </a>
                                                                        </li>

                                                                        <li class="list-group-item p-t-5 p-b-5">
                                                                                <a href="./news/news_details.html">
                                                                                        <img src="/images/4.png" alt="" style="width:16px; height: 16px;" class="img-responsive float-right">
                                                                                        <span class="source-img-small">日刊スポーツ</span>
                                                                                </a>
                                                                        </li>
                                                                        <li class="list-group-item p-t-5 p-b-5">
                                                                                <a href="./news/news_details.html">
                                                                                        <img src="/images/5.png" alt="" style="width:16px; height: 16px;" class="img-responsive float-right">
                                                                                        <span class="source-img-small">日刊スポーツ</span>
                                                                                </a>
                                                                        </li>
                                                                        <li class="list-group-item p-t-5 p-b-5">
                                                                                <a href="./news/news_details.html">
                                                                                        <img src="/images/h2.jpg" alt="" style="width:16px; height: 16px;" class="img-responsive float-right">
                                                                                        <span class="source-img-small">日刊スポーツ</span>
                                                                                </a>
                                                                        </li>
                                                                        <li class="list-group-item p-t-5 p-b-5">
                                                                                <a href="./news/news_details.html">
                                                                                        <img src="/images/news_search.png" alt="" style="width:16px; height: 16px;" class="img-responsive float-right">
                                                                                        <span class="source-img-small">日刊スポーツ</span>
                                                                                </a>
                                                                        </li>
                                                                        <li class="list-group-item p-t-5 p-b-5">
                                                                                <a href="./news/news_details.html">
                                                                                        <img src="/images/h1.jpg" alt="" style="width:16px; height: 16px;" class="img-responsive float-right">
                                                                                        <span class="source-img-small">日刊スポーツ</span>
                                                                                </a>
                                                                        </li>
                                                                        <li class="list-group-item p-t-5 p-b-5">
                                                                                <a href="./news/news_details.html">
                                                                                        <img src="/images/2.png" alt="" style="width:16px; height: 16px;" class="img-responsive float-right">
                                                                                        <span class="source-img-small">日刊スポーツ</span>
                                                                                </a>
                                                                        </li>
                                                                </ul>
                                                        </div>
                                                </div>
                                                
                                        </div>
                                        <div class="tab-pane fade p-3" id="three" role="tabpanel" aria-labelledby="three-tab">
                                                <div class="row">
                                                        <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12 col-12">
                                                                <a href="./news/news_details.html">
                                                                        <img src="/images/h4.jpg" alt="" style="width:100%" class="img-responsive">
                                                                        <p class="source-title" aria-label="">
                                                                                ニュースタイトル
                                                                        </p>
                                                                        <p class="source-subtitle">
                                                                                <img alt="" src="/images/5.png" class="source-img">日刊スポーツ
                                                                        </p>
                                                                </a>
                                                        </div> 
                                                        <div class="col-xl-8 col-lg-6 col-md-6 col-sm-12 col-12 news-wrapper">
                                                                <ul class="list-group list-group-flush">
                                                                        <li class="list-group-item p-t-5 p-b-5">
                                                                                <a href="./news/news_details.html">
                                                                                        <img src="/images/1.jpg" alt="" style="width:16px; height: 16px;" class="img-responsive float-right">
                                                                                                <span class="source-img-small d-inline-block text-truncate">Lorem Ipsumは、印刷および植字業界の単なるダミーテキストです。 Lorem Ipsumは、1500年代以来、業界の標準的なダミーテキストであり、未知のプリンターがタイプのギャレーを取り、それをスクランブルしてタイプ見本帳を作成していました。 5世紀だけでなく、電子組版への飛躍も生き残り、本質的に変化していません。</span>
                                                                                </a>
                                                                        </li>
                                                                        <li class="list-group-item p-t-5 p-b-5">
                                                                                <a href="./news/news_details.html">
                                                                                        <img src="/images/1.jpg" alt="" style="width:16px; height: 16px;" class="img-responsive float-right">
                                                                                                <span class="source-img-small d-inline-block text-truncate">Lorem Ipsumは、印刷および植字業界の単なるダミーテキストです。 Lorem Ipsumは、1500年代以来、業界の標準的なダミーテキストであり、未知のプリンターがタイプのギャレーを取り、それをスクランブルしてタイプ見本帳を作成していました。 5世紀だけでなく、電子組版への飛躍も生き残り、本質的に変化していません。</span>
                                                                                </a>
                                                                        </li>
                                                                        <li class="list-group-item p-t-5 p-b-5">
                                                                                <a href="./news/news_details.html">
                                                                                        <img src="/images/1.jpg" alt="" style="width:16px; height: 16px;" class="img-responsive float-right">
                                                                                                <span class="source-img-small d-inline-block text-truncate">Lorem Ipsumは、印刷および植字業界の単なるダミーテキストです。 Lorem Ipsumは、1500年代以来、業界の標準的なダミーテキストであり、未知のプリンターがタイプのギャレーを取り、それをスクランブルしてタイプ見本帳を作成していました。 5世紀だけでなく、電子組版への飛躍も生き残り、本質的に変化していません。</span>
                                                                                </a>
                                                                        </li>
                                                                        <li class="list-group-item p-t-5 p-b-5">
                                                                                <a href="./news/news_details.html">
                                                                                        <img src="/images/2.png" alt="" style="width:16px; height: 16px;" class="img-responsive float-right">
                                                                                        <span class="source-img-small">日刊スポーツ</span>
                                                                                </a>
                                                                        </li>
                                                                        <li class="list-group-item p-t-5 p-b-5">
                                                                                <a href="./news/news_details.html">
                                                                                        <img src="/images/3.png" alt="" style="width:16px; height: 16px;" class="img-responsive float-right">
                                                                                        <span class="source-img-small">日刊スポーツ</span>
                                                                                </a>
                                                                        </li>

                                                                        <li class="list-group-item p-t-5 p-b-5">
                                                                                <a href="./news/news_details.html">
                                                                                        <img src="/images/4.png" alt="" style="width:16px; height: 16px;" class="img-responsive float-right">
                                                                                        <span class="source-img-small">日刊スポーツ</span>
                                                                                </a>
                                                                        </li>
                                                                        <li class="list-group-item p-t-5 p-b-5">
                                                                                <a href="./news/news_details.html">
                                                                                        <img src="/images/5.png" alt="" style="width:16px; height: 16px;" class="img-responsive float-right">
                                                                                        <span class="source-img-small">日刊スポーツ</span>
                                                                                </a>
                                                                        </li>
                                                                        <li class="list-group-item p-t-5 p-b-5">
                                                                                <a href="./news/news_details.html">
                                                                                        <img src="/images/5.png" alt="" style="width:16px; height: 16px;" class="img-responsive float-right">
                                                                                        <span class="source-img-small">日刊スポーツ</span>
                                                                                </a>
                                                                        </li>
                                                                        <li class="list-group-item p-t-5 p-b-5">
                                                                                <a href="./news/news_details.html">
                                                                                        <img src="/images/h2.jpg" alt="" style="width:16px; height: 16px;" class="img-responsive float-right">
                                                                                        <span class="source-img-small">日刊スポーツ</span>
                                                                                </a>
                                                                        </li>
                                                                        <li class="list-group-item p-t-5 p-b-5">
                                                                                <a href="./news/news_details.html">
                                                                                        <img src="/images/news_search.png" alt="" style="width:16px; height: 16px;" class="img-responsive float-right">
                                                                                        <span class="source-img-small">日刊スポーツ</span>
                                                                                </a>
                                                                        </li>
                                                                        <li class="list-group-item p-t-5 p-b-5">
                                                                                <a href="./news/news_details.html">
                                                                                        <img src="/images/h1.jpg" alt="" style="width:16px; height: 16px;" class="img-responsive float-right">
                                                                                        <span class="source-img-small">日刊スポーツ</span>
                                                                                </a>
                                                                        </li>
                                                                        <li class="list-group-item p-t-5 p-b-5">
                                                                                <a href="./news/news_details.html">
                                                                                        <img src="/images/2.png" alt="" style="width:16px; height: 16px;" class="img-responsive float-right">
                                                                                        <span class="source-img-small">日刊スポーツ</span>
                                                                                </a>
                                                                        </li>
                                                                </ul>
                                                        </div>
                                                </div>
                                                
                                        </div>
                                </div>
                        </div>
                </div>
                                               
                <div class="row m-lr-0">
                        <div class="row col-md-12 text-center m-lr-0"><h4 class="h_4 next-title">関連ニュース</h4></div>
                        <div class="col-sm-3  col-md-3 mt-2">
                                <div class="hovereffect fit-image">
                                        <img class="img-responsive fit-image" src="images/j5.jpg" alt="">
                                        <div class="overlay">
                                                <h2></h2>
                                                <a class="btn btn-sm all-btn secondary-bg-color" href="/newsdetails">詳細を見る</a>
                                        </div>
                                        <div class="info">
                                                <div class="row">
                                                        <div class="col-12">
                                                                <p class=" p_3">
                                                                        一般的な信念に反して、単なるランダムテキストではありません。
                                                                        紀元前45年からの古典的なラテン文学の一部にルーツがあり、2ンプデン・
                                                                </p>
                                                        </div>
                                                </div>
                                        </div>
                                </div>
                        </div>
                        <div class="col-sm-3  col-md-3 mt-2">
                                <div class="hovereffect fit-image">
                                        <img class="img-responsive fit-image" src="images/day1.jpg" alt="">
                                        <div class="overlay">
                                                <h2></h2>
                                                <a class="btn btn-sm all-btn secondary-bg-color" href="/newsdetails">詳細を見る</a>
                                        </div>
                                        <div class="info">
                                                <div class="row">
                                                        <div class="col-12">
                                                                <p class=" p_3">
                                                                        一般的な信念に反して、単なるランダムテキストではありません。
                                                                        紀元前45年からの古典的なラテン文学の一部にルーツがあり、2ンプデン・
                                                                </p>
                                                        </div>
                                                </div>
                                        </div>
                                </div>
                        </div>
                        <div class="col-sm-3  col-md-3 mt-2">
                                <div class="hovereffect fit-image">
                                        <img class="img-responsive fit-image" src="images/hhh.jpg" alt="">
                                        <div class="overlay">
                                                <h2></h2>
                                                <a class="btn btn-sm all-btn secondary-bg-color" href="/newsdetails">詳細を見る</a>
                                        </div>
                                        <div class="info">
                                                <div class="row">
                                                        <div class="col-12">
                                                                <p class=" p_3">
                                                                        一般的な信念に反して、単なるランダムテキストではありません。
                                                                        紀元前45年からの古典的なラテン文学の一部にルーツがあり、2ンプデン・
                                                                </p>
                                                        </div>
                                                </div>
                                        </div>
                                </div>
                        </div>
                        <div class="col-sm-3  col-md-3 mt-2">
                                <div class="hovereffect fit-image">
                                        <img class="img-responsive fit-image" src="images/home2.jpg" alt="">
                                        <div class="overlay">
                                                <h2></h2>
                                                <a class="btn btn-sm all-btn secondary-bg-color" href="/newsdetails">詳細を見る</a>
                                        </div>
                                        <div class="info">
                                                <div class="row">
                                                        <div class="col-12">
                                                                <p class=" p_3">
                                                                        一般的な信念に反して、単なるランダムテキストではありません。
                                                                        紀元前45年からの古典的なラテン文学の一部にルーツがあり、2ンプデン・
                                                                </p>
                                                        </div>
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
    mounted() {
            console.log('Component mounted.')
        //     $(document).ready(function() {
        //            // jssor_1_slider_init();   
        //             $('.nav-tabs').scrollingTabs({
        //             bootstrapVersion: 4  
        //           });                   

        //         });
        }
}
</script>
<style scoped>
div.tab-card-header > .card-header-tab > .nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active {   
    color: #fff !important;
    font-weight: bold;
    background-color: #1aa985  !important;
    border-top: 1px solid #1aa985  ;
    border-color: #1aa985   #1aa985  #1aa985   #1aa985  !important;
   
}
div.tab-card-header > .card-header-tab > .nav-tabs .nav-link {
    border: 1px solid #1aa985  !important;
}
</style>


