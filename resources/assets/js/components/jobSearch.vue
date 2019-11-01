<template>
  <div class="search-map card-body" @click="getStateClick" @mouseover="getStateHover">
    <div class="row" id="hos">
      <div class="col-md-12">
        <div class="row">
          <div class="info-box"></div>
          <div class="col-sm-11 col-offset-1 map-wrap" style="margin:0 auto">
            <div class="divisions">
              <div class="row">
                <div class="col-sm-2 hokkaido-box">
                  <div class="mb-3">                    
                    <div class="hokkaido-wrap">
                      <ul>    
                        <li class="spanclass">
                         <a href="#" id="1" data-info="Hokkaido" class="path Hokkaido card-text">北海道</a>
                       </li>                    
                        <li class="spanclass">
                          <a href="#" id="2" data-info="Aomori" class="path Aomori card-text">青森県</a>
                        </li>
                        <li class="spanclass">
                          <a href="#" id="3" data-info="Iwate" class="path Iwate card-text">岩手県</a>
                        </li>
                        <li class="spanclass">
                          <a href="#" id="4" data-info="Miyagi" class="path Miyagi card-text">宮城県</a>
                        </li>
                        <li class="spanclass">
                          <a href="#" id="5" data-info="Akita" class="path Akita card-text">秋田県</a>
                        </li>
                        <li class="spanclass">
                          <a  href="#" id="6" data-info="Yamagata" class="path Yamagata card-text">山形県</a>
                        </li>
                        <li class="spanclass">
                          <a href="#" id="7" data-info="Fukushima" class="path Fukushima card-text">福島県</a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>

                <div class="col-sm-2 kanto-box">
                  <div class="mb-3">
                    <!-- <div class="card-header pad-10" style="background-color:#71d5cb">関東</div> -->
                    <div class="division-wrapper">
                      <ul class="">
                        <li class="spanclass">
                          <a href="#" id="8" data-info="Ibaraki" class="path Ibaraki card-text">茨城県</a>
                        </li>
                        <li class="spanclass">
                          <a href="#" id="9" data-info="Tochigi" class="path Tochigi card-text">栃木県</a>
                        </li>
                        <li class="spanclass">
                          <a href="#" id="10" data-info="Gunma" class="path Gunma card-text">群馬県</a>
                        </li>
                        <li class="spanclass">
                          <a href="#" id="11" data-info="Saitama" class="path Saitama card-text">埼玉県</a>
                        </li>
                        <li class="spanclass">
                          <a href="#" id="12" data-info="Chiba" class="path Chiba card-text">千葉県</a>
                        </li>
                        <li class="spanclass">
                          <a href="#" id="13" data-info="Tokyo" class="path Tokyo card-text">東京都</a>
                        </li>
                        <li class="spanclass">
                          <a href="#" id="14" data-info="Kanagawa" class="path Kanagawa card-text">神奈川県</a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>

                <div class="col-sm-3 hokuriku-box">
                  <div class="mb-3">
                    <!-- <div class="card-header pad-10" style="background-color:#75b777">北陸</div> -->
                    <div class="">
                      <ul class="">
                        <li class="spanclass">
                          <a
                            href="#"
                            id="15"
                            data-info="Niigata"
                            class="path Niigata card-text"
                          >新潟県</a>
                        </li>
                        <li class="spanclass">
                          <a href="#" id="16" data-info="Toyama" class="path Toyama card-text">富山県</a>
                        </li>
                        <li class="spanclass">
                          <a
                            href="#"
                            id="17"
                            data-info="Ishikawa"
                            class="path Ishikawa card-text"
                          >石川県</a>
                        </li>
                        <li class="spanclass">
                          <a href="#" id="18" data-info="Fukui" class="path Fukui card-text">福井県</a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>

                <div class="col-sm-3 tokai-box">
                  <div class="mb-3">
                    <!-- <div class="card-header pad-10" style="background-color:#c0c743">東海甲信</div> -->
                    <div class="">
                      <ul class="">
                        <li class="spanclass">
                          <a
                            href="#"
                            id="19"
                            data-info="Yamanashi"
                            class="path Yamanashi card-text"
                          >山梨県</a>
                        </li>
                        <li class="spanclass">
                          <a href="#" id="20" data-info="Nagano" class="path Nagano card-text">長野県</a>
                        </li>
                        <li class="spanclass">
                          <a href="#" id="21" data-info="Gifu" class="path Gifu card-text">岐阜県</a>
                        </li>
                        <li class="spanclass">
                          <a
                            href="#"
                            id="22"
                            data-info="Shizuoka"
                            class="path Shizuoka card-text"
                          >静岡県</a>
                        </li>
                        <li class="spanclass">
                          <a href="#" id="23" data-info="Aichi" class="path Aichi card-text">愛知県</a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>

                <div class="col-sm-4 kinki-box">
                  <div class="mb-3">
                    <!-- <div class="card-header pad-10" style="background:#efb838">近畿</div> -->
                    <div class="">
                      <ul class="">
                        <li class="spanclass">
                          <a href="#" id="24" data-info="Mie" class="path Mie card-text">三重県</a>
                        </li>
                        <li class="spanclass">
                          <a href="#" id="25" data-info="Shiga" class="path Shiga card-text">滋賀県</a>
                        </li>
                        <li class="spanclass">
                          <a href="#" id="26" data-info="Kyoto" class="path Kyoto card-text">京都府</a>
                        </li>
                        <li class="spanclass">
                          <a href="#" id="27" data-info="Osaka" class="path Osaka card-text">大阪府</a>
                        </li>
                        <li class="spanclass">
                          <a href="#" id="28" data-info="Hyogo" class="path Hyogo card-text">兵庫県</a>
                        </li>
                        <li class="spanclass">
                          <a href="#" id="29" data-info="Nara" class="path Nara card-text">奈良県</a>
                        </li>
                        <li class="spanclass">
                          <a
                            href="#"
                            id="30"
                            data-info="Wakayama"
                            class="path Wakayama card-text"
                          >和歌山県</a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>

                <div class="col-sm-3 chugoku-box">
                  <div class="mb-3">
                    <!-- <div class="card-header pad-10" style="background:#f58c3f;">中国</div> -->
                    <div class="">
                      <ul class="">
                        <li class="spanclass">
                          <a
                            href="#"
                            id="31"
                            data-info="Tottori"
                            class="path Tottori card-text"
                          >鳥取県</a>
                        </li>
                        <li class="spanclass">
                          <a
                            href="#"
                            id="32"
                            data-info="Shimane"
                            class="path Shimane card-text"
                          >島根県</a>
                        </li>
                        <li class="spanclass">
                          <a
                            href="#"
                            id="33"
                            data-info="Okayama"
                            class="path Okayama card-text"
                          >岡山県</a>
                        </li>
                        <li class="spanclass">
                          <a
                            href="#"
                            id="34"
                            data-info="Hiroshima"
                            class="path Hiroshima card-text"
                          >広島県</a>
                        </li>
                        <li class="spanclass">
                          <a
                            href="#"
                            id="35"
                            data-info="Yamaguchi"
                            class="path Yamaguchi card-text"
                          >山口県</a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>

                <div class="col-sm-3 shikoku-box">
                  <div class="mb-3">
                    <!-- <div class="card-header pad-10" style="background:#f1a296;">四国</div> -->
                    <div class="">
                      <ul class="">
                        <li class="spanclass">
                          <a
                            href="#"
                            id="36"
                            data-info="Tokushima"
                            class="path Tokushima card-text"
                          >徳島県</a>
                        </li>
                        <li class="spanclass">
                          <a href="#" id="37" data-info="Kagawa" class="path Kagawa card-text">香川県</a>
                        </li>
                        <li class="spanclass">
                          <a href="#" id="38" data-info="Ehime" class="path Ehime card-text">愛媛県</a>
                        </li>
                        <li class="spanclass">
                          <a href="#" id="39" data-info="Kochi" class="path Kochi card-text">高知県</a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>

                <div class="col-sm-2 okinawa-box">
                  <div class="mb-3">
                    <!-- <div class="card-header pad-10" style="background-color:#e77a72;">九州・沖縄</div> -->
                    <div class="">
                      <ul class="">
                        <li class="spanclass">
                          <a
                            href="#"
                            id="40"
                            data-info="Fukuoka"
                            class="path Fukuoka card-text"
                          >福岡県</a>
                        </li>
                        <li class="spanclass">
                          <a href="#" id="41" data-info="Saga" class="path Saga card-text">佐賀県</a>
                        </li>
                        <li class="spanclass">
                          <a
                            href="#"
                            id="42"
                            data-info="Nagasaki"
                            class="path Nagasaki card-text"
                          >長崎県</a>
                        </li>
                        <li class="spanclass">
                          <a
                            href="#"
                            id="43"
                            data-info="Kumamoto"
                            class="path Kumamoto card-text"
                          >熊本県</a>
                        </li>
                        <li class="spanclass">
                          <a href="#" id="44" data-info="Oita" class="path Oita card-text">大分県</a>
                        </li>
                        <li class="spanclass">
                          <a
                            href="#"
                            id="45"
                            data-info="Miyazaki"
                            class="path Miyazaki card-text"
                          >宮崎県</a>
                        </li>
                        <li class="spanclass">
                          <a
                            href="#"
                            id="46"
                            data-info="Kagoshima"
                            class="path Kagoshima card-text"
                          >鹿児島県</a>
                        </li>
                        <li class="spanclass">
                          <a
                            href="#"
                            id="47"
                            data-info="Okinawa"
                            class="path Okinawa card-text"
                          >沖縄県</a>
                        </li>
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- <div class="map">
              
            </div> -->
          </div>

         
          <div class="col-12 jobselect"> 
             <h5 class="profile_header" style="border-left: 5px solid #828282;">現在の検索条件</h5>      
            <table class="table table-bordered col-12 ">
              <tbody>
                <tr>
                  <th>地域</th>
                  <td>
                    <select  id="select" class="col-9 form-control custom-select mt-2 mb-2" v-model="id">
                      <option v-for = "city in cities" :value="city.id" :key="city.id" >{{city.city_name}}</option>
                    </select>
                    <button @click="toggleContent4" class="btn col-3 seemore-btn">
                      <i class="fa" aria-hidden="true"></i>
                          <!-- <em>{{city.city_name}}</em> -->
                          <span id="close6"><i class="fas fa-arrow-circle-up"></i> 都道府県を閉じる </span>
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

                     <button class="main-bg-color create-btn all-btn" id="search" style="width:16%;" @click="search"><i class="fas fa-search"></i>&nbsp; 検索 </button>

                  </td>
                </tr>

              </tbody>
            </table>
            </div>  
            
              <div class=" col-12">
                <div class="row">
                   <div id="job_detail" class="col-md-6 col-sm-12" style="margin-top:20px;" v-for="job in job_data" :key="job.jobid">
                     <div class="job-content">
                      <div class="job-header">
                        <h5 class="job-tit">
                          <router-link :to="{name: 'job_details', params:{id:job.jobid}}">{{job.title}}</router-link>
                          </h5>
                        <div class="clearfix">
                          <p class="job_status">{{job.employment_status}}</p>
                          <p class="job_id">求人NO.{{job.jobnum}}</p>
                        </div>
                      </div>
                      <div class="job-body row  clearfix">
                        <div class="col-4 job-img">
                          <img src="/upload/news/nursing.JPG"  alt="">
                        </div>
                        <div class="col-8 job-box">
                          <table  class="table table-bordered  table-sm">
                            <tr>
                              <td><span class="job_ico"><i class="fa fa-map-marker"></i></span>最寄り駅</td>
                              <td>{{job.nearest_station}}</td>
                            </tr>
                            <tr>
                              <td><span class="job_ico">&#xa5;</span>給料</td>
                              <td> {{job.salary}}</td>
                            </tr>
                            <tr>
                              <td><span class="job_ico">時</span>勤務時間/日/休日の詳細</td>
                              <td> {{job.working_hours}} / {{job.holidays}} </td>
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
            
        </div>
      </div>

    </div>

  </div>
</template>


<script>
import asidebar from "./aside.vue";
export default {
    components: {
      asidebar
    },
    data(){
      return{
        id:'',
        townshipID:[],
        township_id:[],
        cities:[],
        getCity:[],
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
        job_data:[]
      }
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
    
        this.axios.get('api/getjobsearch',{
          params:{
              id: this.id,
              townshipID:this.townshipID,
              occupationID:this.occupationID,
              empstatus:this.empstatus
          },
        }).then((response)=>{
    
          this.job_data = response.data;
         
      
        })
        
         // window.scrollTo({ top : 1000, behavior: 'smooth' });
    },

    gotoJobdetail(jid) {
        this.$router.push({ name: 'job_details', params:{id:jid}});
    },

    toggleContent4() {
        this.toggleCheck = !this.toggleCheck;
            if (this.toggleCheck == true) {
                $('#close6').empty();
                $("#toBeToggled4").slideToggle();
                $('#close6').append('<i class="fas fa-arrow-circle-up"></i> 都道府県を閉じる');

            } else {
                $('#close6').empty();
                $("#toBeToggled4").slideToggle();
                $('#close6').append('<i class="fas fa-arrow-circle-down"></i> 都道府県を開く');
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

      getStateClick(e){
        if(e.target.tagName === 'A' || e.target.tagName ==='path'){

          const id = e.target.id;
          this.axios.post('api/getmap/'+id+'')
          .then((response)=>{

          $('.jobselect').removeClass('jobselect');
          this.cities = response.data.city
          this.getCity = response.data.getCity
          this.getTownships = response.data.getTownships
          this.occupations = response.data.occupations
          this.id = id
         })
        }else if(e.target.tagName ==='SELECT'|| e.target.tagName ==='OPTION'){

          const id = this.id;
          this.axios.post('api/getmap/'+id+'')
          .then((response)=>{
          $('.jobselect').removeClass('jobselect');
          this.cities = response.data.city
          this.getCity = response.data.getCity
          this.getTownships = response.data.getTownships
          this.occupations = response.data.occupations
          this.id = id
         })
        }


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
          alert('1');
        }
      },
      getStateHover(e){
        if(e.target.tagName ==='path'){
         //console.log(e)
        }
      }

    }
};

  // $("#search").on("click", function() {
  //   alert('a');
  //     // $("body").scrollTop(0);
  // });

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

.bg-success{
 background-color: #8282829e !important;
}
.pad{
  padding-top: 10px !important;
}

.bg-danger{
  background-color: #fff !important;
  border: 1px solid #eee;
}



.path:hover,
a:hover {
  fill: #20487c !important;
  stroke: #002868 !important;
  stroke-width: 2px;
  stroke-linejoin: round;
  cursor: pointer;
}

.jobselect {
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

</style>
