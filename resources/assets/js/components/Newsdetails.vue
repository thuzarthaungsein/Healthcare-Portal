<template>  
<div>          
        <!-- <section class="">
                <div class="container-fluid"> -->
        <!-- <div class="row">
        <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="/home">ホーム</a></li>
                        <li class="breadcrumb-item"><a href="./search_news_result.html">新しい結果を検索</a></li>
                        <li class="breadcrumb-item active" aria-current="page"> 新しい詳細</li>
                </ol>
        </nav>
        </div> -->
        <div class="row justify-content-md-center">
                <div class="col-md-12">
                        <div class="">
                        <div>
                                <div class="row m-lr-0">
                                        <div class="col-md-12" >
                                                <h4 class="h_4 header">{{newdetails.title}}</h4>
                                                <p class="set-date"><time datetime="2012-01-04">{{newdetails.created_at}}</time></p>
                                        </div>
                                        <div class="col-md-6">
                                                <p class="p5">{{newdetails.body}}</p>
                                        </div>
                                        <div class="col-md-6  mt-2 related-area" >
                                                <img
                                                        :src="'/images/'+ newdetails.photo"
                                                        class="img-responsive img_2 news_photo"
                                                        > 
                                                <p class="img_2">東京五輪開幕まで1年　メダルお披露目 <br> <span><time datetime="2019-06-07">2019年6月7日</time></span></p> 

                                                <p class="img_2 header" style="font-size:22px;">関連ニュース</p>
                                                <!-- 関連ニュース -->
                                                <a href="#" style="color:#000;">
                                                        <p class="img_2">韓国人男女が日本総領事館に侵入し抗議　身柄を拘束 <br>
                                                        <span><time datetime="2012-01-04">2012年1月4日</time></span>
                                                        </p>                                                        
                                                </a>                                                
                                                <!-- 関連ニュース --> 

                                                <!-- 関連ニュース -->
                                                <a href="#" style="color:#000;">
                                                        <p class="img_2">動く美術館」都大路進む 京都・祇園祭の山鉾巡行 <br>
                                                        <span><time datetime="2012-01-04">2012年1月4日</time></span>
                                                        </p>                                                        
                                                </a>                                                
                                                <!-- 関連ニュース -->   

                                                <!-- 関連ニュース -->
                                                <a href="#" style="color:#000;">
                                                        <p class="img_2">警察学校教官がナイフで巡査刺す　犯人確保訓練中に <br>
                                                        <span><time datetime="2012-01-04">2012年1月4日</time></span>
                                                        </p>
                                                        
                                                </a>                                                
                                                <!-- 関連ニュース -->  
                                        </div>
                                </div>
                        </div>
                                        
                                       
                                        <!--related news-->
                                        <div class="row m-lr-0">
                                                <div class="row col-md-12 text-center"><h4 class="h_4 next-title">関連ニュース</h4></div>
                                                <div class="col-sm-3  col-md-3 mt-2">
                                                        <div class="hovereffect fit-image">
                                                                <img class="img-responsive fit-image"
                                                                        src="/images/day1.jpg"
                                                                        alt="">
                                                                <div class="overlay">
                                                                        <h2></h2>
                                                                        <a class="btn btn-sm all-btn secondary-bg-color"
                                                                                href="news_details.html">詳細を見る</a>
                                                                </div>
                                                                <div class="info">
                                                                        <div class="row">
                                                                                <div
                                                                                        class="col-12">
                                                                                        <p
                                                                                                class=" p_3">
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
                                                                <img class="img-responsive fit-image"
                                                                        src="/images/day1.jpg"
                                                                        alt="">
                                                                <div class="overlay">
                                                                        <h2></h2>
                                                                        <a class="btn btn-sm all-btn secondary-bg-color"
                                                                                href="news_details.html">詳細を見る</a>
                                                                </div>
                                                                <div class="info">
                                                                        <div class="row">
                                                                                <div
                                                                                        class="col-12">
                                                                                        <p
                                                                                                class=" p_3">
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
                                                                <img class="img-responsive fit-image"
                                                                        src="/images/day1.jpg"
                                                                        alt="">
                                                                <div class="overlay">
                                                                        <h2></h2>
                                                                        <a class="btn btn-sm all-btn secondary-bg-color"
                                                                                href="news_details.html">詳細を見る</a>
                                                                </div>
                                                                <div class="info">
                                                                        <div class="row">
                                                                                <div
                                                                                        class="col-12">
                                                                                        <p
                                                                                                class=" p_3">
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
                                                                <img class="img-responsive fit-image"
                                                                        src="/images/day1.jpg"
                                                                        alt="">
                                                                <div class="overlay">
                                                                        <h2></h2>
                                                                        <a class="btn btn-sm all-btn secondary-bg-color"
                                                                                href="news_details.html">詳細を見る</a>
                                                                </div>
                                                                <div class="info">
                                                                        <div class="row">
                                                                                <div
                                                                                        class="col-12">
                                                                                        <p
                                                                                                class=" p_3">
                                                                                                一般的な信念に反して、単なるランダムテキストではありません。
                                                                                                紀元前45年からの古典的なラテン文学の一部にルーツがあり、2ンプデン・
                                                                                        </p>
                                                                                </div>
                                                                        </div>
                                                                </div>
                                                        </div>
                                                </div>
                                        </div>
                                        <!--end related news-->
                </div>
        </div> 
        </div>
        <!-- </div>
        </section>  -->
        </div>
</template>
<script>
    export default {
       
        data() {
            return {
                newdetails:[]
            }
        },
        created(){
            this.axios
                 .get(`http://localhost:8000/api/newdetails/${this.$route.params.id}`)
                 .then(response=>{
                       
                     this.newdetails = response.data;
                       console.log(response.data);
                 });
        }
        

    }
</script>





