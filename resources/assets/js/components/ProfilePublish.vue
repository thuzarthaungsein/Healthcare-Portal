<template>
    <div class="card">
        <div v-if="type == 'hospital'">
            <div class="card-header tab-card-header">
                <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
                        <li class="nav-item nav-line" id="category-id" >
                            <a class="nav-link active" href="#one" id="one-tab" data-toggle="tab" role="tab" aria-controls="one" aria-selected="true">Information</a>
                        </li>
                        <li>
                            <a class="nav-link" href="#two"  id="two-tab" data-toggle="tab" role="tab" aria-controls="two" aria-selected="true" >Map</a>
                        </li>
                        <li>
                            <a class="nav-link" href="#three"  id="three-tab" data-toggle="tab" role="tab" aria-controls="three" aria-selected="true" >Review</a>
                        </li>
                        <li>
                            <a class="nav-link" href="#four"  id="four-tab" data-toggle="tab" role="tab" aria-controls="four" aria-selected="true" >Job Offer</a>
                        </li>
                
                </ul>
            </div>

            <div class="tab-content tab-content2 scroll2" id="myTabContent">
                <div class="tab-pane fade show active p-1" id="one" role="tabpanel" aria-labelledby="one-tab">
                <div class="row">
                        <div class="col-sm-5 detail_profile_left">
                           <div class="thumbnail-img">
                             <div class="card-carousel">
                                <div class="card-img">
                                    <img :src="currentImage" alt="">
                                    <!-- <div class="actions">
                                        <span @click="prevImage" class="prev">
                                            <i class="fas fa-chevron-left"></i>
                                        </span>
                                        <span @click="nextImage" class="next">
                                            <i class="fas fa-chevron-right"></i>
                                        </span>
                                    </div> -->
                                </div>
                                <div class="thumbnails">
                                    <div
                                        v-for="(image, index) in  images"
                                        :key="image.id"
                                        :class="['thumbnail-image', (activeImage == index) ? 'active' : '']"
                                        @click="activateImage(index)" >
                                        <img :src="image.thumb">
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                        <div class="col-sm-7 detail_profile_right">
                            <div class="row list-wrap m-lr-0">
                                <div class="col-lg-3 col-md-4 col-sm-12"><p><strong>Address</strong></p></div>
                                <div class="col-lg-9 col-md-8 col-sm-12"><p><a href="#" target="_blank">example</a></p></div>
                            </div>

                            <h5 class="header">special Features</h5>
                            <div class="row m-lr-0">
                                <ul class="fac_container">
                                    <li>24時間看護</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade p-1" id="two" role="tabpanel" aria-labelledby="two-tab">
                    <GmapMap id="googlemap" ref="map" :center="center" :zoom="10" >
                          <GmapMarker v-for="(m, index) in markers" :key="index" :position="m.position" :clickable="true" :draggable="true" @click="center=m.position" @dragend="updateCoordinates" />
                       </GmapMap>

                       <div class="row" style="padding-top:20px;" v-for="m in google" :key="m.id" >
                           <div class="col-md-2 text-left ">
                               Official Site  :
                           </div>
                           <div class="col-md-10 text-left">
                               www.google.com
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
                               {{this.address}}
                           </div>
                      </div>

                </div>
                <div class="tab-pane fade p-1" id="three" role="tabpanel" aria-labelledby="three-tab">
                    <div class="row">
                        <h1>tab3</h1>
                    </div>
                </div>
                <div class="tab-pane fade p-1" id="four" role="tabpanel" aria-labelledby="four-tab">
                     <joboffer></joboffer>
                </div>
                <div class="tab-pane fade p-1" id="five" role="tabpanel" aria-labelledby="five-tab">
                    <div class="row">
                        <h1>tab5</h1>
                    </div>
                </div>
                <div class="tab-pane fade p-1" id="six" role="tabpanel" aria-labelledby="six-tab">
                    <div class="row">
                        <h1>tab6</h1>
                    </div>
                </div>
            </div>
        </div>

        <div v-if="type == 'nursing'">
            <div class="card-header tab-card-header">
                <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
                        <li class="nav-item nav-line" id="category-id" >
                            <a class="nav-link active" href="#one" id="one-tab" data-toggle="tab" role="tab" aria-controls="one" aria-selected="true">Information</a>
                        </li>
                        <li>
                            <a class="nav-link" href="#two"  id="two-tab" data-toggle="tab" role="tab" aria-controls="two" aria-selected="true" >Features</a>
                        </li>
                        <li>
                            <a class="nav-link" href="#three"  id="three-tab" data-toggle="tab" role="tab" aria-controls="three" aria-selected="true" >Cost</a>
                        </li>
                        <li>
                            <a class="nav-link" href="#four"  id="four-tab" data-toggle="tab" role="tab" aria-controls="four" aria-selected="true" >Equipment</a>
                        </li>
                        <li>
                            <a class="nav-link" href="#five"  id="five-tab" data-toggle="tab" role="tab" aria-controls="five" aria-selected="true" >Map</a>
                        </li>
                        <li>
                            <a class="nav-link" href="#six"  id="six-tab" data-toggle="tab" role="tab" aria-controls="six" aria-selected="true" >Review</a>
                        </li>
                        <li>
                            <a class="nav-link" href="#seven"  id="seven-tab" data-toggle="tab" role="tab" aria-controls="seven" aria-selected="true" >Job Offer</a>
                        </li>

                </ul>
            </div>

            <div class="tab-content tab-content2 scroll2" id="myTabContent">
                <div class="tab-pane fade show active p-1" id="one" role="tabpanel" aria-labelledby="one-tab">
                <div class="row">
                        <div class="col-sm-5 detail_profile_left ">
                        <div class="thumbnail-img">
                             <div class="card-carousel">
                                <div class="card-img">
                                    <img :src="currentImage" alt="">
                                    <!-- <div class="actions">
                                        <span @click="prevImage" class="prev">
                                            <i class="fas fa-chevron-left"></i>
                                        </span>
                                        <span @click="nextImage" class="next">
                                            <i class="fas fa-chevron-right"></i>
                                        </span>
                                    </div> -->
                                </div>
                                <div class="thumbnails">
                                    <div
                                        v-for="(image, index) in  images"
                                        :key="image.id"
                                        :class="['thumbnail-image', (activeImage == index) ? 'active' : '']"
                                        @click="activateImage(index)"
                                    >
                                        <img :src="image.thumb">
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                        <div class="col-sm-7 detail_profile_right">
                            <div class="row list-wrap m-lr-0">
                                <div class="col-lg-3 col-md-4 col-sm-12"><p><strong>Address</strong></p></div>
                                <div class="col-lg-9 col-md-8 col-sm-12"><p><a href="#" target="_blank">example</a></p></div>
                            </div>

                            <h5 class="header">special Features</h5>
                            <div class="row m-lr-0">
                                <ul class="fac_container" v-for="special in special_features" :key="special.id">
                                    <li >{{special.short_name}}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade p-1" id="two" role="tabpanel" aria-labelledby="two-tab">
                    <div class="row">
                        <div  v-for="nurseprofile in nursing_profiles" :key="nurseprofile.id" class="col-md-6 offset-md-3">
                            {{nurseprofile.feature}}
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade p-1" id="three" role="tabpanel" aria-labelledby="three-tab">
                    <div class="row">
                        <div  v-for="cost in method_payment" :key="cost.id" class="col-md-6 offset-md-3" >
                            <table border="1" class="table">
                                                <tr>
                                                        <td style="width:30%" >Payment Name : </td>
                                                        <td style="width:70%"><div class="col-md-10 m-t-8 ">{{cost.payment_name}}</div></td>
                                                </tr>
                                                 <tr>
                                                        <td style="width:30%">Expense : </td>
                                                        <td style="width:70%"><div class="col-md-10 m-t-8 ">{{cost.expense_moving}}</div></td>
                                                </tr>
                                                <tr>
                                                        <td style="width:30%">Monthly Fees : </td>
                                                        <td style="width:70%"><div class="col-md-10 m-t-8 ">{{cost.monthly_fees}}</div></td>
                                                </tr>
                                                <tr>
                                                        <td style="width:30%">Living Room Type : </td>
                                                        <td style="width:70%"><div class="col-md-10 m-t-8 ">{{cost.living_room_type}}</div></td>
                                                </tr>
                                                 <tr>
                                                        <td style="width:30%">Area: </td>
                                                        <td style="width:70%"><div class="col-md-10 m-t-8 ">{{cost.area}}</div></td>
                                                </tr>
                                                <tr>
                                                        <td style="width:30%">Remark: </td>
                                                        <td style="width:70%"><div class="col-md-10 m-t-8 ">{{cost.remark}}</div></td>
                                                </tr>

                                </table>
                        </div>

                    </div>
                </div>
                <div class="tab-pane fade p-1" id="four" role="tabpanel" aria-labelledby="four-tab">
                    <div class="row" >
                        <div class="col-md-12">
                         <h2 align="center"> Facility </h2>

                        </div>
                        <div v-for="nus in nusfacilities" :key="nus.id" class="col-md-12 " >
                             <table border="1" class="table">
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
                    </div>
                    <div class="row" >
                        <div class="col-md-12">
                         <h2 align="center"> Cooperate Medical </h2>

                        </div>
                        <div v-for="comedical in cooperate_medical" :key="comedical.id" class="col-md-12 " >
                             <table border="1" class="table">
                                <tbody>
                                    <tr>
                                        <td> Clinical Subject</td>
                                        <td>{{comedical.clinical_subject}}</td>
                                    </tr>
                                    <tr>
                                        <td>Details</td>
                                        <td>{{comedical.details}}</td>
                                    </tr>
                                </tbody>
                             </table>
                        </div>
                    </div>
                     <div class="row" >
                        <div class="col-md-12">
                         <h2 align="center"> Medical Acceptance </h2>

                        </div>
                        <div v-for="maccept in medical_acceptance" :key="maccept.id" class="col-md-12 " >
                             <table border="1" class="table">
                                <tbody>
                                    <tr>
                                        <td> Name </td>
                                        <td>{{maccept.name}}</td>
                                    </tr>

                                </tbody>
                             </table>
                        </div>
                    </div>
                     <div class="row" >
                        <div class="col-md-12">
                         <h2 align="center"> Staff </h2>

                        </div>
                        <div v-for="st in staff" :key="st.id" class="col-md-12 " >
                             <table border="1" class="table">
                                <tbody>
                                    <tr>
                                        <td> Staff     </td>
                                        <td>{{st.staff}}</td>
                                         <td> Nursing Staff     </td>
                                        <td>{{st.nursing_staff}}</td>
                                    </tr>
                                     <tr>
                                        <td> Min num of Staff     </td>
                                        <td>{{st.min_num_staff}}</td>
                                         <td> Num of Staff     </td>
                                        <td>{{st.num_staff}}</td>
                                    </tr>

                                </tbody>
                             </table>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade p-1" id="five" role="tabpanel" aria-labelledby="five-tab">
                       <GmapMap id="googlemap" ref="map" :center="center" :zoom="10" >
                          <GmapMarker v-for="(m, index) in markers" :key="index" :position="m.position" :clickable="true" :draggable="true" @click="center=m.position" @dragend="updateCoordinates" />
                       </GmapMap>

                       <div class="row" style="padding-top:20px;" v-for="m in google" :key="m.id" >
                           <div class="col-md-2 text-left ">
                               Official Site  :
                           </div>
                           <div class="col-md-10 text-left">
                               www.google.com
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
                               {{this.address}}
                           </div>
                      </div>



                </div>
                <div class="tab-pane fade p-1" id="six" role="tabpanel" aria-labelledby="six-tab">
                    <div class="row">
                        <div class="row" v-for="comment in comments" :key="comment.id">
                                    <div class="col-md-12" style="font-size:20px;">Title:{{comment.title}}</div><br/>
                                     <!-- <i class="fas fa-envelope" style='font-size:20px;color:#F4A460'></i> -->
                                    <div class="col-md-5" style="font-size:20px;">Email:{{comment.email}}</div>
                                    <div class="col-md-3" style="font-size:20px;">年月日投稿:{{comment.year}}</div>
                                    <br/><br/>
                                      <!-- <div class="col-md-3 offset-md-4" v-for="comment in comments" :key="comment.id">
                                         <div class="content hideContent">{{comment.comment}}</div>
                                     </div> -->
                                     <!-- <button onclick="function()">See more</button> -->
                                      <div class="row col-md-12 m-lr-0">
                                          <p class="showContent"> {{comment.comment}}</p>
                                                <span class="displaytext">
                                                       {{comment.comment}}
                                                </span>
                                                <a class="mt-2 readMore" href ="#">Read More</a>

                                </div>

                        </div>
                    </div>
                </div>
                <div class="tab-pane fade p-1" id="seven" role="tabpanel" aria-labelledby="seven-tab">
                  
                       <joboffer></joboffer>
                 
                </div>
            </div>
        </div>
     

    </div>
</template>

 <script>
import joboffer from './JobOfferList.vue'
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
                nusfacilities:[],
                cooperate_medical:[],
                medical_acceptance:[],
                staff:[],
                nursing_profiles:[],
                special_features:[],
                method_payment:[],
                comments:[],
                activeImage: 0,
                index: 0,
                pageNum: 0,
                type : 'nursing',
                opts: {
                    start: 0,
                    dir: 'v',
                    loop: false,
                    duration:500,
                    beforeChange: function(ele, current, next) {
                        console.log('before', current, next)
                        that.index = next;
                    },
                    afterChange: function(ele, current) {
                        that.index = current;
                        console.log('after', current)
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
        created(){
            if(this.type == "nursing")
            {
                this.axios.get('/api/feature/featurelist').then(response => {
                    this.special_features = response.data;
                });

                this.axios.get('/api/nurse') .then(response => {
                    this.nursing_profiles = response.data;
                });

                this.axios .get('/api/cost').then(response => {
                    this.method_payment = response.data;

                });

                this.axios.get('/api/comments/comment').then(response => {
                    this.comments = response.data;

                });

                this.axios.get('/api/nusfacilities').then(response => {
                    this.nusfacilities = response.data.nurse;
                    console.log(this.nusfacilities);

                });

                this.axios.get('/api/cooperatemedical').then(response => {
                    this.cooperate_medical = response.data;

                });

                    this.axios.get('/api/medicalacceptance').then(response => {
                    this.medical_acceptance = response.data;

                });

                    this.axios.get('/api/staff').then(response => {
                    this.staff = response.data;

                });

                    this.axios.get('/api/googlefornurse').then(response => {
                    this.google = response.data;
                    this.markers[0]['position']['lat']  = response.data[0]['latitude'];
                    this.markers[0]['position']['lng']  = response.data[0]['longitude'];
                    this.center['lat'] = response.data[0]['latitude'];
                    this.center['lng'] = response.data[0]['longitude'];
                            
                });
                  
                     
                var geocoder = new google.maps.Geocoder;
                var latlng = {lat: 19.7633, lng: 96.0785};

                geocoder.geocode({'location': latlng}, function(results, status) {
                if (status === 'OK') {
                    
                    if (results[1]) {
                        
                            this.address=  results[1].formatted_address  
                        
                        }   
                    }
                })
            }
            else{
              
                this.axios.get('/api/googleforhospital').then(response => {
                    this.google = response.data;
                    this.markers[0]['position']['lat']  = response.data[0]['latitude'];
                    this.markers[0]['position']['lng']  = response.data[0]['longitude'];
                    this.center['lat'] = response.data[0]['latitude'];
                    this.center['lng'] = response.data[0]['longitude'];
                    console.log(this.markers[0]['position']['lat']);
                            
                });
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
                }


        },
               
 }

</script>

<style scoped>
div.tab-card-header > .card-header-tab > .nav-tabs .nav-item.show .nav-link, .nav-tabs .nav-link.active {
    color: #fff !important;
    font-weight: bold;
    background-color: #1aa985  !important;
    border-top: 1px solid #1aa985  ;
    border-color: #1aa985   #ecede1   #1aa985   #1aa985  !important;
}
div.tab-card-header > .card-header-tab > .nav-tabs .nav-link {
    border: 1px solid #1aa985  !important;
}
div.tab-card-header > .card-header-tab > .nav-tabs .nav-item .nav-link, .nav-tabs .nav-link {
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








