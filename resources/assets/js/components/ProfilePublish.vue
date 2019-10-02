<template>
  <div id="app">
    <div v-if="type == 'nursing'">
            <div class="col-12 col-lg-12 col-md-10 tab typelabel nav-link fixed-nav">
            <button v-scroll-to="{ el: '#element1'}" class="top-fixed-btn">
                Information
            </button>
            <button v-scroll-to="{ el: '#element2' }" class="top-fixed-btn">
                Features
            </button>
            <button v-scroll-to="{ el: '#element3' }" class="top-fixed-btn">
                Cost
            </button>
            <button v-scroll-to="{ el: '#element4' }" class="top-fixed-btn">
                Equipment
            </button>
            <button v-scroll-to="{ el: '#element5' }" class="top-fixed-btn">
                Map
            </button>
            <button v-scroll-to="{ el: '#element6' }" class="top-fixed-btn">
                Review
            </button>
            <button v-scroll-to="{ el: '#element7' }" class="top-fixed-btn">
                Job Offer
            </button>
            </div>

            <div class="row m-lr-0 ele" id="element1">
                <div class="row list-wrap m-lr-0" v-for="cust in customer" :key="cust.id">
                    <div class="col-lg-3 col-md-4 col-sm-12"><p><strong>Address :</strong></p></div>
                    <div class="col-lg-9 col-md-8 col-sm-12" ><p>{{cust.address}}</p></div>
                    <div class="col-lg-3 col-md-4 col-sm-12"><p><strong>Phone :</strong></p></div>
                    <div class="col-lg-9 col-md-8 col-sm-12" ><p>{{cust.phone}}</p></div>
                </div>

                <h5 class="header">special Features</h5>
                <div class="row m-lr-0">
                    <ul class="fac_container" v-for="special in specialfeature" :key="special.id">
                        <li>{{special.short_name}}</li>
                    </ul>
                </div>
            </div>
            <div class="row ele m-lr-0" id="element2">
                <h5 class="header">Features</h5>
                <div  v-for="nurseprofile in nursing_profiles" :key="nurseprofile.id" class="col-md-8">{{nurseprofile.feature}}</div>
            </div>
            <div class="row ele m-lr-0" id="element3">
                <h5 class="header col-md-12">Cost</h5>
                    <table class="table table-striped table-bordered">
                        <tr>
                            <th>
                                <font>method of payment</font>
                            </th>
                            <td>
                                <font>method of payment test</font> <!-- method field in nursing_profile -->
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
                                    <button class="btn edit-borderbtn okbtn" type="button" data-toggle="collapse" :data-target="'#costDetails' + cost.id">View</button>
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
                        <h2 align="center"> Facility </h2>
                    </div>
                    <div v-for="nus in nusfacilities" :key="nus.id" class="col-md-12 pad-free" >
                        <table border="1" class="table table-bordered">
                            <tbody>
                                <tr>
                                <td> Business entity</td>
                                <td>{{nus.business_entity}}</td>
                            </tr>
                            <tr>
                                <td>Date of establishment</td>
                                <td>{{nus.date_of_establishment}}</td>
                            </tr>
                            <tr>
                                <td> Land rights form </td>
                                <td>{{nus.land_right_form}}</td>
                            </tr>
                            <tr>
                                <td>Building rights form</td>
                                <td>{{nus.building_right_form}}</td>
                            </tr>
                            <tr>
                                <td>Site area</td>
                                <td>{{nus.site_area}}</td>
                            </tr>
                            <tr>
                                <td>Total floor area</td>
                                <td>{{nus.floor_area}}</td>
                            </tr>
                            <tr>
                                <td>Construction</td>
                                <td>{{nus.construction}}</td>
                            </tr>
                            <tr>
                                <td>Capacity</td>
                                <td>{{nus.capacity}}</td>
                            </tr>
                            <tr>
                                <td>Total number of rooms / units </td>
                                <td>{{nus.num_rooms}}</td>
                            </tr>
                            <tr>
                                <td>Right of residence form </td>
                                <td>{{nus.residence_form}}</td>
                            </tr>
                            <tr>
                                <td>Type </td>
                                <td>{{nus.fac_type}}</td>
                            </tr>
                            <tr>
                                <td>Occupancy conditions</td>
                                <td>{{nus.occupancy_condition}}</td>
                            </tr>
                            <tr>
                                <td>Room division, floor plan, etc </td>
                                <td>{{nus.room_floor}}</td>
                            </tr>
                            <tr>
                                <td> Living room facilities</td>
                                <td>{{nus.living_room_facilities}}</td>
                            </tr>
                            <tr>
                                <td>Common facilities / equipment </td>
                                <td>{{nus.equipment}}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                <!-- </div> -->


                        <div class="row" style="width: 100%;" >
                            <div class="col-md-12">
                                <h2 align="center"> Cooperate Medical </h2>
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
                                <h2 align="center"> Medical Acceptance </h2>
                            </div>
                            <div v-for="maccept in medical_acceptance" :key="maccept.id" class="col-md-4" >
                                <div class="col-md-12 accept-box">
                                    <div class="float-left" v-for="(ma,index) in medical" :key="index" style="padding-right:20px;">
                                            <i v-if="ma.name === maccept.name && ma.accept_type === 'accept'" class="fas fa-check green"></i>
                                            <i v-if="ma.name === maccept.name && ma.accept_type === 'noaccept'" class="fas fa-times red"></i>
                                            <i v-if="ma.name === maccept.name && ma.accept_type === 'negotiable'" class="fas fa-adjust blue"></i>
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
                                    Official Site  :
                                </div>
                                <div class="col-md-10 text-left">
                                {{m.website}}
                                </div>

                                <div class="col-md-2 text-left" style="padding-top:20px;" >
                                    Access :
                                </div>
                                <div class="col-md-10 text-left" style="padding-top:20px;">
                                    {{m.access}}
                                </div>

                                <div class="col-md-2 text-left" style="padding-top:20px;" >
                                    City/Township :
                                </div>
                                <div class="col-md-10 text-left" style="padding-top:20px;">
                                    {{m.address}}
                                </div>
                            </div>
                      </div>
                 </div>

            <div class="row ele m-lr-0" id="element6">
               <h5 class="header">Review</h5>
              <div class="row" v-for="comment in comments" :key="comment.id">
                    <div class="col-md-12" style="font-size:20px;">タイトル:{{comment.title}}</div><br/>
                                     <!-- <i class="fas fa-envelope" style='font-size:20px;color:#F4A460'></i> -->
                    <div class="col-md-5" style="font-size:20px;">電子メールアドレス:{{comment.email}}</div>
                    <div class="col-md-3" style="font-size:20px;">年月日投稿:{{comment.year}}</div>
                        <br/><br/>
                                      <!-- <div class="col-md-3 offset-md-4" v-for="comment in comments" :key="comment.id">
                                         <div class="content hideContent">{{comment.comment}}</div>
                                     </div> -->
                                     <!-- <button onclick="function()">See more</button> -->

                    <div class="row col-md-12 m-lr-0">
                        <read-more more-str="read more" :text="comment.comment" :max-chars="50"></read-more>
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
                Information
            </button>
            <button v-scroll-to="{ el: '#element2' }" class="top-fixed-btn">
                Review
            </button>
            <button v-scroll-to="{ el: '#element3' }" class="top-fixed-btn">
                Map
            </button>
            <button v-scroll-to="{ el: '#element4' }" class="top-fixed-btn">
                Job Offer
            </button>
            </div>
            <div class="row ele m-lr-0" id="element1">
                <div class="row list-wrap m-lr-0" v-for="cust in customer" :key="cust.id">
                <div class="col-lg-3 col-md-4 col-sm-12"><p><strong>Address :</strong></p></div>
                <div class="col-lg-9 col-md-8 col-sm-12" ><p>{{cust.address}}</p></div>
                <div class="col-lg-3 col-md-4 col-sm-12"><p><strong>Phone :</strong></p></div>
                <div class="col-lg-9 col-md-8 col-sm-12" ><p>{{cust.phone}}</p></div>
            </div>

             <h5 class="header">special Features</h5>
                <div class="row m-lr-0">
                    <ul class="fac_container" v-for="special in specialfeature" :key="special.id">
                        <li>{{special.short_name}}</li>
                    </ul>
                </div>
            </div>
            <div class="row ele m-lr-0" id="element2">

                <h5 class="header">Review</h5>
              <div class="row" v-for="comment in comments" :key="comment.id">
                    <div class="col-md-12" style="font-size:20px;">タイトル:{{comment.title}}</div><br/>
                                     <!-- <i class="fas fa-envelope" style='font-size:20px;color:#F4A460'></i> -->
                    <div class="col-md-5" style="font-size:20px;">電子メールアドレス:{{comment.email}}</div>
                    <div class="col-md-3" style="font-size:20px;">年月日投稿:{{comment.year}}</div>
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
                     <div class="row col-md-12 m-lr-0">
                        <read-more more-str="read more" :text="comment.comment" :max-chars="50"></read-more>
                    </div>
                </div>
            </div>
            <div class="row ele m-lr-0" id="element3">
                <div class="col-lg-12 col-md-12 col-sm-12">
                            <GmapMap id="googlemap" ref="map" :center="center" :zoom="10" >
                            <GmapMarker v-for="(m, index) in markers" :key="index" :position="m.position" :clickable="true" :draggable="true" @click="center=m.position" />
                           </GmapMap>

                        <div class="row" style="padding-top:20px;" v-for="m in google" :key="m.id" >
                            <div class="col-md-2 text-left ">
                                Official Site  :
                            </div>
                            <div class="col-md-10 text-left">
                               {{m.website}}
                            </div>

                            <div class="col-md-2 text-left" style="padding-top:20px;" >
                                Access :
                            </div>
                            <div class="col-md-10 text-left" style="padding-top:20px;">
                                {{m.access}}
                            </div>
                             <div class="col-md-2 text-left" style="padding-top:20px;" >
                                Congestion :
                            </div>
                             <div class="col-md-10 text-left" style="padding-top:20px;">
                                {{m.congestion}}
                            </div>

                            <div class="col-md-2 text-left" style="padding-top:20px;" >
                                City/Township :
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

                center: { lat: 0, lng: 0 },
                address: '',
                google:[],
                customer:[],
                specialfeature:[],
                nusfacilities:[],
                cooperate_medical:[],
                medical_acceptance:[],
                medical:[],
                staff:[],
                nursing_profiles:[],
                method_payment:[],
                comments:[],
                activeImage: 0,
                index: 0,
                pageNum: 0,
                // type : 'nursing',
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
                this.axios.get('/api/profile/hospital').then(response => {
                    this.google = response.data.hoslatlong;
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
    font-size: 1.286em;
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
