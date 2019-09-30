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
                                    <div class="row" id="gallery-photo">
                                            <!-- Add by + Button -->
                                                <div class="col-md-12 gallery-area-photo" v-bind:id="'photo'+indx" v-for="(img,indx) in img_arr" :key="img.id">
                                                                <div class="col-md-3">
                                                                        <input type="file" name="" class=" m-b-15" v-bind:class="img.classname" id="upload_img" @change="preview_image(img.classname)">
                                                                        <div class="col-md-12" v-bind:class="img.classname">
                                                                                <img :src="'/upload/hospital_profile/'+ img.photo" class="img-fluid hospital-image" alt="profile" v-if="img.photo">
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
                            <label class="heading-lbl">動画</label> <span class="btn all-btn main-bg-color m-l-10" style="min-width: 0px;" @click="galleryVideoAdd()">+</span>
                            <div class="col-md-12">
                                    <div class="row" id="gallery-video">
                                        <!-- Add by + Button -->
                                        <div class="col-md-12 gallery-area-video" v-bind:id="'video'+indx" v-for="(video,indx) in video_arr" :key="video.id">
                                                <div class="col-md-3">
                                                        <input type="text" name="url" placeholder="url" class="form-control m-b-15 url" v-model="video.url">
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
                            <label class="heading-lbl">診療科目<span class="error">*</span></label>
                            <textarea name="medicaldepartment" class="form-control subject" v-model="hospital_info.subject"></textarea>
                    </div>

                    <div class="form-group">
                            <label class="heading-lbl">専門医<span class="error">*</span></label>
                            <textarea name="specialist" class="form-control specialist" v-model="hospital_info.specialist"></textarea>
                    </div>

                    <div class="form-group">
                            <label class="heading-lbl">医院からのお知らせ<span class="error">*</span></label>
                            <textarea name="detailsinfo" class="form-control details-info" v-model="hospital_info.details_info"></textarea>
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
                        <textarea name="close-day" class="form-control close-day" v-model="hospital_info.closed_day"></textarea>
                    </div>

                    <div class="form-group">
                        <label  class="heading-lbl">施設情報</label> <span class="btn all-btn main-bg-color m-l-10" style="min-width: 0px;" @click="factogglediv()"><i class="fas fa-sort-down"></i></span>

                        <div class="col-md-12 hos-fac-toggle-div toggle-div">
                                <div class="row">
                                        <div v-for="fac in fac_list" :key="fac.id" class="col-md-6 m-b-20">
                                                <label>
                                                <input type="checkbox" name="facility" :class="'facility-'+fac.id"  v-bind:value="fac.id" @click="facilityCheck(fac.id)" v-model="fac.checked">
                                                {{fac.description}}
                                                </label>
                                        </div>
                                </div>                                        
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="heading-lbl">こだわりの特長<span class="error">*</span></label>
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

                    <div class="form-group">
                            <label class="heading-lbl">公式サイト</label>
                            <input type="text" name="official-website" class="form-control website" v-model="hospital_info.website">
                    </div>

                    <div class="form-group">
                            <label class="heading-lbl">混雑状況</label>
                            <textarea name="congestion" class="form-control congestion" v-model="hospital_info.congestion"></textarea>
                    </div>

                    <div class="form-group">
                        <label  class="heading-lbl">地図</label> 
                        <span class="btn all-btn main-bg-color m-l-10" style="min-width: 0px;" @click="maptogglediv()"><i class="fas fa-sort-down"></i></span>

                        <div class="map-toggle-div toggle-div">
                                <div class="col-md-12">
                                    <GoogleMap></GoogleMap>
                                </div>
                                <div class="form-group">
                                        <label>郵便番号<span class="error">*</span></label>
                                        <input type="text" v-model="this.postal" name="postal" class="postal form-control" id="postal" v-on:keyup="getPostal" placeholder="郵便番号を入力してください。" maxlength="7"/>
                                        <div id="jsErrorMessage"></div>
                                </div>
                                <div class="form-group">
                                        <label>市区町村、番地（建物名）:<span class="error sp1">必須</span></label>
                                        <input type="text" id="city" name="city" class="city form-control" placeholder="市区町村、番地を入力してください。" v-model="this.city">
                                        <!-- <span v-if="errors.city" class="error">{{errors.city[0]}}</span> -->
                                        <!-- <input type="text" class="form-control" id="city" placeholder="市区町村、番地を入力してください。" v-model="zipStreet"> -->
                                        <p>例）東京都千代田区丸の内1-9-1　グラントウキョウノースタワー40階</p>
                                </div>
                                <div class="form-group">
                                        <label>住所<span class="error">*</span></label>
                                        <textarea name="address" rows="10" class="form-control customer-address" v-model="customer_info.address"></textarea>
                                </div>
                                <div class="form-group">
                                        <label>交通 / アクセス<span class="error">*</span></label>
                                        <textarea name="access" rows="10" class="form-control access" v-model="hospital_info.access"></textarea>
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
                            <span class="btn news-post-btn all-btn m-t-15" @click="Create_Profile()">Create</span>
                            <!-- <a href="" class="btn news-post-btn all-btn">ニュースを投稿する</a> -->
                    </div>
            </div>               
    </form>
</div>
</template>

<script>
import GoogleMap from './GoogleMap.vue'
export default {
        components: {
        GoogleMap,
        },
       data() {
                return {
                        fac_list: [],
                        img_arr:[],img_list:[], 
                        video_arr:[], video_list:[],gallery_list:[],
                        feature_list:[],
                        profile_type:'hospital',id : 1, // test_id
                        shedule_am:[],shedule_pm:[],
                        schedule_list:[],
                        customer_info:[],
                        hospital_info:[],
                        city: '',
                        postal: ''
                }
        },
        created(){

                this.axios
                .get('/api/customerinfo/'+this.id)
                .then(response=>{
                        this.customer_info = response.data;
                });

                
                this.axios
                .get('/api/hospitalinfo/'+this.id)
                .then(response=>{
                        this.hospital_info = response.data;
                });

                this.axios
                .get('/api/hospital-pgallery/'+this.id)
                .then(response=>{
                        this.img_arr = response.data;
                });

                //  this.axios
                // .get('/api/schedule/'+this.id)
                // .then(response=>{
                //         this.img_arr = response.data;
                // });

                this.axios
                .get('/api/hospital-vgallery/'+this.id)
                .then(response=>{
                        this.video_arr = response.data;
                });

                this.axios
                .get('/api/feature/'+this.profile_type+'/'+this.id)
                .then(response=>{
                        // console.log(response.data);
                        this.feature_list = response.data;
                });

                 this.axios
                .get('/api/facility/'+this.profile_type+'/'+this.id)
                .then(response=>{
                        // console.log(response.data);
                        this.fac_list = response.data;
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

            preview_image(img_class) {
                   $("."+img_class).html("<img src='"+URL.createObjectURL(event.target.files[0])+"' class='img-fluid hospital-image'>");
            },
            facilityCheck(check_id) {
                    $('.facility-'+check_id).attr('checked','true');
            },
            featureCheck(check_id) {
                    $('.feature-'+check_id).attr('checked','true');
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
            
            specialFeAdd() {
                     $(".special-feature-toggle-div").toggle('medium');
            },
            Create_Profile () {
                    this.img_list = [];
                    this.video_list = [];
                    this.gallery_list = [];
                    this.customer_info = [];
                    this.hospital_info = [];

                    var name = $('.customer-name').val();
                    var email = $('.customer-email').val();
                    var phone = $('.customer-phone').val();
                    var address = $('.customer-address').val();
                    this.customer_info.push({name:name,email:email,phone:phone,address:address});

                    
                    var access = $('.access').val();
                    var subject = $('.subject').val();
                    var specialist = $('.specialist').val();
                    var details_info = $('.details-info').val();
                    var close_day = $('.close-day').val();
                    var website = $('.website').val();
                    var congestion = $('.congestion').val();
                   
               
                    var img = document.getElementsByClassName('gallery-area-photo');
                        for(var i = 0; i< img.length; i++) {
                           this.img_list.push({type:"photo",photo:img[i].getElementsByClassName('hospital-image')[0].src,title:img[i].getElementsByClassName('title')[0].value, description:img[i].getElementsByClassName('description')[0].value});
                        }
                       

                    var video = document.getElementsByClassName('gallery-area-video');
                        for(var i = 0; i< video.length; i++) {
                           this.video_list.push({type:"video",photo:video[i].getElementsByClassName('url')[0].value,title:video[i].getElementsByClassName('title')[0].value, description:video[i].getElementsByClassName('description')[0].value});
                        }
                        
                     this.gallery_list = this.img_list.concat(this.video_list);

                     var chek_feature = [];
                     var special_features ;
                        $.each($("input[name='special-features']:checked"), function(){ 
                                chek_feature.push($(this).val());
                        });
                
                        special_features = chek_feature.join(',');
        

                     var chek_facility = [];
                     var facilities ;
                        $.each($("input[name='facility']:checked"), function(){ 
                               chek_facility.push($(this).val());
                        });

                        facilities = chek_facility.join(',');

                     // Consultation
                     for(var j = 0; j< 2; j++) {
                        for(var i = 0; i< 7; i++) {
                                if(j == 0) { this.shedule_am[i] = $('.form-control.am-from'+i+'').val() + '-' + $('.form-control.am-to'+i+'').val(); } 
                                if(j == 1) { this.shedule_pm[i] = $('.form-control.pm-from'+i+'').val() + '-' + $('.form-control.pm-to'+i+'').val(); }
                        }

                        if(j == 0) { this.schedule_list.push(this.shedule_am); }
                        if(j == 1) { this.schedule_list.push(this.shedule_pm); }
                      }
                      console.log(this.schedule_list);

                       this.hospital_info.push({access:access,subject:subject,specialist:specialist,details_info:details_info,close_day:close_day,website:website,
                       congestion:congestion,special_features:special_features,facilities:facilities});

                        this.axios
                                .post(`/api/hospital/galleryupdate/${this.id}`,this.gallery_list)
                                        .then((response) => {
                                        
                                        }).catch(error=>{

                                        if(error.response.status == 422){

                                        this.errors = error.response.data.errors

                                }
                        }) ;

                        this.axios
                                .post(`/api/customer/profile/${this.id}`,this.customer_info)
                                        .then((response) => {
                                        alert('Successfully Updated!')
                                        }).catch(error=>{

                                        if(error.response.status == 422){

                                        this.errors = error.response.data.errors

                                }
                        }) ;

                        this.axios
                                .post(`/api/hospital/profile/${this.id}`,this.hospital_info)
                                        .then((response) => {
                                
                                        }).catch(error=>{

                                        if(error.response.status == 422){

                                        this.errors = error.response.data.errors

                                }
                        }) ;

                        this.axios
                                .post(`/api/schedule/update/${this.id}`,this.schedule_list)
                                        .then((response) => {
                                
                                        }).catch(error=>{

                                        if(error.response.status == 422){

                                        this.errors = error.response.data.errors

                                }
                        }) ;
            },
            getPostal: function(event) {
                if (this.postal.length > 4) {
                    var postal = this.postal;
                    this.axios
                        .post('/api/hospital/postList/' + postal)
                        .then(response => {
                            var post_data = response.data;
                            var length = response.data.length;
                            if (length > 0) {
                                var pref = post_data[0]['city_id'];
                                if (post_data[0]['street'] == '') {
                                    this.city = post_data[0]['city'];
                                } else {
                                    this.city = post_data[0]['city'] + ' - ' + post_data[0]['street'];
                                }
                                // this.comments.selectedValue = pref;
                                // this.comments.division = pref;
                            } else {
                                this.city = '';
                                // this.comments.selectedValue = 0;
                                $('#jsErrorMessage').html('<div class="error">郵便番号の書式を確認してください。</div>');
                            }
                        });
                }
            },

        }
}

</script>