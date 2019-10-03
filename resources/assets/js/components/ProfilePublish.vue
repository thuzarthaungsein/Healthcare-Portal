<template>
  <div id="app">
    <div v-if="type == 'nursing'">
            <div class="col-12 col-lg-12 col-md-10 tab typelabel nav-link fixed-nav">
            <button v-scroll-to="{ el: '#element1'}" class="top-fixed-btn">
                情報
            </button>
            <button v-scroll-to="{ el: '#element2' }" class="top-fixed-btn">
                特長
            </button>
            <button v-scroll-to="{ el: '#element3' }" class="top-fixed-btn">
                費用
            </button>
            <button v-scroll-to="{ el: '#element4' }" class="top-fixed-btn">
                施設概要
            </button>
            <button v-scroll-to="{ el: '#element5' }" class="top-fixed-btn">
                地図
            </button>
            <button v-scroll-to="{ el: '#element6' }" class="top-fixed-btn">
                ロコミ
            </button>
            <button v-scroll-to="{ el: '#element7' }" class="top-fixed-btn">
                求人応募
            </button>
            </div>

            <div class="row m-lr-0 ele" id="element1">
                <div class="row list-wrap m-lr-0" v-for="cust in customer" :key="cust.id">
                    <div class="col-lg-3 col-md-4 col-sm-12"><p><strong>住所 :</strong></p></div>
                    <div class="col-lg-9 col-md-8 col-sm-12" ><p>{{cust.address}}</p></div>
                    <div class="col-lg-3 col-md-4 col-sm-12"><p><strong>電話 :</strong></p></div>
                    <div class="col-lg-9 col-md-8 col-sm-12" ><p>{{cust.phone}}</p></div>
                </div>

                <h5 class="header">こだわりの特長</h5>
                <div class="row m-lr-0">
                    <ul class="fac_container" v-for="special in specialfeature" :key="special.id">
                        <li>{{special.short_name}}</li>
                    </ul>
                </div>
            </div>
            <div class="row ele m-lr-0" id="element2">
                <h5 class="header">特長</h5>
                <div  v-for="nurseprofile in nursing_profiles" :key="nurseprofile.id" class="col-md-8">{{nurseprofile.feature}}</div>
            </div>
            <div class="row ele m-lr-0" id="element3">
                <h5 class="header col-md-12">費用</h5>
                    <table class="table table-striped table-bordered" v-for="nusmethod in nus_method" :key="nusmethod.id">
                            <tr>
                                <th width="30%">
                                    <font>支払方法</font>
                                </th>
                                <td width="50%">
                                    <font>{{nusmethod.method}}</font>
                                </td>
                            </tr>
                        </table>
                    <div v-if="method_payment.length > 0" class="col-md-12 pad-free">
                        <div class="cost_tb" v-for="cost in method_payment" :key="cost.id">
                            <div class="row">
                                <div class="col-md-10">
                                    <table class="table table-bordered cost_table">
                                        <tbody>
                                        <tr>
                                            <th width="150">入居にかかる費用(Expense)</th>
                                                <td >{{cost.expense_moving}}</td>
                                                <th>居室タイプ(type)</th>
                                                <td>{{cost.living_room_type}}</td>
                                        </tr>
                                        <tr>
                                            <th width="150">月額料金 (monthly)</th>
                                                <td>{{cost.monthly_fees}}</td>
                                            <th>広さ(area)</th>
                                                <td>{{cost.area}}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="cost_btnwrapper col-md-2">
                                    <button class="btn edit-borderbtn okbtn" type="button" data-toggle="collapse" :data-target="'#costDetails' + cost.id">内容を見る</button>
                                </div> <br/>


                                <div class="collapse col-md-12" :id="'costDetails' + cost.id">
                                    <table class="table table-condensed cost_table">
                                        <h4>入居にかかる費用(Expense Moving)</h4>
                                        <tbody>
                                            <tr>
                                                <th width="300">入居一時金または(deposit)</th>
                                                    <td>{{cost.deposit}}</td>
                                            </tr>
                                            <tr>
                                                <th>その他（使途）(other)</th>
                                                    <td>{{cost.other_use}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table class="table table-condensed cost_table">
                                            <h4>月額費用(Monthly Cost)</h4>
                                        <tbody>
                                            <tr>
                                                <th width="300">賃料 (rent)</th>
                                                <td>{{cost.rent}}</td>
                                            </tr>
                                            <tr>
                                                <th>管理費(admin_expense)</th>
                                                <td>{{cost.admin_expense}}</td>
                                            </tr>
                                            <tr>
                                                <th>食費 (food_expense)</th>
                                                <td>{{cost.food_expense}}</td>
                                            </tr>
                                            <tr>
                                                <th>介護上乗せ金（生活サービス費(nursing care)</th>
                                                <td>{{cost.nurse_care_surcharge}}</td>
                                            </tr>
                                            <tr>
                                                <th>その他 (other monthly cost)</th>
                                                <td>{{cost.other_monthly_cost}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                    <table class="table table-condensed cost_table">
                                            <h4>返還金について(refund system)</h4>
                                        <tbody>
                                            <tr>
                                                <th width="300">返還制度 (refund)</th>
                                                <td>{{cost.refund_system}}</td>
                                            </tr>
                                            <tr>
                                                <th>償却期間(Depreciation)</th>
                                                <td>{{cost.depreciation_period}}</td>
                                            </tr>
                                            <tr>
                                                <th>初期償却(InitialDepreciation)</th>
                                                <td>{{cost.initial_deprecration}}</td>
                                            </tr>
                                            <tr>
                                                <th>その他メッセージ(other message)</th>
                                                <td>{{cost.other_message_refund}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>
            </div>
            <div class="row ele m-lr-0" id="element4">
                <!-- <div class="row"> -->
                    <div class="col-md-12">
                        <h2 align="center"> 施設の概要 （グランダ雪ヶ谷）</h2>
                    </div>
                    <div v-for="nus in nusfacilities" :key="nus.id" class="col-md-12 pad-free" >
                        <table border="1" class="table table-bordered">
                            <tbody>
                                <tr>
                                <td> 事業主体</td>
                                <td>{{nus.business_entity}}</td>
                            </tr>
                            <tr>
                                <td>開設年月日</td>
                                <td>{{nus.date_of_establishment}}</td>
                            </tr>
                            <tr>
                                <td> 土地の権利形態 </td>
                                <td>{{nus.land_right_form}}</td>
                            </tr>
                            <tr>
                                <td>建物の権利形態</td>
                                <td>{{nus.building_right_form}}</td>
                            </tr>
                            <tr>
                                <td>敷地面積</td>
                                <td>{{nus.site_area}}</td>
                            </tr>
                            <tr>
                                <td>延床面積</td>
                                <td>{{nus.floor_area}}</td>
                            </tr>
                            <tr>
                                <td>構造</td>
                                <td>{{nus.construction}}</td>
                            </tr>
                            <tr>
                                <td>定員</td>
                                <td>{{nus.capacity}}</td>
                            </tr>
                            <tr>
                                <td>総居室・戸数 </td>
                                <td>{{nus.num_rooms}}</td>
                            </tr>
                            <tr>
                                <td>居住の権利形態 </td>
                                <td>{{nus.residence_form}}</td>
                            </tr>
                            <tr>
                                <td>類型 </td>
                                <td>{{nus.fac_type}}</td>
                            </tr>
                            <tr>
                                <td>入居条件</td>
                                <td>{{nus.occupancy_condition}}</td>
                            </tr>
                            <tr>
                                <td>居室区分・間取り等 </td>
                                <td>{{nus.room_floor}}</td>
                            </tr>
                            <tr>
                                <td> 居室設備</td>
                                <td>{{nus.living_room_facilities}}</td>
                            </tr>
                            <tr>
                                <td>共用施設・設備 </td>
                                <td>{{nus.equipment}}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                <!-- </div> -->


                        <div class="row" style="width: 100%;" >
                            <div class="col-md-12">
                                <h2 align="center"> 職員体制 （グランダ雪ヶ谷）</h2>
                            </div>
                            <div v-if="cooperate_medical.length>0" class="col-md-12 pad-free">
                                <div v-for="comedical in cooperate_medical" :key="comedical.id" class="col-md-12" >
                                    <table border="1" class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <td > 診療科目</td>
                                                <td >{{comedical.clinical_subject}}</td>
                                            </tr>
                                            <tr>
                                                <td >協力内容</td>
                                                <td >{{comedical.details}}</td>
                                            </tr>
                                            <tr>
                                                <td >診療費用</td>
                                                <td >{{comedical.medical_expense}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>

                        <div class="row" >
                            <div class="col-md-12">
                                <h2 align="center"> 医療面の受入れ </h2>
                            </div>
                            <div v-for="maccept in medical_acceptance" :key="maccept.id" class="col-md-4" >
                                <div class="col-md-12 accept-box">
                                    <div class="float-left" v-for="(ma,index) in medical" :key="index" style="padding-right:20px;">
                                            <i v-if="ma.name === maccept.name && ma.accept_type === 'accept'" class="fas fa-check green"></i>
                                            <i v-if="ma.name === maccept.name && ma.accept_type === 'unaccept'" class="fas fa-times red"></i>
                                            <i v-if="ma.name === maccept.name && ma.accept_type === 'negotiate'" class="fas fa-adjust blue"></i>
                                    </div>
                                    {{maccept.name}}
                                </div>
                            </div>
                        </div>
                        <div class="row col-md-12 float: right" style="display: flex; justify-content: flex-end" >
                            <label for="" class="m-r-15"><i class="fas fa-check green"></i> 受入れ可</label>
                            <label for="" class="m-r-15"><i class="fas fa-times red"></i> 受入れ不可</label>
                            <label for="" class="m-r-15"><i class="fas fa-adjust blue"></i> 応相談</label>
                        </div>

                        <div class="row" style="width:100%">
                            <div class="col-md-12">
                            <h2 align="center"> Staff </h2>

                            </div>
                            <div v-if="staff.length>0">
                                <div v-for="st in staff" :key="st.id" class="col-md-12 " >
                                    <table border="1" class="table">
                                        <tbody>
                                            <tr>
                                                <td> 介護に関わる職員体制（入居者：職員）</td>
                                                <td>{{st.staff}}</td>
                                                <td> 介護職員    </td>
                                                <td>{{st.nursing_staff}}</td>
                                            </tr>
                                            <tr>
                                                <td> 夜間の最少職員数   </td>
                                                <td>{{st.min_num_staff}}</td>
                                                <td>     看護職員数     </td>
                                                <td>{{st.num_staff}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
            </div>
            <div class="row ele m-lr-0" id="element5">

                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <GmapMap id="googlemap" ref="map" :center="center" :zoom="10" >
                            <GmapMarker v-for="(m, index) in markers" :key="index" :position="m.position" :clickable="true" :draggable="true" @click="center=m.position" />
                           </GmapMap>

                            <div class="row" style="padding-top:20px;" v-for="m in google" :key="m.id" >
                                <div class="col-md-2 text-left ">
                                    公式サイト  :
                                </div>
                                <div class="col-md-10 text-left">
                                {{m.website}}
                                </div>

                                <div class="col-md-2 text-left" style="padding-top:20px;" >
                                    アクセス :
                                </div>
                                <div class="col-md-10 text-left" style="padding-top:20px;">
                                    {{m.access}}
                                </div>

                                <div class="col-md-2 text-left" style="padding-top:20px;" >
                                    住所 :
                                </div>
                                <div class="col-md-10 text-left" style="padding-top:20px;">
                                    {{m.address}}
                                </div>
                            </div>
                      </div>
                 </div>

            <div class="row ele m-lr-0" id="element6">
               <h5 class="header">口コミ</h5>
              <div class="row" v-for="comment in comments" :key="comment.id">
                    <div class="col-md-12">タイトル:{{comment.title}}</div><br/>
                                     <!-- <i class="fas fa-envelope" style='font-size:20px;color:#F4A460'></i> -->
                    <div class="col-md-6">電子メールアドレス:{{comment.email}}</div>
                    <div class="col-md-6">年月日投稿:{{comment.year}}</div>
                        <br/><br/>
                                      <!-- <div class="col-md-3 offset-md-4" v-for="comment in comments" :key="comment.id">
                                         <div class="content hideContent">{{comment.comment}}</div>
                                     </div> -->
                                     <!-- <button onclick="function()">See more</button> -->

                    <div class="row col-md-6 m-lr-0">
                        <read-more more-str="read more"  :text="comment.comment" :max-chars="20"></read-more>
                    </div>
                </div>
            </div>

            <div class="ele m-lr-0" id="element7">
                <joboffer profile="profile"></joboffer>

            </div>
    </div>

    <div v-if="type == 'hospital'">
           <div class="col-12 col-lg-12 col-md-10 tab typelabel nav-link fixed-nav">
            <button v-scroll-to="{ el: '#element1'}" class="top-fixed-btn">
                情報
            </button>
            <button v-scroll-to="{ el: '#element2' }" class="top-fixed-btn">
                口コミ
            </button>
            <button v-scroll-to="{ el: '#element3' }" class="top-fixed-btn">
                地図
            </button>
            <button v-scroll-to="{ el: '#element4' }" class="top-fixed-btn">
                求人応募
            </button>
            </div>
            <div class="ele m-lr-0" id="element1">
                <div class="row list-wrap m-lr-0" v-for="cust in customer" :key="cust.id">
                    <div class="col-lg-3 col-md-4 col-sm-12"><p><strong>住所 :</strong></p></div>
                    <div class="col-lg-9 col-md-8 col-sm-12" ><p>{{cust.address}}</p></div>
                    <div class="col-lg-3 col-md-4 col-sm-12"><p><strong>電話番号 :</strong></p></div>
                    <div class="col-lg-9 col-md-8 col-sm-12" ><p>{{cust.phone}}</p></div>
                </div>

             <h5 class="header">こだわりの特長</h5>
                <div class="row m-lr-0">
                    <ul class="fac_container" v-for="special in specialfeature" :key="special.id">
                        <li>{{special.short_name}}</li>
                    </ul>
                </div>
                <h5 class="header">情報</h5>
                    <div class="row m-lr-0">
                            <div class="col-md-10 m-2" v-for="hospital in hospitals" :key="hospital.id">
                                <p>{{hospital.details_info}}</p>
                            </div>
                </div>
                <h5 class="header">診療科目</h5>
                    <div class="row col-md-3" v-for="sub in subjects" :key="sub.id">
                            <a href="#">{{sub.name}}</a>
                    </div>
                <h5 class="header">診療時間</h5>
                    <div class="row">
                        <div class="col-md-12">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th scope="col" >Date</th>
                                            <th scope="col">AM</th>
                                            <th scope="col">PM</th>
                                        </tr>
                                    </thead>
                                        <tr>
                                            <th scope="row">Mon</th>
                                            <td >{{am_arr.mon}}</td>
                                            <td >{{pm_arr.mon}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Tue</th>
                                            <td >{{am_arr.tue}}</td>
                                            <td >{{pm_arr.tue}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Wed</th>
                                            <td >{{am_arr.wed}}</td>
                                            <td >{{pm_arr.wed}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Thu</th>
                                            <td >{{am_arr.thu}}</td>
                                            <td >{{pm_arr.thu}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Fri</th>
                                            <td >{{am_arr.fri}}</td>
                                            <td >{{pm_arr.fri}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Sat</th>
                                            <td >{{am_arr.sat}}</td>
                                            <td >{{pm_arr.sat}}</td>
                                        </tr>
                                        <tr>
                                            <th scope="row">Sun</th>
                                            <td >{{am_arr.sun}}</td>
                                            <td >{{pm_arr.sun}}</td>
                                        </tr>

                                </table>
                                <div class="col-md-6"  v-for="hospital in hospitals" :key="hospital.id">
                                    <p>Closed day: <font>{{hospital.closed_day}}</font> </p>
                                </div>
                                <p>※診療時間は、変更される事や、診療科によって異なる場合があるため、直接医療機関のホームページ等でご確認ください</p>
                        </div>

                    </div>

                <h5 class="header">施設情報</h5>
                <div class="row col-md-12" >
                    <div class="col-md-2 fac-name-box" v-for="hosfacility in hosfacilities " :key="hosfacility.id">
                        <h4>{{hosfacility.description}}</h4>
                        <div class="fac-check-box" v-for="fac in fac_list" :key="fac.id">
                            <i v-if="fac.id === hosfacility.id">〇</i>
                             <!-- <i class="fa fa-circle-o fa-stack-2x" v-if="fac.id === hosfacility.id"></i> -->
                        </div>
                    </div>
                </div>
            </div>
            <div class="row ele m-lr-0" id="element2">

                <h5 class="header">口コミ</h5>
              <div class="row" v-for="comment in comments" :key="comment.id">
                    <div class="col-md-12">タイトル:{{comment.title}}</div><br/>
                                     <!-- <i class="fas fa-envelope" style='font-size:20px;color:#F4A460'></i> -->
                    <div class="col-md-5">電子メールアドレス:{{comment.email}}</div>
                    <div class="col-md-3">年月日投稿:{{comment.year}}</div>
                        <br/><br/>
                        <!-- <div class="col-md-3 offset-md-4" v-for="comment in comments" :key="comment.id">
                            <div class="content hideContent">{{comment.comment}}</div>
                        </div> -->
                        <!-- <button onclick="function()">See more</button> -->
                    <!-- <div class="row col-md-12 m-lr-0">
                        <p class="showContent"> {{comment.comment}}</p>
                            <span class="displaytext" :id="'test'+comment.id">{{comment.comment}}</span>
                                <a class="mt-2 readMore" @click="review(comment.id)" href ="#">ReadMore</a>

                    </div> -->
                     <div class="row col-md-6 m-lr-0">
                        <read-more more-str="read more" :text="comment.comment" :max-chars="50"></read-more>
                    </div>
                </div>
            </div>
            <div class="row ele m-lr-0" id="element3">
                <div class="col-lg-12 col-md-12 col-sm-12">
                            <GmapMap id="googlemap" ref="map" :center="center" :zoom="10" >
                            <GmapMarker v-for="(m, index) in markers" :key="index" :position="m.position" :clickable="true" :draggable="true" @click="center=m.position" />
                           </GmapMap>

                        <div  class="row" style="padding-top:20px;" v-for="m in google" :key="m.id" >
                            <div class="col-md-2 text-left ">
                                公式サイト  :
                            </div>
                            <div class="col-md-10 text-left">
                               {{m.website}}
                            </div>

                            <div class="col-md-2 text-left" style="padding-top:20px;" >
                                アクセス :
                            </div>
                            <div class="col-md-10 text-left" style="padding-top:20px;">
                                {{m.access}}
                            </div>
                             <div class="col-md-2 text-left" style="padding-top:20px;" >
                                混雑状況 :
                            </div>
                             <div class="col-md-10 text-left" style="padding-top:20px;">
                                {{m.congestion}}
                            </div>

                            <div class="col-md-2 text-left" style="padding-top:20px;" >
                                住所 :
                            </div>
                            <div class="col-md-10 text-left" style="padding-top:20px;">
                                {{m.address}}
                            </div>
                        </div>
                    </div>
            </div>
            <div class="ele m-lr-0" id="element4">
                <joboffer profile="profile"></joboffer>
            </div>
    </div>
  </div>

</template>

<script>
 import joboffer from './JobSearchListComponent.vue'
 export default {

      components:{
                    joboffer
                },

  data() {
            var that = this;
            return {

                markers: [
                    { position: { lat: 0, lng: 0 } },
                ],
                am_arr:[],
                pm_arr:[],
                center: { lat: 0, lng: 0 },
                address: '',
                customer_id :2,
                google:[],
                customer:[],
                hosfacilities:[],
                specialfeature:[],
                nusfacilities:[],
                nus_method:[],
                cooperate_medical:[],
                medical_acceptance:[],
                medical:[],
                staff:[],
                schedules:[],
                subjects:[],
                hospitals:[],
                nursing_profiles:[],
                method_payment:[],
                comments:[],
                activeImage: 0,
                index: 0,
                pageNum: 0,
                type : 'hospital',
                opts: {
                    start: 0,
                    dir: 'v',
                    loop: false,
                    duration:500,
                    beforeChange: function(ele, current, next) {
                        that.index = next;
                    },
                    afterChange: function(ele, current) {
                        that.index = current;
                    }
                },

                images: [
                    {
                        id: '1',
                        big: 'images/p1.jpeg',
                        thumb: 'images/thumbs/p1.jpeg'
                    },
                    {
                        id: '2',
                        big: 'images/p2.jpeg',
                        thumb: 'images/thumbs/p2.jpeg'
                    },
                    {
                        id: '3',
                        big: 'images/p3.jpeg',
                        thumb: 'images/thumbs/p3.jpeg'
                    },
                    {
                        id: '4',
                        big: 'images/p4.jpeg',
                        thumb: 'images/thumbs/p4.jpeg'
                    }
                ],
            };
        },

        props:{
                cusid:Number,
                type:String
        },

        created(){

            if(this.type == "nursing")
            {
                this.axios.get('/api/profile/nursing') .then(response => {
                    this.nursing_profiles = response.data.feature;
                    this.nus_method= response.data.method;
                    this.method_payment = response.data.cost;
                    this.nusfacilities = response.data.facility;
                    this.cooperate_medical = response.data.comedical;
                    this.medical_acceptance = response.data.medicalacceptance;
                    this.medical = response.data.medical;
                    this.staff = response.data.staff;
                    this.google = response.data.nurselatlong;
                    this.markers[0]['position']['lat']  = response.data.nurselatlong[0]['latitude'];
                    this.markers[0]['position']['lng']  = response.data.nurselatlong[0]['longitude'];
                    this.center['lat'] = response.data.nurselatlong[0]['latitude'];
                    this.center['lng'] = response.data.nurselatlong[0]['longitude'];

                    if(response.data.nurselatlong[0]['latitude'] == 0 && response.data.nurselatlong[0]['longitude'] == 0)
                    {
                         this.center['lat'] = 35.6803997;
                         this.center['lng'] = 139.76901739;
                         this.markers[0]['position']['lat']  = 35.6803997;
                         this.markers[0]['position']['lng']  = 139.76901739;
                    }

                });

                this.axios.get(`/api/profile/specialfeature/${this.type}`) .then(response => {
                    this.specialfeature = response.data;
                });

                  this.axios.get('/api/profile/comment') .then(response => {
                      this.comments = response.data;
                });

                  this.axios.get('/api/profile/customer') .then(response => {
                      this.customer = response.data;
                });

            }
            else{
                this.axios.get(`/api/profile/specialfeature/${this.type}`).then(response => {
                    this.specialfeature = response.data;
                });
                 this.axios.get('/api/profile/comment').then(response => {
                      this.comments = response.data;
                });
                 this.axios.get('/api/profile/customer').then(response => {
                      this.customer = response.data;
                });
                this.axios.get('/api/profile/subject').then(response => {
                      this.subjects = response.data;
                });
                 this.axios.get('/api/profile/schedule/'+ this.customer_id) .then(response => {

                        this.am_arr = response.data[0];
                        this.pm_arr = response.data[1];
                });
                // this.axios.get('/api/profile/hosfacility').then(response => {
                //     console.log(this.hosfacilities);return;
                //       this.hosfacilities = response.data;
                // });
                this.axios.get('/api/profile/hospital').then(response => {
                    this.google = response.data.hoslatlong;
                    this.hospitals = response.data.hospital;
                    this.hosfacilities=response.data.facility_list;
                    this.fac_list = response.data.facility;
                    this.markers[0]['position']['lat']  = response.data.hoslatlong[0]['latitude'];
                    this.markers[0]['position']['lng']  = response.data.hoslatlong[0]['longitude'];
                    this.center['lat'] = response.data.hoslatlong[0]['latitude'];
                    this.center['lng'] = response.data.hoslatlong[0]['longitude'];
                    if(response.data.hoslatlong[0]['latitude'] == 0 && response.data.hoslatlong[0]['longitude'] == 0)
                    {
                         this.center['lat'] = 35.6803997;
                         this.center['lng'] = 139.76901739;
                         this.markers[0]['position']['lat']  = 35.6803997;
                         this.markers[0]['position']['lng']  = 139.76901739;
                    }
                })


            }


          },
          methods: {
              moveTo: function(index) {

                this.$refs.fullpage.$fullpage.moveTo(index, true);
            },
              nextImage() {
                var active = this.activeImage + 1;
                if(active >= this.images.length) {
                    active = 0;
                }
                this.activateImage(active);
            },

            prevImage() {
                var active = this.activeImage - 1;
                if(active < 0) {
                    active = this.images.length - 1;
                }
                this.activateImage(active);
            },
            activateImage(imageIndex) {
                this.activeImage = imageIndex;
            },
        }

 }

</script>




<style scoped>
.fixed-nav{
    position: fixed;
    z-index: 4;
    overflow: hidden;
    background: #fff;
    width: 65.9%;
    margin-top:-1px;

}
.top-fixed-btn{
  border: 1px solid #b7dad2;
  box-shadow: 0px 2px 1px rgba(70, 70, 70, 0.3);
  color: #095c5f;
  background: #b7dad2;
  width: 145px;
  cursor: pointer;
  padding: 10px;
}
.ele{
  margin-top: 27px;
  padding-top: 60px;
}
.cost_tb{
    /* border: 1px solid #ccc; */
    border-left: 0px;
     border-bottom: 0px;
    padding-bottom: 1px;
     background: #fff;
     padding: 10px;
    /* padding-bottom: 20px; */
}
.cost_table{
    /* width: 820px; */
    /* height: 81px; */
    float: left;
    border-bottom: 1px solid #ccc;
    margin-top: 15px;
}
.cost_table h4 {
    border-left: 6px solid #b7dad2;
    padding-left: 10px;
    margin-bottom: 10px;
    font-size:14px;
    line-height: 1.3;
    margin-top: 30px;
    padding-top: 2px;
}
.cost_table th{
    border: 1px solid #ccc;
    padding: 8px 10px;
    text-align: center;
    background: #f0f0f0;
    color: #000;
    line-height: 1.7;
    vertical-align: top;
    min-width: 100px;
}
.cost_table td{
    border: 1px solid #ccc;
    padding: 8px 10px;
    text-align: left;
    line-height: 1.7;
    background: #fff;
}
.cost_btnwrapper{
    float: right;
    width: 158px;
    text-align: center;
    padding-top: 21px;
}
.cost_btnwrapper .okbtn{
    width: 125px;
    margin-bottom: 0;
    padding-left: 20px;
    padding-right: 0;
}
</style>
