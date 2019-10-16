<template>

  <div class="card profile m-t-22 " style="border:none;">
    <form class="col-md-12 form-class">
     <div class="col-md-12 pad-free">

        <div class="form-group form-group-wrapper">

                <label class="heading-lbl">名前<span class="error">*</span></label>

                <input type="text" class="form-control customer-name col-10 float-right" placeholder="Name" v-model="customer_info.name">

        </div>

        <div class="form-group form-group-wrapper">

                <label class="heading-lbl">メールアドレス<span class="error">*</span></label>

                <input type="text" class="form-control customer-email col-10 float-right"  placeholder="Email" v-model="customer_info.email">
        </div>
        <div class="form-group form-group-wrapper">

                <label class="heading-lbl">電話番号<span class="error">*</span></label>

                <input type="text" class="form-control customer-phone col-10 float-right"  placeholder="Phone" v-model="customer_info.phone">

        </div>

        <!-- <div class="form-group">
                <label>フォトアルバム<span class="error">*</span></label>
                <input type="file" class="" value="Upload Photo" id="upload_file" @change="preview_image();" multiple>
                <div class="col-md-12">
                        <div class="row" id="image_preview"></div>
                </div>
        </div>-->



        <div class="form-group form-group-wrapper">

          <label class="heading-lbl col-2 pad-free">フォトアルバム</label>

          <span class="btn all-btn main-bg-color" style="min-width: 0px;" @click="galleryAdd()">

            <i class="fas fa-plus-circle"></i> 追加

          </span>

          <div class="col-md-12">

            <div class="row" id="gallery-photo">

              <!-- Add by + Button -->

              <div

                class="col-md-6 gallery-area-photo"

                v-bind:id="'photo'+indx"

                v-for="(img,indx) in img_arr"

                :key="img.id"

              >

                <div class="col-md-3">

                  <input type="file" name class="hospital-photo m-b-15" v-bind:class="img.classname" id="upload_img" @change="preview_image(img.classname)" />

                  <div class="col-md-12" v-bind:class="img.classname">

                    <input type="hidden" class="already-photo" v-model="img.photo" />

                    <img :src="'/upload/hospital_profile/'+ img.photo" class="img-fluid hospital-image" alt="profile" v-if="img.photo" />

                  </div>

                </div>

                <div class="col-md-12">

                  <input type="text" name="title" placeholder="タイトル" class="form-control m-b-15 title white-bg-color" v-model="img.title" />

                  <textarea name="description" placeholder="コンテンツ" class="form-control m-b-15 description white-bg-color" v-model="img.description" ></textarea>

                </div>
                <div class="col-md-12 text-right">
                  <a class="mr-auto text-danger btn delete-borderbtn" @click="DeltArr(indx,'photo')">
                    <i class="fa fa-trash"></i> 削除
                  </a>
                 </div>

              </div>

            </div>

          </div>

        </div>

        <div class="form-group form-group-wrapper">

          <label class="heading-lbl col-2 pad-free">動画</label>

          <span class="btn all-btn main-bg-color" style="min-width: 0px;" @click="galleryVideoAdd()" >

            <i class="fas fa-plus-circle"></i> 追加

          </span>

          <div class="col-md-12">

            <div class="row" id="gallery-video">

              <!-- Add by + Button -->

              <div class="col-md-6 gallery-area-video" v-bind:id="'video'+indx" v-for="(video,indx) in video_arr" :key="video.id" >

                <div class="col-md-12">

                  <input type="text" name="url" placeholder="url" class="form-control m-b-15 video-url white-bg-color" v-model="video.url" />

                </div>

                <div class="col-md-12">

                  <input type="text" name="title" placeholder="タイトル" class="form-control m-b-15 title white-bg-color" v-model="video.title" />

                  <textarea name="description" placeholder="コンテンツ" class="form-control m-b-15 description white-bg-color" v-model="video.description" ></textarea>

                </div>
                <div class="col-md-12 text-right">
                  <a class="mr-auto text-danger btn delete-borderbtn" @click="DeltArr(indx,'video')">

                  <i class="fa fa-trash"></i> 削除

                  </a>
                </div>

              </div>

            </div>

          </div>

        </div>

        <!-- <div class="form-group form-group-wrapper row ml-0 mr-0">
          <label class="heading-lbl col-2 pad-free">
            診療科目
            <span class="error">*</span>
          </label>
          <textarea
            name="medicaldepartment"
            class="form-control col-10 white-bg-color subject"
            v-model="hospital_info.subject"
          ></textarea>
        </div> -->

        <!-- test -->
        <table class="table table-bordered table-wrapper">
            <tr>
                <td>
                    <div class="form-group">
                        <label  class="heading-lbl col-2 pad-free">診療科目</label>
                        <span class="btn all-btn main-bg-color" style="min-width: 0px;" @click="clinicalSubject()"><i class="fas fa-sort-down animate" :class="{'rotate': isRotate1}"></i></span>
                        <div class="col-md-10 float-right clinical-subject-toggle-div toggle-div m-t-10">
                            <div class="row">
                                <div v-for="subj in clinical_subj" :key="subj.id" class="col-md-3 m-b-20">
                                    <label>
                                        <input type="checkbox"  name="subject" v-bind:value="subj.id" @click="subjectCheck(subj.id)" v-model="subj.checked">
                                          {{subj.name}}
                                    </label>
                                </div>
                            </div>                                        
                        </div>
                    </div>
                </td>
              </tr>
          </table>
        <!-- end -->



        <div class="form-group form-group-wrapper row ml-0 mr-0">

          <label class="heading-lbl col-2 pad-free">

            専門医

            <span class="error">*</span>

          </label>

          <textarea

            name="specialist"

            class="form-control col-10 specialist white-bg-color"

            v-model="hospital_info.specialist"

          ></textarea>

        </div>
        <table class="table table-bordered table-wrapper">
          <tr>
                  <td class="width17" style="border:none;"> <label class="heading-lbl pad-free"> 医院からのお知らせ<span class="error">*</span></label></td>
                  <td style="border:none;">
                          <!-- <textarea name="feature" id="" cols="30" rows="10" ></textarea> -->
                          <quill-editor  ref="myQuilEditor" name="detailsinfo" class="details-info" v-model="hospital_info.details_info" :options="editorOption"/>
                  </td>
          </tr>
        </table>   
        <!-- <div class="form-group">
                            <label class="heading-lbl">診療科目<span class="error">*</span></label>
                            <textarea name="subject" class="form-control"></textarea>
        </div>-->

        <table class="table table-bordered table-wrapper">

          <tr>

            <td>

              <label class="heading-lbl col-2 pad-free">診療時間</label>

              <span

                class="btn all-btn main-bg-color"

                style="min-width: 0px;"

                @click="scheduletogglediv()"

              >

                <i class="fas fa-sort-down animate" :class="{'rotate': isRotate2}"></i>

              </span>

              <div class="col-md-10 float-right m-t-10 schedule-toggle-div toggle-div pad-free">

                <div class="col-12">

                  <div class="row">

                    <table class="table table-striped table-bordered">

                      <tr>

                        <th>&nbsp;</th>

                        <th class="text-center">午前</th>

                        <th class="text-center">午後</th>

                      </tr>

                      <tr>

                        <td>月</td>

                        <td>

                          <div class="row">

                            <div class="col-lg-6">

                              <span>から:</span>

                              <input

                                type="text"

                                class="form-control am-from0 white-bg-color"

                                v-model="schedule_arr.am_mon_from"

                              />

                            </div>

                            <div class="col-lg-6">

                              <span>まで:</span>

                              <input

                                type="text"

                                class="form-control am-to0 white-bg-color"

                                v-model="schedule_arr.am_mon_to"

                              />

                            </div>

                          </div>

                        </td>

                        <td>

                          <div class="row">

                            <div class="col-lg-6">

                              <span>から:</span>

                              <input

                                type="text"

                                class="form-control pm-from0 white-bg-color"

                                v-model="schedule_arr.pm_mon_from"

                              />

                            </div>

                            <div class="col-lg-6">

                              <span>まで:</span>

                              <input

                                type="text"

                                class="form-control pm-to0 white-bg-color"

                                v-model="schedule_arr.pm_mon_to"

                              />

                            </div>

                          </div>

                        </td>

                      </tr>

                      <tr>

                        <td>火</td>

                        <td>

                          <div class="row">

                            <div class="col-lg-6">

                              <span>から:</span>

                              <input

                                type="text"

                                class="form-control am-from1 white-bg-color"

                                v-model="schedule_arr.am_tue_from"

                              />

                            </div>

                            <div class="col-lg-6">

                              <span>まで:</span>

                              <input

                                type="text"

                                class="form-control am-to1 white-bg-color"

                                v-model="schedule_arr.am_tue_to"

                              />

                            </div>

                          </div>

                        </td>

                        <td>

                          <div class="row">

                            <div class="col-lg-6">

                              <span>から:</span>

                              <input

                                type="text"

                                class="form-control pm-from1 white-bg-color"

                                v-model="schedule_arr.pm_tue_from"

                              />

                            </div>

                            <div class="col-lg-6">

                              <span>まで:</span>

                              <input

                                type="text"

                                class="form-control pm-to1 white-bg-color"

                                v-model="schedule_arr.pm_tue_to"

                              />

                            </div>

                          </div>

                        </td>

                      </tr>

                      <tr>

                        <td>水</td>

                        <td>

                          <div class="row">

                            <div class="col-lg-6">

                              <span>から:</span>

                              <input

                                type="text"

                                class="form-control am-from2 white-bg-color"

                                v-model="schedule_arr.am_wed_from"

                              />

                            </div>

                            <div class="col-lg-6">

                              <span>まで:</span>

                              <input

                                type="text"

                                class="form-control am-to2 white-bg-color"

                                v-model="schedule_arr.am_wed_to"

                              />

                            </div>

                          </div>

                        </td>

                        <td>

                          <div class="row">

                            <div class="col-lg-6">

                              <span>から:</span>

                              <input

                                type="text"

                                class="form-control pm-from2 white-bg-color"

                                v-model="schedule_arr.pm_wed_from"

                              />

                            </div>

                            <div class="col-lg-6">

                              <span>まで:</span>

                              <input

                                type="text"

                                class="form-control pm-to2 white-bg-color"

                                v-model="schedule_arr.pm_wed_to"

                              />

                            </div>

                          </div>

                        </td>

                      </tr>

                      <tr>

                        <td>木</td>

                        <td>

                          <div class="row">

                            <div class="col-lg-6">

                              <span>から:</span>

                              <input

                                type="text"

                                class="form-control am-from3 white-bg-color"

                                v-model="schedule_arr.am_thu_from"

                              />

                            </div>

                            <div class="col-lg-6">

                              <span>まで:</span>

                              <input

                                type="text"

                                class="form-control am-to3 white-bg-color"

                                v-model="schedule_arr.am_thu_to"

                              />

                            </div>

                          </div>

                        </td>

                        <td>

                          <div class="row">

                            <div class="col-lg-6">

                              <span>から:</span>

                              <input

                                type="text"

                                class="form-control pm-from3 white-bg-color"

                                v-model="schedule_arr.pm_thu_from"

                              />

                            </div>

                            <div class="col-lg-6">

                              <span>まで:</span>

                              <input

                                type="text"

                                class="form-control pm-to3 white-bg-color"

                                v-model="schedule_arr.pm_thu_to"

                              />

                            </div>

                          </div>

                        </td>

                      </tr>

                      <tr>

                        <td>金</td>

                        <td>

                          <div class="row">

                            <div class="col-lg-6">

                              <span>から:</span>

                              <input

                                type="text"

                                class="form-control am-from4 white-bg-color"

                                v-model="schedule_arr.am_fri_from"

                              />

                            </div>

                            <div class="col-lg-6">

                              <span>まで:</span>

                              <input

                                type="text"

                                class="form-control am-to4 white-bg-color"

                                v-model="schedule_arr.am_fri_to"

                              />

                            </div>

                          </div>

                        </td>

                        <td>

                          <div class="row">

                            <div class="col-lg-6">

                              <span>から:</span>

                              <input

                                type="text"

                                class="form-control pm-from4 white-bg-color"

                                v-model="schedule_arr.pm_fri_from"

                              />

                            </div>

                            <div class="col-lg-6">

                              <span>まで:</span>

                              <input

                                type="text"

                                class="form-control pm-to4 white-bg-color"

                                v-model="schedule_arr.pm_fri_to"

                              />

                            </div>

                          </div>

                        </td>

                      </tr>

                      <tr>

                        <td>土</td>

                        <td>

                          <div class="row">

                            <div class="col-lg-6">

                              <span>から:</span>

                              <input

                                type="text"

                                class="form-control am-from5 white-bg-color"

                                v-model="schedule_arr.am_sat_from"

                              />

                            </div>

                            <div class="col-lg-6">

                              <span>まで:</span>

                              <input

                                type="text"

                                class="form-control am-to5 white-bg-color"

                                v-model="schedule_arr.am_sat_to"

                              />

                            </div>

                          </div>

                        </td>

                        <td>

                          <div class="row">

                            <div class="col-lg-6">

                              <span>から:</span>

                              <input

                                type="text"

                                class="form-control pm-from5 white-bg-color"

                                v-model="schedule_arr.pm_sat_from"

                              />

                            </div>

                            <div class="col-lg-6">

                              <span>まで:</span>

                              <input

                                type="text"

                                class="form-control pm-to5 white-bg-color"

                                v-model="schedule_arr.pm_sat_to"

                              />

                            </div>

                          </div>

                        </td>

                      </tr>

                      <tr>

                        <td>日</td>

                        <td>

                          <div class="row">

                            <div class="col-lg-6">

                              <span>から:</span>

                              <input

                                type="text"

                                class="form-control am-from6 white-bg-color"

                                v-model="schedule_arr.am_sun_from"

                              />

                            </div>

                            <div class="col-lg-6">

                              <span>まで:</span>

                              <input

                                type="text"

                                class="form-control am-to6 white-bg-color"

                                v-model="schedule_arr.am_sun_to"

                              />

                            </div>

                          </div>

                        </td>

                        <td>

                          <div class="row">

                            <div class="col-lg-6">

                              <span>から:</span>

                              <input

                                type="text"

                                class="form-control pm-from6 white-bg-color"

                                v-model="schedule_arr.pm_sun_from"

                              />

                            </div>

                            <div class="col-lg-6">

                              <span>まで:</span>

                              <input

                                type="text"

                                class="form-control pm-to6 white-bg-color"

                                v-model="schedule_arr.pm_sun_to"

                              />

                            </div>

                          </div>

                        </td>

                      </tr>

                    </table>

                  </div>

                </div>

              </div>

            </td>

          </tr>

        </table>



        <div class="form-group form-group-wrapper row ml-0 mr-0">

          <label class="heading-lbl col-2 pad-free">休診日</label>

          <textarea

            name="close-day"

            class="form-control white-bg-color close-day col-10"

            v-model="hospital_info.closed_day"

          ></textarea>

        </div>



        <table class="table table-bordered table-wrapper">

          <tr>

            <td>

              <div class="form-group">

                <label class="heading-lbl col-2 pad-free">施設情報</label>

                <span

                  class="btn all-btn main-bg-color"

                  style="min-width: 0px;"

                  @click="factogglediv()"

                >

                  <i class="fas fa-sort-down animate"  :class="{'rotate': isRotate3}"></i>

                </span>



                <div class="col-md-10 float-right hos-fac-toggle-div toggle-div m-t-10">

                  <div class="row">

                    <div v-for="fac in fac_list" :key="fac.id" class="col-md-3 m-b-20">

                      <label>

                        <input

                          type="checkbox"

                          name="facility"

                          :class="'facility-'+fac.id"

                          v-bind:value="fac.id"

                          @click="facilityCheck(fac.id)"

                          v-model="fac.checked"

                        />

                        {{fac.description}}

                      </label>

                    </div>

                  </div>

                </div>

              </div>

            </td>

          </tr>

        </table>



        <table class="table table-bordered table-wrapper">

          <tr>

            <td>

              <div class="form-group">

                <label class="heading-lbl col-2 pad-free">

                  こだわりの特長

                  <span class="error">*</span>

                </label>

                <span

                  class="btn all-btn main-bg-color"

                  style="min-width: 0px;"

                  @click="specialFeAdd()"

                >

                  <i class="fas fa-sort-down animate" :class="{rotate:isRotate4}"></i>

                </span>



                <div class="col-md-10 float-right special-feature-toggle-div toggle-div m-t-10">

                  <div class="row">

                    <div v-for="feat in feature_list" :key="feat.id" class="col-md-3 m-b-20">

                      <label>

                        <input

                          type="checkbox"

                          name="special-features"

                          :class="'feature-'+feat.id"

                          v-bind:value="feat.id"

                          @click="featureCheck(feat.id)"

                          v-model="feat.checked"

                        />

                        {{feat.name}}

                      </label>

                    </div>

                  </div>

                </div>

              </div>

            </td>

          </tr>

        </table>



        <div class="form-group form-group-wrapper row ml-0 mr-0">

          <label class="heading-lbl col-2 pad-free">公式サイト</label>

          <input

            type="text"

            name="official-website"

            class="form-control col-10 website white-bg-color"

            v-model="hospital_info.website"

          />

        </div>



        <div class="form-group form-group-wrapper row mr-0 ml-0">

          <label class="heading-lbl col-2 pad-free">混雑状況</label>

          <textarea

            name="congestion"

            class="form-control col-10 congestion white-bg-color"

            v-model="hospital_info.congestion"

          ></textarea>

        </div>



        <!-- <div class="form-group form-group-wrapper">
          <label class="heading-lbl">地図</label>
          <span
            class="btn all-btn main-bg-color m-l-10"
            style="min-width: 0px;"
            @click="maptogglediv()"
          >
            <i class="fas fa-sort-down"></i>
          </span>
          <div class="map-toggle-div toggle-div">
            <div class="col-md-12">
              <GoogleMap></GoogleMap>
            </div>
            <div class="form-group">
              <label>
                郵便番号
                <span class="error">*</span>
              </label>
              <input
                type="text"
                v-model="this.postal"
                name="postal"
                class="postal form-control"
                id="postal"
                v-on:keyup="getPostal"
                placeholder="郵便番号を入力してください。"
                maxlength="7"
              />
              <div id="jsErrorMessage"></div>
            </div>
            <div class="form-group">
              <label>
                市区町村、番地（建物名）:
                <span class="error sp1">必須</span>
              </label>
              <input
                type="text"
                id="city"
                name="city"
                class="city form-control"
                placeholder="市区町村、番地を入力してください。"
                v-model="this.city"
        />-->

        <!-- <span v-if="errors.city" class="error">{{errors.city[0]}}</span> -->

        <!-- <input type="text" class="form-control" id="city" placeholder="市区町村、番地を入力してください。" v-model="zipStreet"> -->

        <!-- <p>例）東京都千代田区丸の内1-9-1 グラントウキョウノースタワー40階</p>
            </div>
            <div class="form-group">
              <label>
                住所
                <span class="error">*</span>
              </label>
              <textarea
                name="address"
                rows="10"
                class="form-control customer-address"
                v-model="customer_info.address"
              ></textarea>
            </div>
            <div class="form-group">
              <label>
                交通 / アクセス
                <span class="error">*</span>
              </label>
              <textarea
                name="access"
                rows="10"
                class="form-control access"
                v-model="hospital_info.access"
              ></textarea>
            </div>
          </div>
        </div>-->



        <table class="table table-bordered table-wrapper">

          <tr>

            <td>

              <label class="heading-lbl col-2 pad-free">地図</label>

              <span

                class="btn all-btn main-bg-color"

                style="min-width: 0px;"

                @click="maptogglediv()"

              >

                <i class="fas fa-sort-down animate" :class="{rotate:isRotate5}"></i>

              </span>

              <div class="col-md-10 float-right m-t-10 map-toggle-div toggle-div pad-free">

                <div class="col-md-12">

                  <GoogleMap></GoogleMap>



                  <div class="form-group">

                    <label>
                      交通 / アクセス

                      <span class="error">*</span>

                    </label>

                    <textarea

                      name="access"

                      rows="10"

                      class="form-control access white-bg-color"

                      v-model="hospital_info.access"

                    ></textarea>

                  </div>

                </div>

              </div>

            </td>

          </tr>

        </table>



        <!-- Consultation -->



        <!-- End Consultation -->



        <!-- Facilities -->



        <!-- End Facilities -->



        <!-- <hr class="hor-line m-t-30"> -->



        <!-- <hr class="hor-line m-t-30"> -->



        <!-- Map -->



        <!-- End Map -->



        <div class="row col-2 col-offset-6 mx-auto">

          <span class="btn secondary-bg-color col-12 all-btn m-t-15 pad-10" @click="Create_Profile()">作成</span>

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
                        img_arr:[],img_list:[],
                        video_arr:[], video_list:[],gallery_list:[],
                        feature_list:[],
                        profile_type:'hospital',
                        id:2, // test_id
                        schedule_arr:[],shedule_am:[],shedule_pm:[],
                        schedule_list:[],
                        customer_info:[],
                        hospital_info:[],
                        city: '',
                        postal: '',clinical_subj:[],
                        isRotate1: false,
                        isRotate2: false,
                        isRotate3: false,
                        isRotate4: false,
                        isRotate5: false,
                }
        },
        created(){
                this.axios
                .get('/api/clinical-subject/'+this.id)
                .then(response=>{
                        this.clinical_subj = response.data;
                });
                 this.axios
                .get('/api/schedule/'+this.id)
                .then(response=>{
                        this.schedule_arr = response.data;
                });
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
                this.axios
                .get('/api/hospital-vgallery/'+this.id)
                .then(response=>{
                        this.video_arr = response.data;
                });
                this.axios
                .get('/api/feature/'+this.profile_type+'/'+this.id)
                .then(response=>{
                        this.feature_list = response.data;
                });
                this.axios
                .get('/api/facility/'+this.profile_type+'/'+this.id)
                .then(response=>{
                        this.fac_list = response.data;
                });
                quill.editor.disable()
        },
        methods: {
            scheduletogglediv() {
                    $(".schedule-toggle-div").toggle('medium');
                    this.isRotate2 = !this.isRotate2;
            },
            maptogglediv() {
                    $(".map-toggle-div").toggle('medium');
                    this.isRotate5 = !this.isRotate5;
            },
            factogglediv() {
                    $(".hos-fac-toggle-div").toggle('medium');
                    this.isRotate3 = !this.isRotate3;
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
            subjectCheck(check_id) {
                    $('.subject-'+check_id).attr('checked','true');
            },
            clinicalSubject() {
                     $(".clinical-subject-toggle-div").toggle('medium');
                     this.isRotate1 = !this.isRotate1;
                     
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
                    this.img_arr.push({classname:classname,phoまで:'',title:'',description:''});
            },
            galleryVideoAdd() {
                   this.video_arr.push({title:'',description:'',url:''});
            },
            specialFeAdd() {
                     $(".special-feature-toggle-div").toggle('medium');
                     this.isRotate4 = !this.isRotate4;
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
                    var address = $('#city').val();
      
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
                           var file = img[i].getElementsByClassName('hospital-photo')[0].files[0];
                         if(file) {
                                var file_name = file.name;
                                let fd = new FormData();
                                        fd.append('file' ,file )
                                        fd.append('photo' ,file_name )
                                        this.axios.post('/api/hospital/movephoto', fd)
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
                           this.img_list.push({type:"photo",phoまで:file_name,title:img[i].getElementsByClassName('title')[0].value, description:img[i].getElementsByClassName('description')[0].value});
                        }
                    var video = document.getElementsByClassName('gallery-area-video');
                        for(var i = 0; i< video.length; i++) {
                           this.video_list.push({type:"video",phoまで:video[i].getElementsByClassName('url')[0].value,title:video[i].getElementsByClassName('title')[0].value, description:video[i].getElementsByClassName('description')[0].value});
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
                    
                    var chek_subj = [];
                    var subjects ;
                        $.each($("input[name='subject']:checked"), function(){
                               chek_subj.push($(this).val());
                        });
                        subjects = chek_subj.join(',');
                     // Consultation
                     for(var j = 0; j< 2; j++) {
                        for(var i = 0; i< 7; i++) {
                                if(j == 0) { this.shedule_am[i] = $('.form-control.am-from'+i+'').val() + '-' + $('.form-control.am-to'+i+'').val(); }
                                if(j == 1) { this.shedule_pm[i] = $('.form-control.pm-from'+i+'').val() + '-' + $('.form-control.pm-to'+i+'').val(); }
                        }
                        if(j == 0) { this.schedule_list.push(this.shedule_am); }
                        if(j == 1) { this.schedule_list.push(this.shedule_pm); }
                      }
                       this.hospital_info.push({access:access,specialist:specialist,details_info:details_info,close_day:close_day,website:website,
                       congestion:congestion,special_features:special_features,facilities:facilities,subjects:subjects});
                        // if(this.gallery_list.length > 0) {
                        //         this.axios
                        //                 .post(`/api/hospital/galleryupdate/${this.id}`,this.gallery_list)
                        //                         .then((response) => {
                        //                         }).catch(error=>{
                        //                         if(error.response.status == 422){
                        //                         this.errors = error.response.data.errors
                        //                 }
                        //         }) ;
                        // }
                        if(this.customer_info.length > 0) {
                                this.axios
                                        .post(`/api/customer/profile/${this.id}`,this.customer_info)
                                                .then((response) => {
                                                alert('Successfully Updated!')
                                                }).catch(error=>{
                                                if(error.response.status == 422){
                                                this.errors = error.response.data.errors
                                        }
                                }) ;
                        }
                        if(this.hospital_info.length > 0) {
                                this.axios
                                        .post(`/api/hospital/profile/${this.id}`,this.hospital_info)
                                                .then((response) => {
                                                }).catch(error=>{
                                                if(error.response.status == 422){
                                                this.errors = error.response.data.errors
                                        }
                                }) ;
                        }
                        if(this.schedule_list.length > 0) {
                                this.axios
                                        .post(`/api/schedule/update/${this.id}`,this.schedule_list)
                                                .then((response) => {
                                                        alert('Successfully Updated!');
                                                }).catch(error=>{
                                                if(error.response.status == 422){
                                                this.errors = error.response.data.errors
                                }
                        }) ;
                }
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
<style>
 .quill-editor{
          background-color: #fff;
  }
</style>