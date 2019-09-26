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
                            <textarea name="medicaldepartment" class="form-control"></textarea>
                    </div>

                    <div class="form-group">
                            <label class="heading-lbl">専門医<span class="error">*</span></label>
                            <textarea name="specialist" class="form-control"></textarea>
                    </div>

                    <div class="form-group">
                            <label class="heading-lbl">医院からのお知らせ<span class="error">*</span></label>
                            <textarea name="detailsinfo" class="form-control"></textarea>
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
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                        </tr>
                                        <tr>
                                                <td>Tuesday</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                        </tr>
                                        <tr>
                                                <td>Wed</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                        </tr>
                                        <tr>
                                                <td>Thu</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                        </tr>
                                        <tr>
                                                <td>Friday</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                        </tr>
                                        <tr>
                                                <td>Sat</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                        </tr>
                                        <tr>
                                                <td>Sunday</td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                        </tr>
                                </table>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="heading-lbl">休診日</label>
                        <textarea name="close-day" class="form-control"></textarea>
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
                            <input type="text" name="official-website" class="form-control">
                    </div>

                    <div class="form-group">
                            <label class="heading-lbl">混雑状況</label>
                            <textarea name="congestion" class="form-control"></textarea>
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
                                        <textarea name="address" rows="10" class="form-control"></textarea>
                                </div>
                                <div class="form-group">
                                        <label>交通 / アクセス<span class="error">*</span></label>
                                        <textarea name="address" rows="10" class="form-control"></textarea>
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
                        video_arr:[], video_list:[],
                        feature_list:[],
                        profile_type:'hospital',id : 1, // test_id
                }
        },
        created(){
                this.axios
                .get('/api/customersinfo')
                .then(response=>{
                this.fac_list = response.data;
                });

                this.axios
                .get('/api/facilities')
                .then(response=>{
                this.fac_list = response.data;
                });

                this.axios
                .get('/api/hospital-pgallery/'+this.id)
                .then(response=>{
                        this.img_arr = response.data;
                });

                this.axios
                .get('/api/hospital-vgallery/'+this.id)
                .then(response=>{
                        this.video_arr = response.data;
                });

                this.axios
                .get('/api/feature/'+this.profile_type+'/'+this.id)
                .then(response=>{
                        console.log(response.data);
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

            preview_image(img_class) {
                   $("."+img_class).html("<img src='"+URL.createObjectURL(event.target.files[0])+"' class='img-fluid hospital-image'>");
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

                    var img = document.getElementsByClassName('gallery-area-photo');
                        for(var i = 0; i< img.length; i++) {
                           this.img_list.push({img:img[i].getElementsByClassName('hospital-image')[0].src,title:img[i].getElementsByClassName('title')[0].value, description:img[i].getElementsByClassName('description')[0].value});
                        }
                        console.log(this.img_list);

                    var video = document.getElementsByClassName('gallery-area-video');
                        for(var i = 0; i< video.length; i++) {
                           this.video_list.push({url:video[i].getElementsByClassName('url')[0].value,title:video[i].getElementsByClassName('title')[0].value, description:video[i].getElementsByClassName('description')[0].value});
                        }
                        console.log(this.video_list);

                     var chek_feature = [];
                        $.each($("input[name='special-features']:checked"), function(){ 
                                chek_feature.push({ feature: $(this).val()});
                        });
                        console.log(chek_feature);return;
            }

        }
}

</script>