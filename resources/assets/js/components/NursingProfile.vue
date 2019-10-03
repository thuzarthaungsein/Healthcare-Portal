<template>
<div class="card profile m-t-22 " style="border:none;">
    <form class="col-md-12 form-class">
            <div class="col-md-12 pad-free">
                    <div class="form-group form-group-wrapper">
                            <label class="heading-lbl col-2 pad-free">名前<span class="error">*</span></label>
                            <input type="text" class="form-control customer-name col-10 float-right" placeholder="名前" v-model="customer_info.name">
                    </div>
                    <div class="form-group form-group-wrapper">
                            <label class="heading-lbl col-2 pad-free">メールアドレス<span class="error">*</span></label>
                            <input type="text" class="form-control customer-email col-10 float-right"  placeholder="メール" v-model="customer_info.email">
                    </div>
                    <div class="form-group form-group-wrapper">
                            <label class="heading-lbl col-2 pad-free">電話番号<span class="error">*</span></label>
                            <input type="text" class="form-control customer-phone col-10 float-right"  placeholder="電話" v-model="customer_info.phone">
                    </div>
                    <div class="form-group form-group-wrapper">
                            <label class="heading-lbl col-2 pad-free">公式サイト</label>
                            <input type="text" name="official-website" class="form-control website col-10 float-right" v-model="nursing_info.website">
                    </div>
                    <div class="form-group form-group-wrapper">
                            <label class="heading-lbl col-2 pad-free">フォトアルバム</label> <span class="btn all-btn main-bg-color" style="min-width: 0px;" @click="galleryAdd()"><i class="fas fa-plus-circle"></i> Add</span>
                            <div class="col-md-12">
                                    <div class="row" id ="gallery-photo">
                                            <div class="col-md-6 gallery-area-photo" v-bind:id="'photo'+indx" v-for="(img,indx) in img_arr" :key="img.id">
                                                                <div class="col-md-12">
                                                                        <input type="file" name="" class="nursing-photo m-b-10" v-bind:class="img.classname" id="upload_img" @change="preview_image(img.classname)">
                                                                        <div class="col-md-12 m-b-10" v-bind:class="img.classname">
                                                                                <input type="hidden" class="already-photo" v-model="img.photo">
                                                                                <img :src="'/upload/nursing_profile/'+ img.photo" class="img-fluid" alt="profile" v-if="img.photo">
                                                                        </div>
                                                                </div>
                                                                <div class="col-md-12">
                                                                        <input type="text" name="title" placeholder="タイトル" class="form-control m-b-15 title white-bg-color" v-model="img.title">
                                                                        <textarea name="description" placeholder="コンテンツ" class="form-control m-b-15 description white-bg-color" v-model="img.description"></textarea>
                                                                </div>
                                                                <div class="col-md-12 text-right">
                                                                        <a class="mr-auto text-danger btn delete-borderbtn" @click="DeltArr(indx,'photo')"> <i class="fa fa-trash"></i> 削除</a>
                                                                </div>
                                                               
                                                       
                                                </div>
                                    </div>
                                   
                            </div>
                    </div>

                    <div class="form-group form-group-wrapper">
                            <label class="heading-lbl col-2 pad-free">動画</label> <span class="btn all-btn main-bg-color" style="min-width: 0px;" @click="galleryVideoAdd()"><i class="fas fa-plus-circle"></i> Add</span>
                            <div class="col-md-12">
                                    <div class="row" id="gallery-video">
                                            <div class="col-md-6 gallery-area-video" v-bind:id="'video'+indx" v-for="(video,indx) in video_arr" :key="video.id">
                                                <div class="col-md-12">
                                                        <input type="text" name="url" placeholder="url" class="form-control m-b-15 video-url white-bg-color" v-model="video.photo">
                                                </div>
                                                <div class="col-md-12">
                                                        <input type="text" name="title" placeholder="タイトル" class="form-control m-b-15 title white-bg-color" v-model="video.title">
                                                        <textarea name="description" placeholder="コンテンツ" class="form-control m-b-15 description white-bg-color" v-model="video.description"></textarea>
                                                </div>
                                                <div class="col-md-12 text-right">
                                                <a class="mr-auto text-danger btn delete-borderbtn" @click="DeltArr(indx,'video')"> <i class="fa fa-trash"></i> 削除</a>
                                                </div>
                                            </div>
                                    </div>
                            </div>
                    </div>
                <table class="table table-bordered table-wrapper">
                        <tr>
                                <td class="width17" style="border:none;"> <label class="heading-lbl pad-free">特長<span class="error">*</span></label></td>
                                <td style="border:none;"><quill-editor  ref="myQuilEditor" name="feature" :options="editorOption"/></td>
                        </tr>

                </table>
                   
                <!--table 1 for 費用-->                
                <table class="table table-bordered table-wrapper">
                        <tr>
                            <td style="border:none;">
                                <div class="form-group"><label class="heading-lbl" style="border-left: 5px solid #f9793c;padding-left: 5px;">費用</label></div>
                                <div class="form-group">
                                <label class="heading-lbl col-2 pad-free">支払い方法<span class="error">*</span></label>
                                <div class="col-10 float-right pad-free">
                                        <input type="text"  class="form-control col-10 nursing-payment-method float-left white-bg-color" v-model="nursing_info.method">
                                        <div class="col-2 float-right">
                                                <span class="btn all-btn main-bg-color" style="min-width: 0px;" @click="methodAdd()"><i class="fas fa-plus-circle"></i> Add</span>
                                        </div>
                                        <div class="col-md-12 pad-free m-t-50" id="gallery-payment">
                                                <!-- test -->
                                        <div class="pad-free col-md-12 gallery-area-payment" v-bind:id="'payment'+indx" v-for="(payment,indx) in payment_arr" :key="payment.id">
                                                <div class="col-md-12 m-t-15 m-b-15">
                                                <table class="table">
                                                        <tr>
                                                        <td colspan="2" class="text-right" style="border:none;!important">
                                                                <span class="btn edit-borderbtn" style="min-width:0px;">
                                                                <i class="fa fa-edit"></i> 編集
                                                                      
                                                                </span>
                                                                <a class="mr-auto text-danger btn delete-borderbtn" @click="DeltArr(indx,'payment')">
                                                                         <i class="fa fa-trash"></i> 削除</a>                                                                
                                                        </td>
                                                        </tr>
                                                        <tr>
                                                        <th>
                                                                 <label class="title-lbl">タイプ名</label>
                                                        </th>
                                                        <th>
                                                                <input type="text" name="method[]" class="form-control payment-name white-bg-color" v-model="payment.payment_name">
                                                        </th>
                                                        </tr>
                                                </table>
                                                </div>
                                                <div class="col-md-12">
                                                <h3 class="title-lbl">料金概要</h3>
                                                <table class="table">
                                                        <tr>
                                                        <th>入居時にかかる費用</th>
                                                        <th>
                                                                <input type="text" name="exp[]" class="form-control expense-moving white-bg-color" v-model="payment.expense_moving">
                                                        </th>
                                                        </tr>
                                                        <tr>
                                                        <th>居室タイプ</th>
                                                        <th>
                                                                <input type="text" name="exp[]" class="form-control living-room-type white-bg-color" v-model="payment.living_room_type">
                                                        </th>
                                                        </tr>
                                                        <tr>
                                                        <th>月額利用料</th>
                                                        <th>
                                                                <input type="text" name="exp[]" class="form-control monthly-fees white-bg-color" v-model="payment.monthly_fees">
                                                        </th>
                                                        </tr>
                                                        <tr>
                                                        <th>広さ</th>
                                                        <th>
                                                                <input type="text" name="exp[]" class="form-control area white-bg-color" v-model="payment.area">
                                                        </th>
                                                        </tr>
                                                </table>
                                                </div>
                                                <div class="col-md-12">
                                                <h3 class="title-lbl">料金詳細</h3>
                                                <table class="table">
                                                        <tr>
                                                        <th class="title-lbl">
                                                                <span>入居にかかる費用</span>
                                                        </th>
                                                        <th>&nbsp;</th>
                                                        </tr>
                                                        <tr>
                                                        <th>入居一時金または敷金</th>
                                                        <th>
                                                                <input type="text" name="breakdown[]" class="form-control deposit white-bg-color" v-model="payment.deposit">
                                                        </th>
                                                        </tr>
                                                        <tr>
                                                        <th>その他（使途）</th>
                                                        <th>
                                                                <input type="text" name="breakdown[]" class="form-control other-use white-bg-color" v-model="payment.other_use">
                                                        </th>
                                                        </tr>
                                                        <tr>
                                                        <th class="title-lbl"><span>月額費用</span></th><th>&nbsp;</th>
                                                        </tr>
                                                        <tr>
                                                        <th>賃料</th>
                                                        <th>
                                                                <input type="text" name="breakdown[]" class="form-control rent white-bg-color" v-model="payment.rent">
                                                        </th>
                                                        </tr>
                                                        <tr>
                                                        <th>管理費</th>
                                                        <th>
                                                                <input type="text" name="breakdown[]" class="form-control admin-expense white-bg-color" v-model="payment.admin_expense">
                                                        </th>
                                                        </tr>
                                                        <tr>
                                                        <th>食費</th>
                                                        <th>
                                                                <input type="text" name="breakdown[]" class="form-control food-expense white-bg-color" v-model="payment.food_expense">
                                                        </th>
                                                        </tr>
                                                        <tr>   
                                                        <th>介護上乗せ金（生活サービス費）</th>
                                                        <th>   
                                                                <input type="text" name="breakdown[]" class="form-control nurse-care-surcharge white-bg-color" v-model="payment.nurse_care_surcharge">
                                                        </th>
                                                        </tr>
                                                        <tr>
                                                        <th>その他</th>
                                                        <th>
                                                                <input type="text" name="breakdown[]" class="form-control other-monthly-cost white-bg-color" v-model="payment.other_monthly_cost">
                                                        </th>
                                                        </tr>
                                                        <tr>
                                                        <th class="title-lbl"><span>返還金について</span></th>
                                                        <th>&nbsp;</th>
                                                        </tr>
                                                        <tr>
                                                        <th>返還制度</th>
                                                        <th>
                                                                <input type="text" name="breakdown[]" class="form-control refund-system white-bg-color" v-model="payment.refund_system">
                                                        </th>
                                                        </tr>
                                                        <tr>
                                                        <th>償却期間</th>
                                                        <th>   
                                                                <input type="text" name="breakdown[]" class="form-control depreciation-period white-bg-color" v-model="payment.depreciation_period">
                                                        </th>
                                                        </tr>
                                                        <tr>
                                                        <th>初期償却</th>
                                                        <th>
                                                                <input type="text" name="breakdown[]" class="form-control initial-deprecration white-bg-color" v-model="payment.initial_deprecration">
                                                        </th>
                                                        </tr>
                                                        <tr>
                                                        <th>その他メッセージ</th>
                                                        <th>
                                                                <input type="text" name="breakdown[]" class="form-control other-message-refund white-bg-color" v-model="payment.other_message_refund">
                                                        </th>
                                                        </tr>
                                                </table>
                                                </div>
                                        </div>
                                </div>
                                        </div>
                        </div>
                </td>
                </tr>
                </table>
                <!-- end table 1 for 費用--->

                <!--table 2 for 施設の概要-->
                 <table class="table table-bordered table-wrapper">
                        <tr>
                            <td style="border:none;">
                                <label class="heading-lbl col-2 pad-free">施設の概要</label>
                                <span class="btn all-btn main-bg-color" style="min-width: 0px;" @click="nurseFacToggleDiv()"><i class="fas fa-sort-down"></i></span>
                                <!-- testtest -->
                                <div class="col-10 pad-free float-right nurse-fac-toggle-div toggle-div m-t-10">
                                        <table class="table table-striped table-bordered">
                                                <tr>
                                                        <td class="width15 title-bg">事業主体</td>
                                                        <td ><textarea class="form-control white-bg-color" :options="editorOption" v-model="nursing_info.business_entity"></textarea></td>  
                                                         <!-- <td> <quill-editor class="business-entity" ref="myQuilEditor" :options="editorOption" v-model="nursing_info.business_entity"/></td> -->

                                                </tr>
                                                <tr>
                                                        <td class="width15 title-bg">開設年月日</td>
                                                        <td ><textarea class="form-control white-bg-color" :options="editorOption" v-model="nursing_info.date_of_establishment"></textarea></td> 
                                                         <!-- <td> <quill-editor  class="date-of-establishment" ref="myQuilEditor" :options="editorOption" v-model="nursing_info.date_of_establishment"/></td> -->
                                                </tr>
                                                <tr>
                                                        <td class="width15 title-bg">土地の権利形態</td>
                                                        <td ><textarea class="form-control white-bg-color" :options="editorOption" v-model="nursing_info.land_right_form"></textarea></td>
                                                         <!-- <td> <quill-editor  class="land-right-form" ref="myQuilEditor" :options="editorOption" v-model="nursing_info.land_right_form"/></td> -->
                                                </tr>
                                                <tr>
                                                        <td class="width15 title-bg">建物の権利形態</td>
                                                        <td ><textarea class="form-control white-bg-color" :options="editorOption" v-model="nursing_info.building_right_form"></textarea></td>
                                                         <!-- <td> <quill-editor  class="building-right-form" ref="myQuilEditor" :options="editorOption" v-model="nursing_info.building_right_form"/></td> -->
                                                </tr>
                                                <tr>
                                                        <td class="width15 title-bg">敷地面積</td>
                                                        <td ><textarea class="form-control white-bg-color" :options="editorOption" v-model="nursing_info.site_area"></textarea></td>
                                                         <!-- <td> <quill-editor  class="site-area" ref="myQuilEditor" :options="editorOption" v-model="nursing_info.site_area"/></td> -->
                                                </tr>
                                                <tr>
                                                        <td class="width15 title-bg">延床面積</td>
                                                        <td ><textarea class="form-control white-bg-color" :options="editorOption" v-model="nursing_info.floor_area"></textarea></td>
                                                         <!-- <td> <quill-editor  class="floor-area" ref="myQuilEditor" :options="editorOption" v-model="nursing_info.floor_area"/></td> -->
                                                </tr>
                                                <tr>
                                                        <td class="width15 title-bg">構造</td>
                                                        <td ><textarea class="form-control white-bg-color" :options="editorOption" v-model="nursing_info.construction"></textarea></td>
                                                         <!-- <td > <quill-editor  class="construction" ref="myQuilEditor" :options="editorOption" v-model="nursing_info.construction"/></td> -->
                                                </tr>
                                                <tr>
                                                        <td class="width15 title-bg">定員</td>
                                                        <td ><textarea class="form-control white-bg-color" :options="editorOption" v-model="nursing_info.capacity"></textarea></td>
                                                         <!-- <td > <quill-editor  class="capacity" ref="myQuilEditor" :options="editorOption" v-model="nursing_info.capacity"/></td> -->
                                                </tr>
                                                <tr>
                                                        <td class="width15 title-bg">総居室・戸数</td>
                                                        <td ><textarea class="form-control white-bg-color" :options="editorOption" v-model="nursing_info.num_rooms"></textarea></td>
                                                         <!-- <td > <quill-editor  class="num-rooms" ref="myQuilEditor" :options="editorOption" v-model="nursing_info.num_rooms"/></td> -->
                                                </tr>
                                                <tr>
                                                        <td class="width15 title-bg">居住の権利形態</td>
                                                        <td ><textarea class="form-control white-bg-color" :options="editorOption" v-model="nursing_info.residence_form"></textarea></td>
                                                         <!-- <td > <quill-editor  class="residence-form" ref="myQuilEditor" :options="editorOption" v-model="nursing_info.residence_form"/></td> -->
                                                </tr>
                                                <tr>
                                                        <td class="width15 title-bg">類型</td>
                                                        <td ><textarea class="form-control white-bg-color" :options="editorOption" v-model="nursing_info.fac_type"></textarea></td>
                                                         <!-- <td > <quill-editor  class="fac-type" ref="myQuilEditor" :options="editorOption" v-model="nursing_info.fac_type"/></td> -->
                                                </tr>
                                                <tr>
                                                        <td class="width15 title-bg">入居条件</td>
                                                        <td ><textarea class="form-control white-bg-color" :options="editorOption" v-model="nursing_info.occupancy_condition"></textarea></td>
                                                         <!-- <td > <quill-editor  class="occupancy-condition" ref="myQuilEditor" :options="editorOption" v-model="nursing_info.occupancy_condition"/></td> -->
                                                </tr>
                                                <tr>
                                                        <td class="width15 title-bg">居室区分・間取り等</td>
                                                        <td ><textarea class="form-control white-bg-color" :options="editorOption"  v-model="nursing_info.room_floor"></textarea></td>
                                                         <!-- <td > <quill-editor  class="room-floor" ref="myQuilEditor" :options="editorOption"  v-model="nursing_info.room_floor"/></td> -->
                                                </tr>
                                                <tr>
                                                        <td class="width15 title-bg">居室設備</td>
                                                        <td ><textarea class="form-control white-bg-color" :options="editorOption" v-model="nursing_info.equipment"></textarea></td>
                                                         <!-- <td > <quill-editor  class="equipment" ref="myQuilEditor" :options="editorOption" v-model="nursing_info.equipment"/></td> -->
                                                </tr>
                                                <tr>
                                                        <td class="width15 title-bg">共用施設・設備</td>
                                                        <td ><textarea class="form-control white-bg-color" :options="editorOption" v-model="nursing_info.living_room_facilities"></textarea></td>
                                                         <!-- <td > <quill-editor  class="living-room-facilities" ref="myQuilEditor" :options="editorOption" v-model="nursing_info.living_room_facilities"/></td> -->
                                                </tr>
                                        </table>
                                </div>
                            </td>
                        </tr>
                 </table>
                <!-- end table 2 for 施設の概要 -->

                <!-- table 3 for 協力医療機関 -->
                <table class="table table-bordered table-wrapper">
                        <tr>
                            <td style="border:none;">
                                <div class="form-group">
                                        <label class="heading-lbl col-2 pad-free">協力医療機関<span class="error">*</span></label>
                                        <div class="col-10 pad-free float-right">
                                                <span class="btn all-btn main-bg-color" style="min-width: 0px;" @click="cooperateAdd()"><i class="fas fa-plus-circle"></i> Add</span>
                                                <div class="col-md-12 pad-free" id="gallery-cooperate">
                                                        <!-- cooperation -->
                                                        <div class="col-md-12 pad-free m-t-20 gallery-area-cooperate" v-bind:id="'cooperate'+indx" v-for="(cooperate,indx) in cooperate_arr" :key="cooperate.id">
                                                                <div class="form-group"> 
                                                                        <label class="col-2 pad-free">名前 :</label> 
                                                                        <input type="text" class="form-control col-10 float-right cooperate-name white-bg-color" name="co-medical-header[]" v-model="cooperate.name"> 
                                                                </div>
                                                                <table class="table table-bordered">
                                                                <tr>
                                                                        <th class="width15 title-bg">診療科目</th>
                                                                        <th ><textarea class="form-control clinical-sub white-bg-color" name="clinical-sub" v-model="cooperate.clinical_subject"></textarea></th>
                                                                </tr>
                                                                <tr>
                                                                        <th class="width15 title-bg">協力内容</th>
                                                                        <th><textarea class="form-control details white-bg-color" name="details" v-model="cooperate.details"></textarea></th>
                                                                </tr>
                                                                <tr>
                                                                        <th class="width15 title-bg">診療費用</th>
                                                                        <th><textarea class="form-control expense white-bg-color" name="expense" v-model="cooperate.medical_expense"></textarea></th>
                                                                </tr>
                                                                <tr>
                                                                        <th class="width15 title-bg">備考</th>
                                                                        <th><textarea class="form-control remark white-bg-color" name="remark" v-model="cooperate.remark"></textarea></th>
                                                                </tr>
                                                                </table>
                                                                <div class="clearfix">
                                                                        <a class="mr-auto text-danger btn delete-borderbtn float-right" @click="DeltArr(indx,'cooperate')"> <i class="fa fa-trash"></i> 削除</a>
                                                                </div>
                                                                
                                                        </div>
                                                </div>
                                        </div>
                                        
                                </div>
                            </td>
                        </tr>

                </table>
                <!-- end table 3 for 協力医療機関 -->

                <!-- table 4 for 医療面の受入れ  -->
                <table class="table table-bordered table-wrapper">
                         <tr>
                            <td>
                                <div class="form-group">
                                        <label class="heading-lbl col-2 pad-free">医療面の受入れ</label>
                                        <span class="btn all-btn main-bg-color" style="min-width: 0px;" @click="acceptanceList()"><i class="fas fa-sort-down"></i></span>
                                    <div class="col-md-10 float-right m-t-10 accept-toggle-div toggle-div pad-free">
                                            <label for="" class="m-r-15"><i class="fas fa-check green"></i> 受入れ可</label>
                                            <label for="" class="m-r-15"><i class="fas fa-times red"></i> 受入れ不可</label>
                                            <label for="" class="m-r-15"><i class="fas fa-adjust blue"></i> 応相談</label>
                                            <div class="row">
                                                    <div class="col-md-6" v-for="medical in medical_acceptance" :key="medical.id">
                                                            <div class="col-md-12 accept-box">
                                                                    {{medical.name}} {{medical.id}}
                                                                    <div class="float-right">
                                                                            <label><input type="radio" :name="'medical'+medical.id" v-model="acceptance[medical.id]" value="accept"> <i class="fas fa-check green"></i></label>
                                                                            <label><input type="radio" :name="'medical'+medical.id" v-model="acceptance[medical.id]" value="unaccept"> <i class="fas fa-times red"></i></label>
                                                                            <label><input type="radio" :name="'medical'+medical.id" v-model="acceptance[medical.id]" value="negotiate"> <i class="fas fa-adjust blue"></i></label>
                                                                    </div>
                                                            </div>
                                                    </div>
                                            </div>
                                            <div class="form-group">
                                                    <label for="">備考</label>
                                                    <!-- <textarea name="" class="form-control"></textarea> -->
                                                    <quill-editor  ref="myQuilEditor" :options="editorOption" name="" class="acceptance-remark" v-model="nursing_info.acceptance_remark"/>

                                            </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                </table>

                <!-- end table 4 for 医療面の受入れ -->

                <!-- table 5 for 職員体制 -->
                <table class="table table-bordered table-wrapper">
                        <tr>
                            <td>
                                <label class="heading-lbl col-2 pad-free">職員体制</label>
                                <span class="btn all-btn main-bg-color" style="min-width: 0px;" @click="staffToggleDiv()"><i class="fas fa-sort-down"></i></span>

                                <div class="col-10 pad-free float-right staff-toggle-div toggle-div m-t-10">
                                        <table class="table table-striped table-bordered">
                                                <tr>
                                                        <td class="width15 title-bg">介護に関わる職員体制（入居者：職員）</td>
                                                        <td><textarea class="form-control staff white-bg-color" :options="editorOption" v-model="staff_info.staff"></textarea></td> 
                                                        <!-- <td><quill-editor  ref="myQuilEditor" class="staff" :options="editorOption" v-model="staff_info.staff"/></td>                                                       -->
                                                </tr>
                                                <tr>
                                                        <td class="width15 title-bg">介護職員</td>
                                                        <td><textarea class="form-control nursing-staff white-bg-color" :options="editorOption" v-model="staff_info.nursing_staff"></textarea></td>  
                                                         <!-- <td><quill-editor  ref="myQuilEditor" class="nursing-staff" :options="editorOption" v-model="staff_info.nursing_staff"/></td> -->
                                                </tr>
                                                <tr>
                                                        <td class="width15 title-bg">夜間の最少職員数</td>
                                                        <td><textarea class="form-control min-num-staff white-bg-color" :options="editorOption" v-model="staff_info.min_num_staff"></textarea></td>
                                                         <!-- <td><quill-editor  ref="myQuilEditor" class="min-num-staff" :options="editorOption" v-model="staff_info.min_num_staff"/></td>                                                        -->
                                                </tr>
                                                <tr>
                                                         <td class="width15 title-bg">看護職員数</td>
                                                        <td><textarea class="form-control num-staff white-bg-color" :options="editorOption" v-model="staff_info.num_staff"></textarea></td>   
                                                        <!-- <td><quill-editor  ref="myQuilEditor" class="num-staff" :options="editorOption" v-model="staff_info.num_staff"/></td> -->
                                                </tr>
                                                <tr>
                                                        <td class="width15 title-bg">
                                                                 <label for="">備考</label>
                                                        </td>
                                                        <td>
                                                               <quill-editor  ref="myQuilEditor" name="" :options="editorOption" class="nursing-remarks" v-model="staff_info.remarks"/>  
                                                        </td>
                                                </tr>
                                        </table>

                                       
                                </div>
                            </td>
                        </tr>

                </table>
                <!-- end table 5 for 職員体制 -->

                <!-- table 6 for こだわりの特長  -->
                 <table class="table table-bordered table-wrapper">
                           <tr>
                            <td>
                                <div class="form-group">
                                        <label  class="heading-lbl col-2 pad-free">こだわりの特長</label>
                                        <span class="btn all-btn main-bg-color" style="min-width: 0px;" @click="specialFeAdd()"><i class="fas fa-sort-down"></i></span>

                                        <div class="col-md-10 float-right special-feature-toggle-div toggle-div m-t-10">
                                                <div class="row">
                                                        <div v-for="feat in feature_list" :key="feat.id" class="col-md-3 m-b-20">
                                                                <label>
                                                                 <input type="checkbox"  name="special-features"    v-bind:value="feat.id" @click="featureCheck(feat.id)" v-model="feat.checked">
                                                                        {{feat.name}}
                                                                </label>
                                                         </div>
                                                </div>                                        
                                        </div>
                                </div>
                            </td>
                        </tr>
                 </table>

                <!-- end table 6 for こだわりの特長  -->

                <!-- table 7 for 公式サイト -->
                   <table class="table table-bordered table-wrapper">                        
                        <tr>
                            <td>
                                <label class="heading-lbl col-2 pad-free">地図</label>
                                <span class="btn all-btn main-bg-color" style="min-width: 0px;" @click="maptogglediv()"><i class="fas fa-sort-down"></i></span>

                                <div class="col-md-10 float-right m-t-10 map-toggle-div toggle-div pad-free">
                                        <div class="col-md-12">
                                            <GoogleMap></GoogleMap>
                                                <div class="form-group">
                                                        <label>住所<span class="error">*</span></label>
                                                        <!-- <textarea name="address" rows="10" class="form-control"></textarea> -->
                                                        <quill-editor  ref="myQuilEditor"  name="address" :options="editorOption" class="customer-address" v-model="customer_info.address"/>
                                                </div>
                                                <div class="form-group">
                                                        <label>交通 / アクセス<span class="error">*</span></label>
                                                        <!-- <textarea name="address" rows="10" class="form-control"></textarea> -->
                                                        <quill-editor  ref="myQuilEditor" name="address" :options="editorOption" class="transporation-access" v-model="nursing_info.access"/>
                                                </div>
                                        </div>
                                        
                                        
                                </div>
                            </td>
                        </tr>
                   </table>
                <!-- end table 7 for 公式サイト -->
                <div class="row col-2 col-offset-6 mx-auto">
                        <span class="btn main-bg-color col-12 all-btn m-t-15 pad-10" @click="createProfile()">作成</span>
                </div>
            </div>

    </form>
</div>
</template>

<script>
$(document).ready(function(){
        $('#feature').summernote({
        placeholder: 'Write Feature',
        height: 200,
        });
});


import 'quill/dist/quill.snow.css'
import {quillEditor} from 'vue-quill-editor'
import {Button, Input,Select} from 'iview'
// import ClassicEditor from '@ckeditor/ckeditor5-build-classic';
import GoogleMap from './GoogleMap.vue'

export default {
        components: {
                GoogleMap,
                Button,
                Input,
                Select,
                quillEditor
        },

       data() {


        return {
                fac_list: [],
                feature_list:[],
                medical_acceptance:[],
                customer_info:[], nursing_info:[], staff_info:[],
                acceptance: [],

                img_arr:[],img_list:[],
                video_arr:[],video_list:[],
                gallery_list:[],
                cooperate_arr:[], cooperate_list:[],
                payment_arr:[],payment_list:[],
                id:1, profile_type:'nursing',
                profile_arr:[],staf_info:[],customer_info:[], test:'',

                // to delete
                count:-1, v_count: -1, c_count: -1, p_count: -1, 
                type:'', 
                title:[], v_title:[], 
                description:[], v_description:[], 
                img:[], 
                sub:[], coop_details:[], expense:[],remark:[], 
                method:[],move_in:[],room_type:[],monthly_usage:[],breadth:[], 
                security_deposit:[],other_use:[], rent:[], management_fee:[], 
                food_expense:[],life_service:[],cost_other:[],return_system:[], 
                depreciation_period:[],initial_depreciation:[],other_message:[], 
                cooperate_list:[], payment_list:[],meth_details:[], 
                // end
                content: '',
                editorOption:{
                        debug:'info',
                        placeholder:'Type your post...',
                        readonly:true,
                        theme:'snow',
                }
        }
        },
        created(){
                this.axios
                .get('/api/customerinfo/'+this.id)
                .then(response=>{
                        this.customer_info = response.data;
                });

                this.axios
                .get('/api/nursinginfo/'+this.id)
                .then(response=>{
                        this.nursing_info = response.data;
                });

                this.axios
                .get('/api/staffinfo/'+this.id)
                .then(response=>{
                        this.staff_info = response.data;
                      
                });

                this.axios
                .get('/api/facilities')
                .then(response=>{
                        this.fac_list = response.data;
                });

                this.axios
                .get('/api/medical/medicalacceptance')
                .then(response => {
                        this.medical_acceptance = response.data;
                });

                this.axios
                .get('/api/feature/'+this.profile_type+'/'+this.id)
                .then(response=>{
                       
                        this.feature_list = response.data;
                });

                this.axios
                .get('/api/nursing-pgallery/'+this.id)
                .then(response=>{
                        this.img_arr = response.data;
                });

                this.axios
                .get('/api/nursing-vgallery/'+this.id)
                .then(response=>{
                        this.video_arr = response.data;
                });

                this.axios
                .get('/api/nursing-cooperate/'+this.id)
                .then(response=>{
                        this.cooperate_arr = response.data;
                });

                this.axios
                .get('/api/nursing-payment/'+this.id)
                .then(response=>{
                        this.payment_arr = response.data;
                });

             
        },
        methods: {

            maptogglediv() {
                    $(".map-toggle-div").toggle('medium');
            },

            nurseFacToggleDiv() {
                    $(".nurse-fac-toggle-div").toggle('medium');
            },

            staffToggleDiv() {
                    $(".staff-toggle-div").toggle('medium');
            },

            featureCheck(check_id) {
                    $('.feature-'+check_id).attr('checked','true');
            },
            preview_image(img_class) {
                $("."+img_class).html("<img src='"+URL.createObjectURL(event.target.files[0])+"' class='img-fluid hospital-image'>");
                this.test = event.target.files[0]
                //console.log(this.test);return;
            },

            DeltArr(indx,type) {
                    var arr_list = [];
                    var arr_count = document.getElementsByClassName('gallery-area-'+type);
                    for(var i=0; i< arr_count.length; i++) {
                            arr_list[i] = document.getElementsByClassName('gallery-area-'+type);
                    }

                    for(var i=0; i<= arr_count.length; i++) {
                            if(i == indx) {
                                    arr_list.splice(indx,1);
                                    var ele = document.getElementById(type+indx);
                                    var parentEle = document.getElementById('gallery-'+type);
                                    parentEle.removeChild(ele);          
                            }
                    }
                    
            },

            galleryAdd() {
                    var date = new Date;
                    var s = date.getMilliseconds();
                    var m = date.getMinutes();
                    var h = date.getHours();
                    var classname = "class"+h+m+s;
                    var c = "'"+classname+"'";

                    this.img_arr.push({classname:classname,photo:'',title:'',description:''});
            },

             galleryVideoAdd() {
                   this.video_arr.push({title:'',description:'',url:''});
            },

            methodAdd() {
                   this.payment_arr.push({payment_name:'',expense_moving:'',monthly_fees:'',living_room_type:'',
                                        area:'',details:'',deposit:'',other_use:'',rent:'',admin_expense:'',food_expense:'',
                                        nurse_care_surcharge:'',other_monthly_cost:'',refund_system:'',depreciation_period:'',
                                        initial_deprecration:'',other_message_refund:''});
            },

            cooperateAdd() {
                    this.cooperate_arr.push({name:'',clinical_subject:'',details:'',medical_expense:'',remark:''});
            },

            acceptanceList() {
                     $(".accept-toggle-div").toggle('medium');
            },

            specialFeAdd() {
                     $(".special-feature-toggle-div").toggle('medium');
            },
            onDrop: function(e) {
                        e.stopPropagation();
                        e.preventDefault();
                        var files = e.dataTransfer.files;
                        this.createFile(files[0]);
                },
                onChange(e) {
                        var files = e.target.files;
                        this.createFile(files[0]);
                },
                createFile(file) {
                        if (!file.type.match('image.*')) {
                        alert('Select an image');
                        return;
                        }
                        var img = new Image();
                        var reader = new FileReader();
                        var vm = this;

                        reader.onload = function(e) {
                        vm.image = e.target.result;
                        }
                        reader.readAsDataURL(file);
                },
                removeFile() {
                        this.image = '';
                },

            createProfile() {

                this.img_list = [];
                this.video_list = [];
                this.cooperate_list = [];
                this.payment_list = [];
                this.customer_info = [];

                var customer_name = $('.customer-name').val();
                var customer_email = $('.customer-email').val();
                var customer_phone = $('.customer-phone').val();
                var customer_address = $('.customer-address').text();

                var access = $('.transporation-access').text();
                var method = $('.nursing-payment-method').val();
                var business_entity = $('.business-entity').text();
                var date_of_establishment = $('.date-of-establishment').text();
                var land_right_form = $('.land-right-form').text();
                var building_right_form = $('.building-right-form').text();
                var site_area = $('.site-area').text();
                var floor_area = $('.floor-area').text();
                var construction = $('.construction').text();
                var capacity = $('.capacity').text();
                var num_rooms = $('.num-rooms').text();
                var residence_form = $('.residence-form').text();
                var fac_type = $('.fac-type').text();
                var occupancy_condition = $('.occupancy-condition').text();
                var room_floor = $('.room-floor').text();
                var living_room_facilities = $('.living-room-facilities').text();
                var equipment = $('.equipment').text();
                var acceptance_remark = $('.acceptance-remark').text();
                var latitude = $('#new_lat').val();
                var longitude = $('#new_long').val();
                var website = $('.website').val();


                var staff = $('.staff').text();
                var nursing_staff = $('.nursing-staff').text();
                var min_num_staff = $('.min-num-staff').text();
                var num_staff = $('.num-staff').text();
                var nursing_remarks = $('.nursing-remarks').text();

                this.customer_info.push({ name:customer_name,email:customer_email,phone:customer_phone,address:customer_address});

                this.staf_info.push({staff:staff,nursing_staff:nursing_staff,min_num_staff:min_num_staff,num_staff:num_staff,nursing_remarks:nursing_remarks});
            

                var img = document.getElementsByClassName('gallery-area-photo');
                for(var i = 0; i< img.length; i++) {
                        var file = img[i].getElementsByClassName('nursing-photo')[0].files[0];
                        if(file) {
                                var file_name = file.name;
                                        let fd = new FormData();
                                        fd.append('file' ,file )
                                        fd.append('photo' ,file_name )
                                        this.axios.post('/api/nursing/movephoto', fd)
                                                .then(response => {
                                                }).catch(error=>{
                                                        console.log(error);
                                                if(error.response.status == 422){
                                                        this.errors = error.response.data.errors
                                                }
                                        })
                        } else {
                                var file_name = img[i].getElementsByClassName('already-photo')[0].value;
                        }
                        this.img_list.push({type:"photo",photo:file_name,title:img[i].getElementsByClassName('title')[0].value, description:img[i].getElementsByClassName('description')[0].value});
                }
                //console.log(this.img_list);

                var video = document.getElementsByClassName('gallery-area-video');
                for(var i = 0; i< video.length; i++) {
                        this.video_list.push({type:"video",photo:video[i].getElementsByClassName('video-url')[0].value,title:video[i].getElementsByClassName('title')[0].value, description:video[i].getElementsByClassName('description')[0].value});
                }

                var cooperate = document.getElementsByClassName('gallery-area-cooperate');
               
                for(var i = 0; i< cooperate.length; i++) {
                        this.cooperate_list.push({subject:cooperate[i].getElementsByClassName('clinical-sub')[0].value,
                                                name:cooperate[i].getElementsByClassName('cooperate-name')[0].value,
                                                details:cooperate[i].getElementsByClassName('details')[0].value,
                                                expense:cooperate[i].getElementsByClassName('expense')[0].value,
                                                remark:cooperate[i].getElementsByClassName('remark')[0].value});
                }

                var payment = document.getElementsByClassName('gallery-area-payment');
                for(var i = 0; i< payment.length; i++) {
                        this.payment_list.push({payment_name:payment[i].getElementsByClassName('payment-name')[0].value,
                                                expense_moving:payment[i].getElementsByClassName('expense-moving')[0].value,
                                                monthly_fees:payment[i].getElementsByClassName('monthly-fees')[0].value,
                                                living_room_type:payment[i].getElementsByClassName('living-room-type')[0].value,
                                                area:payment[i].getElementsByClassName('area')[0].value,
                                                deposit:payment[i].getElementsByClassName('deposit')[0].value,
                                                other_use:payment[i].getElementsByClassName('other-use')[0].value,
                                                rent:payment[i].getElementsByClassName('rent')[0].value,
                                                admin_expense:payment[i].getElementsByClassName('admin-expense')[0].value,
                                                food_expense:payment[i].getElementsByClassName('food-expense')[0].value,
                                                nurse_care_surcharge:payment[i].getElementsByClassName('nurse-care-surcharge')[0].value,
                                                other_monthly_cost:payment[i].getElementsByClassName('other-monthly-cost')[0].value,
                                                refund_system:payment[i].getElementsByClassName('refund-system')[0].value,
                                                depreciation_period:payment[i].getElementsByClassName('depreciation-period')[0].value,
                                                initial_deprecration:payment[i].getElementsByClassName('initial-deprecration')[0].value,
                                                other_message_refund:payment[i].getElementsByClassName('other-message-refund')[0].value});
                }
              

               var chek_feature=[];
               var special_features;
        
                $.each($("input[name='special-features']:checked"), function(){ 
                        var i = i+ 0;
                        chek_feature.push($(this).val());
                });
                special_features = chek_feature.join(',');
               
                this.profile_arr.push({website:website,access:access,method:method,business_entity:business_entity, date_of_establishment:date_of_establishment,land_right_form:land_right_form,building_right_form:building_right_form,
                                        site_area:site_area,floor_area:floor_area,construction:construction,capacity:capacity,num_rooms:num_rooms,residence_form:residence_form,fac_type:fac_type,
                                        occupancy_condition:occupancy_condition,room_floor:room_floor,living_room_facilities:living_room_facilities,equipment:equipment,special_features:special_features,acceptance_remark:acceptance_remark,latitude:latitude,longitude:longitude});

                this.gallery_list = this.img_list.concat(this.video_list);

                if(this.gallery_list.length > 0) {
                        this.axios
                                .post(`/api/nursing/galleryupdate/${this.id}`,this.gallery_list)
                                .then((response) => {
                                
                                }).catch(error=>{

                                if(error.response.status == 422){

                                this.errors = error.response.data.errors

                                }
                        }) ;
                }

                if(this.cooperate_list.length > 0) {
                        this.axios
                                .post(`/api/nursing/cooperate/${this.id}`,this.cooperate_list)
                                .then((response) => {
                               
                                }).catch(error=>{

                                if(error.response.status == 422){

                                this.errors = error.response.data.errors

                                }
                        }) ;
                }

                if(this.payment_list.length > 0) {
                        this.axios
                                .post(`/api/nursing/paymentmethod/${this.id}`,this.payment_list)
                                .then((response) => {
                                
                                }).catch(error=>{

                                if(error.response.status == 422){

                                this.errors = error.response.data.errors

                                }
                        }) ;
                }

                if(this.profile_arr.length > 0) {
                        this.axios
                                .post(`/api/nursing/profile/${this.id}`,this.profile_arr)
                                .then((response) => {
                        
                                }).catch(error=>{

                                if(error.response.status == 422){

                                this.errors = error.response.data.errors

                                }
                        }) ;
                }

                if(this.customer_info.length > 0) {
                        // check
                        this.axios
                                .post(`/api/customer/profile/${this.id}`,this.customer_info)
                                .then((response) => {
                               
                                }).catch(error=>{

                                if(error.response.status == 422){

                                this.errors = error.response.data.errors

                                }
                        }) ;
                }

                if(this.staf_info.length > 0) {
                        this.axios
                                .post(`/api/staff/profile/${this.id}`,this.staf_info)
                                .then((response) => {
                               
                                }).catch(error=>{

                                if(error.response.status == 422){

                                this.errors = error.response.data.errors

                                }
                        }) ;
                }

                if(this.acceptance.length > 0) {
                        this.axios
                                .post(`/api/acceptance/transition/${this.id}`,this.acceptance)
                                .then((response) => {
                                         alert('Successfully Updated!')
                                }).catch(error=>{
                                        if(error.response.status == 422) {
                                                this.errors = error.response.data.errors
                                        }
                        }) ;
                }
            }
        }
}

</script>

 <style>
 .quill-editor,.quill-code {
    /* width: 100%;
    float: right; */
    /* margin-bottom: 20px; */
  }
  .quill-editor{
          background-color: #fff;
  }
 </style>
