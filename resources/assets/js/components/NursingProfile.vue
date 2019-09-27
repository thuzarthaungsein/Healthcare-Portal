<template>
<div class="card profile" style="border:none;">
    <form class="col-md-12 form-class">
            <div class="col-md-12 pad-free">
                    <div class="form-group">
                            <label class="heading-lbl">名前<span class="error">*</span></label>
                            <input type="text" class="form-control customer-name" placeholder="Name" v-model="customer_info.name">
                    </div>
                    <div class="form-group">
                            <label class="heading-lbl">メールアドレス<span class="error">*</span></label>
                            <input type="text" class="form-control customer-email"  placeholder="Email" v-model="customer_info.email">
                    </div>
                    <div class="form-group">
                            <label class="heading-lbl">電話番号<span class="error">*</span></label>
                            <input type="text" class="form-control customer-phone"  placeholder="Phone" v-model="customer_info.phone">
                    </div>

                    <div class="form-group">
                            <label class="heading-lbl">フォトアルバム</label> <span class="btn all-btn main-bg-color m-l-10" style="min-width: 0px;" @click="galleryAdd()">Add</span>
                            <div class="col-md-12">
                                    <div class="row" id ="gallery-photo">
                                            <div class="col-md-12 gallery-area-photo" v-bind:id="'photo'+indx" v-for="(img,indx) in img_arr" :key="img.id">
                                                                <div class="col-md-3">
                                                                        <input type="file" name="" class=" m-b-15" v-bind:class="img.classname" id="upload_img" @change="preview_image(img.classname)">
                                                                        <div class="col-md-12" v-bind:class="img.classname">
                                                                                <img :src="'/upload/nursing_profile/'+ img.photo" class="img-fluid hospital-image" alt="profile" v-if="img.photo">
                                                                        </div>
                                                                </div>
                                                                <div class="col-md-9">
                                                                        <input type="text" name="title" placeholder="タイトル" class="form-control m-b-15 title" v-model="img.title">
                                                                        <textarea name="description" placeholder="コンテンツ" class="form-control m-b-15 description" v-model="img.description"></textarea>
                                                                </div>
                                                                <a class="mr-auto text-danger btn delete-borderbtn" @click="DeltArr(indx,'photo')">削除</a>
                                                       
                                                </div>
                                    </div>
                            </div>
                    </div>

                    <div class="form-group">
                            <label class="heading-lbl">動画</label> <span class="btn all-btn main-bg-color m-l-10" style="min-width: 0px;" @click="galleryVideoAdd()">Add</span>
                            <div class="col-md-12">
                                    <div class="row" id="gallery-video">
                                            <div class="col-md-12 gallery-area-video" v-bind:id="'video'+indx" v-for="(video,indx) in video_arr" :key="video.id">
                                                <div class="col-md-3">
                                                        <input type="text" name="url" placeholder="url" class="form-control m-b-15 video-url" v-model="video.photo">
                                                </div>
                                                <div class="col-md-9">
                                                        <input type="text" name="title" placeholder="タイトル" class="form-control m-b-15 title" v-model="video.title">
                                                        <textarea name="description" placeholder="コンテンツ" class="form-control m-b-15 description" v-model="video.description"></textarea>
                                                </div>
                                                <a class="mr-auto text-danger btn delete-borderbtn" @click="DeltArr(indx,'video')">削除</a>
                                            </div>
                                    </div>
                            </div>
                    </div>

                    <div class="form-group">
                            <label class="heading-lbl">特長<span class="error">*</span></label>

                            <!-- <textarea name="feature" class="form-control"></textarea> -->
                             <quill-editor  ref="myQuilEditor" name="feature" :options="editorOption" />
                            <!-- <div id="feature" name = "body"></div> -->
                    </div>

                    <table class="table table-bordered">
                        <tr>
                            <td>
                                <div class="form-group">
                                        <label class="heading-lbl">費用</label>
                                </div>

                                <div class="form-group">
                                        <label class="heading-lbl">支払い方法<span class="error">*</span></label>
                                        <span class="btn all-btn main-bg-color m-l-10" style="min-width: 0px;" @click="methodAdd()">Add</span>
                                        <input type="text"  class="form-control nursing-payment-method" v-model="nursing_info.method">

                                        <div class="col-md-12 pad-free" id="gallery-payment">
                                                <!-- test -->
                                                <div class="pad-free col-md-12 gallery-area-payment" v-bind:id="'payment'+indx" v-for="(payment,indx) in payment_arr" :key="payment.id">
        <div class="col-md-12 m-t-15 m-b-15">
            <table class="table">
                <tr>
                    <th>
                        <span class="btn all-btn main-bg-color m-l-10" style="min-width:0px;"><i class="fa fa-edit"></i></span>
                        <a class="mr-auto text-danger btn delete-borderbtn" @click="DeltArr(indx,'payment')">削除</a> 
                        <label class="col-md-3 title-lbl float-right">タイプ名</label>
                    </th>
                    <th>
                        <input type="text" name="method[]" class="form-control payment-name" v-model="payment.payment_name">
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
                        <input type="text" name="exp[]" class="form-control expense-moving" v-model="payment.expense_moving">
                    </th>
                </tr>
                <tr>
                    <th>居室タイプ</th>
                    <th>
                        <input type="text" name="exp[]" class="form-control living-room-type" v-model="payment.living_room_type">
                    </th>
                </tr>
                <tr>
                    <th>月額利用料</th>
                    <th>
                        <input type="text" name="exp[]" class="form-control monthly-fees" v-model="payment.monthly_fees">
                    </th>
                </tr>
                <tr>
                    <th>広さ</th>
                    <th>
                        <input type="text" name="exp[]" class="form-control area" v-model="payment.area">
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
                        <input type="text" name="breakdown[]" class="form-control deposit" v-model="payment.deposit">
                    </th>
                </tr>
                <tr>
                    <th>その他（使途）</th>
                    <th>
                        <input type="text" name="breakdown[]" class="form-control other-use" v-model="payment.other_use">
                    </th>
                </tr>
                <tr>
                    <th class="title-lbl"><span>月額費用</span></th><th>&nbsp;</th>
                </tr>
                <tr>
                    <th>賃料</th>
                    <th>
                        <input type="text" name="breakdown[]" class="form-control rent" v-model="payment.rent">
                    </th>
                </tr>
                <tr>
                    <th>管理費</th>
                    <th>
                        <input type="text" name="breakdown[]" class="form-control admin-expense" v-model="payment.admin_expense">
                    </th>
                </tr>
                <tr>
                    <th>食費</th>
                    <th>
                        <input type="text" name="breakdown[]" class="form-control food-expense" v-model="payment.food_expense">
                    </th>
                </tr>
                <tr>   
                    <th>介護上乗せ金（生活サービス費）</th>
                    <th>   
                        <input type="text" name="breakdown[]" class="form-control nurse-care-surcharge" v-model="payment.nurse_care_surcharge">
                    </th>
                </tr>
                <tr>
                    <th>その他</th>
                    <th>
                        <input type="text" name="breakdown[]" class="form-control other-monthly-cost" v-model="payment.other_monthly_cost">
                    </th>
                </tr>
                <tr>
                    <th class="title-lbl"><span>返還金について</span></th>
                    <th>&nbsp;</th>
                </tr>
                <tr>
                    <th>返還制度</th>
                    <th>
                        <input type="text" name="breakdown[]" class="form-control refund-system" v-model="payment.refund_system">
                    </th>
                </tr>
                <tr>
                    <th>償却期間</th>
                    <th>   
                        <input type="text" name="breakdown[]" class="form-control depreciation-period" v-model="payment.depreciation_period">
                    </th>
                </tr>
                <tr>
                    <th>初期償却</th>
                    <th>
                        <input type="text" name="breakdown[]" class="form-control initial-deprecration" v-model="payment.initial_deprecration">
                    </th>
                </tr>
                <tr>
                    <th>その他メッセージ</th>
                    <th>
                        <input type="text" name="breakdown[]" class="form-control other-message-refund" v-model="payment.other_message_refund">
                    </th>
                </tr>
            </table>
        </div>

    </div>
                                        </div>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label class="heading-lbl">施設の概要</label>
                                <span class="btn all-btn main-bg-color m-l-10" style="min-width: 0px;" @click="nurseFacToggleDiv()"><i class="fas fa-sort-down"></i></span>
                                <!-- testtest -->
                                <div class="nurse-fac-toggle-div toggle-div">
                                        <table class="table table-striped table-bordered">
                                                <tr>
                                                        <td style="width:30%">事業主体</td>
                                                        <!-- <td style="width:70%"><textarea class="form-control"></textarea></td>   -->
                                                         <td style="width:70%"> <quill-editor class="business-entity" ref="myQuilEditor" :options="editorOption" v-model="nursing_info.business_entity"/></td>

                                                </tr>
                                                <tr>
                                                        <td style="width:30%">開設年月日</td>
                                                        <!-- <td style="width:70%"><textarea class="form-control"></textarea></td>  -->
                                                         <td style="width:70%"> <quill-editor  class="date-of-establishment" ref="myQuilEditor" :options="editorOption" v-model="nursing_info.date_of_establishment"/></td>
                                                </tr>
                                                <tr>
                                                        <td style="width:30%">土地の権利形態</td>
                                                        <!-- <td style="width:70%"><textarea class="form-control"></textarea></td> -->
                                                         <td style="width:70%"> <quill-editor  class="land-right-form" ref="myQuilEditor" :options="editorOption" v-model="nursing_info.land_right_form"/></td>
                                                </tr>
                                                <tr>
                                                        <td style="width:30%">建物の権利形態</td>
                                                        <!-- <td style="width:70%"><textarea class="form-control"></textarea></td> -->
                                                         <td style="width:70%"> <quill-editor  class="building-right-form" ref="myQuilEditor" :options="editorOption" v-model="nursing_info.building_right_form"/></td>
                                                </tr>
                                                <tr>
                                                        <td style="width:30%">敷地面積</td>
                                                        <!-- <td style="width:70%"><textarea class="form-control"></textarea></td> -->
                                                         <td style="width:70%"> <quill-editor  class="site-area" ref="myQuilEditor" :options="editorOption" v-model="nursing_info.site_area"/></td>
                                                </tr>
                                                <tr>
                                                        <td style="width:30%">延床面積</td>
                                                        <!-- <td style="width:70%"><textarea class="form-control"></textarea></td> -->
                                                         <td style="width:70%"> <quill-editor  class="floor-area" ref="myQuilEditor" :options="editorOption" v-model="nursing_info.floor_area"/></td>
                                                </tr>
                                                <tr>
                                                        <td style="width:30%">構造</td>
                                                        <!-- <td style="width:70%"><textarea class="form-control"></textarea></td> -->
                                                         <td style="width:70%"> <quill-editor  class="construction" ref="myQuilEditor" :options="editorOption" v-model="nursing_info.construction"/></td>
                                                </tr>
                                                <tr>
                                                        <td style="width:30%">定員</td>
                                                        <!-- <td style="width:70%"><textarea class="form-control"></textarea></td> -->
                                                         <td style="width:70%"> <quill-editor  class="capacity" ref="myQuilEditor" :options="editorOption" v-model="nursing_info.capacity"/></td>
                                                </tr>
                                                <tr>
                                                        <td style="width:30%">総居室・戸数</td>
                                                        <!-- <td style="width:70%"><textarea class="form-control"></textarea></td> -->
                                                         <td style="width:70%"> <quill-editor  class="num-rooms" ref="myQuilEditor" :options="editorOption" v-model="nursing_info.num_rooms"/></td>
                                                </tr>
                                                <tr>
                                                        <td style="width:30%">居住の権利形態</td>
                                                        <!-- <td style="width:70%"><textarea class="form-control"></textarea></td> -->
                                                         <td style="width:70%"> <quill-editor  class="residence-form" ref="myQuilEditor" :options="editorOption" v-model="nursing_info.residence_form"/></td>
                                                </tr>
                                                <tr>
                                                        <td style="width:30%">類型</td>
                                                        <!-- <td style="width:70%"><textarea class="form-control"></textarea></td> -->
                                                         <td style="width:70%"> <quill-editor  class="fac-type" ref="myQuilEditor" :options="editorOption" v-model="nursing_info.fac_type"/></td>
                                                </tr>
                                                <tr>
                                                        <td style="width:30%">入居条件</td>
                                                        <!-- <td style="width:70%"><textarea class="form-control"></textarea></td> -->
                                                         <td style="width:70%"> <quill-editor  class="occupancy-condition" ref="myQuilEditor" :options="editorOption" v-model="nursing_info.occupancy_condition"/></td>
                                                </tr>
                                                <tr>
                                                        <td style="width:30%">居室区分・間取り等</td>
                                                        <!-- <td style="width:70%"><textarea class="form-control"></textarea></td> -->
                                                         <td style="width:70%"> <quill-editor  class="room-floor" ref="myQuilEditor" :options="editorOption"  v-model="nursing_info.room_floor"/></td>
                                                </tr>
                                                <tr>
                                                        <td style="width:30%">居室設備</td>
                                                        <!-- <td style="width:70%"><textarea class="form-control"></textarea></td> -->
                                                         <td style="width:70%"> <quill-editor  class="equipment" ref="myQuilEditor" :options="editorOption" v-model="nursing_info.equipment"/></td>
                                                </tr>
                                                <tr>
                                                        <td style="width:30%">共用施設・設備</td>
                                                        <!-- <td style="width:70%"><textarea class="form-control"></textarea></td> -->
                                                         <td style="width:70%"> <quill-editor  class="living-room-facilities" ref="myQuilEditor" :options="editorOption" v-model="nursing_info.living_room_facilities"/></td>
                                                </tr>
                                        </table>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <div class="form-group">
                                        <label class="heading-lbl">協力医療機関<span class="error">*</span></label>
                                        <span class="btn all-btn main-bg-color m-l-10" style="min-width: 0px;" @click="cooperateAdd()">Add</span>
                                        <div class="col-md-12 pad-free" id="gallery-cooperate">
                                                <!-- cooperation -->
                                                <div class="col-md-12 pad-free m-t-20 gallery-area-cooperate" v-bind:id="'cooperate'+indx" v-for="(cooperate,indx) in cooperate_arr" :key="cooperate.id">
                                                        <div class="form-group"> 
                                                                <label>名前 :</label> 
                                                                <input type="text" class="form-control cooperate-name" name="co-medical-header[]" v-model="cooperate.name"> 
                                                        </div>
                                                        <table class="table table-bordered">
                                                        <tr>
                                                                <th style="width:30%">診療科目</th>
                                                                <th style="width:70%"><textarea class="form-control clinical-sub" name="clinical-sub" v-model="cooperate.clinical_subject"></textarea></th>
                                                        </tr>
                                                        <tr>
                                                                <th>協力内容</th>
                                                                <th><textarea class="form-control details" name="details" v-model="cooperate.details"></textarea></th>
                                                        </tr>
                                                        <tr>
                                                                <th>診療費用</th>
                                                                <th><textarea class="form-control expense" name="expense" v-model="cooperate.medical_expense"></textarea></th>
                                                        </tr>
                                                        <tr>
                                                                <th>備考</th>
                                                                <th><textarea class="form-control remark" name="remark" v-model="cooperate.remark"></textarea></th>
                                                        </tr>
                                                        </table>
                                                        <a class="mr-auto text-danger btn delete-borderbtn" @click="DeltArr(indx,'cooperate')">削除</a>
                                                </div>
                                        </div>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <div class="form-group">
                                        <label class="heading-lbl">医療面の受入れ</label>
                                        <span class="btn all-btn main-bg-color m-l-10" style="min-width: 0px;" @click="acceptanceList()"><i class="fas fa-sort-down"></i></span>
                                    <div class="col-md-12 accept-toggle-div toggle-div pad-free">
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

                        <tr>
                            <td>
                                <label class="heading-lbl">職員体制</label>
                                <span class="btn all-btn main-bg-color m-l-10" style="min-width: 0px;" @click="staffToggleDiv()"><i class="fas fa-sort-down"></i></span>

                                <div class="staff-toggle-div toggle-div">
                                        <table class="table table-striped table-bordered">
                                                <tr>
                                                        <td style="width:20%">介護に関わる職員体制（入居者：職員）</td>
                                                        <!-- <td style="width:32%"><textarea class="form-control"></textarea></td>  -->
                                                        <td style="width:32%"><quill-editor  ref="myQuilEditor" class="staff" :options="editorOption" v-model="staff_info.staff"/></td>

                                                        <td style="width:16%">介護職員</td>
                                                        <!-- <td style="width:32%"><textarea class="form-control"></textarea></td>   -->
                                                         <td style="width:32%"><quill-editor  ref="myQuilEditor" class="nursing-staff" :options="editorOption" v-model="staff_info.nursing_staff"/></td>
                                                </tr>
                                                <tr>
                                                        <td style="width:20%">夜間の最少職員数</td>
                                                        <!-- <td style="width:32%"><textarea class="form-control"></textarea></td> -->
                                                         <td style="width:32%"><quill-editor  ref="myQuilEditor" class="min-num-staff" :options="editorOption" v-model="staff_info.min_num_staff"/></td>
                                                        <td style="width:16%">看護職員数</td>
                                                        <!-- <td style="width:32%"><textarea class="form-control"></textarea></td>    -->
                                                         <td style="width:32%"><quill-editor  ref="myQuilEditor" class="num-staff" :options="editorOption" v-model="staff_info.num_staff"/></td>
                                                </tr>
                                        </table>

                                        <div class="form-group">
                                                <label for="">備考</label>
                                                <!-- <textarea name="" class="form-control"></textarea> -->
                                              <quill-editor  ref="myQuilEditor" name="" :options="editorOption" class="nursing-remarks" v-model="staff_info.remarks"/>
                                        </div>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <div class="form-group">
                                        <label  class="heading-lbl">こだわりの特長</label>
                                        <span class="btn all-btn main-bg-color m-l-10" style="min-width: 0px;" @click="specialFeAdd()"><i class="fas fa-sort-down"></i></span>

                                        <div class="col-md-12 special-feature-toggle-div toggle-div">
                                                <div class="row">
                                                        <div v-for="feat in feature_list" :key="feat.id" class="col-md-6 m-b-20">
                                                                <label>
                                                                 <input type="checkbox"  name="special-features" :class="'feature-'+feat.id"  v-bind:value="feat.id" @click="featureCheck(feat.id)" v-model="feat.checked">
                                                                        {{feat.name}}
                                                                </label>
                                                         </div>
                                                </div>                                        
                                        </div>
                                </div>
                            </td>
                        </tr>

                        <div class="form-group">
                            <label class="heading-lbl">公式サイト</label>
                            <input type="text" name="official-website" class="form-control website" v-model="nursing_info.website">
                    </div>

                        <tr>
                            <td>
                                <label class="heading-lbl">地図</label>
                                <span class="btn all-btn main-bg-color m-l-10" style="min-width: 0px;" @click="maptogglediv()"><i class="fas fa-sort-down"></i></span>

                                <div class="map-toggle-div toggle-div">
                                        <div class="col-md-12">
                                            <GoogleMap></GoogleMap>
                                        </div>

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
                            </td>
                        </tr>
                    </table>

                    <div class="row">
                        <span class="btn news-post-btn all-btn m-t-15" @click="createProfile()">Create</span>
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
                profile_arr:[],staf_info:[],customer_info:[], test:[],

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
                        // var pname= img[i].getElementsByClassName('hospital-image')[0].src.split('hospital_profile/');
                        this.img_list.push({type:"photo",photo:this.test,title:img[i].getElementsByClassName('title')[0].value, description:img[i].getElementsByClassName('description')[0].value});
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
               var special_features ;
        
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

 </style>
