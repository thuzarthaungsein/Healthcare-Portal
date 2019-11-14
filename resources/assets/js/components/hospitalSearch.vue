<template>
  <layout>
<div>
  <div class="col-md-12" style="border-bottom: 1px dashed #ff6117;padding-bottom: 10px; margin-bottom: 20px;">     
    <h5 class="font-weight-bold"><i class="fas fa-map" style="color:#ff6117;"></i>&nbsp;地図検索</h5>
  </div>
  <div class="search-map card-body"  @mouseover="getStateHover">
    <div class="row" id="hos">
      <div class="col-md-12">
        <div class="row">
          <div class="info-box"></div>
           <div class="col-md-12 col-sm-12 col-md-12 map-wrap">
            <div class="divisions" style="margin:0 auto">
              <div class="row " id="divisionswrap">
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
                       
                        
                        <a href="#" data-info="Shizuoka" class="path Shizuoka card-text" @click="getStateClick">
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
           

          <div class="col-12 hospitalselect pad-free">
            <h5 class="profile_header m-t-10" style="border-left: 5px solid #63b7ff;">現在の検索条件</h5>
          <table class="table table-bordered col-12">
            <tbody>
              <tr>
                <th>地域</th>
                <td>
                  <select id="selectCity" class="col-9 form-control custom-select mt-2 mb-2" v-model="id">
                    <option v-for="city in cities" :value="city.id" :key="city.id">{{city.city_name}}</option>
                  </select>
                  <button @click="toggleContent" class="btn col-3 seemore-btn">
                    <i class="fa" aria-hidden="true"></i>
                    <!-- <em>{{city.city_name}}</em> -->
                    <span id="close"><i class="fas fa-arrow-circle-up"></i> 市区町村エリアを閉じる</span>
                  </button>

                  <div class="toBeToggled" id="toBeToggled">

                    <div class="form-check form-check-inline col-sm-2" v-for="township in getTownships" :key="township.id">
                      <!-- <label class="form-check-label" > -->
                        <label class="form-check-label control control--checkbox" style="padding-left:5px;">
                        <input class="form-check-input" type="checkbox" :id="township.id" :value="township.id" v-model="townshipID" @click="getCheck($event)">
                        {{township.township_name}}
                        <div class="control__indicator"></div>
                      </label>
                    </div>

                  </div>
                </td>
              </tr>
              <tr class="toBeToggled1 ShowHide1">
                <th>
                  フリーワード
                </th>
                <td>
                    <input type="text" class="form-control mt-2 mb-2" id="" placeholder="例）施設名、エリア">
                </td>
              </tr>
              <tr class="toBeToggled1 ShowHide1">
                <th>特長</th>
                <td>
                  <div class="form-check form-check-inline col-sm-2 " v-for="feature in special_features" :key="feature.id">
                    <!-- <label class="form-check-label" > -->
                     <label class="form-check-label control control--checkbox" style="padding-left:5px;">
                      <input  class="form-check-input" type="checkbox" :id="feature.id" v-model="specialfeatureID" :value="feature.id" @click="features($event)">
                      {{feature.name}}
                      <div class="control__indicator"></div>
                    </label>
                  </div>


                </td>
              </tr>
              <tr class="toBeToggled1 ShowHide1">
                <th>診療科目</th>
                <td>
                  <div class="form-check form-check-inline col-sm-2" v-for="subject in subjects" :key="subject.id">
                    <!-- <label class="form-check-label" > -->
                        <label class="form-check-label control control--checkbox" style="padding-left:5px;">
                      <input class="form-check-input" type="checkbox" :id="subject.id" v-model="subjectID" :value="subject.id">
                      {{subject.name}}
                      <div class="control__indicator"></div>
                    </label>
                  </div>

                </td>
              </tr>

              <tr class="text-center">
                <td colspan="2" style="border:none;">
                  <button @click="ShowHide1" class="btn seemore-btn">
                    <i class="fa" aria-hidden="true"></i>
                    <span id="close2"><i class="fas fa-arrow-circle-down"></i> もっと見る</span>
                  </button>
                </td>
              </tr>
              <tr class="text-center">
                <td colspan="2">
                  <button type="button" class="main-bg-color create-btn all-btn" style="width:16%;" id="search" name="search" value="検索"  @click="search">
                  <i class="fas fa-search"></i>&nbsp; 検索
                  </button>
                </td>
              </tr>
            </tbody>
          </table>
          <div class="col-12">
            <div class="row">
            
              <div id="job_detail" class="col-md-12 col-sm-12 offset" style="margin-top:20px;" v-for="hos in displayItems" :key="hos.id">
                <div class="hos-content">
                  <div class="job-header">
                  <h5 class="hos-title">
                    <router-link :to="{name: 'profile', params: {cusid:hos.customer_id, type: 'hospital'}}" class="pseudolink">{{hos.name}}</router-link>
                </h5>

                </div>
                <div class="clearfix col-12 m-b-20">
                    <span v-for="(sub,index) in subject" :key="index+'-'+sub.name+'-'+hos.id">
                    <span v-if="sub.customer_id == hos.customer_id" class="job_status">
                      {{sub.name}}
                    </span>
                  </span>
                  <p class="hos_phone float-right"><span class="circle-phone"><i class="fa fa-phone-alt"></i></span>{{hos.phone}}</p>
                  </div>
                <div class="hos-body row clearfix">
                  <div class="col-3 job-img">
                    <img v-bind:src="'/upload/hospital_profile/' + hos.logo"  alt="img" class="img-fluid" @error="imgUrlAlt">
                  </div>
                  <div class="col-4 job-box">
                    <table  class="table table-bordered table-sm">
                        <!-- <tr>
                          <td style="width:30%;"><span class="job_ico"><i class="fa fa-user"></i></span>名前</td>
                          <td>{{hos.name}}</td>
                        </tr> -->
                          <tr>
                          <td style="width:30%;"><span class="job_ico"><i class="fa fa-envelope"></i></span>メールアドレス</td>
                          <td>{{hos.email}}</td>
                        </tr>
                        <tr>
                          <td style="width:30%;"><span class="job_ico"><i class="fa fa-map-marker"></i></span>住所</td>
                          <td>{{hos.address}}</td>
                        </tr>
                        <!-- <tr>
                          <td style="width:30%;"><span class="job_ico"><i class="fa fa-calendar-alt"></i></span>休業日</td>
                          <td>{{hos.closed_day}}</td>
                        </tr> -->
                    </table>
                    <!--special feature and subject-->
                <h5 class="header m-t-10">こだわりの特長</h5>
                  <span v-for="(spe,index) in specialfeatures" :key="index+'-'+spe.name+'-'+hos.id">
                    <span v-if="spe.customer_id == hos.customer_id" class="feature_list">
                      {{spe.name}}
                    </span>
                  </span>
                <!--end special feature and subject-->
                  </div>
                  <div class="col-5">
                    <!--schedule-->
                 <h5 class="header">診療時間</h5>
                  <!-- <tr v-for="(time,index) in timetable" :key="index+'-'+time.id+'-'+hos.id">
                    <td v-if="hos.customer_id == time.customer_id" >
                      {{time.mon}} / {{time.tue}} / {{time.wed}} / {{time.thu}} / {{time.fri}} / {{time.sat}} / {{time.sun}} / {{time.part}}
                    </td>
                  </tr> -->
                <table class="table table-bordered">
                    <thead>
                      <tr class="first-hos-row text-center">
                        <th style="width:10%">日付</th>
                        <th>月</th>
                        <th>火</th>
                        <th>水</th>
                        <th>木</th>
                        <th>金</th>
                        <th>土</th>
                        <th>日</th>

                      </tr>
                    </thead>
                    <tbody v-for="(time,index) in timetable" :key="index+'-'+time.id+'-'+hos.id">
                      <tr v-if="hos.customer_id == time.customer_id" class="text-center">
                        <td class="second-hos-row" style="width:8%;" v-if="time.part == 'am'">午前</td>
                        <td class="second-hos-row" style="width:8%;" v-if="time.part == 'pm'">午後</td>
                        <td style="width:10%;">{{time.mon}}</td>
                        <td style="width:10%;">{{time.tue}}</td>
                        <td style="width:10%;">{{time.wed}}</td>
                        <td style="width:10%;">{{time.thu}}</td>
                        <td style="width:10%;">{{time.fri}}</td>
                        <td style="width:10%;">{{time.sat}}</td>
                        <td style="width:10%;">{{time.sun}}</td>
                      </tr>
                    </tbody>
                </table>
               <span> <strong> 休診日：</strong>{{hos.closed_day}}</span>
               <!-- <p><span style="color: red; font-weight: bold; font-size: 15px;">※</span>診療時間は、変更される事や、診療科によって異なる場合があるため、直接医療機関のホームページ等でご確認ください。</p> -->
                <!--end schedule-->
                  </div>
                </div>
                <div class="mt-4 detail-btn text-center"><router-link :to="{name: 'profile', params: {cusid:hos.cus_id, type: 'hospital'}}" class="btn all-btn">詳細を見る</router-link></div>
              </div>
            </div>
          </div>         
        </div>
         <div class="offset-md-4 col-md-8" v-if="show_paginate">
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

    data() {
      return {
        id: '',
        timetable:[],
        hos_data:[],
        townshipID: [],
        township_id: [],
        cities: [],
        getCity: [],
        getTownships: [],
        specialfeatureID:[],
        special_features: [],
        specialfeatures:[],
        fac_types: [],
        fac_id: [],
        medical_acceptance: [],
        subjectID:[],
        subjects: [],
        subject:[],
        toggleCheck: true,
        toggleCheck_1: false,
        currentPage: 0,
        size: 1,
        pageRange: 5,
        items: [],
        show_paginate: false
      }
    },
    mounted() {
            $('#navtab').removeClass('news-tabColor hospital-tabColor nursing-tabColor job-tabColor');
            $('#navtab').addClass('hospital-tabColor');
            $('.tab-content').removeClass('news-borderColor job-borderColor nursing-borderColor hospital-borderColor');
            $('#upper-tab').addClass('hospital-borderColor');
        },
    methods: {

        search()
        {

          if(this.townshipID == null || this.townshipID == '')
          {
            this.townshipID[0] = 0;
          }
          if(this.specialfeatureID == null || this.specialfeatureID == '')
          {
            this.specialfeatureID[0] = 0;
          }
          if(this.subjectID == null || this.subjectID == '')
          {
            this.subjectID[0] = 0;
          }

          this.axios.get('api/gethospitalsearch',{
            params:{
                id: this.id,
                townshipID:this.townshipID,
                specialfeatureID:this.specialfeatureID,
                subjectID:this.subjectID
            },
          }).then((response)=>{

            this.hos_data = response.data.hospital;
            this.timetable = response.data.timetable;
            this.specialfeatures = response.data.specialfeature;
            this.subject = response.data.subject;

          })
          this.show_paginate = true;
        },

        groupBy(array, key){

            const result = {}
            array.forEach(item => {
            if (!result[item[key]]){
            result[item[key]] = []
            }
            result[item[key]].push(item)
            })
            return result
        },


      toggleContent() {
        this.toggleCheck = !this.toggleCheck;
        if (this.toggleCheck == true) {
          $('#close').empty();
          $("#toBeToggled").slideDown();
          $('#close').append('<i class="fas fa-arrow-circle-up"></i> 市区町村エリアを閉じる');

        } else {
          $('#close').empty();
          $("#toBeToggled").slideUp();
          $('#close').append('<i class="fas fa-arrow-circle-down"></i> 市区町村エリアを開く');
        }
      },
      ShowHide1() {
        this.toggleCheck_1 = !this.toggleCheck_1;
        if (this.toggleCheck_1 == true) {
          $('#close2').empty();
          $(".ShowHide1").slideDown();
          $('#close2').append('<i class="fas fa-arrow-circle-up"></i> 閉じる');

        } else {
          $('#close2').empty();
          $(".ShowHide1").slideUp();
          $('#close2').append('<i class="fas fa-arrow-circle-down"></i> もっと見る');
        }
      },
      getStateClick(e) {
        
          if(this.townshipID.length > 0)
          {
            this.townshipID = [];
          }
          if(this.specialfeatureID.length > 0)
          {
            this.specialfeatureID = [];
          }
          if(this.subjectID.length > 0)
          {
            this.subjectID = [];
          }
       
          if(e.target.id == ''){
            var id = $('#selectCity').val();
          }else{
            var id = e.target.id;
          }
          this.id = id;
         
          this.axios.get('api/getmap',{
              params:{
              id: this.id,
              township_id:-1,
              moving_in:-1,
              per_month:-1
          },
          })
            .then((response) => {
              $('.hospitalselect').removeClass('hospitalselect');
              this.cities = response.data.city
              this.getCity = response.data.getCity
              this.getTownships = response.data.getTownships
              this.special_features = response.data.special_features
              this.subjects = response.data.subjects
              this.id = id;

            })
            
        
      },
      getCheck(e) {
        if (e.target.checked) {
          this.township_id.push(e.target.value);
        }
      },
      features(e) {
        if (e.target.checked) {
        }
      },
      getStateHover(e) {
        if (e.target.tagName === 'path') {
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
    imgUrlAlt(event) {
                event.target.src = "images/noimage.jpg"
    },
    pageSelect(index) {
      this.currentPage = index - 1;
    }
    },
    computed: {
    pages() {
      return Math.ceil(this.hos_data.length / this.size);
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
      return this.hos_data.slice(head, head + this.size);
    },
    isSelected(page) {
      return page - 1 == this.currentPage;
    }
	},    
  };
  $(function() {  
      $( '#divisionswrap ul li' ).on( 'click', function(e) {
            e.preventDefault();        
            $( '#divisionswrap ul li' ).parent().find( 'li.active' ).removeClass( 'active' );       
            $( this ).addClass( 'active' );  
    });
  });
  $(function() {
$( '#page-item button' ).on( 'click', function(e) {
            e.preventDefault();        
            $( '#page-item button' ).parent().find( 'button.active' ).removeClass( 'active' );       
            $( this ).addClass( 'active' );  
    }); 
  });
</script>


<style scoped>

.active{
    background-color: #fffe00 !important;
    background-image: none;
    border: 1px solid #8e3c15;
}

  .hospitalselect {
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
    box-shadow: 0 1px 3px rgba(0, 0, 0, 0.12), 0 1px 2px rgba(0, 0, 0, 0.24);
    border-radius: 10px;
  }

  .toBeToggled {
    display: block;
  }

  .toBeToggled1 {
    display: none;
  }
  table>tbody>tr th {
    background-color: #e8e7e7;
    text-align: right;
    width: 140px;
    padding: 25px;
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

  .hospital-tabColor .nav-link {
        background: #63b7ff !important;
        color: #fff;
        border-right: 1px solid #fff;
    }
.hospital-borderColor {
        border: 1px solid #63b7ff !important;
    }
.tab-pane{
        padding: 10px;
    }
.page-item .spanclass{
  cursor: pointer;
}
</style>
