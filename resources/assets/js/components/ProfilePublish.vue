<template>

  <div id="app">

    <div v-if="type == 'nursing'" id="nursingView">
         <span class="top-mail-btn" @click="documentPost()" v-if="!loginuser"><i data-v-b65423c6="" class="far fa-envelope" style="color: #fff  !important;font-size: 15px;"></i>&nbsp;資料請求</span>
        <!--panorama-->
        <h4 class="profile-tit"  v-if="!currentPanoImage"><i class="fas fa-building"></i> {{customer_name}}</h4>

        <div class="col-12 detail_profile_left pad-free"  v-if="currentPanoImage">
            <h4 class="profile-tit"><i class="fas fa-building"></i> {{customer_name}}</h4>

            <div class="thumbnail-img" style="padding:0px;border:none;">
                <div class="card-carousel" style="background:#fff;">
                <div class="card-img" >
                    <!-- <div id="panorama"></div>           -->
                    <Pannellum :src="'/upload/nursing_profile/Imagepanorama/' + currentPanoImage" class="pannellum" :auto-load="true" :show-zoom="true" :show-fullscreen="true" :auto-rotate="isAutoRotationOn" :orientation="isOrientationOn" :compass="true" :hfov= "120"></Pannellum>
                </div>


                <div class="col-12" id="pano-slider-page">
                    <div class="card-carousel-wrapper">

                            <div class="nav-box" @click="moveCarousel(-1)" :disabled="atHeadOfList">
                                <div class="nav-content mr-2">
                                    <div class="card-carousel--nav__left"></div>
                                </div>
                            </div>
                            <div class="card-carousel">
                                <div class="card-carousel--overflow-container">
                                    <div class="card-carousel-cards" :style="{ transform: 'translateX' + '(' + panocurrentOffset + 'px' + ')'}">
                                        <div class="card-carousel--card">
                                           <!-- <div class="card-carousel--card--footer"> -->

											<!-- <div class="thumbnails-pano">
                                                <div v-for="(image,index) in  panoimages" :key="image.id" :class="['thumbnail-image-panorama', (activePanoImage == index) ? 'active' : '']" @click="activatePanoImage(index)" >
                                                    <img  :src ="'/upload/nursing_profile/Imagepanorama/' + image">
                                                </div>
                                            </div> -->
                                            <div  class="thumbnails-pano">
                                                <div v-for="(image,index) in  panoimages" :key="image.id" :class="['thumbnail-image-panorama', (activePanoImage == index) ? 'active' : '']" @click="activatePanoImage(index)" >
                                                    <img  :src ="'/upload/nursing_profile/Imagepanorama/' + image.photo">
                                                </div>
                                            </div>
                                        <!-- </div> -->
                                    </div>
                                </div>
                            </div>
                            </div>

                            <div class="nav-box"  @click="moveCarousel(1)" :disabled="atEndOfList">
                                <div class="nav-content ml-2">
                                   <div class="card-carousel--nav__right"></div>
                                </div>
                            </div>
                        </div>
                    </div>
            </div>
            </div>
        </div>
        <!--end panorama-->

            <div class="col-12 col-lg-12 col-md-10 tab typelabel nav-link fixed-nav" v-bind:style="{width:width}">
            <!-- <div class="row col-12 m-t-10">
                <h5 style="color:#000" class="h_4 header font15rem font-weight-bold">ひだまりこころクリニック　サンシャインサカエ院</h5>
            </div> -->

            <button v-scroll-to="{ el: '#element1'}" class="top-fixed-btn"  @click="activate(1)" :class="{ active : active_el == 1 }">
                介護情報
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
            </div>


            <div class="row m-lr-0 ele pt-2"   id="element1">
                 <div class="row col-12 list-wrap m-lr-0 white-bg-color" v-for="cust in customer" :key="cust.id">
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

                                <div class="row col-12">
                                    <h5><strong class="img_2">  {{activeImageTitle}} </strong></h5>
                                    <div class="row col-12 m-b-10">
                                        <p>{{activeImageDescription}}</p>
                                    </div>
                                </div>

                                <ul class="thumbnails">
                                    <li v-for="(image,index) in  images" :key="image.id" :class="['thumbnail-image', (activeImage == index) ? 'active' : '']" @click="activateImage(index)" >
                                        <img  :src ="'/upload/nursing_profile/' + image.photo">
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <!-- <div  v-for="image in  images"  :key="image.id">

                        </div> -->
                    </div>

                    <!--end for slide image-->
                    <!--for address-->
                     <div class="col-sm-7 detail_profile_right">
                        <div class="row col-12 pro-heading">
                             <div class="col-12 pad-free">
                                <h5 class="profile_header">介護情報</h5>
                             </div>
                             <!-- <div class="col-12">
                                 <h5 class="h_4 font15rem font-weight-bold">{{customer[0].name}}</h5>
                             </div> -->
                            <table class="table table-bordered">
                                    <tbody>
                                        <tr>
                                            <th width="200" class="custom-bg-color">
                                                <font>入居時費用</font>
                                            </th>
                                            <td>
                                                <font class="cash-lbl">
                                                    {{(Math.floor(Number(cust.moving_in_from)/10000))==0? '' : (Math.floor(Number(cust.moving_in_from)/10000)).toLocaleString()+'万' }}{{(Number(cust.moving_in_from)%10000)==0 ? '' : (Number(cust.moving_in_from)%10000).toLocaleString()}}円
                                                     ~
                                                    {{(Math.floor(Number(cust.moving_in_to)/10000))==0? '' : (Math.floor(Number(cust.moving_in_to)/10000)).toLocaleString()+'万' }}{{(Number(cust.moving_in_to)%10000)==0 ? '' : (Number(cust.moving_in_to)%10000).toLocaleString()}}円
                                                </font>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th width="200" class="custom-bg-color">
                                                <font>月額費用</font>
                                            </th>
                                            <td>
                                                <font class="cash-lbl">
                                                    {{(Math.floor(Number(cust.per_month_from)/10000))==0? '' : (Math.floor(Number(cust.per_month_from)/10000)).toLocaleString()+'万' }}{{(Number(cust.per_month_from)%10000)==0 ? '' : (Number(cust.per_month_from)%10000).toLocaleString()}}円
                                                     ~
                                                    {{(Math.floor(Number(cust.per_month_to)/10000))==0? '' : (Math.floor(Number(cust.per_month_to)/10000)).toLocaleString()+'万' }}{{(Number(cust.per_month_to)%10000)==0 ? '' : (Number(cust.per_month_to)%10000).toLocaleString()}}円
                                                </font>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th width="200" class="custom-bg-color">
                                                <font>住所</font>
                                            </th>
                                            <td>
                                                <font>{{cust.address}}</font>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th width="200" class="custom-bg-color">
                                                <font>電話番号</font>
                                            </th>
                                            <td>
                                                <font>{{cust.phone}}</font>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th width="200" class="custom-bg-color">
                                                <font>アクセス　</font>
                                            </th>
                                            <td>
                                                <p v-html="cust.access"></p>
                                            </td>
                                        </tr>
                                        <!-- <tr>
                                            <th width="200" class="custom-bg-color">
                                                <font>駅</font>
                                            </th>
                                            <td>
                                                <font>Nearest Station</font>
                                            </td>
                                        </tr> -->
                                    </tbody>
                            </table>

                            <!-- <div class="col-lg-3 col-md-4 col-sm-12"><p><strong>住所 :</strong></p></div>

                            <div class="col-lg-9 col-md-8 col-sm-12" ><p>{{cust.address}}</p></div>

                            <div class="col-lg-3 col-md-4 col-sm-12"><p><strong>電話 :</strong></p></div>

                            <div class="col-lg-9 col-md-8 col-sm-12" ><p>{{cust.phone}}</p></div> -->

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

                <h5 class="profile_header">特長 </h5>
                <div  v-for="nurseprofile in nursing_profiles" :key="nurseprofile.id" class="col-md-12"><p v-html="nurseprofile.feature"></p></div>

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
                        <div class="cost_tb">
                            <div class="row" >
                                <div class="col-md-12" >

                                    <table class="table table-bordered cost_table main-cost-table">

                                        <thead>

                                            <tr>
                                                <th>プラン名 / 居室詳細</th>
                                                <th>入居時費用</th>
                                                <th>月額費用</th>
                                                <th></th>
                                            </tr>

                                        </thead>

                                        <tbody>
                                        <tr v-for="(cost,index) in method_payment" :key="cost.id" @click="changeBg(cost.id,index)" :class="'cost'+index">
                                            <td>
                                                <h5 class="method-name">{{cost.payment_name}}</h5>
                                                <span class="room-type"> {{cost.living_room_type}} </span>
                                                {{cost.area}}
                                            </td>
                                            <td><span class="cash-lbl-mini">{{cost.expense_moving}}</span></td>
                                            <td><span class="cash-lbl-mini">{{cost.monthly_fees}}</span></td>
                                            <td style="padding-top:15px;">
                                                <span :class="'changeLink changeLink'+cost.id" @click="costConfirm(cost.id)" >詳しくはこちら</span>
                                            </td>
                                        </tr>
                                        </tbody>

                                    </table>

                                </div>

                                <!-- <div class="cost_btnwrapper col-md-1 pad-free">

                                    <button class="btn inner-btn okbtn" type="button" data-toggle="collapse" :data-target="'#costDetails' + cost.id"><i class="fas fa-sort-down"></i>&nbsp;内容を見る</button>

                                </div> -->

                                <div class="col-md-12 collapse closeChangeLink" :id="'changeLink' + cost.id" v-for="cost in method_payment" :key="cost.id">
                                    <label class="cost_heading_lbl m-b-15">{{cost.payment_name}}</label>
                                    <div class="col-md-12 pad-free">
                                        <label class="cost_heading_lbl_mini"><i class="fas fa-yen-sign"></i> 入居にかかる費用</label>
                                        <table id="costDetails" class="table table-condensed cost_table">
                                            <tbody>
                                                <tr>
                                                    <th width="300">入居一時金または</th>
                                                    <td><span class="cash-lbl-mini">{{cost.deposit}}</span></td>
                                                    <th width="300">その他（使途）</th>
                                                    <td>{{cost.other_use}}</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>

                                    <div class="col-md-12 pad-free">
                                        <label class="cost_heading_lbl_mini"><i class="fas fa-yen-sign"></i> 月額費用</label>
                                        <table class="table table-condensed cost_table">
                                            <tbody>

                                                <tr>
                                                    <th width="300">賃料</th>
                                                    <td><span class="cash-lbl-mini">{{cost.rent}}</span></td>
                                                </tr>

                                                <tr>
                                                    <th>管理費</th>
                                                    <td><span class="cash-lbl-mini">{{cost.admin_expense}}</span></td>
                                                </tr>

                                                <tr>
                                                    <th>食費 </th>
                                                    <td><span class="cash-lbl-mini">{{cost.food_expense}}</span></td>
                                                </tr>

                                                <tr>
                                                    <th>介護上乗せ金（生活サービス費</th>
                                                    <td><span class="cash-lbl-mini">{{cost.nurse_care_surcharge}}</span></td>
                                                </tr>

                                                <tr>
                                                    <th>その他 </th>
                                                    <td>{{cost.other_monthly_cost}}</td>
                                                </tr>

                                            </tbody>

                                        </table>
                                    </div>

                                    <div class="col-md-12 pad-free">
                                        <label class="cost_heading_lbl_mini"><i class="fas fa-yen-sign"></i> 返還金について</label>
                                        <table class="table table-condensed cost_table">
                                            <tbody>

                                                <tr>

                                                    <th width="300">返還制度</th>

                                                    <td>{{cost.refund_system}}</td>

                                                </tr>

                                                <tr>

                                                    <th>償却期間</th>

                                                    <td>{{cost.depreciation_period}}</td>

                                                </tr>

                                                <tr>

                                                    <th>初期償却</th>

                                                    <td>{{cost.initial_deprecration}}</td>

                                                </tr>

                                                <tr>

                                                    <th>その他メッセージ</th>

                                                    <td>{{cost.other_message_refund}}</td>

                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <label class="cost_heading_lbl">フォトアルバム</label>
                        <div class="row">
                            <div v-for="(image,index) in  light_images" :key="index" class="col-sm-4 col-md-4 col-lg-3 m-b-10">
                                <div style="widht:100%;height:100%;padding:10px;background:#eee;">
                                    <img  :src ="'/upload/nursing_profile/' + image.name"  class="img-fluid" @click="showLightbox(image.name)"  >
                                    <span style="color:orange;font-weight:bold;">{{image.title}}</span><br>
                                </div>

                                <!-- <span>{{image.photo}}</span> -->
                            </div>
                            <lightbox id="mylightbox" ref="lightbox" :images="light_images" :directory="thumbnailDir+'nursing_profile/'" :timeoutDuration="5000" />
                        </div>
                    </div>

                    <div class="col-md-12 m-t-15 m-b-15">
                        <label class="cost_heading_lbl">動画</label>
                        <div class="row">
                            <div v-for="(video) in  videos" :key="video.id" class="col-sm-4 col-md-4 col-lg-3">
                                <iframe :src="'https://www.youtube.com/embed/'+video.photo" controls></iframe>
                                <span style="color:orange;font-weight:bold;">{{video.title}}</span><br>
                            </div>
                        </div>
                    </div>

            </div>

            <div class="row ele m-lr-0" id="element4">

                <!-- <div class="row"> -->
                    <h5 class="profile_header col-md-12"> 施設の概要</h5>
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
                            <h5 class="profile_header col-md-12"> 協力医療機関</h5>
                            </div>
                            <div v-if="cooperate_medical.length>0" class="col-md-12">
                                <div v-for="comedical in cooperate_medical" :key="comedical.id" class="col-md-12" >
                                    <label class="cost_heading_lbl_mini"><i class="fas fa-university"></i> {{comedical.name}}</label>
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

                                <h5 class="profile_header col-12"> 医療面の受入れ</h5>

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
                                <h5  class="profile_header col-12"> 職員体制</h5>
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

                            <div class="col-12" style="padding-top:20px;" v-for="m in google" :key="m.id" >
                                <table border="1" class="table table-bordered">
                                    <tbody>
                                    <tr>
                                        <td width="250" class="custom-bg-color"> 公式サイト</td>
                                        <td>{{m.website}}</td>
                                    </tr>
                                    <tr>
                                        <td width="250" class="custom-bg-color"> アクセス</td>
                                        <td><p v-html="m.access"></p></td>
                                    </tr>
                                    <tr>
                                        <td width="250" class="custom-bg-color">住所 </td>
                                        <td>{{m.address}}</td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>

                      </div>

                 </div>



            <div class="row ele m-lr-0" id="element6">
                <div class="profile_header col-12">
                    <h5 style="padding-top:10px;">口コミ {{customer_name}}</h5><div class="comment-ico2">
                              <a href="/comment" class="comhov">
                              <i class="far fa-comment"></i>
                              <span>口コミを追加する</span>
                              </a>
                           </div>
                </div>


               <div class="col-lg-12 col-md-12 col-sm-12">

                    <div class="row col-12">



                        <div class="col-12 comment-wrapper">

                            <div class="card" v-for="comment in comments" :key="comment.id">

                                <!-- <div class="card-profile_header comment-title text-truncate">

                                    <i class="fas fa-comment"></i>

                                    {{comment.title}}

                                </div> -->

                                <div class="card-body">

                                    <div class="comment-title">

                                        <i class="fas fa-comment"></i>

                                        {{comment.title}}

                                        <!-- {{comment.created_time}}   -->
                                        <!-- {{substr("comment.created_at", 0, 10)}} -->

                                    </div>

                                    <h5 class="card-title font-weight-bold source-img-small">{{comment.email}}<br>

                                        <small class="card-text">{{comment.year}}</small>

                                    </h5>

                                    <div class="comment-title2">
                                       <i class="fa fa-calendar" aria-hidden="true"></i>
                                       {{comment.created_date}}
                                    </div>

                                     <div class="comment-title2">
                                      <i class="fa fa-clock" aria-hidden="true"></i>
                                     {{comment.created_time}}
                                    </div>




                                        <read-more more-str="もっと見る" :text="comment.comment" :max-chars="160"></read-more><br>
                                        <div>{{comment.customer}}</div>
                                </div>

                            </div>
                            <!-- <div class="comment-ico">
                              <a href="/comment">
                              <i class="far fa-comment"></i>
                              <span>口コミを追加する</span>
                              </a>
                           </div> -->

                        </div>

                    </div>

               </div>

            </div>

            <!-- <div class="ele m-lr-0" id="element7">
                <joboffer profile="profile"></joboffer>
            </div> -->

    </div>



    <div v-if="type == 'hospital'" id="hospitalView">
       <!--panorama-->
            <h5 class="profile-tit"><i class="fas fa-building"></i> {{customer_name}}</h5>
            <div class="col-12 detail_profile_left pad-free"  v-if="currentPanoImage">
                    <div class="thumbnail-img" style="padding:0px;border:none;">
                        <div class="card-carousel">
                        <div class="card-img">
                            <!-- <div id="panorama"></div>           -->

                            <Pannellum  :src="'/upload/hospital_profile/Imagepanorama/' + currentPanoImage"
                                class="pannellum"
                                :auto-load="true"
                                :show-zoom="true"
                                :show-fullscreen="true"
                                :auto-rotate="isAutoRotationOn"
                                :orientation="isOrientationOn"
                                :compass="true"
                                :hfov= "120"

                                ></Pannellum>

                        </div>
                            <div class="col-12" id="pano-slider-page">
                <div class="card-carousel-wrapper">

                        <div class="nav-box" @click="moveCarousel(-1)" :disabled="atHeadOfList">
                            <div class="nav-content mr-2">
                                <div class="card-carousel--nav__left"></div>
                            </div>
                        </div>
                        <div class="card-carousel">
                            <div class="card-carousel--overflow-container">
                                <div class="card-carousel-cards" :style="{ transform: 'translateX' + '(' + panocurrentOffset + 'px' + ')'}">
                                    <div class="card-carousel--card">
                                        <!-- <div class="card-carousel--card--footer"> -->

                                        <div class="thumbnails-pano">
                                            <div v-for="(image,index) in  panoimages" :key="image.id" :class="['thumbnail-image-panorama', (activePanoImage == index) ? 'active' : '']" @click="activatePanoImage(index)" >
                                                <img  :src ="'/upload/nursing_profile/Imagepanorama/' + image">
                                            </div>
                                        </div>
                                    <!-- </div> -->
                                </div>
                            </div>
                        </div>
                        </div>

                        <div class="nav-box"  @click="moveCarousel(1)" :disabled="atEndOfList">
                            <div class="nav-content ml-2">
                                <div class="card-carousel--nav__right"></div>
                            </div>
                        </div>
                    </div>
                </div>

                        <!-- <div  class="thumbnails">
                                <div

                                    v-for="(image,index) in  panoimages"

                                    :key="image.id"

                                    :class="['thumbnail-image', (activePanoImage == index) ? 'active' : '']"

                                    @click="activatePanoImage(index)" >
                                    <img  :src ="'upload/nursing_profile/Imagepanorama/' + image.photo">
                                </div>
                        </div> -->
                    </div>
                </div>
            </div>
            <!--end panorama-->
           <div class="col-12 col-lg-12 col-md-10 tab typelabel nav-link fixed-nav" v-bind:style="{width:width}">
                <!-- <div class="row col-12 m-t-10">
                     <h5 style="color:#000" class="h_4 header font15rem font-weight-bold">ひだまりこころクリニック　サンシャインサカエ院</h5>
                </div> -->

                <button v-scroll-to="{ el: '#element1'}" class="top-fixed-btn" @click="activate(1)" :class="{ active : active_el == 1 }">
                    病院情報
                </button>

                <button v-scroll-to="{ el: '#element2' }" class="top-fixed-btn" @click="activate(2)" :class="{ active : active_el == 2 }">
                    口コミ
                </button>

                <button v-scroll-to="{ el: '#element3' }" class="top-fixed-btn" @click="activate(3)" :class="{ active : active_el == 3 }">
                    地図
                </button>

                <!-- <button v-scroll-to="{ el: '#element4' }" class="top-fixed-btn" @click="activate(4)" :class="{ active : active_el == 4 }">
                    求人応募
                </button> -->

            </div>

            <div class="row ele m-lr-0 pt-2" id="element1">

                <!-- ee-->
                 <div class="row col-12 list-wrap m-lr-0 white-bg-color" v-for="cust in customer" :key="cust.id">
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

                                <div class="row col-12">

                                    <h5><strong class="img_2">  {{activeImageTitle}} </strong></h5>

                                    <div class="row col-12 m-b-10">

                                         <p>{{activeImageDescription}}</p>

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


                        <!-- <div  v-for="image in  images"  :key="image.id">

                        </div> -->

                    </div>

                    <!--end for slide image-->

                    <!--for address-->


                     <div class="col-sm-7 detail_profile_right">

                        <div class="row m-lr-0">
                            <div class="col-12 pro-heading">
                                <div class="col-12 pad-free">
                                    <h5 class="profile_header">病院情報 </h5>
                                </div>
                                <table class="table table-bordered">
                                    <tr>
                                        <th width="250" class="custom-bg-color">
                                            <font>住所</font>
                                        </th>
                                        <td>
                                            <font>{{cust.address}}</font>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th width="250" class="custom-bg-color">
                                            <font>電話番号</font>
                                        </th>
                                        <td>
                                            <font>{{cust.phone}}</font>
                                        </td>
                                    </tr>
                                     <tr>
                                        <th width="250" class="custom-bg-color">
                                            <font>アクセス</font>
                                        </th>
                                        <td>
                                            <p v-html="cust.access"></p>
                                        </td>
                                    </tr>
                                     <!-- <tr>
                                        <th width="250" class="custom-bg-color">
                                            <font>駅 </font>
                                        </th>
                                        <td>
                                            <font>Nearest Station</font>
                                        </td>
                                    </tr> -->
                                     <!-- <tr>
                                        <th width="250" class="custom-bg-color">
                                            <font>費用 </font>
                                        </th>
                                        <td>
                                            <font>Cost</font>
                                        </td>
                                    </tr> -->
                                     <tr>
                                        <th width="250" class="custom-bg-color">
                                            <font>件名 </font>
                                        </th>
                                        <td>
                                            <label for="" v-for="sub in subjects" :key="sub.id">
                                                {{sub.name}}
                                            </label>
                                            <!-- <font>{{cust.subject}}</font> -->
                                        </td>
                                    </tr>
                                </table>
                            </div>
                            <!--
                            <div class="col-lg-3 col-md-4 col-sm-12"><p><strong>住所 :</strong></p></div>

                            <div class="col-lg-9 col-md-8 col-sm-12" ><p>{{cust.address}}</p></div>

                            <div class="col-lg-3 col-md-4 col-sm-12"><p><strong>電話 :</strong></p></div>

                            <div class="col-lg-9 col-md-8 col-sm-12" ><p>{{cust.phone}}</p></div> -->

                        </div>

                         <h5 class="header m-t-10">こだわりの特長</h5>

                        <div class="row m-lr-0">

                            <ul class="fac_container" v-for="special in specialfeature" :key="special.id">

                                <li>{{special.short_name}}</li>

                            </ul>

                        </div>

                        <h5 class="header m-t-10">診療科目</h5>

                        <div class="row col-md-12">
                            <ul class="sub_container" v-for="sub in subjects" :key="sub.id">
                                <li>{{sub.name}}</li>

                            </ul>

                        </div>

                    </div>
                    <!--end for address-->
                </div>
            <!--end ee-->

                <h5 class="profile_header">医院からのお知らせ </h5>

                <div class="row m-lr-0">

                    <div class="col-md-12 m-2" v-for="hospital in hospitals" :key="hospital.id">

                        <p>{{hospital.details_info}}</p>

                    </div>

                </div>

                <h5 class="profile_header">診療時間 </h5>

                <div class="row col-12 m-b-10">

                    <div class="col-9">

                    <table class="table table-bordered">

                    <tbody>

                        <tr class="first-row">

                            <th>

                               日付

                            </th>

                            <th>

                                月

                            </th>

                            <th>

                                火

                            </th>

                            <th>

                                水

                            </th>

                            <th>

                                木

                            </th>

                            <th>

                                金

                            </th>

                            <th>

                                土

                            </th>

                            <th>

                                日

                            </th>

                        </tr>

                        <tr class="last">

                            <th class="second-row text-center">午前</th>

                            <td v-for="(amval,index) in am_arr[0]" :key="index" class="text-center">{{amval}}</td>

                        </tr>

                        <tr class="last">

                            <th class="second-row text-center">午後</th>

                            <td v-for="(amval,index) in pm_arr[0]" :key="index" class="text-center">{{amval}}</td>

                        </tr>

                    </tbody>

                </table>

                </div>

                <div class="col-3">

                    <div v-for="hospital in hospitals" :key="hospital.id">

                        <p><strong class="font-weight-bold">休診日: </strong><font>{{hospital.closed_day}}</font> </p>

                    </div>

                </div>

                <!-- <div class="row col-12">

                    <p><span style="color:red;font-weight:bold;font-size:15px;">※</span>診療時間は、変更される事や、診療科によって異なる場合があるため、直接医療機関のホームページ等でご確認ください。</p>

                </div> -->

                </div>



                <h5 class="profile_header">施設情報 </h5>

                <div class="col-12">

                    <div class="row col-md-12">

                            <div class="col-md-2 fac-name-box" v-for="hosfacility in hosfacilities " :key="hosfacility.id">

                            <h4>{{hosfacility.description}}</h4>

                            <div class="fac-check-box">

                                <p v-for="fac in fac_list" :key="fac.id">

                                    <i v-if="fac.id === hosfacility.id">〇</i>

                                </p>



                                <!-- <i class="fa fa-circle-o fa-stack-2x" v-if="fac.id === hosfacility.id"></i>  -->

                            </div>

                        </div>

                    </div>



                </div>

            </div>

            <div class="row ele m-lr-0" id="element2">

                <h5 class="profile_header col-12">口コミ </h5>

                 <div class="col-lg-12 col-md-12 col-sm-12">

                    <div class="row col-12">

                        <div class="col-12 comment-wrapper">

                            <div class="card" v-for="comment in comments" :key="comment.id">

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
                            <div class="comment-ico">
                              <a href="/comment">
                              <i class="far fa-comment"></i>
                              <span>口コミを追加する</span>
                              </a>
                           </div>

                        </div>

                    </div>

                 </div>

              <div class="col-12" v-for="comment in comments" :key="comment.id">

                    <!-- <div class="col-md-12">タイトル:{{comment.title}}</div><br/>



                    <div class="col-md-5">電子メールアドレス:{{comment.email}}</div>

                    <div class="col-md-3">年月日投稿:{{comment.year}}</div>

                        <br/><br/> -->

                        <!-- <div class="col-md-3 offset-md-4" v-for="comment in comments" :key="comment.id">

                            <div class="content hideContent">{{comment.comment}}</div>

                        </div> -->

                        <!-- <button onclick="function()">See more</button> -->

                    <!-- <div class="row col-md-12 m-lr-0">

                        <p class="showContent"> {{comment.comment}}</p>

                            <span class="displaytext" :id="'test'+comment.id">{{comment.comment}}</span>

                                <a class="mt-2 readMore" @click="review(comment.id)" href ="#">ReadMore</a>



                    </div> -->

                     <!-- <div class="row col-md-6 m-lr-0">

                        <read-more more-str="read more" :text="comment.comment" :max-chars="50"></read-more>

                    </div> -->

                </div>

            </div>

            <div class="col-md-12">
                        <label class="cost_heading_lbl">フォトアルバム</label>
                        <div class="row">
                            <div v-for="(image,index) in  light_images" :key="index" class="col-sm-4 col-md-4 col-lg-3 m-b-10">
                                <div style="widht:100%;height:100%;padding:10px;background:#eee;">
                                    <img  :src ="'/upload/hospital_profile/' + image.name"  class="img-fluid" @click="showLightbox(image.name)"  >
                                    <span style="color:orange;font-weight:bold;">{{image.title}}</span><br>
                                </div>
                                
                                <!-- <span>{{image.photo}}</span> -->
                            </div>
                            <lightbox id="mylightbox" ref="lightbox" :images="light_images" :directory="thumbnailDir+'hospital_profile/'" :timeoutDuration="5000" />
                        </div>
                    </div>

            <!-- Hospital Video -->
                <div class="col-md-12 m-t-15 m-b-15">
                    <label class="cost_heading_lbl">動画</label>
                    <div class="row">
                        <div v-for="(video) in  videos" :key="video.id" class="col-sm-4 col-md-4 col-lg-3">
                            <iframe :src="'https://www.youtube.com/embed/'+video.photo" controls></iframe>
                            <span style="color:orange;font-weight:bold;">{{video.title}}</span><br>
                        </div>
                    </div>
                </div>
            <!-- End -->

            <div class="row ele m-lr-0" id="element3">

                 <h5 class="profile_header col-md-12"> 地図 </h5>

                <div class="col-lg-12 col-md-12 col-sm-12">

                            <GmapMap id="googlemap" ref="map" :center="center" :zoom="10" >

                            <GmapMarker v-for="(m, index) in markers" :key="index" :position="m.position" :clickable="true" :draggable="true" @click="center=m.position" />

                           </GmapMap>

                        <div  class="row col-12" style="padding-top:20px;" v-for="m in google" :key="m.id" >
                             <table border="1" class="table table-bordered">
                                    <tbody>
                                    <tr>
                                        <td width="250" class="custom-bg-color"> 公式サイト</td>
                                        <td>{{m.website}}</td>
                                    </tr>
                                    <tr>
                                        <td width="250" class="custom-bg-color"> アクセス</td>
                                        <td><p v-html="m.access"></p></td>
                                    </tr>
                                    <tr>
                                        <td width="250" class="custom-bg-color"> 混雑状況</td>
                                        <td>{{m.congestion}}</td>
                                    </tr>
                                    <tr>
                                        <td width="250" class="custom-bg-color">住所 </td>
                                        <td>{{m.address}}</td>
                                    </tr>
                                    </tbody>
                                </table>
                        </div>

                    </div>

            </div>

            <!-- <div class="ele m-lr-0" id="element4">
                <joboffer profile="profile"></joboffer>
            </div> -->

    </div>

  </div>

</template>



<script>

import joboffer from './JobSearchListComponent.vue'
import Pannellum from '../../../../resources/assets/js/components/vue-pannellum.vue'
import Lightbox from 'vue-my-photos'
export default {

    components:{
        joboffer,
        Pannellum,
        Lightbox
    },
    data() {

            var that = this;
            return {
                url: 'upload/nursing_profile/Imagepanorama/',
                isAutoRotationOn: true,
                isOrientationOn: true,
                markers: [
                    {  position: { lat: 0, lng: 0 }  },
                ],
                customer_name:'',
                am_arr:[],
                images:[],
                videos:[],
                pm_arr:[],
                active_el:0,
                width: '',
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
                activePanoImage: 0,
                activeImageTitle:'',
                activeImageDescription:'',
                index: 0,
                light_images:[],
                thumbnailDir: '/upload/',
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
                // panoimages: ['examplepano.jpg','pano3.jpg','alma.jpg','examplepano.jpg','pano3.jpg','examplepano.jpg','examplepano.jpg','alma.jpg','pano3.jpg','examplepano.jpg','alma.jpg','examplepano.jpg',],
                panoimages:[],
                changelinktitle:'内容を見る',
                panocurrentOffset: 0,
                windowSize: 10,
                paginationFactor:103,
                fav_email : [],
                  data: {
	  str:"Welcome to Canada!",
	  substr: ""
  },

            };
        },

        props:{
                cusid:Number,
                type:String,
                loginuser:Boolean,
        },

        created(){
            console.log(this.cusid);
          this.activePanoImage = 0;

            if(this.type != undefined && this.cusid!= undefined){
                localStorage.setItem('cusType',this.type);
                localStorage.setItem('cusId',this.cusid);
            }

            this.type = localStorage.getItem('cusType');
            this.cusid = Number(localStorage.getItem('cusId'));

            if(this.loginuser == true) {
                $(document).scroll(function() {
                    $(".fixed-nav").css({"position": "fixed","top":"70px"});
                    var cur_pos = $(this).scrollTop();
                    if (cur_pos >= 100) {
                        $(".fixed-nav").css({"position": "fixed","top":"70px"});
                    } else {
                        $(".fixed-nav").css({"position": "unset", "top": "unset"});
                    }
                    //  $(".fixed-nav").css({"position": "unset","top":"unset"});
                });

            } else {
                $(document).scroll(function() {
                    $(".fixed-nav").css({"position": "fixed","top":"210px"});
                    var cur_pos = $(this).scrollTop();
                    if (cur_pos >= 100) {
                        $(".fixed-nav").css({"position": "fixed","top":"210px"});
                    } else {
                        $(".fixed-nav").css({"position": "unset", "top": "unset"});
                    }
                });
            }
            if(this.type == "nursing")
            {
                this.axios.get('/api/profile/customer/'+this.cusid+'/'+this.type) .then(response => {
                      this.customer = response.data;
                      this.customer_name = response.data[0].name;
                });

                this.axios.get('/api/profile/nursing/'+this.cusid) .then(response => {
                    this.nursing_profiles = response.data.feature;

                    this.nus_method= response.data.method;

                    this.method_payment = response.data.cost;

                    this.nusfacilities = response.data.facility;
                    console.log(this.nusfacilities);

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

                    for(var i=0; i<this.images.length; i++){
                        this.light_images.push({
                            'name': this.images[i]['photo'],
                            'description': this.images[i]['description'],
                            'id': this.images[i]['id'],
                            'title': this.images[i]['title']
                        })
                    }

                    this.panoimages = response.data.panoimages;

                    this.videos = response.data.videos;
                    // console.log(this.panoimages);return;

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
                      console.log(response.data);
                      this.comments = response.data;
                    // for ( var index=0; index<response.data.length; index++ ) {

                    //     data = { "created_date": "1", "created_time": "Valid" };
                    //     this.comments.push(data);
                    //         // tempData.push( data );
                    // }
                });                  

            }

            else{
                this.axios.get('/api/profile/customer/'+this.cusid+'/'+this.type).then(response => {
                    this.customer = response.data;
                    this.customer_name = response.data[0].name;
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

                    for(var i=0; i<this.images.length; i++){
                        this.light_images.push({
                            'name': this.images[i]['photo'],
                            'description': this.images[i]['description'],
                            'id': this.images[i]['id'],
                            'title': this.images[i]['title']
                        })
                    }

                    this.videos = response.data.videos;

                    // this.panoimages = response.data.panoimages;

                    if(response.data.hoslatlong[0]['latitude'] == 0 && response.data.hoslatlong[0]['longitude'] == 0)

                    {

                         this.center['lat'] = 35.6803997;

                         this.center['lng'] = 139.76901739;

                         this.markers[0]['position']['lat']  = 35.6803997;

                         this.markers[0]['position']['lng']  = 139.76901739;

                    }

                });

                this.axios.get(`/api/profile/specialfeature/${this.type}/${this.cusid}`).then(response => {

                    this.specialfeature = response.data;

                });

                 this.axios.get('/api/profile/comment/'+this.cusid).then(response => {

                      this.comments = response.data;

                });                 

                this.axios.get('/api/profile/subject/'+this.cusid).then(response => {
                      this.subjects = response.data;

                });

                 this.axios.get('/api/profile/schedule/'+this.cusid) .then(response => {

                        this.am_arr = response.data.am;
                        this.pm_arr = response.data.pm;

                });
            }

            var new_width = $("#content-all").width();

            var fixed_width = new_width - 80;

            this.width = fixed_width + "px";

          },

          computed: {
                    atEndOfList() {
                        return this.panocurrentOffset <= (this.paginationFactor * -1) * (this.panoimages.length - this.windowSize);
                    },
                    atHeadOfList() {
                        return this.panocurrentOffset === 0;
                    },
              currentPanoImage() {

                if(this.panoimages.length > 0) {
                    return this.panoimages[this.activePanoImage].photo;

                }

            },

            currentImage() {
                if(this.images) {
                    if(this.images.length > 0) {

                        this.activeImageTitle = this.images[this.activeImage].title;

                        this.activeImageDescription = this.images[this.activeImage].description;

                        return this.images[this.activeImage].photo;

                    }
                    else{

                        return 'no-image-big.jpg';

                    }
                }

                else{

                    return 'no-image-big.jpg';

                }

            }


        },
        methods: {
            changeBg(ch,a) {
                $('.main-cost-table td').css({'background':'transparent'});
                $('.cost'+a+' td').css({'background':'#ffe9df'});
            },
            showLightbox: function(imageName) {
                this.$refs.lightbox.show(imageName);
            },
            moveCarousel(direction) {
                        // Find a more elegant way to express the :style. consider using props to make it truly generic
                if (direction === 1 && !this.atEndOfList) {
                    this.panocurrentOffset -= this.paginationFactor;
                } else if (direction === -1 && !this.atHeadOfList) {
                    this.panocurrentOffset += this.paginationFactor;
                }
            },
              activatePanoImage(imageIndex) {
                this.activePanoImage = imageIndex;

            },

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


    costConfirm(id){

        $('.changeLink').text("詳しくはこちら");
        $('.changeLink').removeClass("CloseBtn");
        $('.changeLink'+id).text("選択中");
        $('.changeLink'+id).addClass("CloseBtn");
        $('.closeChangeLink').hide('medium');
        $('#changeLink'+id).show('medium');
    },
    documentPost() {
        localStorage.removeItem("item");
        this.fav_email.push({
            'id': this.customer[0]['id'],
            'email': this.customer[0]['email'],
            'name': this.customer[0]['name']
            });
        localStorage.setItem("item", JSON.stringify(this.fav_email));
        this.$router.push({
            name: 'nursingFavouriteMail',
        });
    }

  }

 }


</script>

<style scoped>
/*slider*/
    #pano-slider-page .card-carousel {
    display: flex;
    justify-content: left;
    /* width: 1336px; */
    width:1033px;
}


/*slick carousel*/

#pano-slider-page .card-carousel-wrapper {
    display: flex;
    align-items: center;
    justify-content: center;
    margin: 20px 0 40px;
    color: #666a73;
}

#pano-slider-page .card-carousel-comment {
    display: flex;
    justify-content: center;
    /* width: 1145px; */
}

#pano-slider-page .card-carousel-comment .card {
    margin: 0px 10px 0px 0px;
}

#pano-slider-page .card-carousel--overflow-container {
    color: #000;
    text-align: left;
    overflow: hidden;
}

#pano-slider-page .card-carousel--nav__left,
#pano-slider-page .card-carousel--nav__right {
    display: inline-block;
    width: 15px;
    height: 15px;
    padding: 5px;
    box-sizing: border-box;
    border-top: 5px solid #f9793c;
    border-right: 5px solid #f9793c;
    cursor: pointer;
    /* margin: 0 10px; */
    transition: transform 150ms linear;
}


#pano-slider-page .card-carousel--nav__left[disabled],
#pano-slider-page .card-carousel--nav__right[disabled] {
    opacity: 0.2;
    border-color: black;
}

.nav-box[disabled] {
    opacity: 0.2;
}

#pano-slider-page .nav-box[disabled] .card-carousel--nav__left,
#pano-slider-page .nav-box[disabled] .card-carousel--nav__right {
    border-top: 5px solid #000;
    border-right: 5px solid #000;
}

#pano-slider-page .nav-box[disabled] .nav-content {
    border: 2px solid #000;
    background: #fff
}

.nav-content {
    width: 35px;
    height: 35px;
    line-height: 35px;
    vertical-align: middle;
    background: #fffff4;
    border: 2px solid #ff9563;
    border-radius: 50%;
    text-align: center;
}

#pano-slider-page .card-carousel--nav__left {
    transform: rotate(-135deg);
}

#pano-slider-page .card-carousel--nav__left:active {
    transform: rotate(-135deg) scale(0.9);
}

#pano-slider-page .card-carousel--nav__right {
    transform: rotate(45deg);
}

#pano-slider-page .card-carousel--nav__right:active {
    transform: rotate(45deg) scale(0.9);
}

#pano-slider-page .card-carousel-cards {
    display: flex;
    transition: transform 150ms ease-out;
    transform: translatex(0px);
}

#pano-slider-page .card-carousel-cards .card-carousel--card {
    margin: 0 10px;
    cursor: pointer;
    /* box-shadow: 0 4px 15px 0 rgba(40, 44, 53, 0.06), 0 2px 2px 0 rgba(40, 44, 53, 0.08); */
    background-color: #fff;
    border-radius: 4px;
    z-index: 3;
    margin-bottom: 2px;
}

#pano-slider-page .card-carousel-cards .card-carousel--card:first-child {
    margin-left: 0;
}

#pano-slider-page .card-carousel-cards .card-carousel--card:last-child {
    margin-right: 0;
}

#pano-slider-page .card-carousel-cards .card-carousel--card img {
    vertical-align: bottom;
    border-top-left-radius: 4px;
    border-top-right-radius: 4px;
    transition: opacity 150ms linear;
    user-select: none;
}

#pano-slider-page .card-carousel-cards .card-carousel--card img:hover {
    opacity: 0.5;
}

/* #pano-slider-page .card-carousel-cards .card-carousel--card--footer {
    border-top: 0;
    padding: 7px 15px;
}

#pano-slider-page .card-carousel-cards .card-carousel--card--footer p {
    padding: 3px 0;
    margin: 0;
    margin-bottom: 2px;
    font-size: 19px;
    font-weight: 500;
    color: #2c3e50;
    user-select: none;
}

#pano-slider-page .card-carousel-cards .card-carousel--card--footer p:nth-of-type(2) {
    font-size: 12px;
    font-weight: 300;
    padding: 6px;
    background: rgba(40, 44, 53, 0.06);
    display: inline-block;
    position: relative;
    margin-left: 4px;
    color: #666a73;
}

#pano-slider-page .card-carousel-cards .card-carousel--card--footer p:nth-of-type(2):before {
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

#pano-slider-page .card-carousel-cards .card-carousel--card--footer p:nth-of-type(2):after {
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
} */

/*Endslider*/
.pannellum{
    height: 500px;
}
.first-row{
    color: #fff;
    background-color: #a2a7a1;
    border-bottom: 1px solid #ccc;
    border-right: 1px solid #ccc;
    text-align: center;
    padding: 10px;
    font-size: 100%;
}
.second-row{
    background-color: #eff7ec;
}
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
    padding: 5px 10px;
    font-weight: bold;
    font-size: 1.14em;
}
.cost_heading_lbl_mini{
    /* border-left: 5px solid rgb(249, 121, 60); */
    padding: 5px 10px;
    font-weight: bold;
    font-size: 1.2em;
}

.cost_heading_lbl_mini i{
    padding: 0px 10px;
    border-radius: 3px;
    /* background: #fbaa84; */
    color: #d2571c;
    font-size: 1em;
}

.cost_table th{
    border: 1px solid #ccc;
    padding: 8px 10px;
    /* text-align: center; */
    background: #f0f0f0;
    color: #000;
    line-height: 1.7;
    vertical-align: top;
    min-width: 100px;
}

.cost_table td{
    border: 1px solid #ccc;
    padding: 8px 10px;
    /* text-align: center; */
    line-height: 1.7;
    background: #fff;

}
.main-cost-table td{
    padding: 10px !important;
}

.cost_btnwrapper{
    float: right;
    width: 158px;
    text-align: center;
    align-self: center;
    /* padding-top: 21px; */
}

.aa th:last-child, .aa td:last-child {
    width: 108px;
    font-size: 88.2%;
    white-space: nowrap;
}



.comment-wrapper{
    background-color: #fff;
    padding: 5px;
}
.comment-title{
    background-size: 29px;
    color: #3fc8d6;
    display: block;
    font-size: 16px;
    font-weight: 700;
    padding-bottom: 10px;
}
.comment-title2{
    background-size: 29px;
    color: #afbac3;
    display: block;
    font-size: 14px;
    font-weight: 700;
    padding-bottom: 10px;
}

.card-text{
    color: #777;
}
.comment-ico a {
 font-size: 13px;
 color: #111;
 display: inline-block;
 float: right;
 border: 1px solid #111;
 padding: 5px 20px;
 border-radius: 20px;
 margin-top: 20px;
}
.comment-ico2 a{
 font-size: 13px;
 color: #111;
 display: inline-block;
 float: right;
 border: 1px solid #111;
 padding: 5px 20px;
 border-radius: 20px;
 margin-top: -29px;
 text-decoration: none;
}
a.comhov:hover, a.comhov:active {background: #fbaa84;}

.comment-ico i {
 display: block;
 float: left;
 margin: 3px 5px 0 0;
 font-size: 15px;
}
.comment-ico a:hover {
 text-decoration: none;
}

/* div.tab-card-profile_header > .card-profile_header-tab > .nav-tabs .nav-item .nav-link, .nav-tabs .nav-link {

    border-color: transparent   #ecede1   transparent   #ecede1   !important;

} */

.thumbnail-img{
    width: 100%;
    padding: 20px;
    /* line-height: 150px; */
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
    /* display: flex; */
    text-align: left;
    /* justify-content: space-evenly;
    flex-direction: row; */
    /* overflow:auto; */

}
.thumbnail-image {
    display: inline-block;
    cursor: pointer;
    margin-bottom: -1px;
    /* width: 10%;
    float:left; */
}
.thumbnails-pano{
    display: flex;
    text-align: left;
}
.thumbnail-image-panorama {
    display: inline-block;
    cursor: pointer;
    margin-bottom: -1px;
}

.thumbnail-image > img {
    /* width:  100px;
    height: auto;
    transition: all 250ms;
    vertical-align: bottom; */
    vertical-align: bottom;
    width: 51px;
    height: 36px;
    max-width: 55px;
    border: 3px solid transparent;
}
.thumbnail-image-panorama >img{
    vertical-align: bottom;
    width: 103px;
    height: 70px;
    max-width: 103px;
    border: 3px solid transparent;
}

.thumbnail-image:hover > img,
.thumbnail-image.active > img {
    opacity: 0.6;
    box-shadow: 2px 2px 6px 1px rgba(0,0,0, 0.5);
}
.card-img {
    position: relative;
    margin-bottom: 10px;
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
.changeLink {
    color: #000;
    font-weight: bold;
    cursor: pointer;
    border: 1px solid #ffc041;
    padding: 5px;
    border-radius: 5px;
    background-color: #ffc;
}
.changeLink:hover {
    color: #f9793c;
    border: 1px solid #68ec37;
}

.CloseBtn {
    border: none !important;
    color: #f9793c !important;
    cursor: not-allowed!important;
    pointer-events: none;
    background: none !important;
}

.room-type {
    /* background: #fdd6c3; */
    background: #fbaa84;
    color: #333333;
    padding: 3px 5px 3px 7px;
    border-radius: 3px;
    margin-right: 7px;
    font-weight: bold;
}

.method-name {
    font-weight: bold;
    font-size: 1em;
    margin-bottom: 10px;
}

.cash-lbl-mini {
    font-size: 1.4em !important;
    color: #ff6117;
    font-weight: bold;
}

.cash-unit {
    color: #333;
    font-size: 0.8em;
}

.top-mail-btn {
    position: absolute;
    right: 175px;
    top: -12px;
    cursor: pointer;
    /* background: #ff7100; */
    background-color: #0cc72c !important;
    /* border: 1px solid #ff9563; */
    color: #fff;
    width: 160px;
    padding: 6px;
    border-radius: 5px;
    text-align: center;
    text-decoration: none;
    -webkit-box-shadow: 3px 5px 3px #ccc!important;
    box-shadow: 3px 5px 3px #ccc!important;
    font-size: 14.4px;
    border: 1px solid #53c000;

}
</style>
