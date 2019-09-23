<template>
    <div class="card">
        <div v-if="type == 'hospital'">
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
                            <a class="nav-link" href="#six"  id="six-tab" data-toggle="tab" role="tab" aria-controls="six" aria-selected="true" >Job Offer</a>
                        </li>
                        
                </ul> 
            </div>
            
            <div class="tab-content tab-content2 scroll2" id="myTabContent">
                <div class="tab-pane fade show active p-1" id="one" role="tabpanel" aria-labelledby="one-tab">
                <div class="row">
                        <div class="col-sm-5 detail_profile_left"><div class="hos-img"><img src="/images/1.jpg" alt="" class="col-md-12"></div></div>
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
                    <div class="row">
                        <h1>tab2</h1>
                    </div>
                </div>
                <div class="tab-pane fade p-1" id="three" role="tabpanel" aria-labelledby="three-tab">
                    <div class="row">
                        <h1>tab3</h1>
                    </div>
                </div>
                <div class="tab-pane fade p-1" id="four" role="tabpanel" aria-labelledby="four-tab">
                    <div class="row">
                        <h1>Facility</h1>
                        <hr>
                        
                    </div>
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
                            <a class="nav-link" href="#six"  id="six-tab" data-toggle="tab" role="tab" aria-controls="six" aria-selected="true" >Job Offer</a>
                        </li>
                        
                </ul> 
            </div>

            <div class="tab-content tab-content2 scroll2" id="myTabContent">
                <div class="tab-pane fade show active p-1" id="one" role="tabpanel" aria-labelledby="one-tab">
                <div class="row">
                        <div class="col-sm-5 detail_profile_left"><div class="hos-img"><img src="/images/1.jpg" alt="" class="col-md-12"></div></div>
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
                    <div class="row">
                        <h1>tab2</h1>
                    </div>
                </div>
                <div class="tab-pane fade p-1" id="three" role="tabpanel" aria-labelledby="three-tab">
                    <div class="row">
                        <h1>tab3</h1>
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
                    { position: { lat: 0.0000000, lng: 0.0000000 } },
                   
                  
                ],
                center: { lat: 0.0000000, lng: 0.0000000 },
                google:[],
                nusfacilities:[],
                cooperate_medical:[],
                medical_acceptance:[],
                staff:[],
                index: 0,
                pageNum: 0,
                opts: {
                    start: 0,
                    dir: 'v',
                    loop: false,
                    duration: 500,
                    beforeChange: function(ele, current, next) {
                        console.log('before', current, next)
                        that.index = next;
                    },
                    afterChange: function(ele, current) {
                        that.index = current;
                        console.log('after', current)
                    }
                },
                type : 'nursing',
                address: '',
               
               
            };
        },
         created(){
                    
                    this.axios.get('/api/nusfacilities').then(response => {
                        this.nusfacilities = response.data;  
      
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

                        this.axios.get('/api/google').then(response => {
                        this.google = response.data;
                        this.markers[0]['position'][' lat']  = response.data[0]['latitude'];
                        this.markers[0]['position']['lng']  = response.data[0]['longitude'];
                        this.center['lat'] = response.data[0]['latitude'];
                        this.center['lng'] = response.data[0]['longitude'];

                        var geocoder = new google.maps.Geocoder;
                        var latlng = {lat: response.data[0]['latitude'], lng: response.data[0]['longitude']};
                        // var latlng = {lat: 19.76330000, lng: 96.07850000};
                      
                        geocoder.geocode({'location': latlng}, function(results, status) {
                        if (status === 'OK') {
                            
                            if (results[1]) {
                                
                                this.address=  results[1].formatted_address  
                                 console.log(this.address);
                             }   
                            }
                           
                        })
                         
                                   
                    });
                         
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

</style>




    

    
    


    