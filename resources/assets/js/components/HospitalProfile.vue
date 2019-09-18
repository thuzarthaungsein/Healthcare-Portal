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
                    
                    <!-- <div class="form-group">
                            <label>フォトアルバム<span class="error">*</span></label>
                            <input type="file" class="" value="Upload Photo" id="upload_file" @change="preview_image();" multiple>

                            <div class="col-md-12">
                                    <div class="row" id="image_preview"></div>
                            </div>
                    </div> -->

                    <div class="form-group">
                            <label class="heading-lbl">フォトアルバム</label> <span class="btn all-btn main-bg-color m-l-10" style="min-width: 0px;" @click="galleryAdd()">+</span>
                            <div class="col-md-12">
                                    <div class="row" id="gallery-photo"></div>
                            </div>                                        
                    </div>
                    <div class="form-group">
                            <label class="heading-lbl">動画</label> <span class="btn all-btn main-bg-color m-l-10" style="min-width: 0px;" @click="galleryVideoAdd()">+</span>
                            <div class="col-md-12">
                                    <div class="row" id="gallery-video"></div>
                            </div>                                        
                    </div>

                    <div class="form-group">
                            <label class="heading-lbl">診療科目<span class="error">*</span></label>
                            <!-- <textarea name="medicaldepartment" class="form-control"></textarea> -->
                              <quill-editor v-model="content" ref="myQuilEditor" :options="editorOption" />
                    </div>

                    <div class="form-group">
                            <label class="heading-lbl">専門医<span class="error">*</span></label>
                            <!-- <textarea name="specialist" class="form-control"></textarea> -->
                              <quill-editor v-model="content" ref="myQuilEditor" :options="editorOption" />
                    </div>

                    <div class="form-group">
                            <label class="heading-lbl">医院からのお知らせ<span class="error">*</span></label>
                            <!-- <textarea name="detailsinfo" class="form-control"></textarea> -->
                              <quill-editor v-model="content" ref="myQuilEditor" :options="editorOption" />
                    </div>

                    <!-- <div class="form-group">
                            <label class="heading-lbl">診療科目<span class="error">*</span></label>
                            <textarea name="subject" class="form-control"></textarea>
                    </div> -->

                    

                    <div class="form-group">
                        <label  class="heading-lbl">診療時間</label> <span class="btn all-btn main-bg-color m-l-10" style="min-width: 0px;" @click="scheduletogglediv()"><i class="fas fa-sort-down"></i></span>

                        <div class="schedule-toggle-div toggle-div m-t-10">
                                <table class="table table-striped table-bordered">
                                        <tr>
                                                <th>&nbsp;</th>
                                                <th>A.M</th>
                                                <th>P.M</th>
                                                <th>Other</th>
                                        </tr>
                                        <tr>
                                                <td>Monday</td>
                                                <td><span>From:</span><input type="text" class="form-control am-from0"> <span>To:</span><input type="text" class="form-control am-to0"></td>
                                                <td><span>From:</span><input type="text" class="form-control pm-from0"> <span>To:</span><input type="text" class="form-control pm-to0"></td>
                                                <td></td>
                                        </tr>
                                        <tr>
                                                <td>Tuesday</td>
                                                <td><span>From:</span><input type="text" class="form-control am-from1"> <span>To:</span><input type="text" class="form-control am-to1"></td>
                                                <td><span>From:</span><input type="text" class="form-control pm-from1"> <span>To:</span><input type="text" class="form-control pm-to1"></td>
                                                <td></td>
                                        </tr>
                                        <tr>
                                                <td>Wed</td>
                                                <td><span>From:</span><input type="text" class="form-control am-from2"> <span>To:</span><input type="text" class="form-control am-to2"></td>
                                                <td><span>From:</span><input type="text" class="form-control pm-from2"> <span>To:</span><input type="text" class="form-control pm-to2"></td>
                                                <td></td>
                                        </tr>
                                        <tr>
                                                <td>Thu</td>
                                                <td><span>From:</span><input type="text" class="form-control am-from3"> <span>To:</span><input type="text" class="form-control am-to3"></td>
                                                <td><span>From:</span><input type="text" class="form-control pm-from3"> <span>To:</span><input type="text" class="form-control pm-to3"></td>
                                                <td></td>
                                        </tr>
                                        <tr>
                                                <td>Friday</td>
                                                <td><span>From:</span><input type="text" class="form-control am-from4"> <span>To:</span><input type="text" class="form-control am-to4"></td>
                                                <td><span>From:</span><input type="text" class="form-control pm-from4"> <span>To:</span><input type="text" class="form-control pm-to4"></td>
                                                <td></td>
                                        </tr>
                                        <tr>
                                                <td>Sat</td>
                                                <td><span>From:</span><input type="text" class="form-control am-from5"> <span>To:</span><input type="text" class="form-control am-to5"></td>
                                                <td><span>From:</span><input type="text" class="form-control pm-from5"> <span>To:</span><input type="text" class="form-control pm-to5"></td>
                                                <td></td>
                                        </tr>
                                        <tr>
                                                <td>Sunday</td>
                                                <td><span>From:</span><input type="text" class="form-control am-from6"> <span>To:</span><input type="text" class="form-control am-to6"></td>
                                                <td><span>From:</span><input type="text" class="form-control pm-from6"> <span>To:</span><input type="text" class="form-control pm-to6"></td>
                                                <td></td>
                                        </tr>
                                </table>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="heading-lbl">休診日</label>
                        <!-- <textarea name="close-day" class="form-control"></textarea> -->
                          <quill-editor v-model="content" ref="myQuilEditor" :options="editorOption" />
                    </div>

                    <div class="form-group">
                        <label  class="heading-lbl">施設情報</label> <span class="btn all-btn main-bg-color m-l-10" style="min-width: 0px;" @click="factogglediv()"><i class="fas fa-sort-down"></i></span>

                        <div class="col-md-12 hos-fac-toggle-div toggle-div">
                                <div class="row">
                                        <div v-for="fac in fac_list" :key="fac.id" class="col-md-6 m-b-20">
                                                <label>
                                                <input type="checkbox">
                                                {{fac.description}}
                                                </label>
                                        </div>
                                </div>                                        
                        </div>
                    </div>

                    <!-- <div class="form-group">
                        <label class="heading-lbl">こだわりの特長<span class="error">*</span></label>
                        <span class="btn all-btn main-bg-color m-l-10" style="min-width: 0px;" @click="specialFeAdd()">+</span>

                        <div class="col-md-12" id="special-features">

                        </div>
                    </div> -->

                    <div class="form-group">
                        <label  class="heading-lbl">こだわりの特長</label> <span class="btn all-btn main-bg-color m-l-10" style="min-width: 0px;" @click="specialFeAdd()"><i class="fas fa-sort-down"></i></span>

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

                    <div class="form-group">
                            <label class="heading-lbl">公式サイト</label>
                            <input type="text" name="official-website" class="form-control">
                    </div>

                    <div class="form-group">
                            <label class="heading-lbl">混雑状況</label>
                            <!-- <textarea name="congestion" class="form-control"></textarea> -->
                              <quill-editor v-model="content" ref="myQuilEditor" :options="editorOption" />
                    </div>

                    <div class="form-group">
                        <label  class="heading-lbl">地図</label> 
                        <span class="btn all-btn main-bg-color m-l-10" style="min-width: 0px;" @click="maptogglediv()"><i class="fas fa-sort-down"></i></span>

                        <div class="map-toggle-div toggle-div">
                                <div class="col-md-12">
                                    <GoogleMap></GoogleMap>
                                </div>

                                <div class="form-group">
                                        <label>住所<span class="error">*</span></label>
                                        <!-- <textarea name="address" rows="10" class="form-control"></textarea> -->
                                          <quill-editor v-model="content" ref="myQuilEditor" :options="editorOption" />
                                </div>
                                <div class="form-group">
                                        <label>交通 / アクセス<span class="error">*</span></label>
                                        <!-- <textarea name="address" rows="10" class="form-control"></textarea> -->
                                          <quill-editor v-model="content" ref="myQuilEditor" :options="editorOption" />
                                </div>
                        </div>
                    </div>

                    <!-- Consultation -->

                    

                    <!-- End Consultation -->
                    
                    

                    <!-- Facilities -->
                    
                    <!-- End Facilities -->

                    <!-- <hr class="hor-line m-t-30"> -->
                    

                    <!-- <hr class="hor-line m-t-30"> -->
                    

                    <!-- Map -->
                    
                    <!-- End Map -->

                    <div class="row">
                            <span class="btn news-post-btn all-btn m-t-15" @click="createProfile()">Create</span>
                            <!-- <a href="" class="btn news-post-btn all-btn">ニュースを投稿する</a> -->
                    </div>
            </div>               
    </form>
</div>
</template>

<script>
import 'quill/dist/quill.snow.css'
import {quillEditor} from 'vue-quill-editor'
import {Button, Input,Select} from 'iview'
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
                        count:-1, v_count: -1,
                        type:'',
                        title:[], v_title:[],
                        description:[], v_description:[],
                        img:[],
                        img_list:[], video_list:[],
                        shedule_am:[], shedule_pm:[], schedule_list:[],
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
                this.fac_list = response.data;
                });

                this.axios
                .get('/api/featurelist')
                .then(response=>{
                this.feature_list = response.data;
                });
        },
        methods: {

            scheduletogglediv() {
                    $(".schedule-toggle-div").toggle('medium');
            },

            maptogglediv() {
                    $(".map-toggle-div").toggle('medium');
            },

            factogglediv() {
                    $(".hos-fac-toggle-div").toggle('medium');
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
            
            specialFeAdd() {
                    $(".special-feature-toggle-div").toggle('medium');
            },

            createProfile() {
                var photo = document.getElementsByClassName('gallery-area-photo');
                var video = document.getElementsByClassName('gallery-area-video');

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


                for(var j = 0; j< 2; j++) {
                        for(var i = 0; i< 7; i++) {
                                if(j == 0) { this.shedule_am[i] = $('.form-control.am-from'+i+'').val() + '-' + $('.form-control.am-to'+i+'').val(); } 
                                if(j == 1) { this.shedule_pm[i] = $('.form-control.pm-from'+i+'').val() + '-' + $('.form-control.pm-to'+i+'').val(); }
                        }

                        if(j == 0) { this.schedule_list.push({am: this.shedule_am}); }
                        if(j == 1) { this.schedule_list.push({pm: this.shedule_pm}); }
                }
                console.log(this.schedule_list);return;
                
            }

        }
}

</script>