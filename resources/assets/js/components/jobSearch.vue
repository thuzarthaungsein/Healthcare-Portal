<template>
<div>
   <div class="col-md-12" style="border-bottom: 3px solid #ff6117;padding-bottom: 10px; margin-bottom: 20px;">
     <h5 class="font-weight-bold"><i class="fas fa-map" style="color:#ff6117;"></i>&nbsp;地図検索</h5></div>
  <div class="search-map card-body" @click="getStateClick" @mouseover="getStateHover">   
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
                        <a href="#" data-info="Hokkaido" class="path Hokkaido card-text">
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
                        <a href="#" data-info="Aomori" class="path Aomori card-text">
                            <li class="spanclass" id="2">青森</li>
                        </a>
                        <a href="#" data-info="Iwate" class="path Iwate card-text">
                            <li class="spanclass" id="3" >岩手</li>
                        </a>
                       
                        <a href="#" data-info="Akita" class="path Akita card-text">
                            <li class="spanclass" id="5">秋田</li>
                        </a>                     
                        
                        <a href="#" data-info="Miyagi" class="path Miyagi card-text">
                            <li class="spanclass" id="4">宮城</li>     
                        </a>                   
                       
                        <a  href="#" data-info="Yamagata" class="path Yamagata card-text">
                            <li class="spanclass" id="6">山形</li>
                        </a>
                        <a href="#" data-info="Fukushima" class="path Fukushima card-text">
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
                        <a href="#" data-info="Tokyo" class="path Tokyo card-text">
                             <li class="spanclass" id="13" >東京</li>
                        </a>
                        
                        <a href="#" data-info="Kanagawa" class="path Kanagawa card-text">
                            <li class="spanclass" id="14">神奈川</li>
                        </a>

                        <a href="#" data-info="Saitama" class="path Saitama card-text">
                            <li class="spanclass" id="11" >埼玉</li>
                        </a>

                        
                        <a href="#" data-info="Chiba" class="path Chiba card-text">
                            <li class="spanclass" id="12">千葉</li>
                        </a>                        
                         
                        <a href="#" data-info="Gunma" class="path Gunma card-text">
                            <li class="spanclass" id="10">群馬</li>
                        </a>

                        <a href="#" data-info="Ibaraki" class="path Ibaraki card-text">
                            <li class="spanclass" id="8" >茨城</li>
                        </a>                       
                      
                        <a href="#" data-info="Tochigi" class="path Tochigi card-text">
                              <li class="spanclass" id="9">栃木</li>
                        </a> 
                        
                        <a href="#" data-info="Yamanashi" class="path Yamanashi card-text">
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
                        <a href="#" data-info="Niigata" class="path Niigata card-text">
                            <li class="spanclass" id="15" >新潟</li>
                        </a>
                        
                        <a href="#" data-info="Nagano" class="path Nagano card-text">
                            <li class="spanclass" id="20">長野</li>
                        </a>
                        
                          <a href="#" data-info="Toyama" class="path Toyama card-text">
                            <li class="spanclass" id="16">富山</li>
                        </a>
                        
                        <a href="#" data-info="Ishikawa" class="path Ishikawa card-text">
                            <li class="spanclass" id="17">石川</li>
                        </a>
                       
                        <a href="#" data-info="Fukui" class="path Fukui card-text">
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
                         
                        <a href="#" data-info="Aichi" class="path Aichi card-text">
                              <li class="spanclass" id="23">愛知</li>
                        </a>
                       
                        
                        <a href="#" data-info="Shizuoka" class="path Shizuoka card-text">
                            <li class="spanclass" id="22">静岡</li>
                        </a>      
                         
                        <a href="#" id="21" data-info="Gifu" class="path Gifu card-text">
                            <li class="spanclass" id="21">岐阜</li>
                        </a>                 
                       
                        <a href="#" data-info="Mie" class="path Mie card-text">
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
                        
                        <a href="#" data-info="Osaka" class="path Osaka card-text">
                            <li class="spanclass" id="27">大阪府</li>
                        </a>  
                       
                        <a href="#" data-info="Hyogo" class="path Hyogo card-text">
                             <li class="spanclass" id="28">兵庫</li>
                        </a>   
                        
                        <a href="#" data-info="Kyoto" class="path Kyoto card-text">
                            <li class="spanclass"  id="26">京都府</li>
                        </a>    
                        
                        <a href="#" data-info="Nara" class="path Nara card-text">
                            <li class="spanclass"  id="29">奈良</li>
                        </a>               
                        
                        <a href="#" data-info="Shiga" class="path Shiga card-text">
                              <li class="spanclass"  id="25">滋賀</li>
                        </a>  
                        
                        <a href="#" data-info="Wakayama" class="path Wakayama card-text">
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
                        
                        <a href="#" data-info="Okayama" class="path Okayama card-text">
                             <li class="spanclass" id="33">岡山</li>
                        </a>
                        
                        <a href="#" data-info="Hiroshima" class="path Hiroshima card-text">
                            <li class="spanclass" id="34">広島</li>
                        </a>
                        
                        <a href="#" data-info="Yamaguchi" class="path Yamaguchi card-text">
                            <li class="spanclass" id="35">山口</li>
                        </a>
                        
                        <a href="#" data-info="Shimane" class="path Shimane card-text">
                            <li class="spanclass" id="32">島根</li>
                        </a>        
                         
                        <a href="#" data-info="Tottori" class="path Tottori card-text">
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
                        
                        <a href="#" data-info="Tokushima" class="path Tokushima card-text">
                            <li class="spanclass" id="36">徳島</li>
                        </a>
                        
                        <a href="#" data-info="Kagawa" class="path Kagawa card-text">
                            <li class="spanclass" id="37">香川</li>
                        </a>
                        
                        <a href="#" data-info="Kochi" class="path Kochi card-text">
                            <li class="spanclass" id="39">高知</li>
                        </a>
                        
                        <a href="#" data-info="Ehime" class="path Ehime card-text">
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
                        
                        <a href="#" data-info="Fukuoka" class="path Fukuoka card-text">
                          <li class="spanclass" id="40">福岡</li>
                        </a>
                        
                        <a href="#" data-info="Saga" class="path Saga card-text">
                            <li class="spanclass" id="41">佐賀</li>
                        </a>
                       
                        <a href="#" data-info="Nagasaki" class="path Nagasaki card-text"> 
                            <li class="spanclass" id="42">長崎</li>
                        </a>
                        
                        <a href="#" data-info="Oita" class="path Oita card-text">
                            <li class="spanclass" id="44">大分</li>
                        </a>

                       <a href="#" data-info="Kumamoto" class="path Kumamoto card-text"> 
                           <li class="spanclass" id="43">熊本</li>
                        </a>
                       
                        
                        <a href="#" data-info="Miyazaki" class="path Miyazaki card-text">
                              <li class="spanclass" id="45">宮崎</li>
                        </a>

                        <a href="#" data-info="Kagoshima" class="path Kagoshima card-text">
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
                          <a href="#" data-info="Okinawa" class="path Okinawa card-text">
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

         
          <div class="col-12 jobselect pad-free"> 
             <h5 class="profile_header m-t-10" style="border-left: 5px solid #828282;">現在の検索条件</h5>      
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
        if(e.target.tagName ==='path' || e.target.tagName ==='LI'){
            console.log(e.target);
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


$(function() {  
  $( '#divisionswrap ul li' ).on( 'click', function(e) {
        e.preventDefault();        
        $( '#divisionswrap ul li' ).parent().find( 'li.active' ).removeClass( 'active' );       
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
