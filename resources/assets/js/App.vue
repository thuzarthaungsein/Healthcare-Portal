<template>

    <div class="col-md-10 offset-md-1">
       <nav class="navbar navbar-expand-lg navbar-dark main-header">
        <a class="navbar-brand" href="#"><img src="images/trust_growth.png" alt=""></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <form class="form-inline my-2 my-lg-0 col-lg-10 container-fluid form-inline">
            <input class="form-control col-lg mr-sm-3 d-flex p-2 form-control" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn my-2 my-sm-0 all-btn secondary-bg-color btn-secondary" type="submit"><i class="fas fa-search"></i> Search</button>
          </form>
          <ul class="navbar-nav mr-auto col-lg-2">
            <li class="nav-item active btn login-register-btn col-lg-6">
              <a href="/login" class="nav-item nav-link p-lr-0">サインイン</a>     
            </li>
            <li class="nav-item btn login-register-btn col-lg-6">
              <a href="/register" class="nav-item nav-link p-lr-0">Register</a> 
            </li>      
          </ul>

        </div>
      </nav>
      <section class="main-content">
        <div class="container-fluid main-wrapper">
         
          <ads></ads>        
           
          <div class="row justify-content-md-center">
            <div class="col-10 tab">
               <!--menu tabs-->
          
           <ul class="nav nav-tabs card-head-tabs" role="tablist">
            <li role="presentation" class="active subtab1 nav-item"><a href="#tab1" role="tab" data-toggle="tab" class="nav-link active"><i class="fas fa-home"></i>ホーム</a></li>
            <li role="presentation" class="subtab2 nav-item"><a href="#tab2" role="tab" data-toggle="tab" class="nav-link"><i class="fas fa-briefcase-medical"></i> 病院検索</a></li>
            <li role="presentation" class="subtab3 nav-item"><a href="#tab3" role="tab" data-toggle="tab" class="nav-link"><i class="fas fa-user-md"></i> 介護検索</a></li>
            <li role="presentation" class="subtab5 nav-item"><a href="#tab4" role="tab" data-toggle="tab" class="nav-link"><i class="fas fa-users"></i> 求人検索</a></li>
          </ul>
          <!--end menu tabs-->
         
          
               <!-- Tab panes -->
              <div class="tab-content tabs">
                
                <div role="tabpanel" class="tab-pane in active" id="tab1"> 
                   <!-- <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item active"><router-link to="/hospitalSearch" ><i class="fas fa-home"></i>   ホーム</router-link>
                      </li>
                    </ol>
                  </nav> -->
                 
                </div>
                <div role="tabpanel" class="tab-pane fade" id="tab2"><hospitalSearch></hospitalSearch></div>
                <div role="tabpanel" class="tab-pane fade" id="tab3"><nursingSearch></nursingSearch></div>
                <div role="tabpanel" class="tab-pane fade" id="tab4"><profile></profile></div>
                <!-- <div role="tabpanel" class="tab-pane fade" id="tab4"><jobSearch></jobSearch></div> -->
              </div>
            <!--end Tab panes-->                      
            </div>
            <div class="col-2">
                       <relatedNews></relatedNews>
            </div>
          </div>

        </div>
        
         <div class="container-fluid footer">
                <span>Copyright©Management Partners Corp.All Rights Reserved. </span>
        </div>
      </section>
    </div>


</template>

<script>
  import ads from './components/Ads.vue'
  import relatedNews from './components/Relatednews.vue'
  import hospitalSearch from './components/hospitalSearch.vue'
  import nursingSearch from './components/nursingSearch.vue'
  import jobSearch from './components/jobSearch.vue'
  import profile from './components/Profile.vue'
   export default {
    components: {
      relatedNews,
      hospitalSearch,
      nursingSearch,
      jobSearch,
      ads,
      profile
    },
     mounted() {
            console.log('Component mounted.')
            $(document).ready(function() {
                   // jssor_1_slider_init();   
                  //   $('.nav-tabs').scrollingTabs({
                  //   bootstrapVersion: 4  
                  // });                   

                });
        }
}
</script>
<style scoped>
/*for jssor*/
   /*jssor slider loading skin spin css*/
        .jssorl-009-spin img {
            animation-name: jssorl-009-spin;
            animation-duration: 1.6s;
            animation-iteration-count: infinite;
            animation-timing-function: linear;
        }

        @keyframes jssorl-009-spin {
            from { transform: rotate(0deg); }
            to { transform: rotate(360deg); }
        }

        /*jssor slider bullet skin 057 css*/
        .jssorb057 .i {position:absolute;cursor:pointer;}
        .jssorb057 .i .b {fill:none;stroke:#fff;stroke-width:2000;stroke-miterlimit:10;stroke-opacity:0.4;}
        .jssorb057 .i:hover .b {stroke-opacity:.7;}
        .jssorb057 .iav .b {stroke-opacity: 1;}
        .jssorb057 .i.idn {opacity:.3;}

        /*jssor slider arrow skin 073 css*/
        .jssora073 {display:block;position:absolute;cursor:pointer;}
        .jssora073 .a {fill:#ddd;fill-opacity:.7;stroke:#000;stroke-width:160;stroke-miterlimit:10;stroke-opacity:.7;}
        .jssora073:hover {opacity:.8;}
        .jssora073.jssora073dn {opacity:.4;}
        .jssora073.jssora073ds {opacity:.3;pointer-events:none;}

/*end for jssor*/




</style>
