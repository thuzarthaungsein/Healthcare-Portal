<template>
<layout>
<div>
   <div class="col-md-12" style="border-bottom: 1px dashed #ff6117;padding-bottom: 10px; margin-bottom: 20px;">
     <h5 class="font-weight-bold"><i class="fas fa-map" style="color:#ff6117;"></i>&nbsp;地図検索</h5></div>
  <div class="search-map card-body" @mouseover="getStateHover">
    <div class="row" id="hos">
      <div class="col-md-12">
        <div>
          <!-- <div class="info-box"></div> -->
          <div class="row map-wrap">
          <div class="col-lg-5 col-md-12 col-sm-12 float-left" style="padding-left: 75px;">
            <h2 class="map-header" style="bottom: 184px;">老人ホームや病院<br/>で働きたいあなた<br/>の希望叶えます。</h2>
            <!--search input-->
              <div class="wrap">
                <div class="search">

                    <input type="text" class="searchTerm" id="search-word" placeholder="地名、駅名、施設名などを入力（例：東京駅）">
                    <button type="submit" class="searchButton" @click="searchfreeword">
                      <i class="fas fa-search"></i> 検索
                  </button>
                </div>
              </div>
            <!--end search input-->
            </div>
          <div class="col-lg-7 col-sm-12 col-md-12 float-right">
              <div class="row divisions" id="divisionswrap">
                 <img src="/images/img_map1.png" alt="map" class="img-fluid" style="margin:0 auto;">
                <div class="col-sm-2 hokkaido-box">
                  <div class="mb-3">
                    <div class="division-box">
                      <ul class="hokkaido-wrap">
                        <a data-info="Hokkaido" class="path Hokkaido card-text" @click="getStateClick">
                            <li class="spanclass" id="1" @click="selected = 1" :class="{highlight:selected == 1}">北海道</li>
                        </a>
                      </ul>
                    </div>
                  </div>
                </div>
                <div class="col-sm-2 tohoku-box">
                  <div class="mb-3">
                    <div class="division-box">

                      <ul class="multiple-boxa">
                        <a data-info="Aomori" class="path Aomori card-text" @click="getStateClick" >
                            <li class="spanclass" id="2" @click="selected = 2" :class="{highlight:selected == 2}">青森</li>
                        </a>
                        <a data-info="Iwate" class="path Iwate card-text" @click="getStateClick">
                            <li class="spanclass" id="3" @click="selected = 3" :class="{highlight:selected == 3}" >岩手</li>
                        </a>
                        <a data-info="Akita" class="path Akita card-text" @click="getStateClick">
                            <li class="spanclass" id="5" @click="selected = 5" :class="{highlight:selected == 5}">秋田</li>
                        </a>

                        <a data-info="Miyagi" class="path Miyagi card-text" @click="getStateClick">
                            <li class="spanclass" id="4" @click="selected = 4" :class="{highlight:selected == 4}">宮城</li>
                        </a>

                        <a  data-info="Yamagata" class="path Yamagata card-text" @click="getStateClick">
                            <li class="spanclass" id="6" @click="selected = 6" :class="{highlight:selected == 6}">山形</li>
                        </a>
                        <a data-info="Fukushima" class="path Fukushima card-text" @click="getStateClick">
                            <li class="spanclass" id="7"  @click="selected = 7" :class="{highlight:selected == 7}">福島</li>
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
                        <a data-info="Tokyo" class="path Tokyo card-text" @click="getStateClick">
                             <li class="spanclass" id="13" @click="selected = 13" :class="{highlight:selected == 13}" >東京</li>
                        </a>
                        <a data-info="Kanagawa" class="path Kanagawa card-text" @click="getStateClick">
                            <li class="spanclass" id="14" @click="selected = 14" :class="{highlight:selected == 14}">神奈川</li>
                        </a>

                        <a data-info="Saitama" class="path Saitama card-text" @click="getStateClick">
                            <li class="spanclass" id="11" @click="selected = 11" :class="{highlight:selected == 11}">埼玉</li>
                        </a>

                        <a data-info="Chiba" class="path Chiba card-text" @click="getStateClick">
                            <li class="spanclass" id="12" @click="selected = 12" :class="{highlight:selected == 12}">千葉</li>
                        </a>

                        <a data-info="Gunma" class="path Gunma card-text" @click="getStateClick">
                            <li class="spanclass" id="10" @click="selected = 10" :class="{highlight:selected == 10}">群馬</li>
                        </a>

                        <a data-info="Ibaraki" class="path Ibaraki card-text" @click="getStateClick">
                            <li class="spanclass" id="8" @click="selected = 8" :class="{highlight:selected == 8}" >茨城</li>
                        </a>
                        <a data-info="Tochigi" class="path Tochigi card-text" @click="getStateClick">
                              <li class="spanclass" id="9" @click="selected = 9" :class="{highlight:selected == 9}">栃木</li>
                        </a>

                        <a data-info="Yamanashi" class="path Yamanashi card-text" @click="getStateClick">
                            <li class="spanclass" id="19" @click="selected = 19" :class="{highlight:selected == 19}">山梨</li>
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
                        <a data-info="Niigata" class="path Niigata card-text" @click="getStateClick">
                            <li class="spanclass" id="15" @click="selected = 15" :class="{highlight:selected == 15}"  >新潟</li>
                        </a>

                        <a data-info="Nagano" class="path Nagano card-text" @click="getStateClick">
                            <li class="spanclass" id="20" @click="selected = 20" :class="{highlight:selected == 20}" >長野</li>
                        </a>

                          <a data-info="Toyama" class="path Toyama card-text" @click="getStateClick">
                            <li class="spanclass" id="16" @click="selected = 16" :class="{highlight:selected == 16}">富山</li>
                        </a>

                        <a data-info="Ishikawa" class="path Ishikawa card-text" @click="getStateClick">
                            <li class="spanclass" id="17" @click="selected = 17" :class="{highlight:selected == 17}">石川</li>
                        </a>

                        <a data-info="Fukui" class="path Fukui card-text" @click="getStateClick">
                             <li class="spanclass" id="18" @click="selected = 18" :class="{highlight:selected == 18}">福井</li>
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
                        <a data-info="Aichi" class="path Aichi card-text" @click="getStateClick">
                              <li class="spanclass" id="23" @click="selected = 23" :class="{highlight:selected == 23}">愛知</li>
                        </a>


                        <a data-info="Shizuoka" class="path Shizuoka card-text" @click="getStateClick">
                            <li class="spanclass" id="22" @click="selected = 22" :class="{highlight:selected == 22}">静岡</li>
                        </a>

                        <a id="21" data-info="Gifu" class="path Gifu card-text" @click="getStateClick">
                            <li class="spanclass" id="21" @click="selected = 21" :class="{highlight:selected == 21}">岐阜</li>
                        </a>

                        <a data-info="Mie" class="path Mie card-text" @click="getStateClick">
                             <li class="spanclass"  id="24" @click="selected = 24" :class="{highlight:selected == 24}">三重</li>
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
                        <a data-info="Osaka" class="path Osaka card-text" @click="getStateClick">
                            <li class="spanclass" id="27" @click="selected = 27" :class="{highlight:selected == 27}">大阪府</li>
                        </a>

                        <a data-info="Hyogo" class="path Hyogo card-text" @click="getStateClick">
                             <li class="spanclass" id="28" @click="selected = 28" :class="{highlight:selected == 28}">兵庫</li>
                        </a>

                        <a data-info="Kyoto" class="path Kyoto card-text" @click="getStateClick">
                            <li class="spanclass"  id="26" @click="selected = 26" :class="{highlight:selected == 26}">京都府</li>
                        </a>

                        <a data-info="Nara" class="path Nara card-text" @click="getStateClick">
                            <li class="spanclass"  id="29" @click="selected = 29" :class="{highlight:selected == 29}">奈良</li>
                        </a>

                        <a data-info="Shiga" class="path Shiga card-text" @click="getStateClick">
                              <li class="spanclass"  id="25" @click="selected = 25" :class="{highlight:selected == 25}">滋賀</li>
                        </a>

                        <a data-info="Wakayama" class="path Wakayama card-text" @click="getStateClick">
                            <li class="spanclass" id="30" @click="selected = 30" :class="{highlight:selected == 30}">和歌山</li>
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
                        <a data-info="Okayama" class="path Okayama card-text" @click="getStateClick">
                             <li class="spanclass" id="33" @click="selected = 33" :class="{highlight:selected == 33}">岡山</li>
                        </a>

                        <a data-info="Hiroshima" class="path Hiroshima card-text" @click="getStateClick">
                            <li class="spanclass" id="34" @click="selected = 34" :class="{highlight:selected == 34}">広島</li>
                        </a>

                        <a data-info="Yamaguchi" class="path Yamaguchi card-text" @click="getStateClick">
                            <li class="spanclass" id="35" @click="selected = 35" :class="{highlight:selected == 35}">山口</li>
                        </a>

                        <a data-info="Shimane" class="path Shimane card-text" @click="getStateClick">
                            <li class="spanclass" id="32" @click="selected = 32" :class="{highlight:selected == 32}">島根</li>
                        </a>

                        <a data-info="Tottori" class="path Tottori card-text" @click="getStateClick">
                            <li class="spanclass"  id="31" @click="selected = 31" :class="{highlight:selected == 31}">鳥取</li>
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
                        <a data-info="Tokushima" class="path Tokushima card-text" @click="getStateClick">
                            <li class="spanclass" id="36"  @click="selected = 36" :class="{highlight:selected == 36}">徳島</li>
                        </a>

                        <a data-info="Kagawa" class="path Kagawa card-text" @click="getStateClick">
                            <li class="spanclass" id="37" @click="selected = 37" :class="{highlight:selected == 37}">香川</li>
                        </a>

                        <a data-info="Kochi" class="path Kochi card-text" @click="getStateClick">
                            <li class="spanclass" id="39" @click="selected = 39" :class="{highlight:selected == 39}">高知</li>
                        </a>

                        <a data-info="Ehime" class="path Ehime card-text" @click="getStateClick">
                            <li class="spanclass" id="38" @click="selected = 38" :class="{highlight:selected == 38}">愛媛</li>
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
                        <a data-info="Fukuoka" class="path Fukuoka card-text" @click="getStateClick">
                          <li class="spanclass" id="40" @click="selected = 40" :class="{highlight:selected == 40}">福岡</li>
                        </a>

                        <a data-info="Saga" class="path Saga card-text" @click="getStateClick">
                            <li class="spanclass" id="41" @click="selected = 41" :class="{highlight:selected == 41}">佐賀</li>
                        </a>

                        <a data-info="Nagasaki" class="path Nagasaki card-text" @click="getStateClick">
                            <li class="spanclass" id="42" @click="selected = 42" :class="{highlight:selected == 42}">長崎</li>
                        </a>

                        <a data-info="Oita" class="path Oita card-text" @click="getStateClick">
                            <li class="spanclass" id="44" @click="selected = 44" :class="{highlight:selected == 44}">大分</li>
                        </a>

                       <a data-info="Kumamoto" class="path Kumamoto card-text" @click="getStateClick">
                           <li class="spanclass" id="43" @click="selected = 43" :class="{highlight:selected == 43}">熊本</li>
                        </a>


                        <a data-info="Miyazaki" class="path Miyazaki card-text" @click="getStateClick">
                              <li class="spanclass" id="45"  @click="selected = 45" :class="{highlight:selected == 45}">宮崎</li>
                        </a>

                        <a data-info="Kagoshima" class="path Kagoshima card-text" @click="getStateClick">
                            <li class="spanclass" id="46"  @click="selected = 46" :class="{highlight:selected == 46}">鹿児島</li>
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
                          <a data-info="Okinawa" class="path Okinawa card-text" @click="getStateClick">
                              <li class="spanclass" id="47" @click="selected = 47" :class="{highlight:selected == 47}">沖縄県</li>
                        </a>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>

            <!-- <div class="map">

            </div> -->
          </div>
        </div>


          <div class="row jobselect">
             <h5 class="profile_header m-t-10" style="border-left: 5px solid #828282;">現在の検索条件</h5>
            <table class="table table-bordered col-12 ">
              <tbody>
                <tr>
                  <th>地域</th>
                  <td>
                    <select id="selectCity"   class="col-9 form-control custom-select mt-2 mb-2" v-model="id" @change="changeTownship">
                         <option value="-1">▼市区町村</option>
                      <option v-for = "city in cities" :value="city.id" :key="city.id" >{{city.city_name}}</option>
                    </select>
                    <button @click="toggleContent4" class="btn col-3 seemore-btn">
                      <i class="fa" aria-hidden="true"></i>
                          <!-- <em>{{city.city_name}}</em> -->
                          <span id="close6"><i class="fas fa-arrow-circle-up"></i> 市区町村エリアを閉じる </span>
                    </button>

                    <div  class="toBeToggled4" id="toBeToggled4">

                      <div class="form-check form-check-inline col-sm-2"   v-for="township in getTownships" :key="township.id">
                        <label class="form-check-label control control--checkbox" style="padding-left:5px;">
                         <input class="form-check-input" type="checkbox" :id="township.id" :value="township.id" v-model="townshipID" @change="getCheck($event)">

                        {{township.township_name}}
                        <div class="control__indicator"></div>
                        </label>
                      </div>

                    </div>
                  </td>
                </tr>

                <tr class="toBeToggled1 ShowHide">
                  <th>
                  フリーワード
                  </th>
                  <td>

                      <input type="text" class="form-control mt-2 mb-2" id=""  placeholder="例）施設名、エリア">

                  </td>
                </tr>
                <tr class="toBeToggled1 ShowHide">
                  <th>職種</th>
                  <td>
                      <div class="form-check form-check-inline col-sm-2"  v-for="occupation in occupations" :key="occupation.id">
                        <label class="form-check-label control control--checkbox" style="padding-left:5px;">
                        <input class="form-check-input" type="checkbox" :id="occupation.id" :value="occupation.id" v-model="occupationID" >

                        {{occupation.name}}
                        <div class="control__indicator"></div>
                        </label>
                      </div>
                  </td>
                </tr>
                <tr class="toBeToggled1 ShowHide">
                  <th style="padding:10px;">雇用形態</th>
                  <td>
                  <div class="form-check form-check-inline col-sm-2">
                    <label class="form-check-label control control--checkbox" style="padding-left:5px;">
                    <input class="form-check-input" value="正職員" v-model="empstatus" type="checkbox">
                    正社員(正職員)
                    <div class="control__indicator"></div>
                    </label>
                  </div>
                  <div class="form-check form-check-inline col-sm-2">
                    <label class="form-check-label control control--checkbox" style="padding-left:5px;">
                    <input class="form-check-input" value="契約社員" v-model="empstatus" type="checkbox">
                    契約社員(職員)
                    <div class="control__indicator"></div>
                    </label>
                  </div>
                  <div class="form-check form-check-inline col-sm-2">
                    <label class="form-check-label control control--checkbox" style="padding-left:5px;">
                    <input class="form-check-input" value="非常勤" v-model="empstatus" type="checkbox">
                    非常勤。パート
                    <div class="control__indicator"></div>
                    </label>
                  </div>
                  <div class="form-check form-check-inline col-sm-2">
                    <label class="form-check-label control control--checkbox" style="padding-left:5px;">
                    <input class="form-check-input" value="その他" v-model="empstatus" type="checkbox">
                    その他
                    <div class="control__indicator"></div>
                    </label>
                  </div>

                  </td>
                </tr>

                <tr class="text-center">
                  <td colspan='2' style="border:none;">
                    <button @click="ShowHide4" class="btn seemore-btn">
                      <i class="fa" aria-hidden="true"></i>
                          <span id="close4"><i class="fas fa-arrow-circle-down"></i> もっと見る</span>
                    </button>
                  </td>
                </tr>

                <tr class="text-center">
                  <td colspan="2" style="border:none;">

                     <button class="main-bg-color create-btn all-btn" style="width:16%;" @click="search"><i class="fas fa-search"></i>&nbsp; 検索 </button>

                  </td>
                </tr>

              </tbody>
            </table>
             <div class=" col-12">
                <div class="row">
                   <div id="job_detail" class="col-md-6 col-sm-12" style="margin-top:20px;" v-for="job in displayItems" :key="job.jobid">
                     <div class="job-content">
                      <div class="job-header">
                        <h5 class="job-tit">
                          <router-link :to="{name: 'job_details', params:{id:job.jobid}}">{{job.title}}</router-link>
                          </h5>
                        <div class="clearfix">
                          <p class="job_status">{{job.employment_status}}</p>
                          <p class="job_id"><span>求人番号:</span>{{job.jobnum}}</p>
                        </div>
                      </div>
                      <div class="job-body row  clearfix">
                        <!-- <div class="col-4 job-img">
                          <img src="/upload/news/nursing.JPG"  alt="">
                        </div> -->
                        <div class="col-12 job-box">
                          <table  class="table table-bordered  table-sm">
                            <tr>
                              <td><span class="job_ico"><i class="fa fa-map-marker-alt"></i></span>最寄り駅</td>
                              <td>{{job.nearest_station}}</td>
                            </tr>
                            <tr>
                              <td><span class="job_ico">&#xa5;</span>給料</td>
                              <td>{{job.salary_type}} : {{(Number(job.salary)).toLocaleString()}} ¥ </td>
                            </tr>
                            <tr>
                              <td><span class="job_ico">時</span>勤務時間/日/休日の詳細</td>
                              <td> {{job.working_hours}} / {{job.holidays}}  </td>
                            </tr>
                            <tr>
                              <td><span class="job_ico"><i class="fa fa-briefcase"></i></span>特別な条件</td>
                              <td> {{job.allowances}} </td>
                            </tr>
                          </table>
                        </div>
                      </div>
                      <div class="mt-4 detail-btn">
                        <span class="btn all-btn" @click="gotoJobdetail(job.jobid)">詳細を見る</span>
                        <!-- <router-link :to="{name: 'job_details', params:{id:job.jobid}}" class="btn all-btn">詳細を見る</router-link> -->
                        </div>
                    </div>
                  </div>
                </div>
              </div>
            <div class="offset-md-4 col-md-8 mt-3" v-if="show_paginate">
              <nav aria-label="Page navigation example">
                <ul class="pagination">
                  <li class="page-item">
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

    </div>
  </div>
  </div>
</layout>
</template>


<script>
import layout from '../components/home.vue'
import asidebar from "./aside.vue";
export default {
    components: {
      asidebar,
      layout
    },
    data(){
      return{
        id:'',
        townshipID:[],
        township_id:[],
        cities:[],
        getCity:[],
        township_id:-1,
        moving_in:-1,
        per_month:-1,
        getTownships:[],
        special_features:[],
        fac_types:[],
        fac_id:[],
        medical_acceptance:[],
        subjects:[],
        occupationID:[],
        occupations:[],
        toggleCheck: true,
        toggleCheck_1: false,
        empstatus:[],
        job_data:[],
        currentPage: 0,
        size: 20,
        pageRange: 5,
        items: [],
        show_paginate: false,
        loginuser: true,
        selected: undefined
      }
    },
    created() {
        this.axios.get('/api/user').then(response => {
                this.pro_id = response.data.lat_lng[0].id;
                this.loginuser = true;
                }).catch((error) => {
                    this.loginuser = false;
                })
    },
    mounted() {
            $('#navtab').removeClass('news-tabColor hospital-tabColor nursing-tabColor job-tabColor');
            $('#navtab').addClass('job-tabColor');
            $('.tab-content').removeClass('news-borderColor job-borderColor nursing-borderColor hospital-borderColor');
            $('#upper-tab').addClass('job-borderColor');
        },
  methods:{

    search()
    {


        if(this.townshipID == null || this.townshipID == '')
        {
          this.townshipID[0] = 0;
        }
        if(this.occupationID == null || this.occupationID == '')
        {
          this.occupationID[0] = 0;
        }
        if(this.empstatus == null || this.empstatus == '')
        {
          this.empstatus[0] = 0;
        }

        this.axios.get('api/getjobsearch/null',{
          params:{
              id: this.id,
              townshipID:this.townshipID,
              occupationID:this.occupationID,
              empstatus:this.empstatus
          },
        }).then((response)=>{

          this.job_data = response.data;

          if(this.job_data.length > this.size) {
              this.show_paginate = true;
          }else{
              this.show_paginate = false;
          }


        })

         // window.scrollTo({ top : 1000, behavior: 'smooth' });
    },
    searchfreeword(){

            //clear all checkbox
            this.id = -1;
            this.townshipID = [];
            this.occupationID = [];
            this.empstatus = [];


            if ($('#search-word').val() != '')
            {
                var search_word = $('#search-word').val();

                this.axios.get('api/getjobsearch/'+ search_word).then((response)=>{

                    this.job_data = response.data;
                    this.getTownships = [];
                    // if(this.job_data.length > this.size) {
                    //     this.show_paginate = true;
                    // }else{
                    //     this.show_paginate = false;
                    // }
                });

            }

        },

    gotoJobdetail(jid) {
        this.$router.push({ name: 'job_details', params:{id:jid,loginuser:this.loginuser}});
    },

    toggleContent4() {
        this.toggleCheck = !this.toggleCheck;
            if (this.toggleCheck == true) {
                $('#close6').empty();
                $("#toBeToggled4").slideToggle();
                $('#close6').append('<i class="fas fa-arrow-circle-up"></i> 市区町村エリアを閉じる');

            } else {
                $('#close6').empty();
                $("#toBeToggled4").slideToggle();
                $('#close6').append('<i class="fas fa-arrow-circle-down"></i> 市区町村エリアを開く');
            }
        },
        ShowHide4() {
        this.toggleCheck_1 = !this.toggleCheck_1;
            if (this.toggleCheck_1 == true) {
                $('#close4').empty();
                $(".ShowHide").slideDown();
                $('#close4').append('<i class="fas fa-arrow-circle-up"></i> 閉じる');

            } else {
                $('#close4').empty();
                $(".ShowHide").slideUp();
                $('#close4').append('<i class="fas fa-arrow-circle-down"></i> もっと見る');
            }
        },
        changeTownship()
        {
            this.axios.get('api/getmap/null',{
            params:{
              id: this.id,
              township_id:-1,
              moving_in:-1,
              per_month:-1
          },
          })
          .then((response)=>{

          $('.jobselect').removeClass('jobselect');
            this.cities = response.data.city
            this.getCity = response.data.getCity
            this.getTownships = response.data.getTownships
            this.occupations = response.data.occupations
            this.id = id
         })

        this.search();
        },

      getStateClick(e){

          //clear all check box
            this.townshipID = [];
            this.occupationID = [];
            this.empstatus = [];
          if(e.target.id == ''){
            var id = $('#selectCity').val();
          }else{
            var id = e.target.id;
          }
          this.id = id;



          this.axios.get('api/getmap/null',{
            params:{
              id: this.id,
              township_id:-1,
              moving_in:-1,
              per_month:-1
          },
          })
          .then((response)=>{

          $('.jobselect').removeClass('jobselect');
          this.cities = response.data.city
          this.getCity = response.data.getCity
          this.getTownships = response.data.getTownships
          this.occupations = response.data.occupations
          this.id = id
         })

        this.search();

      },

      getCheck(e){

         console.log(this.townshipID);
        // console.log(this.townshipID);
        // if(e.target.checked){
        //   this.township_id = e.target.value;
        //    this.township_id.push(e.target.value);
        //    console.log(this.township_id);
        // }
      },
      features(e){
        if(e.target.checked){

        }
      },
      getStateHover(e){
        if(e.target.tagName ==='path'){
         //console.log(e)
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
    }
    },
    computed: {
    pages() {
      return Math.ceil(this.job_data.length / this.size);
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
      return this.job_data.slice(head, head + this.size);
    },
    isSelected(page) {
      return page - 1 == this.currentPage;
    }
	},
};

  // $("#search").on("click", function() {
  //   alert('a');
  //     // $("body").scrollTop(0);
  // });


// $(function() {
//   $( '#divisionswrap ul li' ).on( 'click', function(e) {
//         e.preventDefault();
//         $( '#divisionswrap ul li' ).parent().find( 'li.active' ).removeClass( 'active' );
//         $( this ).addClass( 'active' );
//  });

// });
</script>


<style scoped>
.highlight{
    background-color: #ccff60 !important;
    background-image: none;
    border: 1px solid #8e3c15;
    color: #ff6117;
}
.jobselect {
  display: none;
}
.offset {
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


.card-2 {
  box-shadow: 0 1px 3px rgba(0,0,0,0.12), 0 1px 2px rgba(0,0,0,0.24);
  border-radius:10px;
}
.toBeToggled4 {
    display: block;
}

.toBeToggled1 {
    display: none;
}

table > tbody > tr th{
  background-color: #eeeeee;
  text-align:right;
  width:140px;
  padding:25px;
}
.job-tabColor .nav-link {
    background: #828282 !important;
    color: #fff;
    border-right: 1px solid #fff;
}

.job-borderColor {
    border: 1px solid #828282 !important;
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
