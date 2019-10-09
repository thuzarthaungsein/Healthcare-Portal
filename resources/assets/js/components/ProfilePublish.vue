<template>
  <div id="app">
    <div v-if="type == 'nursing'">
        
            <div class="col-12 col-lg-12 col-md-10 tab typelabel nav-link fixed-nav">
            <button v-scroll-to="{ el: '#element1'}" class="top-fixed-btn"  @click="activate(1)" :class="{ active : active_el == 1 }">
                情報
            </button>
            <button v-scroll-to="{ el: '#element2' }" class="top-fixed-btn"  @click="activate(2)" :class="{ active : active_el == 2 }">
                特長
            </button>
            <button v-scroll-to="{ el: '#element3' }" class="top-fixed-btn"  @click="activate(3)" :class="{ active : active_el == 3 }">
                費用
            </button>
            <button v-scroll-to="{ el: '#element4' }" class="top-fixed-btn"  @click="activate(4)" :class="{ active : active_el == 4 }">
                施設概要
            </button>
            <button v-scroll-to="{ el: '#element5' }" class="top-fixed-btn"  @click="activate(5)" :class="{ active : active_el == 5 }">
                地図
            </button>
            <button v-scroll-to="{ el: '#element6' }" class="top-fixed-btn"  @click="activate(6)" :class="{ active : active_el == 6 }">
                ロコミ
            </button>
            <button v-scroll-to="{ el: '#element7' }" class="top-fixed-btn"  @click="activate(7)" :class="{ active : active_el == 7 }">
                求人応募
            </button>
            </div>

            <div class="row m-lr-0 ele" id="element1">
                 <h5 class="profile_header">情報</h5>
                 <div class="row list-wrap m-lr-0 white-bg-color" v-for="cust in customer" :key="cust.id">
                    <!--for slideimage-->
                    <div class="col-sm-5 detail_profile_left">
                           <div class="thumbnail-img">
                             <div class="card-carousel">
                                <div class="card-img">
                                    <img :src="'/upload/nursing_profile/' +currentImage" alt="">
                                    <div class="actions">
                                        <span @click="prevImage" class="prev">
                                            <i class="fas fa-chevron-left"></i>
                                        </span>
                                        <span @click="nextImage" class="next">
                                            <i class="fas fa-chevron-right"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="thumbnails">
                                    <div
                                        v-for="(image,index) in  images"
                                        :key="image.id"
                                        :class="['thumbnail-image', (activeImage == index) ? 'active' : '']"
                                        @click="activateImage(index)" >
                                        <img  :src ="'/upload/nursing_profile/' + image.photo">   
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row col-sm-12 detail_profile_left">
                            <strong class="img_2">  {{activeImageTitle}} </strong>
                        </div>
                       <div class="row col-sm-12 detail_profile_left">
                           {{activeImageDescription}}
                       </div>


                        <!-- <div  v-for="image in  images"  :key="image.id">

                        </div> -->
                    </div>
                    <!--end for slide image-->
                    <!--for address-->
                     <div class="col-sm-7 detail_profile_right">
                        <div class="row list-wrap m-lr-0">
                            <div class="col-lg-3 col-md-4 col-sm-12"><p><strong>住所 :</strong></p></div>
                            <div class="col-lg-9 col-md-8 col-sm-12" ><p>{{cust.address}}</p></div>
                            <div class="col-lg-3 col-md-4 col-sm-12"><p><strong>電話 :</strong></p></div>
                            <div class="col-lg-9 col-md-8 col-sm-12" ><p>{{cust.phone}}</p></div>
                        </div>
                         <h5 class="header m-t-10">こだわりの特長</h5>
                        <div class="row m-lr-0">
                            <ul class="fac_container" v-for="special in specialfeature" :key="special.id">
                                <li>{{special.short_name}}</li>
                            </ul>
                        </div>
                    </div>
                    <!--end for address-->
                </div>
            </div>
            <div class="row ele m-lr-0" id="element2">
                <h5 class="profile_header">特長</h5>
                <div  v-for="nurseprofile in nursing_profiles" :key="nurseprofile.id" class="col-md-12">{{nurseprofile.feature}}</div>
            </div>
            <div class="row ele m-lr-0" id="element3">
                <h5 class="profile_header col-md-12">費用</h5>
                    <div class="col-12">
                        <table class="table table-striped table-bordered" v-for="nusmethod in nus_method" :key="nusmethod.id">
                            <tr>
                                <th width="30%" class="custom-bg-color">
                                    <font>支払方法</font>
                                </th>
                                <td width="50%">
                                    <font>{{nusmethod.method}}</font>
                                </td>
                            </tr>
                        </table>
                    </div>
                    <div v-if="method_payment.length > 0" class="col-md-12">
                        <div class="cost_tb" v-for="cost in method_payment" :key="cost.id">
                            <div class="row col-12 pad-free">
                                <div class="col-md-11">
                                    <table class="table table-bordered cost_table">
                                        <tbody>
                                        <tr>
                                            <th width="250">入居にかかる費用(Expense)</th>
                                                <td>{{cost.expense_moving}}</td>
                                                <th>居室タイプ(type)</th>
                                                <td>{{cost.living_room_type}}</td>
                                        </tr>
                                        <tr>
                                            <th width="250">月額料金 (monthly)</th>
                                                <td>{{cost.monthly_fees}}</td>
                                            <th>広さ(area)</th>
                                                <td>{{cost.area}}</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="cost_btnwrapper col-md-1 pad-free">
                                    <button class="btn inner-btn okbtn" type="button" data-toggle="collapse" :data-target="'#costDetails' + cost.id"><i class="fas fa-sort-down"></i>&nbsp;内容を見る</button>
                                </div>


                                <div class="collapse col-md-12" :id="'costDetails' + cost.id">
                                    <table class="table table-condensed cost_table">
                                        <label class="cost_heading_lbl" style="width:100%;">入居にかかる費用(Expense Moving)</label>
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
                                            <label class="cost_heading_lbl">月額費用(Monthly Cost)</label>
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
                                            <label class="cost_heading_lbl" style="width: 100%;">返還金について(refund system)</label>
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
                    <h5 class="profile_header profile_header col-md-12"> 施設の概要 （グランダ雪ヶ谷）</h5>                    
                    <div v-for="nus in nusfacilities" :key="nus.id" class="col-md-12" >
                        <table border="1" class="table table-bordered cost_table">
                            <tbody>
                                <tr>
                                <td width="250" class="custom-bg-color"> 事業主体</td>
                                <td>{{nus.business_entity}}</td>
                            </tr>
                            <tr>
                                <td width="250" class="custom-bg-color">開設年月日</td>
                                <td>{{nus.date_of_establishment}}</td>
                            </tr>
                            <tr>
                                <td width="250" class="custom-bg-color"> 土地の権利形態 </td>
                                <td>{{nus.land_right_form}}</td>
                            </tr>
                            <tr>
                                <td width="250" class="custom-bg-color">建物の権利形態</td>
                                <td>{{nus.building_right_form}}</td>
                            </tr>
                            <tr>
                                <td width="250" class="custom-bg-color">敷地面積</td>
                                <td>{{nus.site_area}}</td>
                            </tr>
                            <tr>
                                <td width="250" class="custom-bg-color">延床面積</td>
                                <td>{{nus.floor_area}}</td>
                            </tr>
                            <tr>
                                <td width="250" class="custom-bg-color">構造</td>
                                <td>{{nus.construction}}</td>
                            </tr>
                            <tr>
                                <td width="250" class="custom-bg-color">定員</td>
                                <td>{{nus.capacity}}</td>
                            </tr>
                            <tr>
                                <td width="250" class="custom-bg-color">総居室・戸数 </td>
                                <td>{{nus.num_rooms}}</td>
                            </tr>
                            <tr>
                                <td width="250" class="custom-bg-color">居住の権利形態 </td>
                                <td>{{nus.residence_form}}</td>
                            </tr>
                            <tr>
                                <td width="250" class="custom-bg-color">類型 </td>
                                <td>{{nus.fac_type}}</td>
                            </tr>
                            <tr>
                                <td width="250" class="custom-bg-color">入居条件</td>
                                <td>{{nus.occupancy_condition}}</td>
                            </tr>
                            <tr>
                                <td width="250" class="custom-bg-color">居室区分・間取り等 </td>
                                <td>{{nus.room_floor}}</td>
                            </tr>
                            <tr>
                                <td width="250" class="custom-bg-color"> 居室設備</td>
                                <td>{{nus.living_room_facilities}}</td>
                            </tr>
                            <tr>
                                <td width="250" class="custom-bg-color">共用施設・設備 </td>
                                <td>{{nus.equipment}}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                <!-- </div> -->


                        <div class="row col-12 pad-free">   
                            <div class="col-md-12">                         
                            <h5 class="profile_header col-md-12"> 職員体制 （グランダ雪ヶ谷）</h5>   
                            </div>                        
                            <div v-if="cooperate_medical.length>0" class="col-md-12">
                                <div v-for="comedical in cooperate_medical" :key="comedical.id" class="col-md-12" >
                                    <table border="1" class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <td width="250" class="custom-bg-color" > 診療科目</td>
                                                <td>{{comedical.clinical_subject}}</td>
                                            </tr>
                                            <tr>
                                                <td width="250" class="custom-bg-color">協力内容</td>
                                                <td >{{comedical.details}}</td>
                                            </tr>
                                            <tr>
                                                <td width="250" class="custom-bg-color">診療費用</td>
                                                <td >{{comedical.medical_expense}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>

                       <div class="row col-12">
                                <h5 class="profile_header col-12"> 医療面の受入れ </h5>
                           
                            <div class="row col-12">
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
                        </div>
                        <div class="row col-md-12 float: right" style="display: flex; justify-content: flex-end" >
                            <label for="" class="m-r-15"><i class="fas fa-check green"></i> 受入れ可</label>
                            <label for="" class="m-r-15"><i class="fas fa-times red"></i> 受入れ不可</label>
                            <label for="" class="m-r-15"><i class="fas fa-adjust blue"></i> 応相談</label>
                        </div>

                        <div class="row col-12">                            
                                <h5  class="profile_header col-12"> Staff </h5>                            
                            <div v-if="staff.length>0">
                                <div v-for="st in staff" :key="st.id" class="col-md-12" >
                                    <table border="1" class="table table-bordered">
                                        <tbody>
                                            <tr>
                                                <td width="350" class="custom-bg-color"> 介護に関わる職員体制（入居者：職員）</td>
                                                <td width="500">{{st.staff}}</td>
                                                <td width="350" class="custom-bg-color"> 介護職員    </td>
                                                <td width="500">{{st.nursing_staff}}</td>
                                            </tr>
                                            <tr>
                                                <td width="350" class="custom-bg-color"> 夜間の最少職員数   </td>
                                                <td width="500">{{st.min_num_staff}}</td>
                                                <td width="350" class="custom-bg-color">     看護職員数     </td>
                                                <td width="500">{{st.num_staff}}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
            </div>
            <div class="row ele m-lr-0" id="element5">
                <h5 class="profile_header col-md-12"> 地図</h5>
                        <div class="col-lg-12 col-md-12 col-sm-12">
                            <GmapMap id="googlemap" ref="map" :center="center" :zoom="10" >
                            <GmapMarker v-for="(m, index) in markers" :key="index" :position="m.position" :clickable="true" :draggable="true" @click="center=m.position" />
                           </GmapMap>

                            <div class="row" style="padding-top:20px;" v-for="m in google" :key="m.id" >
                                <div class="col-md-12">
                                   <p><span class="font-weight-bold">公式サイト  : </span> {{m.website}}</p>
                                </div>
                                <div class="col-md-12">
                                    <p><span class="font-weight-bold">アクセス : </span> {{m.access}}</p>
                                </div>
                                <!-- <div class="col-md-10 text-left">
                                    {{m.access}}
                                </div> -->
                                <div class="col-md-12">
                                   <p><span class="font-weight-bold"> 住所 : </span>{{m.address}}</p>
                                </div>
                                <!-- <div class="col-md-10 text-left">
                                    {{m.address}}
                                </div> -->
                            </div>
                      </div>
                 </div>

            <div class="row ele m-lr-0" id="element6">
               <h5 class="profile_header col-12">口コミ</h5>
               <div class="col-lg-12 col-md-12 col-sm-12">
                    <div class="row col-12">

                        <div class="col-12 comment-wrapper" v-for="comment in comments" :key="comment.id">
                            <div class="card">
                                <!-- <div class="card-profile_header comment-title text-truncate">
                                    <i class="fas fa-comment"></i>
                                    {{comment.title}}
                                </div> -->
                                <div class="card-body">
                                    <div class="comment-title">
                                        <i class="fas fa-comment"></i>
                                        {{comment.title}}
                                    </div>
                                    <h5 class="card-title font-weight-bold source-img-small">{{comment.email}}
                                        <small class="card-text">{{comment.year}}</small>
                                    </h5>

                                        <read-more more-str="もっと見る" :text="comment.comment" :max-chars="160"></read-more>
                                </div>
                            </div>
                        </div>
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
            <div class="row ele m-lr-0" id="element1">
            <!-- ee-->
             <h5 class="profile_header">情報</h5>
                 <div class="row list-wrap m-lr-0 white-bg-color" v-for="cust in customer" :key="cust.id">                     
                    <!--for slideimage-->
                    <div class="col-sm-5 detail_profile_left">
                           <div class="thumbnail-img">
                             <div class="card-carousel">
                                <div class="card-img">
                                    <img :src="'/upload/hospital_profile/' +currentImage" alt="">
                                    <div class="actions">
                                        <span @click="prevImage" class="prev">
                                            <i class="fas fa-chevron-left"></i>
                                        </span>
                                        <span @click="nextImage" class="next">
                                            <i class="fas fa-chevron-right"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="thumbnails">
                                    <div
                                        v-for="(image,index) in  images"
                                        :key="image.id"
                                        :class="['thumbnail-image', (activeImage == index) ? 'active' : '']"
                                        @click="activateImage(index)" >
                                        <img  :src ="'/upload/hospital_profile/' + image.photo">
                                       
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row col-sm-12 detail_profile_left">
                            <strong class="img_2">  {{activeImageTitle}} </strong>
                        </div>
                       <div class="row col-sm-12 detail_profile_left">
                           {{activeImageDescription}}
                       </div>
                        
                       
                        <!-- <div  v-for="image in  images"  :key="image.id">
                              
                        </div> -->
                    </div>
                    <!--end for slide image-->
                    <!--for address-->
                     <div class="col-sm-7 detail_profile_right">
                        <div class="row list-wrap m-lr-0" v-for="cust in customer" :key="cust.id">
                            <div class="col-lg-3 col-md-4 col-sm-12"><p><strong>住所 :</strong></p></div>
                            <div class="col-lg-9 col-md-8 col-sm-12" ><p>{{cust.address}}</p></div>
                            <div class="col-lg-3 col-md-4 col-sm-12"><p><strong>電話 :</strong></p></div>
                            <div class="col-lg-9 col-md-8 col-sm-12" ><p>{{cust.phone}}</p></div>
                        </div>
                         <h5 class="profile_header m-t-10">こだわりの特長</h5>
                        <div class="row m-lr-0">
                            <ul class="fac_container" v-for="special in specialfeature" :key="special.id">
                                <li>{{special.short_name}}</li>
                            </ul>
                        </div>  
                    </div>
                    <!--end for address-->                
                </div> 
            <!--end ee-->
             
                <h5 class="profile_header">情報</h5>
                <div class="row m-lr-0">
                    <div class="col-md-10 m-2" v-for="hospital in hospitals" :key="hospital.id">
                        <p>{{hospital.details_info}}</p>
                    </div>
                </div>
                <h5 class="profile_header">診療科目</h5>
                    <div class="row col-md-3" v-for="sub in subjects" :key="sub.id">
                            <a href="#">{{sub.name}}</a>
                    </div>
                <h5 class="profile_header">診療時間</h5>
                
                        <div class="col-md-12">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="col-md-12 schedule_header">Date</div>
                                    <div class="col-md-12 schedule_header">月</div>
                                    <div class="col-md-12 schedule_header">火</div>
                                    <div class="col-md-12 schedule_header">水</div>
                                    <div class="col-md-12 schedule_header">木</div>
                                    <div class="col-md-12 schedule_header">金</div>
                                    <div class="col-md-12 schedule_header">土</div>
                                    <div class="col-md-12 schedule_header">日</div>
                                </div>
                                <div class="col-md-4">
                                    <div class="col-md-12 schedule_header">AM</div>
                                    <div v-for="(amval,index) in am_arr[0]" :key="index" class="col-md-12 schedule_body">{{amval}}</div>
                                </div>
                                <div class="col-md-4">
                                    <div class="col-md-12 schedule_header">PM</div>
                                    <div v-for="(amval,index) in pm_arr[0]" :key="index" class="col-md-12 schedule_body">{{amval}}</div>
                                </div>
                            </div>
                                
                                <div class="col-md-6"  v-for="hospital in hospitals" :key="hospital.id">
                                    <p>Closed day: <font>{{hospital.closed_day}}</font> </p>
                                </div>
                                <p>※診療時間は、変更される事や、診療科によって異なる場合があるため、直接医療機関のホームページ等でご確認ください</p>
                        </div>

                   

                <h5 class="profile_header">施設情報</h5>
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

                <h5 class="profile_header">口コミ</h5>
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
                            <GmapMarker v-for="(marker, index) in markers" :key="index" :position="marker.position" :clickable="true" :draggable="false" @click="center=marker" />     
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
                    {  position: { lat: 0, lng: 0 }  },
                ],
                am_arr:[],
                pm_arr:[],
                active_el:0,
                center: { lat: 0, lng: 0 },
                address: '',
                
                google:[],
                customer:[],
                hosfacilities:[],
                specialfeature:[],
                nusfacilities:[],
                nus_method:[],
                cooperate_medical:[],
                medical_acceptance:[],
                medical:[],
                fac_list:[],
                staff:[],
                schedules:[],
                subjects:[],
                hospitals:[],
                nursing_profiles:[],
                method_payment:[],
                comments:[],
                activeImage: 0,
                activeImageTitle:'',
                activeImageDescription:'',
                index: 0,
                // cusid: 0,
                // type: 0,
                pageNum: 0,
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

                images: [],
                // activeImage: 0,
                // currentOffset: 0,
                // windowSize: 1,
                // paginationFactor: 220,
            };
        },

        props:{
                cusid:Number,
                type:String
        },
        created(){
            if(this.type != undefined && this.cusid!= undefined){
                localStorage.setItem('cusType',this.type);
                localStorage.setItem('cusId',this.cusid);
            }
            this.type = localStorage.getItem('cusType');
            this.cusid = Number(localStorage.getItem('cusId'));           

            console.log(localStorage.getItem('cusType'));
            console.log(localStorage.getItem('cusId'));

            if(this.type == "nursing")
            {
                this.axios.get('/api/profile/nursing/'+this.cusid) .then(response => {
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
                    this.images = response.data.images;

                    if(response.data.nurselatlong[0]['latitude'] == 0 && response.data.nurselatlong[0]['longitude'] == 0)
                    {
                         this.center['lat'] = 35.6803997;
                         this.center['lng'] = 139.76901739;
                         this.markers[0]['position']['lat']  = 35.6803997;
                         this.markers[0]['position']['lng']  = 139.76901739;
                    }

                });

                this.axios.get(`/api/profile/specialfeature/${this.type}/${this.cusid}`) .then(response => {

                    this.specialfeature = response.data;
                });

                  this.axios.get('/api/profile/comment/'+this.cusid) .then(response => {
                      this.comments = response.data;
                });

                  this.axios.get('/api/profile/customer/'+this.cusid) .then(response => {
                      this.customer = response.data;
                });

            }
            else{
                this.axios.get(`/api/profile/specialfeature/${this.type}/${this.cusid}`).then(response => {
                    this.specialfeature = response.data;
                });
                 this.axios.get('/api/profile/comment/'+this.cusid).then(response => {
                      this.comments = response.data;
                });
                 this.axios.get('/api/profile/customer/'+this.cusid).then(response => {
                      this.customer = response.data;
                });
                this.axios.get('/api/profile/subject/'+this.cusid).then(response => {
                      this.subjects = response.data;
                });
                 this.axios.get('/api/profile/schedule/'+this.cusid) .then(response => {
                     
                        this.am_arr = response.data.am;
                        this.pm_arr = response.data.pm;
                        
                });
                
                this.axios.get('/api/profile/hospital/'+this.cusid).then(response => {
                    this.google = response.data.hoslatlong;
                    this.hospitals = response.data.hospital;
                    this.hosfacilities=response.data.facility_list;
                    this.fac_list = response.data.facility;
                    this.markers[0]['position']['lat']  = response.data.hoslatlong[0]['latitude'];
                    this.markers[0]['position']['lng']  = response.data.hoslatlong[0]['longitude'];
                    this.center['lat'] = response.data.hoslatlong[0]['latitude'];
                    this.center['lng'] = response.data.hoslatlong[0]['longitude'];
                    this.images = response.data.images;
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
          computed: {
            // currentImage gets called whenever activeImage changes
            // and is the reason why we don't have to worry about the
            // big image getting updated
            currentImage() {
                if(this.images.length > 0) {
                    this.activeImageTitle = this.images[this.activeImage].title;
                    this.activeImageDescription = this.images[this.activeImage].description;
                    return this.images[this.activeImage].photo;
                }
                else{
                    return 'noimage.jpg';
                }
                
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
                this.activeImageTitle = this.images[imageIndex].title;
                 this.activeImageDescription = this.images[imageIndex].description;

            },
             activate:function(el){
                this.active_el = el;
            },
             moveCarousel(direction) {
      // Find a more elegant way to express the :style. consider using props to make it truly generic
      if (direction === 1 && !this.atEndOfList) {
        this.currentOffset -= this.paginationFactor;
      } else if (direction === -1 && !this.atHeadOfList) {
        this.currentOffset += this.paginationFactor;
      }
    },
  }
 }

</script>




<style scoped>

/* .top-fixed-btn{
  border: 1px solid #b7dad2;
  box-shadow: 0px 2px 1px rgba(70, 70, 70, 0.3);
  color: #095c5f;
  background: #b7dad2;
  width: 145px;
  cursor: pointer;
  padding: 10px;
} */
/* .ele{
  margin-top: 27px;
  padding-top: 60px;
} */
.cost_tb{
    /* border: 1px solid #ccc; */
    border-left: 0px;
     border-bottom: 0px;
    padding-bottom: 1px;
     background: #fff;
     /* padding: 10px; */
    /* padding-bottom: 20px; */
}
.cost_table{
    width: 100%;
    /* height: 81px; */
    float: left;
    border-bottom: 1px solid #ccc;
    /* margin-top: 15px; */
}
/* .cost_table label {
    border-left: 6px solid #b7dad2;
    padding-left: 10px;
    margin-bottom: 10px;
    font-size:14px;
    line-height: 1.3;
     margin-top: 30px;
    padding-top: 2px;
} */
.cost_heading_lbl{
    border-left: 5px solid rgb(249, 121, 60);
    padding-left: 5px;
    font-weight: bold;
    font-size: 1.14em;
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
    align-self: center;
    /* padding-top: 21px; */
}

.comment-wrapper{
    background-color: #fff;
    padding: 5px;
}
.comment-title{
    background-size: 29px;
    color: #f9793c;
    display: block;
    font-size: 16px;
    font-weight: 700;
    padding-bottom: 10px;
}
.card-text{
    color: #777;
}

div.tab-card-profile_header > .card-profile_header-tab > .nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active {
    color: #fff !important;
    font-weight: bold;
    background-color: #1aa985  !important;
    border-top: 1px solid #1aa985  ;
    border-color: #1aa985   #ecede1   #1aa985   #1aa985  !important;
}
div.tab-card-profile_header > .card-profile_header-tab > .nav-tabs .nav-link {
    border: 1px solid #1aa985  !important;
}
div.tab-card-profile_header > .card-profile_header-tab > .nav-tabs .nav-item .nav-link, .nav-tabs .nav-link {
    border-color: transparent   #ecede1   transparent   #ecede1   !important;
}
.thumbnail-img{
    width: 100%;
    padding: 20px;
    line-height: 150px;
    vertical-align: middle;
    border: 1px solid #b7dad2;
    border-bottom: 1px solid #b7dad2;
    background-color: #f5f5f2;
    margin: 0 auto 20px;
    text-align: center;
}
.thumbnail-img img {
    width: 100%;
}

.card-carousel {
    user-select: none;
    position: relative;
}

.progressbar {
    display: block;
    width: 100%;
    height: 5px;
    position: absolute;
    background-color: rgba(221, 221, 221, 0.25);
    z-index: 1;
}

.progressbar > div {
    background-color: rgba(255, 255, 255, 0.52);
    height: 100%;
}

.thumbnails {
    display: flex;
    justify-content: space-evenly;
    flex-direction: row;
}

.thumbnail-image {
    display: flex;
    align-items: center;
    cursor: pointer;
    padding: 2px;
}

.thumbnail-image > img {
    width: 100%;
    height: auto;
    transition: all 250ms;
}

.thumbnail-image:hover > img,
.thumbnail-image.active > img {
    opacity: 0.6;
    box-shadow: 2px 2px 6px 1px rgba(0,0,0, 0.5);
}

.card-img {
    position: relative;
    margin-bottom: 20px;
}

.card-img > img {
    display: block;
    margin: 0 auto;
}

.actions {
    font-size: 1.5em;
    height: 40px;
    position: absolute;
    top: 50%;
    margin-top: -20px;
    width: 100%;
    display: flex;
    align-items: center;
    justify-content: space-between;
    color: #585858;
}

.actions > span {
    cursor: pointer;
    transition: all 250ms;
}

.actions > span.prev {
    margin-left: 5px;
}

.actions > span.next {
    margin-right: 5px;
}

.actions > span:hover {
    color: #eee;
}


</style>
