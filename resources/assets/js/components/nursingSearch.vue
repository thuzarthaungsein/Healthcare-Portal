<template>
<layout>
<div>
  <div class="col-md-12" style="border-bottom: 1px dashed #ff6117;padding-bottom: 10px; margin-bottom: 20px;">     
    <h5 class="font-weight-bold"><i class="fas fa-map" style="color:#ff6117;"></i>&nbsp;地図検索</h5>
  </div>
  <div class="search-map"  @mouseover="getStateHover">
    <div class="row" id="hos">
      <div class="col-md-12">
        <div>
        <div class="row map-wrap"  id="searchMap">
          <!-- search map and path -->  
            <div class="col-lg-5 col-md-12 col-sm-12 float-left" style="padding-left: 75px;">
            <h2 class="map-header">あなたらしい<br/>暮らしができる<br/> 老人ホームが <br/>見つかります。</h2>
            <!--search input-->
              <div class="wrap">
                <div class="search">
                    <input type="text" class="searchTerm" placeholder="地名、駅名、施設名などを入力（例：東京駅）">
                    <button type="submit" class="searchButton">    
                      <i class="fas fa-search"></i> 検索
                  </button>
                </div>
              </div> 
            <!--end search input-->          
            </div>
            <div class="col-lg-7 col-md-12 col-sm-12 float-right">
              <div class="divisions row" id="divisionswrap">
                <img src="/images/img_map1.png" alt="map" class="img-fluid" style="margin:0 auto;">
                <div class="col-sm-2 hokkaido-box">
                  <div class="mb-3">                    
                    <div class="division-box">
                      <ul class="hokkaido-wrap">    
                        <a href="#" data-info="Hokkaido" class="path Hokkaido card-text" @click="getStateClick">
                            <li class="spanclass" id="1">北海道</li> 
                        </a>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="col-sm-2 tohoku-box">   
                  <div class="mb-3">                    
                    <div class="division-box">
                      <ul class="multiple-boxa">    
                        <a href="#" data-info="Aomori" class="path Aomori card-text" @click="getStateClick">
                            <li class="spanclass" id="2">青森</li>
                        </a>
                        <a href="#" data-info="Iwate" class="path Iwate card-text" @click="getStateClick">
                            <li class="spanclass" id="3" >岩手</li>
                        </a>
                       
                        <a href="#" data-info="Akita" class="path Akita card-text" @click="getStateClick">
                            <li class="spanclass" id="5">秋田</li>
                        </a>                     
                        
                        <a href="#" data-info="Miyagi" class="path Miyagi card-text" @click="getStateClick">
                            <li class="spanclass" id="4">宮城</li>     
                        </a>                   
                       
                        <a  href="#" data-info="Yamagata" class="path Yamagata card-text" @click="getStateClick">
                            <li class="spanclass" id="6">山形</li>
                        </a>
                        <a href="#" data-info="Fukushima" class="path Fukushima card-text" @click="getStateClick">
                            <li class="spanclass" id="7">福島</li>
                        </a>
                      </ul>
                    </div>
                  </div>
                </div>

                <div class="col-sm-2 kanto-box">
                  <div class="mb-3">
                    <!-- <div class="card-header pad-10" style="background-color:#71d5cb">関東</div> -->
                    <div class="division-box">
                      <ul class="multiple-box">
                        <a href="#" data-info="Tokyo" class="path Tokyo card-text" @click="getStateClick">
                             <li class="spanclass" id="13" >東京</li>
                        </a>
                        
                        <a href="#" data-info="Kanagawa" class="path Kanagawa card-text" @click="getStateClick">
                            <li class="spanclass" id="14">神奈川</li>
                        </a>

                        <a href="#" data-info="Saitama" class="path Saitama card-text" @click="getStateClick">
                            <li class="spanclass" id="11" >埼玉</li>
                        </a>

                        
                        <a href="#" data-info="Chiba" class="path Chiba card-text" @click="getStateClick">
                            <li class="spanclass" id="12">千葉</li>
                        </a>                        
                         
                        <a href="#" data-info="Gunma" class="path Gunma card-text" @click="getStateClick">
                            <li class="spanclass" id="10">群馬</li>
                        </a>

                        <a href="#" data-info="Ibaraki" class="path Ibaraki card-text" @click="getStateClick">
                            <li class="spanclass" id="8" >茨城</li>
                        </a>                       
                      
                        <a href="#" data-info="Tochigi" class="path Tochigi card-text" @click="getStateClick">
                              <li class="spanclass" id="9">栃木</li>
                        </a> 
                        
                        <a href="#" data-info="Yamanashi" class="path Yamanashi card-text" @click="getStateClick">
                            <li class="spanclass" id="19">山梨</li>
                        </a>
                      </ul>
                    </div>
                  </div>
                </div>

                <div class="col-sm-3 hokuriku-box">
                  <div class="mb-3">
                    <!-- <div class="card-header pad-10" style="background-color:#75b777">北陸</div> -->
                    <div class="division-box">
                      <ul class="">
                        <a href="#" data-info="Niigata" class="path Niigata card-text" @click="getStateClick">
                            <li class="spanclass" id="15" >新潟</li>
                        </a>
                        
                        <a href="#" data-info="Nagano" class="path Nagano card-text" @click="getStateClick">
                            <li class="spanclass" id="20">長野</li>
                        </a>
                        
                          <a href="#" data-info="Toyama" class="path Toyama card-text" @click="getStateClick">
                            <li class="spanclass" id="16">富山</li>
                        </a>
                        
                        <a href="#" data-info="Ishikawa" class="path Ishikawa card-text" @click="getStateClick">
                            <li class="spanclass" id="17">石川</li>
                        </a>
                       
                        <a href="#" data-info="Fukui" class="path Fukui card-text" @click="getStateClick">
                             <li class="spanclass" id="18">福井</li>
                        </a>
                         
                      </ul>
                    </div>
                  </div>
                </div>

                <div class="col-sm-3 tokai-box">
                  <div class="mb-3">
                    <!-- <div class="card-header pad-10" style="background-color:#c0c743">東海甲信</div> -->
                    <div class="division-box">
                      <ul class="multiple-boxa">
                         
                        <a href="#" data-info="Aichi" class="path Aichi card-text" @click="getStateClick">
                              <li class="spanclass" id="23">愛知</li>
                        </a>
                       
                        
                        <a href="#" data-info="Shizuoka" class="path Shizuoka card-text" @click="getStateClick" >
                            <li class="spanclass" id="22">静岡</li>
                        </a>      
                         
                        <a href="#" id="21" data-info="Gifu" class="path Gifu card-text" @click="getStateClick">
                            <li class="spanclass" id="21">岐阜</li>
                        </a>                 
                       
                        <a href="#" data-info="Mie" class="path Mie card-text" @click="getStateClick">
                             <li class="spanclass"  id="24">三重</li>
                        </a>
                      </ul>
                    </div>
                  </div>
                </div>

                <div class="col-sm-4 kinki-box">
                  <div class="mb-3">
                    <!-- <div class="card-header pad-10" style="background:#efb838">近畿</div> -->
                    <div class="division-box">
                      <ul class="multiple-boxa">
                        
                        <a href="#" data-info="Osaka" class="path Osaka card-text" @click="getStateClick">
                            <li class="spanclass" id="27">大阪府</li>
                        </a>  
                       
                        <a href="#" data-info="Hyogo" class="path Hyogo card-text" @click="getStateClick">
                             <li class="spanclass" id="28">兵庫</li>
                        </a>   
                        
                        <a href="#" data-info="Kyoto" class="path Kyoto card-text" @click="getStateClick">
                            <li class="spanclass"  id="26">京都府</li>
                        </a>    
                        
                        <a href="#" data-info="Nara" class="path Nara card-text" @click="getStateClick">
                            <li class="spanclass"  id="29">奈良</li>
                        </a>               
                        
                        <a href="#" data-info="Shiga" class="path Shiga card-text" @click="getStateClick">
                              <li class="spanclass"  id="25">滋賀</li>
                        </a>  
                        
                        <a href="#" data-info="Wakayama" class="path Wakayama card-text" @click="getStateClick">
                            <li class="spanclass" id="30">和歌山</li>
                        </a>
                      </ul>
                    </div>
                  </div>
                </div>

                <div class="col-sm-3 chugoku-box">
                  <div class="mb-3">
                    <!-- <div class="card-header pad-10" style="background:#f58c3f;">中国</div> -->
                    <div class="division-box">
                      <ul class="">
                        
                        <a href="#" data-info="Okayama" class="path Okayama card-text" @click="getStateClick">
                             <li class="spanclass" id="33">岡山</li>
                        </a>
                        
                        <a href="#" data-info="Hiroshima" class="path Hiroshima card-text" @click="getStateClick">
                            <li class="spanclass" id="34">広島</li>
                        </a>
                        
                        <a href="#" data-info="Yamaguchi" class="path Yamaguchi card-text" @click="getStateClick">
                            <li class="spanclass" id="35">山口</li>
                        </a>
                        
                        <a href="#" data-info="Shimane" class="path Shimane card-text" @click="getStateClick">
                            <li class="spanclass" id="32">島根</li>
                        </a>        
                         
                        <a href="#" data-info="Tottori" class="path Tottori card-text" @click="getStateClick">
                            <li class="spanclass"  id="31">鳥取</li>
                        </a>               
                        
                        
                      </ul>
                    </div>
                  </div>
                </div>

                <div class="col-sm-3 shikoku-box">
                  <div class="mb-3">
                    <!-- <div class="card-header pad-10" style="background:#f1a296;">四国</div> -->
                    <div class="division-box">
                      <ul class="multiple-boxa">
                        
                        <a href="#" data-info="Tokushima" class="path Tokushima card-text" @click="getStateClick">
                            <li class="spanclass" id="36">徳島</li>
                        </a>
                        
                        <a href="#" data-info="Kagawa" class="path Kagawa card-text" @click="getStateClick">
                            <li class="spanclass" id="37">香川</li>
                        </a>
                        
                        <a href="#" data-info="Kochi" class="path Kochi card-text" @click="getStateClick">
                            <li class="spanclass" id="39">高知</li>
                        </a>
                        
                        <a href="#" data-info="Ehime" class="path Ehime card-text" @click="getStateClick">
                            <li class="spanclass" id="38">愛媛</li>
                        </a>
                        
                      </ul>
                    </div>
                  </div>
                </div>

                <div class="col-sm-2 kyushu-box">
                  <div class="mb-3">
                    <!-- <div class="card-header pad-10" style="background-color:#e77a72;">九州・沖縄</div> -->
                    <div class="division-box">
                      <ul class="">
                        
                        <a href="#" data-info="Fukuoka" class="path Fukuoka card-text" @click="getStateClick">
                          <li class="spanclass" id="40">福岡</li>
                        </a>
                        
                        <a href="#" data-info="Saga" class="path Saga card-text" @click="getStateClick">
                            <li class="spanclass" id="41">佐賀</li>
                        </a>
                       
                        <a href="#" data-info="Nagasaki" class="path Nagasaki card-text" @click="getStateClick"> 
                            <li class="spanclass" id="42">長崎</li>
                        </a>
                        
                        <a href="#" data-info="Oita" class="path Oita card-text" @click="getStateClick">
                            <li class="spanclass" id="44">大分</li>
                        </a>

                       <a href="#" data-info="Kumamoto" class="path Kumamoto card-text" @click="getStateClick"> 
                           <li class="spanclass" id="43">熊本</li>
                        </a>
                       
                        
                        <a href="#" data-info="Miyazaki" class="path Miyazaki card-text" @click="getStateClick">
                              <li class="spanclass" id="45">宮崎</li>
                        </a>

                        <a href="#" data-info="Kagoshima" class="path Kagoshima card-text" @click="getStateClick">
                            <li class="spanclass" id="46">鹿児島</li>
                        </a>
                        
                      </ul>
                    </div>
                  </div>
                </div>

                <div class="col-sm-2 okinawa-box">
                  <div class="mb-3">
                    <!-- <div class="card-header pad-10" style="background-color:#e77a72;">九州・沖縄</div> -->
                    <div class="division-box">
                      <ul class=""> 
                          <a href="#" data-info="Okinawa" class="path Okinawa card-text" @click="getStateClick">
                              <li class="spanclass" id="47">沖縄県</li>
                        </a>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- <div class="map">
            </div> -->
          
        </div>

        <!-- search city , township  -->
        <div class="row select" id="filter" style="justify-content:space-between">
          <h5 class="profile_header" style="border-left: 5px solid #ff9563;">現在の検索条件</h5>
          <div class="col-sm-5 col-md-5">
            <div><p class="nurs-sub-heading">地域で絞り込む</p></div>
            <div class="card search-border-dash">
              
              <div class="card-body">
                <select id="selectCity" class="form-control custom-select" @change="nursingSearchData(1);" style="background-color: #fff;" v-model="id">
                  <option  :value="city.id" v-for="city in cities" :key="city.id">{{city.city_name}}</option>
                </select>
                <select id="selectTownship" class="form-control mt-1 custom-select" style="background-color: #fff;" @change="nursingSearchData(2);" v-model="township_id">
                <option value="-1">▼市区町村</option>
                  <option  :value="selectTownship.id"  v-for="selectTownship in getTownships" :key="selectTownship.id">{{selectTownship.township_name}}</option>
                </select>
              </div>
            </div>
          </div>
          <div class="col-sm-5 col-md-5">
            <div><p class="nurs-sub-heading">料金で絞り込む</p></div>
            <div class="card search-border-dash">              
              <div class="card-body">
                <div class="">
                  <select name="" id="" class="form-control custom-select" style="background-color: #fff;" @change="nursingSearchData" v-model="moving_in">
                    <option data-price-type="" value="-1">▼入居一時金</option>
                    <!-- <option data-price-type="" value="0">一時金なし</option> -->
                    <option data-price-type="" value="50">50万円以下</option>
                    <option data-price-type="" value="100">100万円以下</option>
                    <option data-price-type="" value="200">200万円以下</option>
                    <option data-price-type="" value="300">300万円以下</option>
                    <option data-price-type="" value="400">400万円以下</option>
                    <option data-price-type="" value="500">500万円以下</option>
                    <option data-price-type="" value="600">600万円以下</option>
                    <option data-price-type="" value="700">700万円以下</option>
                    <option data-price-type="" value="800">800万円以下</option>
                    <option data-price-type="" value="900">900万円以下</option>
                    <option data-price-type="" value="1000">1,000万円以下</option>
                    <option data-price-type="" value="2000">2,000万円以下</option>
                    <option data-price-type="" value="3000">3,000万円以下</option>
                    <option data-price-type="more" value="3000">3,000万円以上</option>
                  </select>
                  <select name="" id="" class="form-control  mt-1 custom-select" style="background-color: #fff;" @change="nursingSearchData" v-model="per_month">
                    <option data-price-type="" value="-1">▼月額利用料</option>
                    <option data-price-type="" value="10">10万円以下</option>
                    <option data-price-type="" value="12">12万円以下</option>
                    <option data-price-type="" value="14">14万円以下</option>
                    <option data-price-type="" value="16">16万円以下</option>
                    <option data-price-type="" value="18">18万円以下</option>
                    <option data-price-type="" value="20">20万円以下</option>
                    <option data-price-type="" value="22">22万円以下</option>
                    <option data-price-type="" value="24">24万円以下</option>
                    <option data-price-type="" value="26">26万円以下</option>
                    <option data-price-type="" value="28">28万円以下</option>
                    <option data-price-type="" value="30">30万円以下</option>
                    <option data-price-type="" value="35">35万円以下</option>
                    <option data-price-type="" value="40">40万円以下</option>
                    <option data-price-type="" value="45">45万円以下</option>
                    <option data-price-type="" value="50">50万円以下</option>
                    <option data-price-type="more" value="50">50万円以上</option>
                  </select>
                </div>
              </div>
            </div>
          </div>

          <div class="col-sm-2 col-md-2 align-self-center">
            <span class="btn seemore-btn select" style="width:100%;padding:20px 10px;" id="showSearchMap" @click="showSearchMap"><i class="fas fa-exchange-alt"></i>&nbsp;都道府県を再選択する</span>
          </div>
        </div>
      </div>
        <!-- google map  -->
        <section id="holder" >
        <div class="row" >
          <div class="col-sm-12 col-md-12">
          <div style="position: relative;">
              <div class="overlay standard hidden">&nbsp;</div>
              
              <div id="mymap" class="select m-t-10 m-b-10"></div>
            
          </div>
          </div>
        </div>
        </section>
       
        <!-- nursing list -->
       <div id="nursing-search"> 
        <div class="row">
          <div class="card-carousel-wrapper col-12">
            <div class="nav-box" @click="moveCarousel(-1)" :disabled="atHeadOfList">
              <div class="nav-content mr-2">
                  <div class="card-carousel--nav__left"></div>
              </div>
            </div>
            <div class="card-carousel">
              <div class="card-carousel--overflow-container">
                <div class="card-carousel-cards" :style="{ transform: 'translateX' + '(' + currentOffset + 'px' + ')'}">             
                  <!-- <div @mouseover="mouseover(items.alphabet)" @mouseleave="mouseleave(items.alphabet)" class="card-carousel--card"  v-for="items in nursingList" :id="items.alphabet"  :key="items.nursing_id"> -->
                  <div class="card-carousel--card">
                    <div class="MarkerHover">
                        <table class="nursingSearch-tbl">
                        <tbody>
                          <tr >
                            <td class="pt-2 pb-2"  v-for="items in nursingList" @mouseover="mouseover(items.alphabet)" @mouseleave="mouseleave(items.alphabet)" :id="items.alphabet" :key="items.nursing_id">
                                <div class="wd-in">
                                    <p class="mb-2 clearfix"><span class="num-room">{{items.num_rooms}} </span><span class="float-right">{{items.date_of_establishment}}</span></p>
                                    <p class="item-fav btn btn-sm" :class="'view_pro_id'+items.nursing_id" style="display:block;" @click="favAddFun('add',items.nursing_id);">
                                        <i class="fas fa-plus-square" style="color:#c40000;"></i> お気に入りに追加 
                                        <!-- <span class="btn fav-profile fav-item fav-color" :class="'view_pro_id'+items.nursing_id" style="display:block;" @click="favAddFun('add',items.nursing_id);"><i class="fas fa-plus-square" style="color:#c40000!important;"></i>&nbsp; お気に入りに追加</span> -->
                                        <!-- <span class="btn fav-profile fav-item fav-color" :class="'done_pro_id'+items.nursing_id" style="color:#aaa;display:none;" @click="favAddFun('remove',items.nursing_id);"><i class="fas fa-check-double" style="color:#c40000!important;"></i>&nbsp; 追加済み</span> -->
                                    </p>                                 
                                    <p class="item-fav btn btn-sm" :class="'done_pro_id'+items.nursing_id" style="color:#aaa;display:none;" @click="favAddFun('remove',items.nursing_id);">
                                        <i class="fas fa-check-double" style="color:#c40000!important;"></i>&nbsp; 追加済み
                                        <!-- <span class="btn fav-profile fav-item fav-color" :class="'view_pro_id'+items.nursing_id" style="display:block;" @click="favAddFun('add',items.nursing_id);"><i class="fas fa-plus-square" style="color:#c40000!important;"></i>&nbsp; お気に入りに追加</span> -->
                                        <!-- <span class="btn fav-profile fav-item fav-color" :class="'done_pro_id'+items.nursing_id" style="color:#aaa;display:none;" @click="favAddFun('remove',items.nursing_id);"><i class="fas fa-check-double" style="color:#c40000!important;"></i>&nbsp; 追加済み</span> -->
                                    </p>                                 
                                    <p class="item-name"><img :src="'http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld='+items.alphabet+'|ff9563|000000'" alt="">
                                        <router-link :to="{name: 'profile', params: {cusid:items.customer_id, type: 'nursing'}}" class="pseudolink" style="font-weight:bold;#ff6117!important">{{items.name}}</router-link>
                                    </p>
                                    <p>{{items.city_name}} <i class="fas fa-angle-double-right" style="color:#b9b5b5;"></i> {{items.township_name}}</p>
                                </div> 
                            </td>
                          </tr>
                          <tr>
                            <td  v-for="items in nursingList" @mouseover="mouseover(items.alphabet)" @mouseleave="mouseleave(items.alphabet)" :id="items.alphabet" :key="items.nursing_id" style="padding-top:0px;">
                                <div class="wd-in">
                                    <span class="type-name">{{items.type_name}}</span>
                                
                                    <div class="row" style="margin-top:10px;">
                                        <div class="col-4" style="padding-top:3px;">
                                            <img :src="'/upload/nursing_profile/'+items.logo" alt="image" width="110px" @error="imgUrlAlt"/>
                                        </div>
                                        <div class="col-8">
                                            <ul class="list-group list-group-flush nur-caro-card">
                                                <li class="list-group-item" style="padding-top:0px!important;"><p class="text-truncate"><span style="color:#d2571c" class="m-r-15">住所</span> {{items.township_name}}{{items.address}}</p></li>
                                                <li class="list-group-item"><span style="color:#d2571c" class="m-r-15">電話 </span><span>{{items.phone}}</span></li>
                                                <li class="list-group-item"><span style="color:#d2571c" class="m-r-10">公式サイト</span><a :href="'http://'+ items.website" target="_blank">{{items.website}}</a></li>                                               
                                            </ul>                                         
                                        </div>
                                    </div>
                                </div>                          
                            </td>
                          </tr>
                          <tr>
                            <td  v-for="items in nursingList" @mouseover="mouseover(items.alphabet)" @mouseleave="mouseleave(items.alphabet)" :id="items.alphabet" :key="items.nursing_id">
                                <div class="wd-in">
                                     <table class="table table-bordered price-tbl text-center">
                                        <thead>
                                            <tr style="background-color:#ffffcc">
                                                <th class="text-center" style="background-color:#ffffcc">入居時費用</th>
                                                <th class="text-center" style="background-color:#ffffcc">月額費用</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td><span>{{(Number(items.moving_in_to)/10000).toLocaleString()}} </span>万円</td>
                                                <td><span>{{(Number(items.per_month_to)/10000).toLocaleString()}} </span>万円</td>
                                            </tr>
                                        </tbody>                               
                                    </table>
                                </div>
                            </td>  
                          </tr>
                        </tbody>
                      </table>
                     
                    </div>

                    
                  </div>
                </div>
              </div>
            </div>
            <div class="nav-box" @click="moveCarousel(1)" :disabled="atEndOfList">
              <div class="nav-content ml-2">
                  <div class="card-carousel--nav__right"></div>
              </div>
            </div>
          </div>

        </div>
         <div id="nursingView">
         <h5 class="profile_subtit">もっと探す条件</h5>
      </div>
      </div>
      <!--list-->
       <table class="table table-bordered col-12 box-wrap select">
              <tbody>
                <tr>
                  <th>地域</th>
                  <td>
                    <div class="form-check form-check-inline col-sm-2"   v-for="township in getTownships" :key="township.id">
                        <label class="form-check-label control control--checkbox" style="padding-left:5px;">
                         <input class="form-check-input" type="checkbox" :id="township.id" :value="township.id" v-model="townshipID" @click="check">
                            {{township.township_name}}
                        <div class="control__indicator"></div>
                        </label>
                      </div>
                  </td>
                </tr>
                <tr>
                  <th v-if="showOne" style="padding:10px;">入居時の条件</th>
                  <td v-if="showOne">
                        <div class="form-check form-check-inline col-sm-2" id="customCheck1">
                          <label class="form-check-label control control--checkbox" style="padding-left:5px;">
                            <input class="form-check-input" :id="1" value="自立" v-model="MoveID" type="checkbox">
                            自立
                             <div class="control__indicator"></div>
                          </label>
                        </div>
                        <div class="form-check form-check-inline col-sm-3" id="customCheck1">
                          <label class="form-check-label control control--checkbox" style="padding-left:5px;">
                            <input class="form-check-input" :id="2" value="要支援" v-model="MoveID" type="checkbox">
                            要支援
                             <div class="control__indicator"></div>
                          </label>
                        </div>
                        <div class="form-check form-check-inline col-sm-3" id="customCheck1">
                          <label class="form-check-label control control--checkbox" style="padding-left:5px;">
                            <input class="form-check-input" :id="3" value="要介護" v-model="MoveID" type="checkbox">
                            要介護
                             <div class="control__indicator"></div>
                          </label>
                        </div>                      
                  </td> 
                </tr>   
                <tr>
                  <th v-if="showOne">特長</th>
                  <td v-if="showOne">
                    <div class="form-check form-check-inline col-sm-2" v-for="feature in special_features" :key="feature.id">
                      <label class="form-check-label control control--checkbox" style="padding-left:5px;">
                        <input class="form-check-input" type="checkbox" v-model="SpecialFeatureID" :id="feature.id" :value="feature.id" @click="features($event)">
                        {{feature.name}}
                         <div class="control__indicator"></div>
                      </label>
                  </div>
                  </td>
                </tr> 
                <tr>
                  <th v-if="showOne">施設の種類</th>
                  <td v-if="showOne">
                  <div class="form-check form-check-inline col-sm-2" v-for="fac_type in fac_types" :key="fac_type.id">
                    <label class="form-check-label control control--checkbox" style="padding-left:5px;">
                      <input class="form-check-input" type="checkbox" v-model="FacTypeID" :id="fac_type.id" :value="fac_type.id">
                      {{fac_type.description}}
                       <div class="control__indicator"></div>
                    </label>
                  </div>
                  </td>
                </tr>
                <tr>
                  <th v-if="showOne">医療面・診療科目</th>
                  <td v-if="showOne">
                  <div class="form-check form-check-inline col-sm-2" v-for="medical in medical_acceptance" :key="medical.id">
                    <label class="form-check-label control control--checkbox" style="padding-left:5px;">
                      <input class="form-check-input" type="checkbox" v-model="MedicalAcceptanceID" :id="medical.id" :value="medical.id">
                      {{medical.name}}
                       <div class="control__indicator"></div>
                    </label>
                  </div>
                  </td>
                </tr>
                <tr class="text-center">                  
                  <td colspan="2">
                    <button @click="showOne = !showOne" class="btn btn-link mt-2">
                      <!-- <span v-show="showOne"><i class="fas fa-arrow-circle-up"></i>閉じる</span> -->
                      <button v-show="showOne" class="btn seemore-btn">
                      <i class="fa" aria-hidden="true"></i>
                          <span id="close4"><i class="fas fa-arrow-circle-up"></i> 閉じる</span>
                      </button>
                      <!-- <span v-show="!showOne"><i class="fas fa-arrow-circle-down"></i>もっと見る</span> -->
                      <button v-show="!showOne" class="btn seemore-btn">
                      <i class="fa" aria-hidden="true"></i>
                          <span id="close4"><i class="fas fa-arrow-circle-down"></i> もっと見る</span>
                      </button>
                    </button>
                  </td>
                </tr>
               <tr class="text-center">
                  <td colspan="2" style="border:none;">
                     <button class="main-bg-color create-btn all-btn" id="search" style="width:16%;" @click="search"><i class="fas fa-search"></i>&nbsp; 検索 </button>
                  </td>
                </tr>
              </tbody>
      </table>
      <!--end list-->
        
        <div class=" col-12">
            <div class="row">
                <div id="job_detail" class="col-md-6 col-sm-12" style="margin-top:20px;" v-for="nus in displayItems" :key="nus.id">
                    <div class="nur-content">
                    <div class="job-header">
                    <div class="row pad-free">
                        <div class="col-8">
                        <h5 class="nur-tit">
                            <router-link :to="{name: 'profile', params: {cusid:nus.cus_id, type: 'nursing'}}" class="pseudolink" style="font-weight:bold;">{{nus.name}}</router-link>
                        </h5>
                        <p><span class="job_ico"><i class="fa fa-map-signs"></i></span>{{nus.city_name}} <i class="fas fa-angle-double-right" style="color:#b9b5b5;"></i> {{nus.township_name}}</p> 
                        </div>
                        <div class="col-4 text-right">
                        <span class="btn fav-profile fav-item fav-color" :class="'view_pro_id'+nus.id" style="display:block;" @click="favAddFun('add',nus.id);"><i class="fas fa-plus-square" style="color:#c40000!important;"></i>&nbsp; お気に入りに追加</span>
                        <span class="btn fav-profile fav-item fav-color" :class="'done_pro_id'+nus.id" style="color:#aaa;display:none;" @click="favAddFun('remove',nus.id);"><i class="fas fa-check-double" style="color:#c40000!important;"></i>&nbsp; 追加済み</span>
                        </div>
                    </div>                    
                    
                    </div>
                    <div class="col-12 pad-free m-b-10 clearfix">
                        <span class="num-room"> {{nus.num_rooms}} </span>                          
                        <span v-for="(fac,index) in factype" :key="index+'-'+fac.description+'-'+nus.id">
                        <span v-if="fac.id == nus.fac_type" class="fac_list">
                            {{fac.description}}
                        </span>
                        </span>  
                        <span class="nur_date">{{nus.date_of_establishment}}</span>   
                        <p class="hos_phone float-right"><span class="circle-phone"><i class="fa fa-phone-alt"></i></span>{{nus.phone}}</p>
                    </div>
                    <div class="job-body row  clearfix">
                    <div class="col-4 job-img">
                        <img :src="'/upload/nursing_profile/'+nus.logo" alt="image" @error="imgUrlAlt">   
                         <div class="mt-4 col-12 detail-btn text-center">                                             
                            <router-link :to="{name: 'profile', params: {cusid:nus.cus_id, type: 'nursing'}}" class="btn all-btn" style="font-weight:bold;">詳細を見る</router-link>
                          </div>                         
                    </div>
                    <div class="col-8 job-box">
                        <table  class="table table-bordered table-sm">                              
                            <!-- <tr>
                            <td style="width:30%;"><span class="job_ico"><i class="fa fa-user"></i></span>名前</td>
                            <td>{{nus.name}}</td>
                            </tr> -->
                            <tr>
                                <td style="width:30%"><span class="job_ico">&#xa5;</span>入居時費用</td>
                                <!-- <td><span class="cash-lbl">{{Number(nus.moving_in_to)/10000}} </span>万円</td> -->
                                <td class="cash-lbl">
                                    {{(Math.floor(Number(nus.moving_in_from)/10000))==0? '' : (Math.floor(Number(nus.moving_in_from)/10000)).toLocaleString()+'万' }}{{(Number(nus.moving_in_from)%10000)==0 ? '' : (Number(nus.moving_in_from)%10000).toLocaleString()}}円
                                        ~
                                    {{(Math.floor(Number(nus.moving_in_to)/10000))==0? '' : (Math.floor(Number(nus.moving_in_to)/10000)).toLocaleString()+'万' }}{{(Number(nus.moving_in_to)%10000)==0 ? '' : (Number(nus.moving_in_to)%10000).toLocaleString()}}円
                                </td>
                            </tr>      
                            <tr>
                                <td style="width:30%"><span class="job_ico">&#xa5;</span>月額費用</td>
                                <td>
                                    <font class="cash-lbl">
                                        {{(Math.floor(Number(nus.per_month_from)/10000))==0? '' : (Math.floor(Number(nus.per_month_from)/10000)).toLocaleString()+'万' }}{{(Number(nus.per_month_from)%10000)==0 ? '' : (Number(nus.per_month_from)%10000).toLocaleString()}}円
                                            ~
                                        {{(Math.floor(Number(nus.per_month_to)/10000))==0? '' : (Math.floor(Number(nus.per_month_to)/10000)).toLocaleString()+'万' }}{{(Number(nus.per_month_to)%10000)==0 ? '' : (Number(nus.per_month_to)%10000).toLocaleString()}}円
                                    </font>
                                </td>
                            </tr>    
                            <tr>
                            <td style="width:30%;"><span class="job_ico"><i class="fa fa-envelope"></i></span>メールアドレス</td>
                            <td>{{nus.email}}</td>
                            </tr>                              
                            <tr>
                            <td style="width:30%;"><span class="job_ico"><i class="fa fa-map-marker-alt"></i></span>住所</td>
                            <td>{{nus.address}}</td>
                            </tr>
                            <!-- <tr>
                            <td style="width:30%;"><span class="job_ico">&#xa5;</span>入居時費用</td>
                            <td>{{nus.moving_in}} </td>
                            </tr> -->     
                        </table>
                        <h5 class="header m-t-10">こだわりの特長</h5>
                            <span v-for="(spe,index) in specialfeature" :key="index+'-'+spe.name+'-'+nus.id">
                            <span v-if="spe.customer_id == nus.customer_id" class="feature_list">
                                {{spe.name}}
                            </span>
                            </span>

                            <!-- <h5 class="header m-t-10">医療受入</h5>  
                            <span v-for="(med,index) in medicalacceptance" :key="index+'-'+med.name+'-'+nus.id">
                            <span v-if="med.customer_id == nus.customer_id" class="feature_list">
                                {{med.name}}
                            </span>
                            </span> -->
                    </div>
                    <!-- <div class="col-4"> 
                        <h5 class="header m-t-10">施設タイプ</h5>                            
                            <span v-for="(fac,index) in factype" :key="index+'-'+fac.description+'-'+nus.id">
                            <span v-if="fac.id == nus.fac_type" class="fac_list">
                                {{fac.description}}
                            </span>
                            </span>                            
                        <div>                            
                        </div>
                    </div> -->
                    </div>                  
                </div>
                </div>
                <div class="offset-md-4 col-md-8 mt-3" v-if="show_paginate">
              <nav aria-label="Page navigation example">
                <ul class="pagination"> 
                  <li class="page-item">/
                    <span class="spanclass" @click="first"><i class='fas fa-angle-double-left'></i> 最初</span>
                  </li>
                  <li class="page-item">
                    <span class="spanclass" @click="prev"><i class='fas fa-angle-left'></i> 前へ</span>
                  </li>
                  <li class="page-item" v-for="(i,index) in displayPageRange" :key="index" :class="{active_page: i-1 === currentPage}">
                    <span class="spanclass" @click="pageSelect(i)">{{i}}</span>
                  </li>
                  <li class="page-item">
                    <span class="spanclass" @click="next">次へ <i class='fas fa-angle-right'></i></span>
                  </li>
                  <li class="page-item">
                    <span class="spanclass" @click="last">最後 <i class='fas fa-angle-double-right'></i></span>
                  </li>                 
                </ul>
              </nav>
            </div>
            </div>
        </div>
        

      </div>
      <!-- <div class="col-md-2 p-l-0">
        <asidebar></asidebar>
      </div>-->
    </div>
  </div>
  </div>
  </layout>
</template>


<script>
  import layout from '../components/home.vue'
  import asidebar from "./aside.vue";
  import {
    eventBus
  } from '../event-bus.js';
  import jp_cities from '../google-map-kml/jp_cities.json';
  import jp_township from '../google-map-kml/jp_township.json';
  export default {

    name: "mymap",
    components: {
      asidebar,
      layout
    },

    data() {

      return {
        cityid:[],
        listid : '', 
        map: null,
        markers: [],
        searchmarkers:[],
        marker:[],
        selectedLocation: null,
        infoBoxOpen: false,
        places: [],
        id: [],
        townshipID:[],
        township_id:-1,
        moving_in:-1,
        per_month:-1,
        cities: '',
        getCity: [],
        getTownships: [],
        special_features: [],
        fac_types: [],
        fac_id: [],
        medical_acceptance: [],
        show: false,
        showOne: true,
        checkarr: [],
        currentOffset: 0,
        windowSize: 4,
        paginationFactor: 500,
        nursingList: [],
        alphabet: [],
        markerHover:[],
        SpecialFeatureID:[],
        MedicalAcceptanceID:[],
        FacTypeID:[],
        MoveID:[],
        nus_data:[],
        specialfeature:[],
        medicalacceptance:[],
        factype:[],
        selectedcity:'',
        citylatlng:[],
        view_pro_id: [],
        currentPage: 0,
        size: 20,
        pageRange: 5,
        items: [],
        show_paginate: false,
        onchangeid:0
      }
    },
    mounted() {
            $('#navtab').removeClass('news-tabColor hospital-tabColor nursing-tabColor job-tabColor');
            $('#navtab').addClass('nursing-tabColor');
            $('.tab-content').removeClass('news-borderColor job-borderColor nursing-borderColor hospital-borderColor');
            $('#upper-tab').addClass('nursing-borderColor');
        },
    computed: {
      atEndOfList() {
        return this.currentOffset <= (this.paginationFactor * -1) * (this.nursingList.length - this.windowSize);
      },
      atHeadOfList() {
        return this.currentOffset === 0;
      },
    pages() {
      return Math.ceil(this.nus_data.length / this.size);
    },
    displayPageRange() {
      const half = Math.ceil(this.pageRange/2);
      const isEven = this.pageRange / 2 == 0;
      const offset = isEven ? 1 : 2;
      let start, end;
      if(this.pages < this.pageRange) {
        start = 1;
        end = this.pages;
      }else if (this.currentPage < half) {
        start = 1;
        end = start + this.pageRange - 1;
      }else if (this.pages - half < this.currentPage) {
        end = this.pages;
        start = end - this.pageRange + 1;
      }else {
        start = this.currentPage - half + offset;
        end = this.currentPage + half;
      } 
      let indexes = [];
      for (let i = start; i <= end; i++) {
        indexes.push(i);
      }
      return indexes;
    },
    displayItems() {
      const head = this.currentPage * this.size;
      return this.nus_data.slice(head, head + this.size);
    },
    isSelected(page) {
      return page - 1 == this.currentPage;
    }
    },
methods: {

check()
        {
            this.onchangeid = 0;
            this.moving_in = -1;
            this.township_id = -1;
        },
        
openInfoWindow(marker) {
            this.selectedLocation = marker;
            this.infoBoxOpen = true;
        },
closeInfoWindow() {
            this.infoBoxOpen = false;
        },
showSearchMap() {
            $('#searchMap').removeClass('select');
            $('#showSearchMap').addClass('select');
            $('#filter').addClass('select');

        },
moveCarousel(direction) {
            // Find a more elegant way to express the :style. consider using props to make it truly generic
            if (direction === 1 && !this.atEndOfList) {
            this.currentOffset -= this.paginationFactor;
            } else if (direction === -1 && !this.atHeadOfList) {
            this.currentOffset += this.paginationFactor;
            }
        },
// map onclick function 
getStateClick(e) {
            this.township_id= -1;
            this.moving_in = -1;
            this.per_month = -1;
            $("#nursing-search").css("display", "block");
            if(e.target.id == ''){
                var id = $('#selectCity').val();
            }else{
                var id = e.target.id;
            }
            this.id = id;
            this.axios.get('/api/getmap/',{
                params:{
                id: this.id,
                township_id:-1,
                moving_in:-1,
                per_month:-1
                },
            })
                .then((response) => {
                this.changeMap(response)
                })

               this.changeSearch();
        },
// map onclick function 
// map change dropdown function
nursingSearchData(index){
            if(index == 1)
            {
                this.township_id = -1;
                this.townshipID = [];
            }
            else{
              this.townshipID = [];
              this.townshipID[0] = this.township_id;
        
            }
           
            this.onchangeid = 1;
          
            // this.townshipID = [];
            // this.search();  

         
            this.axios.get('/api/getmap/',{
                    params:{
                    id: this.id,
                    township_id:this.township_id,
                    moving_in:this.moving_in,
                    per_month:this.per_month
                    },
            
                })
                .then((response) => {
                    this.changeMap(response)
                    
                }) 

                 this.changeSearch();

            
           
           
        },
// map change dropdown function
// make infowindow, marker , google map 
coordinates(theCity, lat, lng){


                const result = jp_township.features //jp_cities
                const jp_city = jp_cities.features //convert

                var townshipName = [];
                for (let i = 0; i < this.getTownships.length; i++) {
                    if(this.getTownships[i]['id'] == this.township_id){
                        townshipName.push(this.getTownships[i]['township_name'])
                    }
                }
                var township_name = townshipName.toString();
                const coordinates = []
                const city_coordinates = []
                
                if(township_name == ''){
                    for (var i = 0; i < jp_city.length; i++) {
                    if (jp_city[i].properties.NAME_0 == theCity) {
                    
                    if(jp_city[i].geometry.hasOwnProperty('geometries'))
                    {
                        for(var j =0;j< jp_city[i].geometry.geometries.length;j++)
                    {
                    
                        city_coordinates.push(jp_city[i].geometry.geometries[j]['coordinates']) ;
                    }
                    }
                    else{          
                        city_coordinates.push(jp_city[i].geometry['coordinates']) ;
                    
                    }
                    }
                }
                }else{
                    for (var i = 0; i < result.length; i++) {
                    if (result[i].properties.NL_NAME_1 == theCity && result[i].properties.NL_NAME_2 == township_name) {
                    coordinates.push(result[i].geometry['coordinates'])
                    }    
                }
                }

                if(township_name == ''){
                    var coordinate = city_coordinates.reduce((acc, val) => acc.concat(val), []);
                
                }else{
                    var co = coordinates.reduce((acc, val) => acc.concat(val), []);
                    var coordinate = co.reduce((acc, val) => acc.concat(val), []);
                }
                
                var data = {
                    type: "Feature",
                    geometry: {
                    "type": "Polygon",
                    "coordinates": coordinate
                    },
                };
                var mapProp = {
                    center: new google.maps.LatLng(lat, lng),
                    zoom: 7,
                    mapTypeId: google.maps.MapTypeId.ROADMAP,
                };

                    this.map = new google.maps.Map(document.getElementById("mymap"), mapProp);
                    this.map.data.addGeoJson(data);
                    this.map.data.setStyle({
                    strokeColor: "red",
                    fillColor: 'red',
                    strokeOpacity: 0.8,
                    fillOpacity: 0.1,
                    strokeWeight: 1
                    }) 
},
infoWindow(item, mmarker){
        var infoWindowContent = new Array();
        for (var i = 0; i < item.length; i++) {
         
            infoWindowContent.push([
            '<div id="info_content">' +
            '<div class="">' +
                '<table class="table" style="margin-bottom:0px;">' +
                '<thead>' +
                    '<tr>' +
                    '<td colspan="2"><span class="type-name">' +
                    item[i]['type_name']+
                    '</span>'+
                    '</td>' +                    
                    '</tr>' +
                '</thead>' +
                '<tbody>' +                    
                    '<tr>' +
                    '<td colspan="2" class="text-left" style="padding-bottom:0px;">' +
                    '<img src="http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld='+item[i]['alphabet']+'|ff9563|000000" alt="" style="margin-right:10px;">' +
                    '<span class="item-name">' + item[i]['name'] + '</span> <br>' +                    
                    '</td>' +
                '</tr>' +
                
                '<tr>' +
                '<td>' +
                '<img src="/upload/nursing_profile/' + item[i]['logo'] + '" alt="image" width="100px" style="border:1px solid #ccc;"/>' +
                '</td>' +                            
                '<td style="padding-bottom:0px;">' +
                    '<p class="hos_phone float-right"><span class="circle-phone"><i class="fa fa-phone-alt"></i></span>' + item[i]['phone'] + '</p>' +
                '</td>' +                            
                '</tr>' +
                ' <tr>' +
                '<td colspan="2" style="padding-top:0px;">' +
                    '<div class="">' +
                    '<table class="table table-bordered price-tbl text-center" style="margin-bottom:0px">'+
                    '<thead><tr style="background-color:#ffffcc"><th class="text-center" style="background-color:#ffffcc">入居時費用</th><th class="text-center" style="background-color:#ffffcc">月額利用料</th></tr></thead>'+
                    '<tbody>'+
                    '<tr><td><span>'+ (Number(item[i]['moving_in_to'])/10000).toLocaleString() + '</span>万円</td><td><span>'+ (Number(item[i]['per_month_to'])/10000).toLocaleString() + '</span>万円</td></tr>'+
                    '</tbody>'+
                    '</table>'+
                    '</div>' +
                '</td>' +
                '</tr>' +
                '</tbody>' +
                '</table>' +
            '</div>' +
            '</div>'
            ])
        }
        var markers = mmarker;
        var bounds = new google.maps.LatLngBounds();
        this.markerHover = [];
        var infoWindow = new google.maps.InfoWindow(),marker, i;
        for (let i = 0; i < this.markers.length; i++) {
            var beach = this.markers[i]
            var lats = this.markers[i]['lat']
            var lngs = this.markers[i]['lng']
            var img = this.markers[i]['alphabet']
            var myLatLng = new google.maps.LatLng(lats, lngs);
            var position = new google.maps.LatLng(markers[i][1], markers[i][2]);
        
            
            marker = new google.maps.Marker({
            position: position,
            map: this.map,
            icon: 'http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld=' + img + '|ff9563|000000',
            zoom: 6,
            title: this.markers[i]['name']
            });

            google.maps.event.addListener(marker, 'click', (function(marker, i) {
            return function() {
                infoWindow.setContent(infoWindowContent[i][0]);
                infoWindow.open(this.map, marker);
            }
            })(marker, i));
            
            this.markerHover.push(marker)
            var boundsListener = google.maps.event.addListener((this.map), 'bounds_changed', function(event) {
            google.maps.event.removeListener(boundsListener);
            });
            
        }
        },
// make infowindow, marker , google map 
changeMap(response){
                $('.select').removeClass('select');
                $('#searchMap').addClass('select');
                $('#showSearchMap').removeClass('select');
                $('#filter').removeClass('select');
                this.cities = response.data.city
                this.getCity = response.data.getCity
                this.getTownships = response.data.getTownships
                this.special_features = response.data.special_features
                this.fac_types = response.data.fac_types
                this.medical_acceptance = response.data.medical_acceptance
                this.nursingList = response.data.nursing_profile
                this.markers = response.data.nursing_profile;
         
            
                var mmarker = new Array();
                var item = [];
                for (var i = 0; i < this.markers.length; i++) {
                    mmarker.push([this.markers[i]['alphabet'], this.markers[i]['lat'], this.markers[i]['lng']])
                    item.push(this.markers[i])
                }

                const theCity = response.data.getCity[0]['city_name']
                const lat = response.data.getCity[0]['latitude']
                const lng = response.data.getCity[0]['longitude']

                if(this.markers.length > 0)
                {
                     this.coordinates(theCity,lat,lng);
                     this.infoWindow(item, mmarker);
                 }
                 else{
                    this.coordinates(theCity,lat,lng);
                 }
               
               
        
        },

changeSearch()
        {
    
            if(this.townshipID == null || this.townshipID == '')
            {
            this.townshipID[0] = 0;
            }
            if(this.SpecialFeatureID == null || this.SpecialFeatureID == '')
            {
            this.SpecialFeatureID[0] = 0;
            }
            if(this.MedicalAcceptanceID == null || this.MedicalAcceptanceID == '')    
            {
            this.MedicalAcceptanceID[0] = 0;
            }
            if(this.FacTypeID == null || this.FacTypeID == '')
            {
            this.FacTypeID[0] = 0;
            }
            if(this.MoveID == null || this.MoveID == '')
            {
            this.MoveID[0] = 0;
            }
            if(this.onchangeid == 1)
            {  
                if(this.township_id == -1)
                {
                    this.townshipID[0] = 0;
                }
                else{
                    this.townshipID[0] = this.township_id;
                }
            }
            else{

                this.township_id = -1;
            }

    

            this.axios.get('api/getnursingsearch',{
            params:{
                id: this.id,
                townshipID:this.townshipID,
                SpecialFeatureID:this.SpecialFeatureID,
                MedicalAcceptanceID:this.MedicalAcceptanceID,
                FacTypeID:this.FacTypeID,
                MoveID:this.MoveID,
                Moving_in:this.moving_in,
                Per_month:this.per_month
            },
            }).then((response)=>{
            console.log(localStorage.getItem("nursing_fav"));
            // if(localStorage.getItem("nursing_fav")) {
            //     var fav_arr = JSON.parse("[" + localStorage.getItem("nursing_fav") + "]");
            //     for(var i=0; i<fav_arr.length; i++){
            //         if(response.data.nursing.includes(fav_arr[i])){
            //             response.data.nursing.indexOf(fav_arr[i])
                        
            //         }
            //     }
                
            // }
            console.log(JSON.parse("[" + localStorage.getItem("nursing_fav") + "]"));
            this.nus_data = response.data.nursing;
            this.specialfeature = response.data.specialfeature;
            this.medicalacceptance = response.data.medicalacceptance;
            this.factype = response.data.factype;
            this.citylatlng = response.data.city;
        
            if(this.nus_data.length == 0)
            {

                const theCity = this.nus_data[0]['city_name']
                const lat = this.nus_data[0]['lat']
                const lng = this.nus_data[0]['lng']
             
                this.coordinates(theCity,lat,lng);
            }
          
            
            });
                    
        },
        // clearmap(citylatlng)
        // {
        //     // for clean googleMap
        //         var lat = citylatlng[0]['latitude']
        //         var lng = citylatlng[0]['longitude']
        //         var theCity = citylatlng[0]['city_eng']
        //         const result = jp_township.features
  

        //         const coordinates = []
        //         for (var i = 0; i < result.length; i++) {
        //             if (result[i].Name == theCity) {
        //             coordinates.push(result[i].geometry['coordinates'])
        //             }
        //         }
        //         var coordinate = coordinates.reduce((acc, val) => acc.concat(val), []);
        //         var data = {
        //             type: "Feature",
        //             geometry: {
        //             "type": "Polygon",
        //             "coordinates": coordinate
        //             },
        //         };
                
        //         var mapProp = {
        //             center: new google.maps.LatLng(lat, lng),
        //             zoom: 6,
        //             mapTypeId: google.maps.MapTypeId.ROADMAP,
        //         };
        //         this.map = new google.maps.Map(document.getElementById("mymap"), mapProp);
        //         this.map.data.addGeoJson(data);
        //         this.map.data.setStyle({
        //             strokeColor: "red",
        //             fillColor: 'red',
        //             strokeOpacity: 0.8,
        //             fillOpacity: 0.1,
        //             strokeWeight: 1
        //         })
        // },
        

search(){  

 
            if(this.townshipID == null || this.townshipID == '')
            {
            this.townshipID[0] = 0;
            }
            if(this.SpecialFeatureID == null || this.SpecialFeatureID == '')
            {
            this.SpecialFeatureID[0] = 0;
            }
            if(this.MedicalAcceptanceID == null || this.MedicalAcceptanceID == '')    
            {
            this.MedicalAcceptanceID[0] = 0;
            }
            if(this.FacTypeID == null || this.FacTypeID == '')
            {
            this.FacTypeID[0] = 0;
            }
            if(this.MoveID == null || this.MoveID == '')
            {
            this.MoveID[0] = 0;
            }
            if(this.onchangeid == 1)
            {  
               
                if(this.township_id == -1)
                {
                    this.townshipID[0] = 0;
                }
                else{
                     this.townshipID[0] = this.township_id;
                    this.township_id = -1;
                }
            }
            else{
                
                this.township_id = -1;
            }

            this.moving_in = -1;
            this.per_month = -1;

            this.axios.get('api/getnursingsearch',{
            params:{
                id: this.id,
                townshipID:this.townshipID,
                SpecialFeatureID:this.SpecialFeatureID,
                MedicalAcceptanceID:this.MedicalAcceptanceID,
                FacTypeID:this.FacTypeID,
                MoveID:this.MoveID,
                Moving_in:this.moving_in,
                Per_month:this.per_month
            },
            }).then((response)=>{

            this.nus_data = response.data.nursing;
            this.specialfeature = response.data.specialfeature;
            this.medicalacceptance = response.data.medicalacceptance;
            this.factype = response.data.factype;
            this.searchmarkers = response.data.nursing;
            this.nursingList = response.data.nursing;
            this.citylatlng = response.data.city;
            this.markers = response.data.nursing;

            var mmarker = new Array()
            var item = []

    
            if(this.nus_data.length > 0){

               
                for (var i = 0; i < this.searchmarkers.length; i++) {
                   
                    mmarker.push([this.searchmarkers[i]['alphabet'], this.searchmarkers[i]['lat'], this.searchmarkers[i]['lng']])
                    item.push(this.searchmarkers[i])
                }
                const theCity = this.searchmarkers[0]['city_name']
                const lat = this.searchmarkers[0]['lat']
                const lng = this.searchmarkers[0]['lng']
            
                // google map 

                this.coordinates(theCity,lat,lng)
            
                this.infoWindow(item, mmarker);
                    
            }
            else{
                const theCity = this.nus_data[0]['city_name']
                const lat = this.nus_data[0]['lat']
                const lng = this.nus_data[0]['lng']
             
              this.coordinates(theCity,lat,lng);

                //  this.clearmap(this.citylatlng)
              
              }
       
                
            
            this.show_paginate = true;   

           
            });

       

                     
        },
        // hover animate function
        mouseover(index) {
            for (let i = 0; i < this.markerHover.length; i++) {
                
                if(this.markers[i]['alphabet'] == index)
                {
                this.markerHover[i].setAnimation(google.maps.Animation.BOUNCE);
                }
            }
        },
        mouseleave(index){
            for (let i = 0; i < this.markerHover.length; i++) {
                if(this.markers[i]['alphabet'] == index)
                {
                this.markerHover[i].setAnimation(null);
                }
            }
        },
        // hover animate function
        getCheck(e) {
            if (this.townshipID.length > 0) {
            this.axios.post('/api/getmaptownship/' + this.townshipID + '')
                .then((response) => {
                this.markers = response.data;

                var mmarker = new Array();
                var multibusiness = new Array();
                for (var i = 0; i < this.markers.length; i++) {
                    mmarker.push([this.markers[i]['business_entity'], this.markers[i]['lat'], this.markers[i]['lng']])
                    multibusiness.push(this.markers[i]['business_entity'])
                }
                var icon = {
                    url: "/google-map/marker-1.png", // url
                    scaledSize: new google.maps.Size(30, 35), // scaled size
                };
                var mapProp = {
                    // center: new google.maps.LatLng(lat, lng),
                    mapTypeId: google.maps.MapTypeId.ROADMAP,
                };
                var map = new google.maps.Map(document.getElementById("mymap"), mapProp);
                var bounds = new google.maps.LatLngBounds();
                var markers = mmarker;
                var infoWindowContent = new Array();
                for (var i = 0; i < multibusiness.length; i++) {
                    infoWindowContent.push(['<div class="info_content">' + multibusiness[i] + '</div>'])
                }
                var infoWindow = new google.maps.InfoWindow(),
                    marker, i;
                for (i = 0; i < this.markers.length; i++) {
                    var position = new google.maps.LatLng(markers[i][1], markers[i][2]);
                    bounds.extend(position);
                    marker = new google.maps.Marker({
                    position: position,
                    map: map,
                    icon: icon,
                    zoom: 6,
                    title: markers[i][0]
                    });
                    google.maps.event.addListener(marker, 'click', (function(marker, i) {
                    return function() {
                        infoWindow.setContent(infoWindowContent[i][0]);
                        infoWindow.open(map, marker);
                    }
                    })(marker, i));
                    google.maps.event.addListener(marker, 'mouseover', (function(marker, i) {
                    return function() {
                        marker.setAnimation(google.maps.Animation.BOUNCE);
                        setTimeout(function() {
                        marker.setAnimation(null);
                        }, 750);
                    }
                    })(marker, i));
                    map.fitBounds(bounds);
                    map.setZoom(11);
                    var boundsListener = google.maps.event.addListener((map), 'bounds_changed', function(event) {
                    google.maps.event.removeListener(boundsListener);
                    });
                }


                });
            } else {
            this.markers = '';
            }



        },
        features(e) {
            if (e.target.checked) {
        
            }
        },
        getStateHover(e) {
            // if(e.target.tagName ==='AREA'){
            //  console.log(e)
            // }
        },
        imgUrlAlt(event) {
            event.target.src = "images/noimage.jpg"
        },
        favAddFun(status,index){
            if(status == 'add'){
                $('.view_pro_id'+index).css('display','none');
                $('.done_pro_id'+index).css('display','block');
                if(localStorage.getItem("nursing_fav")){
                    var fav_arr = JSON.parse("[" + localStorage.getItem("nursing_fav") + "]");
                    fav_arr.push(index);
                    fav_arr = [...new Set(fav_arr)];
                    localStorage.setItem("nursing_fav", fav_arr);
                    $("#nus-fav-local").html(fav_arr.length);
                }
                else{
                    var fav_arr = [index];
                    localStorage.setItem("nursing_fav", fav_arr);
                    $("#nus-fav-local").html(fav_arr.length);
                }
                $(".fav-nursing-link-box>a").css({'cursor':'pointer','pointer-events':'auto'});                
            }
            else{
                $('.view_pro_id'+index).css('display','block');
                $('.done_pro_id'+index).css('display','none');
                var fav_arr = JSON.parse("[" + localStorage.getItem("nursing_fav") + "]");
                var index = fav_arr.indexOf(index);
                if (index > -1) {
                    fav_arr.splice(index, 1);
                    localStorage.setItem("nursing_fav", fav_arr);
                }
                $("#nus-fav-local").html(fav_arr.length);

                if(fav_arr.length == 0){
                    $(".fav-nursing-link-box>a").css({'cursor':'not-allowed','pointer-events':'none'})
                }
                else{
                    $(".fav-nursing-link-box>a").css({'cursor':'pointer','pointer-events':'auto'})
                }
                
            }
        },
        first() {
      this.currentPage = 0;
    },
    last() {
      this.currentPage = this.pages - 1;
    },
    prev() {
      if(0<this.currentPage) {
        this.currentPage--;
      }
    },
    next() {
      if(this.currentPage < this.pages - 1) {
        this.currentPage++;
      }
    },
    pageSelect(index) {
      this.currentPage = index - 1;
    },
    }
  };
</script>

<style scoped>
  .path {
    cursor: pointer;
  }

  .selected {
    fill: #5c5959;
    stroke: #111;
    stroke-width: 2px;
    stroke-linejoin: round;
    color: #f27a24 !important;
    font-weight: bold;
  }

  .path {
    -moz-transition-property: opacity;
    -o-transition-property: opacity;
    -webkit-transition-property: opacity;
    transition-property: opacity;
    -moz-transition-duration: 0.5s;
    -o-transition-duration: 0.5s;
    -webkit-transition-duration: 0.5s;
    transition-duration: 0.5s;
    -moz-transition-timing-function: ease;
    -o-transition-timing-function: ease;
    -webkit-transition-timing-function: ease;
    transition-timing-function: ease;
    -moz-transition: fill 0.75s;
    -o-transition: fill 0.75s;
    -webkit-transition: fill 0.75s;
    transition: fill 0.75s;
  }

  .path:hover,
  .path:focus {
    cursor: pointer;
  }

  .path:hover,
  .path:hover .path,
  .path:focus,
  .path:focus .path {
    color: #000;
  }

  .path:hover,
  a:hover {
    fill: #20487c !important;
    stroke: #002868 !important;
    stroke-width: 2px;
    stroke-linejoin: round;
    cursor: pointer;
  }

  .select {
    display: none;
  }

  span.tooltip {
    padding: 0px 5px;
    position: relative;
    background: #ffbb99;
    cursor: pointer;
  }

  .tooltip-info {
    position: absolute;
    top: -9999px;
    left: -9999px;
  }

  span.tooltip::before {
    content: attr(data-tooltip);
    position: absolute;
    top: 1.5em;
    font-size: 0.9em;
    padding: 1px 5px;
    display: none;
    color: white;
    background: rgba(0, 0, 0, 0.75);
    border-radius: 4px;
    transition: opacity 0.1s ease-out;
    z-index: 99;
    text-align: left;
  }

  span:hover::before {
    display: inline-block;
  }

  [data-toggle="collapse"] .fa:before {
    content: "\f139";
  }

  [data-toggle="collapse"].collapsed .fa:before {
    content: "\f13a";
  }


  .left-div {
    background-color: #e8e7e7;
    text-align: right;
    width: 140px;
    padding: 25px;
  }

  .left-div-1 {
    background-color: #e8e7e7;
    text-align: right;
    width: 140px;
    padding: 25px;
  }

  .left-div-2 {
    background-color: #e8e7e7;
    text-align: right;
    width: 140px;
    padding: 25px;

  }

  .toBeToggled2 {
    display: block;
  }

  .toBeToggled1 {
    display: none;
  }

  .table th,
  .table td {
    border-top: none !important;
  }

  table>tbody>tr th {
    background-color: #eeeeee94;
    text-align: right;
    width: 140px;
    padding: 25px;
  }

  label {
    color: black !important;
  }

  .vue-map-container {
    height: 640px;
  }


  .justBlock {
    width: 100px;
    height: 100px;
    line-height: 100px;
    text-align: center;
    background-color: #bada55;
    color: darkgreen;
    font-family: sans-serif;
    /* &:hover {
    cursor:pointer;
  } */
  }

  #mymap {
    width: 100%;
    height: 500px;
  }
  /* #mymap {background: transparent url('/images/google/loading.jpg') no-repeat center center;} */
div#holder {
    position: relative;
}

.hidden {
    display: none;
}

div.overlay {
    position: absolute;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: #fff;
    opacity: 0.7;
    z-index: 1;
}

div.overlay.standard { background: #fff url('/images/google/loading.jpg') no-repeat 50% 50%; }

  .card_1 {
    display: inline-block;
    box-shadow: 0 1px 2px 0 rgba(0, 0, 0, .15);
    margin: 20px;
    position: relative;
    /* margin-bottom: 50px; */
    transition: all .2s ease-in-out;
  }

  .card_1:hover {
    /*box-shadow: 0 5px 22px 0 rgba(0,0,0,.25);*/
    box-shadow: 0 10px 20px rgba(0, 0, 0, 0.19), 0 6px 6px rgba(0, 0, 0, 0.23);
    /* margin-bottom: 54px; */
  }

  .image {
    height: 200px;
    opacity: .7;
    overflow: hidden;
    transition: all .2s ease-in-out;
  }

  .image:hover,
  .card_1:hover .image {
    height: 200px;
    opacity: 1;
  }

  .text {
    background: #FFF;
    padding: 20px;
    min-height: 200px;
  }

  .text p {
    margin-bottom: 0px;
  }

  .fab {
    width: 60px;
    height: 60px;
    border-radius: 50%;
    position: absolute;
    margin-top: -50px;
    right: 20px;
    box-shadow: 0px 2px 6px rgba(0, 0, 0, .3);
    color: #fff;
    font-size: 48px;
    line-height: 48px;
    text-align: center;
    background: #0066A2;
    -webkit-transition: -webkit-transform .2s ease-in-out;
    transition: transform .2s ease-in-out;
  }

  .fab:hover {
    background: #549D3C;
    cursor: pointer;
    -ms-transform: rotate(90deg);
    -webkit-transform: rotate(90deg);
    transform: rotate(90deg);
  }
    #nursing-search{
      display: none;
    }

  #nursing-search .card-carousel-wrapper {
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 20px 0;
    color: #666a73;
  }

  #nursing-search .card-carousel {
    display: flex;
    justify-content: center;
    width: 1359px;
    overflow:auto;
  }

  #nursing-search .card-carousel--overflow-container {
    overflow: hidden;
  }

  #nursing-search .card-carousel--nav__left,
  #nursing-search .card-carousel--nav__right {
    display: inline-block;
    width: 15px;
    height: 15px;
    padding: 5px;
    box-sizing: border-box;
    border-top: 5px solid #ff9563;
    border-right: 5px solid #ff9563;
    margin: 0 10px;
    transition: transform 150ms linear;
  }

  #nursing-search .card-carousel--nav__left[disabled],
  #nursing-search .card-carousel--nav__right[disabled] {
    opacity: 0.2;
    border-color: black;
  }

  #nursing-search .card-carousel--nav__left {
    transform: rotate(-135deg);
  }

  #nursing-search .card-carousel--nav__left:active {
    transform: rotate(-135deg) scale(0.9);
  }

  #nursing-search .card-carousel--nav__right {
    transform: rotate(45deg);
  }

  #nursing-search .card-carousel--nav__right:active {
    transform: rotate(45deg) scale(0.9);
  }

  #nursing-search .card-carousel-cards {
    display: flex;
    transition: transform 150ms ease-out;
    transform: translatex(0px);
  }

  #nursing-search .card-carousel-cards .card-carousel--card {
    /* margin: 0 10px;
    box-shadow: 0 3px 6px rgba(0,0,0,0.16), 0 3px 6px rgba(0,0,0,0.23);
    background-color: #fff;
    border-radius: 4px;
    z-index: 3;
    margin-bottom: 2px;
    transition: all 0.3s cubic-bezier(.25,.8,.25,1); */
  }

  #nursing-search .card-carousel-cards .card-carousel--card:hover {
    /* box-shadow: 0 14px 28px rgba(0,0,0,0.25), 0 10px 10px rgba(0,0,0,0.22); */

  }

  #nursing-search .card-carousel-cards .card-carousel--card:first-child {
    margin-left: 0;
  }

  #nursing-search .card-carousel-cards .card-carousel--card:last-child {
    margin-right: 0;
  }


  #nursing-search .card-carousel-cards .card-carousel--card img:hover {
    opacity: 0.5;
  }

  #nursing-search .card-carousel-cards .card-carousel--card--footer {
    border-top: 0;
    padding: 7px 15px;
  }

  #nursing-search .card-carousel-cards .card-carousel--card--footer p {
    padding: 3px 0;
    margin: 0;
    margin-bottom: 2px;
    font-size: 19px;
    font-weight: 500;
    color: #2c3e50;
    user-select: none;
  }

  #nursing-search .card-carousel-cards .card-carousel--card--footer p:nth-of-type(2) {
    font-size: 12px;
    font-weight: 300;
    padding: 6px;
    background: rgba(40, 44, 53, 0.06);
    display: inline-block;
    position: relative;
    margin-left: 4px;
    color: #666a73;
  }

  #nursing-search .card-carousel-cards .card-carousel--card--footer p:nth-of-type(2):before {
    content: "";
    float: left;
    position: absolute;
    top: 0;
    left: -12px;
    width: 0;
    height: 0;
    border-color: transparent rgba(40, 44, 53, 0.06) transparent transparent;
    border-style: solid;
    border-width: 12px 12px 12px 0;
  }

 #nursing-search .card-carousel-cards .card-carousel--card--footer p:nth-of-type(2):after {
    content: "";
    position: absolute;
    top: 10px;
    left: -1px;
    float: left;
    width: 4px;
    height: 4px;
    border-radius: 2px;
    background: white;
    box-shadow: -0px -0px 0px #004977;
}
#nursing-search .nav-box[disabled] .card-carousel--nav__left,
#nursing-search .nav-box[disabled] .card-carousel--nav__right {
    border-top: 5px solid #000;
    border-right: 5px solid #000;
}
#nursing-search .nav-box[disabled] .nav-content {
    border: 2px solid #000;
    background: #fff
}

.nav-content {
    width: 50px;
    height: 50px;
    line-height: 50px;
    vertical-align: middle;
    background: #fffff4;
    border: 2px solid #ff9563;
    border-radius: 50%;
    text-align: center;
}
.fav-profile {
    top:0px;
    right:15px;
}



    .nursing-tabColor .nav-link {
        background: #ff9563 !important;
        color: #fff;
        border-right: 1px solid #fff;
    }

    .nursing-borderColor {
        border: 1px solid #ff9563 !important;
    }
    .tab-pane{
        padding: 10px;
    }
    .offset{
  width: 500px !important;
  margin: 20px auto;  
}
.page-item.active_page .spanclass {
  z-index: 1;
  background-color: #ffbb99;
    background-image: none;
    border: 1px solid #8e3c15;
}
.page-item .spanclass{
  cursor: pointer;
}
</style>

</style>
