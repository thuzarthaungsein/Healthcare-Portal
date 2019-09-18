<template>
<div class="card profile" style="border:none;">
    <form class="col-md-12 form-class">
            <div class="col-md-12 pad-free">
                    <div class="form-group">
                            <label class="heading-lbl">名前<span class="error">*</span></label>
                            <input type="text" class="form-control" placeholder="Name">
                    </div>
                    <div class="form-group">
                            <label class="heading-lbl">メールアドレス<span class="error">*</span></label>
                            <input type="text" class="form-control"  placeholder="Email">
                    </div>
                    <div class="form-group">
                            <label class="heading-lbl">電話番号<span class="error">*</span></label>
                            <input type="text" class="form-control"  placeholder="Phone">
                    </div>

                    <div class="form-group">
                            <label class="heading-lbl">フォトアルバム</label> <span class="btn all-btn main-bg-color m-l-10" style="min-width: 0px;" @click="galleryAdd()">Add</span>
                            <div class="col-md-12">
                                    <div class="row" id="gallery-photo"></div>
                            </div>
                    </div>

                    <div class="form-group">
                            <label class="heading-lbl">動画</label> <span class="btn all-btn main-bg-color m-l-10" style="min-width: 0px;" @click="galleryVideoAdd()">Add</span>
                            <div class="col-md-12">
                                    <div class="row" id="gallery-video"></div>
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

                                        <div class="col-md-12 pad-free" id="gallery-payment"></div>
                                </div>
                            </td>
                        </tr>

                        <tr>
                            <td>
                                <label class="heading-lbl">施設の概要</label>
                                <span class="btn all-btn main-bg-color m-l-10" style="min-width: 0px;" @click="nurseFacToggleDiv()"><i class="fas fa-sort-down"></i></span>

                                <div class="nurse-fac-toggle-div toggle-div">
                                        <table class="table table-striped table-bordered">
                                                <tr>
                                                        <td style="width:30%">事業主体</td>
                                                        <!-- <td style="width:70%"><textarea class="form-control"></textarea></td>   -->
                                                         <td style="width:70%"> <quill-editor  ref="myQuilEditor" :options="editorOption" /></td>

                                                </tr>
                                                <tr>
                                                        <td style="width:30%">開設年月日</td>
                                                        <!-- <td style="width:70%"><textarea class="form-control"></textarea></td>  -->
                                                         <td style="width:70%"> <quill-editor  ref="myQuilEditor" :options="editorOption" /></td>
                                                </tr>
                                                <tr>
                                                        <td style="width:30%">土地の権利形態</td>
                                                        <!-- <td style="width:70%"><textarea class="form-control"></textarea></td> -->
                                                         <td style="width:70%"> <quill-editor  ref="myQuilEditor" :options="editorOption" /></td>
                                                </tr>
                                                <tr>
                                                        <td style="width:30%">建物の権利形態</td>
                                                        <!-- <td style="width:70%"><textarea class="form-control"></textarea></td> -->
                                                         <td style="width:70%"> <quill-editor  ref="myQuilEditor" :options="editorOption" /></td>
                                                </tr>
                                                <tr>
                                                        <td style="width:30%">敷地面積</td>
                                                        <!-- <td style="width:70%"><textarea class="form-control"></textarea></td> -->
                                                         <td style="width:70%"> <quill-editor  ref="myQuilEditor" :options="editorOption" /></td>
                                                </tr>
                                                <tr>
                                                        <td style="width:30%">延床面積</td>
                                                        <!-- <td style="width:70%"><textarea class="form-control"></textarea></td> -->
                                                         <td style="width:70%"> <quill-editor  ref="myQuilEditor" :options="editorOption" /></td>
                                                </tr>
                                                <tr>
                                                        <td style="width:30%">構造</td>
                                                        <!-- <td style="width:70%"><textarea class="form-control"></textarea></td> -->
                                                         <td style="width:70%"> <quill-editor  ref="myQuilEditor" :options="editorOption" /></td>
                                                </tr>
                                                <tr>
                                                        <td style="width:30%">定員</td>
                                                        <!-- <td style="width:70%"><textarea class="form-control"></textarea></td> -->
                                                         <td style="width:70%"> <quill-editor  ref="myQuilEditor" :options="editorOption" /></td>
                                                </tr>
                                                <tr>
                                                        <td style="width:30%">総居室・戸数</td>
                                                        <!-- <td style="width:70%"><textarea class="form-control"></textarea></td> -->
                                                         <td style="width:70%"> <quill-editor  ref="myQuilEditor" :options="editorOption" /></td>
                                                </tr>
                                                <tr>
                                                        <td style="width:30%">居住の権利形態</td>
                                                        <!-- <td style="width:70%"><textarea class="form-control"></textarea></td> -->
                                                         <td style="width:70%"> <quill-editor  ref="myQuilEditor" :options="editorOption" /></td>
                                                </tr>
                                                <tr>
                                                        <td style="width:30%">類型</td>
                                                        <!-- <td style="width:70%"><textarea class="form-control"></textarea></td> -->
                                                         <td style="width:70%"> <quill-editor  ref="myQuilEditor" :options="editorOption" /></td>
                                                </tr>
                                                <tr>
                                                        <td style="width:30%">入居条件</td>
                                                        <!-- <td style="width:70%"><textarea class="form-control"></textarea></td> -->
                                                         <td style="width:70%"> <quill-editor  ref="myQuilEditor" :options="editorOption" /></td>
                                                </tr>
                                                <tr>
                                                        <td style="width:30%">居室区分・間取り等</td>
                                                        <!-- <td style="width:70%"><textarea class="form-control"></textarea></td> -->
                                                         <td style="width:70%"> <quill-editor  ref="myQuilEditor" :options="editorOption" /></td>
                                                </tr>
                                                <tr>
                                                        <td style="width:30%">居室設備</td>
                                                        <!-- <td style="width:70%"><textarea class="form-control"></textarea></td> -->
                                                         <td style="width:70%"> <quill-editor  ref="myQuilEditor" :options="editorOption" /></td>
                                                </tr>
                                                <tr>
                                                        <td style="width:30%">共用施設・設備</td>
                                                        <!-- <td style="width:70%"><textarea class="form-control"></textarea></td> -->
                                                         <td style="width:70%"> <quill-editor  ref="myQuilEditor" :options="editorOption" /></td>
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
                                        <div class="col-md-12 pad-free" id="gallery-cooperation"></div>
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
                                                                    {{medical.name}}
                                                                    <div class="float-right">
                                                                            <label><input type="radio" :name="'medical'+medical.id"> <i class="fas fa-check green"></i></label>
                                                                            <label><input type="radio" :name="'medical'+medical.id"> <i class="fas fa-times red"></i></label>
                                                                            <label><input type="radio" :name="'medical'+medical.id"> <i class="fas fa-adjust blue"></i></label>
                                                                    </div>
                                                            </div>
                                                    </div>
                                            </div>
                                            <div class="form-group">
                                                    <label for="">備考</label>
                                                    <!-- <textarea name="" class="form-control"></textarea> -->
                                                    <quill-editor  ref="myQuilEditor" :options="editorOption" name="" />

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
                                                        <td style="width:32%"><quill-editor  ref="myQuilEditor" :options="editorOption" /></td>

                                                        <td style="width:16%">介護職員</td>
                                                        <!-- <td style="width:32%"><textarea class="form-control"></textarea></td>   -->
                                                         <td style="width:32%"><quill-editor  ref="myQuilEditor" :options="editorOption" /></td>
                                                </tr>
                                                <tr>
                                                        <td style="width:20%">夜間の最少職員数</td>
                                                        <!-- <td style="width:32%"><textarea class="form-control"></textarea></td> -->
                                                         <td style="width:32%"><quill-editor  ref="myQuilEditor" :options="editorOption" /></td>
                                                        <td style="width:16%">看護職員数</td>
                                                        <!-- <td style="width:32%"><textarea class="form-control"></textarea></td>    -->
                                                         <td style="width:32%"><quill-editor  ref="myQuilEditor" :options="editorOption" /></td>
                                                </tr>
                                        </table>

                                        <div class="form-group">
                                                <label for="">備考</label>
                                                <!-- <textarea name="" class="form-control"></textarea> -->
                                              <quill-editor  ref="myQuilEditor" name="" :options="editorOption" />
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
                                                                <input type="checkbox">
                                                                        {{feat.name}}
                                                                </label>
                                                         </div>
                                                </div>                                        
                                        </div>
                                </div>
                            </td>
                        </tr>

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
                                                <quill-editor  ref="myQuilEditor"  name="address" :options="editorOption" />
                                        </div>
                                        <div class="form-group">
                                                <label>交通 / アクセス<span class="error">*</span></label>
                                                <!-- <textarea name="address" rows="10" class="form-control"></textarea> -->
                                                <quill-editor  ref="myQuilEditor" name="address" :options="editorOption" />
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
                count:-1, v_count: -1, c_count: -1, p_count: -1,
                type:'',
                title:[], v_title:[],
                description:[], v_description:[],
                img:[], 
                sub:[], coop_details:[], expense:[],remark:[],
                method:[],move_in:[],room_type:[],monthly_usage:[],breadth:[],meth_details:[],
                img_list:[], video_list:[], cooperate_list:[], payment_list:[],
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
                .get('/api/facilities')
                .then(response=>{
                //  console.log(response);
                this.fac_list = response.data;
                });

                this.axios
                .get('/api/medical/medicalacceptance')
                .then(response => {
                    this.medical_acceptance = response.data;
                //      console.log(response.data);
                });

                this.axios
                .get('/api/featurelist')
                .then(response=>{
                this.feature_list = response.data;
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

            galleryAdd() {

                    var date = new Date;
                    var s = date.getMilliseconds();
                    var m = date.getMinutes();
                    var h = date.getHours();
                    var classname = "class"+h+m+s;
                    var c = "'"+classname+"'";
                    this.type = 0;

                     var photo = document.getElementsByClassName('gallery-area-photo');
                     if(photo.length == 0) {
                             this.count = this.count + 1;
                     } else {
                             this.count = photo.length;
                     }

                    $("#gallery-photo").append('<div id="gallery-photo'+this.count+'" class="row col-md-12"><div id="galleryarea-photo'+this.count+'" class="row col-md-12 gallery-area-photo gallery_'+this.count+'"><div class="col-md-3"><input type="file" name="" class=" m-b-15 '+classname+'" id="upload_img" onChange="showImg('+c+',event)"><div class="col-md-12 '+classname+' img'+this.count+'"></div></div><div class="col-md-9"><input type="text" name="title" placeholder="タイトル" class="form-control m-b-15 title"><textarea name="description" placeholder="コンテンツ" class="form-control m-b-15 description"></textarea></div><a class="mr-auto text-danger btn delete-borderbtn" onClick="DeltArr('+this.count+','+this.type+')">削除</a></div></div>');
            },

             galleryVideoAdd() {
                    var date = new Date;
                    var s = date.getMilliseconds();
                    var m = date.getMinutes();
                    var h = date.getHours();
                    this.type = 1;
                    var classname = "class"+h+m+s;
                    var c = "'"+classname+"'";
                  
                    var video = document.getElementsByClassName('gallery-area-video');

                     if(video.length == 0) {
                             this.v_count = this.v_count + 1;
                     } else {
                             this.v_count = video.length;
                     }

                    $("#gallery-video").append('<div id="gallery-video'+this.v_count+'" class="row col-md-12"><div id="galleryarea-video'+this.v_count+'" class="row col-md-12 gallery-area-video gallery_'+this.v_count+'"><div class="col-md-3"></div><div class="col-md-9"><input type="text" name="title" placeholder="タイトル" class="form-control m-b-15 title"><textarea name="description" placeholder="コンテンツ" class="form-control m-b-15 description"></textarea></div><a class="mr-auto text-danger btn delete-borderbtn" onClick="DeltArr('+this.v_count+','+this.type+')">削除</a></div></div>');
            },

            methodAdd() {
                    this.type = 3;
                    var payment = document.getElementsByClassName('gallery-area-payment');
                     if(payment.length == 0) {
                             this.p_count = this.p_count + 1;
                     } else {
                             this.p_count = payment.length;
                     }
                   $("#gallery-payment").append('<div id="gallery-payment'+this.p_count+'" class="method-box"> <div id="galleryarea-payment'+this.p_count+'" class="pad-free col-md-12 gallery-area-payment gallery_'+this.p_count+'"> <div class="col-md-12 m-t-15 m-b-15"> <table class="table"> <tr> <th> <span class="btn all-btn main-bg-color m-l-10" style="min-width:0px;"><i class="fa fa-edit"></i></span> <a class="mr-auto text-danger btn delete-borderbtn" onClick="DeltArr('+this.p_count+','+this.type+')">削除</a> <label class="col-md-3 title-lbl float-right">タイプ名</label> </th> <th><input type="text" name="method[]" class="form-control method"></th> </tr> </table> </div> <div class="col-md-12"> <h3 class="title-lbl">料金概要</h3> <table class="table"> <tr><th>入居時にかかる費用</th> <th><input type="text" name="exp[]" class="form-control expense-move-in"></th></tr> <tr><th>居室タイプ</th><th><input type="text" name="exp[]" class="form-control room-type"></th></tr> <tr><th>月額利用料</th><th><input type="text" name="exp[]" class="form-control monthly-usage"></th></tr> <tr><th>広さ</th><th><input type="text" name="exp[]" class="form-control breadth"></th></tr></table> </div> <div class="col-md-12"> <h3 class="title-lbl">料金詳細</h3> <table class="table"> <tr><th class="title-lbl"><span>入居にかかる費用</span></th> <th>&nbsp;</th></tr> <tr><th>入居一時金または敷金</th> <th><input type="text" name="breakdown[]" class="form-control expense-move-in"></th></tr> <tr><th>その他（使途）</th><th><input type="text" name="breakdown[]" class="form-control room-type"></th></tr> <tr><th class="title-lbl"><span>月額費用</span></th><th>&nbsp;</th></tr> <tr><th>賃料</th><th><input type="text" name="breakdown[]" class="form-control breadth"></th></tr> <tr><th>管理費</th><th><input type="text" name="breakdown[]" class="form-control breadth"></th></tr> <tr><th>食費</th><th><input type="text" name="breakdown[]" class="form-control breadth"></th></tr> <tr><th>介護上乗せ金（生活サービス費）</th><th><input type="text" name="breakdown[]" class="form-control breadth"></th></tr> <tr><th>その他</th><th><input type="text" name="breakdown[]" class="form-control breadth"></th></tr> <tr><th class="title-lbl"><span>返還金について</span></th><th>&nbsp;</th></tr> <tr><th>返還制度</th><th><input type="text" name="breakdown[]" class="form-control breadth"></th></tr> <tr><th>償却期間</th><th><input type="text" name="breakdown[]" class="form-control breadth"></th></tr> <tr><th>初期償却</th><th><input type="text" name="breakdown[]" class="form-control breadth"></th></tr> <tr><th>その他メッセージ</th><th><input type="text" name="breakdown[]" class="form-control breadth"></th></tr> </table> </div> </div> </div>');
            },

            cooperateAdd() {
                    this.type = 2;
                    var cooperation = document.getElementsByClassName('gallery-area-cooperation');
                     if(cooperation.length == 0) {
                             this.c_count = this.c_count + 1;
                     } else {
                             this.c_count = cooperation.length;
                     }
                   $("#gallery-cooperation").append('<div class="col-md-12 pad-free m-t-20" id="gallery-cooperation'+this.c_count+'"><div id="galleryarea-cooperation'+this.c_count+'" class="ccol-md-12 pad-free m-t-20 gallery-area-cooperation gallery_'+this.c_count+'"><div class="form-group"> <label>名前 :</label> <input type="text" class="form-control" name="co-medical-header[]"> </div><table class="table table-bordered"><tr><th style="width:30%">診療科目</th><th style="width:70%"><textarea class="form-control clinical-sub" name="clinical-sub"></textarea></th></tr><tr><th>協力内容</th><th><textarea class="form-control details" name="details"></textarea></th></tr><tr><th>診療費用</th><th><textarea class="form-control expense" name="expense"></textarea></th></tr><tr><th>備考</th><th><textarea class="form-control remark" name="remark"></textarea></th></tr></table><a class="mr-auto text-danger btn delete-borderbtn" onClick="DeltArr('+this.c_count+','+this.type+')">削除</a></div></div>');
            },

            acceptanceList() {
                $(".accept-toggle-div").toggle('medium');
            },

            specialFeAdd() {
                     $(".special-feature-toggle-div").toggle('medium');
            },

             createProfile() {
                var photo = document.getElementsByClassName('gallery-area-photo');
                var video = document.getElementsByClassName('gallery-area-video');
                var cooperation = document.getElementsByClassName('gallery-area-cooperation');
                var payment = document.getElementsByClassName('gallery-area-payment');

                for (var i = 0; i < photo.length; i++) {
                        this.img[i] = $('.gallery-area-photo.gallery_'+i+' .img'+i+' .show-img').attr('src');
                        this.title[i] = $('.gallery-area-photo.gallery_'+i+' .title').val();
                        this.description[i] = $('.gallery-area-photo.gallery_'+i+' .description').val(); 

                        this.img_list.push({img: this.img[i],title: this.title[i], description: this.description[i]});
                }
                console.log(this.img_list);

                for (var i = 0; i < video.length; i++) {
                        this.v_title[i] = $('.gallery-area-video.gallery_'+i+' .title').val();
                        this.v_description[i] = $('.gallery-area-video.gallery_'+i+' .description').val();

                        this.video_list.push({title: this.v_title[i], description: this.v_description[i]});
                }
                console.log(this.video_list);

                for (var i = 0; i < cooperation.length; i++) {
                        this.sub[i] = $('.gallery-area-cooperation.gallery_'+i+' .clinical-sub').val();
                        this.coop_details[i] = $('.gallery-area-cooperation.gallery_'+i+' .details').val();
                        this.expense[i] = $('.gallery-area-cooperation.gallery_'+i+' .expense').val();
                        this.remark[i] = $('.gallery-area-cooperation.gallery_'+i+' .remark').val();

                        this.cooperate_list.push({sub: this.sub[i], details: this.coop_details[i],expense: this.expense[i],remark: this.remark[i]});
                }
                console.log(this.cooperate_list);

                for (var i = 0; i < payment.length; i++) {
                        this.method[i] = $('.gallery-area-payment.gallery_'+i+' .method').val();
                        this.move_in[i] = $('.gallery-area-payment.gallery_'+i+' .expense-move-in').val();
                        this.room_type[i] = $('.gallery-area-payment.gallery_'+i+' .room-type').val();
                        this.monthly_usage[i] = $('.gallery-area-payment.gallery_'+i+' .monthly-usage').val();
                        this.breadth[i] = $('.gallery-area-payment.gallery_'+i+' .breadth').val();
                        this.meth_details[i] = $('.gallery-area-payment.gallery_'+i+' .details').val();

                        this.payment_list.push({method: this.method[i], move_in: this.move_in[i],room_type: this.room_type[i],monthly_usage: this.monthly_usage[i],breadth: this.breadth[i],meth_details: this.meth_details[i]});
                }
                console.log(this.payment_list);

            }
        }
}

</script>

 <style>
 .ql-editor{
     height:30vh;

 }
 </style>
 
 </style>
