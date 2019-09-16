<template>
    <div class="col-12">

        <!--related news-->

        <div class="m-b-10 ads-card">

            <!--ads slider-->

            <!-- <div style="display: block; overflow: hidden;border-radius:0.25rem;">

                <div id="slider2_container" style="position: relative; float: left; top: 0px; left: 0px; width:167px; height:100%; overflow: hidden;">

                    <div data-u="slides" style="position: absolute; left: 0px; top: 0px; width: 167px; height: 100%; overflow: hidden;" class="side-ad-slider"> </div>

                </div>

            </div> -->
            <div class="row">
                <div class="col-12">
                    <carousel :data="data" :indicators="false" :interval="3000" direction="right"></carousel>
                </div>               
                
            </div>

            <!--end ads slider-->

        </div>

        <!-- <div class="card m-b-10 ads-card">

            <div class="card-body">

                <h5 class="card-title text-center">二つ目の広告</h5>

               

                <img src="/images/logo_japanese_horizontal.png" alt="" class="img-responsivie" style="width:100%">

            </div>

        </div> -->

        <div class="card m-b-10 ads-card2">

            <div class="card-body today">

                <ul id="menu" class="list-group list-group-flush"> </ul>

            </div>

        </div>

        <!-- end related news-->

    </div>
</template>

<script type="text/javascript">

export default {
    
   data() {
      return {
        data: [
          '<a href="/newsdetails/" class="aside-slide"><img data-u="image" class="img-fluid" src="/upload/advertisement/1.jpg" /><div class="side_slider_lbl"><p>多くの病院・医療施設からも高い評価をいただいております</p></div></a>',
          '<a href="/newsdetails/" class="aside-slide"><img data-u="image" class="img-fluid" src="/upload/advertisement/6.jpg" /><div class="side_slider_lbl"><p>title</p></div></a>',
          '<a href="/newsdetails/" class="aside-slide"><img data-u="image" class="img-fluid" src="/upload/advertisement/beauty.jpg" /><div class="side_slider_lbl"><p>日本病院薬剤師会が認定する感染制御専門薬剤師および感染制御認定薬剤師の英語名称は、理事会において、下記のとおりとすることで承認されました。</p></div></a>',          
         
        ],
      };
    },
    
    mounted() {
        },
        created() {
              axios.get("/api/get_latest_post_all_cat")
                .then(response => {
                    console.log(response.data);
                        var data = response.data;
                         var posts = "";
                        for (var i = 0; i < data.length; i++) {
                            posts += '<li class="list-group-item adslist-card"><a href="/newsdetails/'+data[i].id+'"><img class="img-responsivie ads-img" src="../upload/news/' + data[i].photo + '" /><h3 class="smallads-title">' + data[i].title + '</h3></li>';
                        }
                        $("#menu").html(posts);
                });
        },
        methods: {}
}

 $(document).ready(function() {   

    // $('.DataTable').DataTable();
    var csrf = "{{ csrf_token() }}";

    $.ajax({
        url: '/api/advertisement/ads',
        type: 'GET',
        data: {'_token': csrf},
        success: function( data ) {
            var top_ad = "";
            var side_ad = "";
            for (var i = 0; i < data.length; i++) {
                if(data[i].location.includes("topbar") ) {
                    top_ad += '<div class="list-group-item adslist-card"><a href="/newsdetails/'+data[i].id+'"><div class="slide-img"><img class="img-fluid ads-img" src="/upload/advertisement/' + data[i].photo + '" /></div><h3 class="smallads-title">' + data[i].title + '</h3></a></div>';
                    if(data[i].location.includes("sidebar")) {
                        side_ad += '<div><a href="/newsdetails/'+data[i].id+'"><img data-u="image" style="width:100%" src="/upload/advertisement/' + data[i].photo + '" /><div class="side_slider_lbl"><p>' + data[i].title + '</p></div></a></div>';
                    }
                } 
                else if(data[i].location.includes("sidebar"))  {
                    side_ad += '<div><a href="/newsdetails/'+data[i].id+'"><img data-u="image" style="width:100%" src="/upload/advertisement/' + data[i].photo + '" /><div class="side_slider_lbl"><p>'+ data[i].title +'</p></div></a></div>';
                }                
            }
            $(".top-ad-slider").html(top_ad);
            $(".side-ad-slider").html(side_ad);
            // jssor_slider2_init();
        }
    });
});       
</script>
<style>
 .aside-slide {
    align-items: center;
    background-color: #fff;
    color: #000;
    display: flex;
    font-size: 12px;
    justify-content: center;
    height: 8rem;
   
  }
</style>