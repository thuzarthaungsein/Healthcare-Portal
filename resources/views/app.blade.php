<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>{{ config('app.name', 'Laravel') }}</title>

<!-- Scripts -->
<script src="{{ asset('js/app.js') }}" defer></script>
<script src="{{ asset('js/myJs.js') }}" defer></script>

<link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/css/select2.min.css" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.8/js/select2.min.js"></script>
<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<!-- Fonts -->
<link rel="dns-prefetch" href="//fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

<!-- Styles -->
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<link href="{{ asset('css/mystyle.css') }}" rel="stylesheet">
<link href="{{ asset('css/all.css') }}" rel="stylesheet">
<link href="{{ asset('css/jquery.scrolling-tabs.min.css') }}" rel="stylesheet">
    <style>
        .bg-light {
            background-color: #eae9e9 !important;
        }
    </style>
<!-- link for editor -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-bs4.css" rel="stylesheet">
<!-- end link for editor -->
</head>
<body>
<div id="app">
<div class="col-md-10 offset-md-1 main-content pad-free">

  <!--navigation bar-->
  <nav class="navbar navbar-expand-lg navbar-dark main-header" style="padding-right: 0px;">
  <a class="navbar-brand" href="#"><img src="images/trust_growth.png" alt=""></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <form class="form-inline my-2 my-lg-0 col-lg-10 container-fluid form-inline">
      <input class="form-control col-lg mr-sm-3 d-flex p-2 form-control" type="search" placeholder="検索" aria-label="検索">
      <button class="btn btn my-2 my-sm-0 all-btn secondary-bg-color btn-secondary" type="submit"><i class="fas fa-search"></i> 検索</button>
    </form>
    <ul class="navbar-nav mr-auto col-lg-2 pad-free">
    @guest
        <li class="nav-item btn login-register-btn col-lg-6 p-lr-0">
            <a class="nav-link pad-free" href="{{ route('login') }}">{{ __('事業者 ログイン') }}</a>
        </li>
        <li class="nav-item btn login-register-btn col-lg-6">
            <a class="nav-link pad-free" href="{{ route('register') }}">{{ __('事業者 登録') }}</a>
        </li>
    @else
    <li class="nav-item btn login-register-btn col-lg-6">
            <a class="nav-link" href="#!">{{ Auth::user()->name }}</a>
        </li>
        
    @endguest      
    </ul>
  </div>
  </nav>
  <!--end navigation bar-->

  <!--sidebar-->

  <!--end sidebar -->     
<div class="sidebar-scroll container-fluid">
	<div class="row">
  <div class="col-2 pad-free custom-sidebar">
    <ul class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
      @guest
      <!-- public menu -->
      <div class="userview-sidebar" style="padding-top: 35%;padding-left: 25px;">
          <div class="card m-b-10 ads-card">
              <div><img src="/images/ad_1.jpg" alt="" class="img-responsivie" style="width: 100%;"></div></div> 
              <div class="card m-b-10 ads-card"><div class="card-body"><h5 class="card-title text-center">二つ目の広告</h5> <img src="/images/logo_japanese_horizontal.png" alt="" class="img-responsivie" style="width: 100%;"></div></div> <div class="card m-b-10 ads-card2"><div class="card-body"></div></div></div>
      @else
      <!-- login menu  -->
      <div class="adminview-sidebar">
      <li><router-link to="/home" class="nav-link"><i class="fa fa-home"></i>  ホーム</router-link></li>
      
      @can('role-list')      
      <li><router-link to="/news_list" class="nav-link"><i class="fa fa-newspaper"></i>&nbsp;&nbsp;  ニュース一覧</router-link></li>
      <li><router-link to="/customerlist" class="nav-link"><i class="fa fa-user"></i>&nbsp;&nbsp;  顧客一覧</router-link></li>
      <li><router-link to="/categorylist" class="nav-link"><i class="fa fa-file"></i>&nbsp;&nbsp;  カテゴ一覧</router-link></li>
      <li><router-link to="/facilitieslist" class="nav-link"><i class="fa fa-list"></i>&nbsp;&nbsp;  施設一覧</router-link></li>      
      @endcan

      @can('customer')
      <li><router-link to="/profile" class="nav-link"><i class="fa fa-map"></i>&nbsp;&nbsp;  マイページ</router-link></li>
      <li><router-link to="/joblist" class="nav-link"><i class="fa fa-edit"></i>&nbsp;&nbsp;  仕事一覧</router-link></li>
      @endcan

      @can('role-list')
      <li><router-link to="/advertisement" class="nav-link"><i class="fa fa-globe"></i>&nbsp;&nbsp;  広告</router-link></li>
      @endcan

      <li>
        <a class="nav-link" id="v-pills-settings-tab" data-toggle="pill" href="{{ route('logout') }}" 
        onclick="event.preventDefault();
        document.getElementById('logout-form').submit();"
        role="tab" aria-controls="v-pills-settings" aria-selected="false"><i class="fa fa-sign-out-alt"></i>&nbsp;&nbsp;
      
            {{ __('ログアウト') }}
        
        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
        </a>
      </li>
      </div>
      @endguest
     
      </ul>
  </div>

  <div class="col-10 pad-free">
    <div class="maintab-content" id="v-pills-tabContent">
      <!--section one-->
      <section>
        <div class="container-fluid main-wrapper">
        
        <!--slider for ads-->
        <div class="col-md-auto">
        <!--jssor carousel-->
        <div id="jssor_1" style="position:relative;margin:0 auto;top:0px;left:0px;width:1115pxpx;height:100px;overflow:hidden;visibility:hidden;margin-bottom:10px;">
        <!-- Loading Screen -->
        <div data-u="loading" class="jssorl-009-spin" style="position:absolute;top:0px;left:0px;width:100%;height:100%;text-align:center;background-color:rgba(0,0,0,0.7);">
            <img style="margin-top:-19px;position:relative;top:50%;width:38px;height:38px;" src="images/spin.svg" />
        </div>
        <div data-u="slides" style="cursor:default;position:relative;top:0px;left:0px;width:980px;height:120px;overflow:hidden;">
            <div>
                <img data-u="image" src="/images/day2.jpg" />
            </div>
            <div>
                <img data-u="image" src="/images/day3.jpg" />
            </div>
            <div>
                <img data-u="image" src="/images/day4.jpg" />
            </div>
            <div>
                <img data-u="image" src="/images/day5.jpg" />
            </div>
            <div>
                <img data-u="image" src="/images/day4.jpg" />
            </div>
            <div>
                <img data-u="image" src="/images/hospital1.jpg" />
            </div>
            <div>
                <img data-u="image" src="/images/hospital3.jpg" />
            </div>
            <div>
                <img data-u="image" src="/images/hospital4.jpg" />
            </div>
            <div>
                <img data-u="image" src="/images/hospital5.jpg" />
            </div>
            <div>
                <img data-u="image" src="/images/h5.jpg" />
            </div>
            <div>
                <img data-u="image" src="/images/home1.jpg" />
            </div>
            <div>
                <img data-u="image" src="/images/h7.jpg" />
            </div>
        </div>
        <!-- Bullet Navigator -->
        <!-- <div data-u="navigator" class="jssorb057" style="position:absolute;bottom:12px;right:12px;" data-autocenter="1" data-scale="0.5" data-scale-bottom="0.75">
            <div data-u="prototype" class="i" style="width:16px;height:16px;">
                <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                    <circle class="b" cx="8000" cy="8000" r="5000"></circle>
                </svg>
            </div>
        </div> -->
        <!-- Arrow Navigator -->
        <!-- <div data-u="arrowleft" class="jssora073" style="width:50px;height:50px;top:0px;left:30px;" data-autocenter="2" data-scale="0.75" data-scale-left="0.75">
            <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                <path class="a" d="M4037.7,8357.3l5891.8,5891.8c100.6,100.6,219.7,150.9,357.3,150.9s256.7-50.3,357.3-150.9 l1318.1-1318.1c100.6-100.6,150.9-219.7,150.9-357.3c0-137.6-50.3-256.7-150.9-357.3L7745.9,8000l4216.4-4216.4 c100.6-100.6,150.9-219.7,150.9-357.3c0-137.6-50.3-256.7-150.9-357.3l-1318.1-1318.1c-100.6-100.6-219.7-150.9-357.3-150.9 s-256.7,50.3-357.3,150.9L4037.7,7642.7c-100.6,100.6-150.9,219.7-150.9,357.3C3886.8,8137.6,3937.1,8256.7,4037.7,8357.3 L4037.7,8357.3z"></path>
            </svg>
        </div>
        <div data-u="arrowright" class="jssora073" style="width:50px;height:50px;top:0px;right:30px;" data-autocenter="2" data-scale="0.75" data-scale-right="0.75">
            <svg viewbox="0 0 16000 16000" style="position:absolute;top:0;left:0;width:100%;height:100%;">
                <path class="a" d="M11962.3,8357.3l-5891.8,5891.8c-100.6,100.6-219.7,150.9-357.3,150.9s-256.7-50.3-357.3-150.9 L4037.7,12931c-100.6-100.6-150.9-219.7-150.9-357.3c0-137.6,50.3-256.7,150.9-357.3L8254.1,8000L4037.7,3783.6 c-100.6-100.6-150.9-219.7-150.9-357.3c0-137.6,50.3-256.7,150.9-357.3l1318.1-1318.1c100.6-100.6,219.7-150.9,357.3-150.9 s256.7,50.3,357.3,150.9l5891.8,5891.8c100.6,100.6,150.9,219.7,150.9,357.3C12113.2,8137.6,12062.9,8256.7,11962.3,8357.3 L11962.3,8357.3z"></path>
            </svg>
        </div> -->
        </div>
        <!--end jssor slider-->
      </div>    
      <!--end slider for ads-->
           
      <div class="row justify-content-md-center">           
        <div class="col-10 tab main-wrap"> 
          <!-- vue component -->
              <router-view></router-view>
          <!-- vue component -->

      <!-- <div class="tab-pane fade" id="v-pills-messages" role="tabpanel" aria-labelledby="v-pills-messages-tab">three</div>
      <div class="tab-pane fade" id="v-pills-settings" role="tabpanel" aria-labelledby="v-pills-settings-tab">four</div> -->
      </div>
      
      <div class="col-2">
                <!--related news-->
                <div class="card m-b-10 ads-card">
                        <div class="">
                                <!-- <h5 class="card-title text-center">一つ目の広告</h5> -->
                                <!-- <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6> -->
                                <img src="/images/ad_1.jpg" alt="" class="img-responsivie" style="width:100%">
                        </div>
                </div>
                <div class="card m-b-10 ads-card">
                        <div class="card-body">
                                <h5 class="card-title text-center">二つ目の広告</h5>
                                <!-- <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6> -->
                                <img src="/images/logo_japanese_horizontal.png" alt="" class="img-responsivie" style="width:100%">
                        </div>
                </div>
                <div class="card m-b-10 ads-card2">
                        <div class="card-body">
                                <ul class="list-group list-group-flush" v-for="latest_post_all_cat in latest_post_all_cats" :key="latest_post_all_cat.id">
                                        <li class="list-group-item"><a href="#">
                                                <img v-bind:src="'/images/' + latest_post_all_cat.photo" alt="" class="img-responsivie ads-img">
                                                <h3 class="ads-title text-truncate" style="ma"> eee </h3>
                                                <span class="source-wrapper">
                                                        <span class="subtitle"> eeee</span>
                                                </span>
                                        </a></li>
                                </ul>                                                       
                        </div>
                </div>
                <!-- end related news-->
            </div>
    </div>
            
          </div>
          <div class="container-fluid footer footer-div">
                <span>Copyright©Management Partners Corp.All Rights Reserved. </span>
        </div>
        </div>
        
        
      </section>
       <!--end section one-->
      
  </div>
</div>
</div>
<!-- END LEFT SIDEBAR -->      
    </div>
</div>
<script src="{{ mix('js/app.js') }}" type="text/javascript"></script>
  <!-- script for editor -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.12/summernote-bs4.js"></script>
  <!-- end script for editor -->

<script src="{{ asset('js/jssor.slider-27.5.0.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/jquery.scrolling-tabs.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('js/custom.js') }}" type="text/javascript"></script>
<script type="text/javascript">
 $(document).ready(function() {
    jssor_1_slider_init();                 


});
</script>
</body>
</html>