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
                         <hr>
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
                         <hr>
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
                         <hr>
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
                         <hr>
                        </div>
                        <div v-for="st in staff" :key="st.id" class="col-md-12 " >
                             <table border="1" class="table">
                                <tbody>
                                    <tr>
                                        <td> Staff Name    </td>
                                        <td>{{st.staff}}</td>
                                    </tr>
                                  
                                </tbody>
                             </table> 
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade p-1" id="five" role="tabpanel" aria-labelledby="five-tab">
                   
                </div>
                <div class="tab-pane fade p-1" id="six" role="tabpanel" aria-labelledby="six-tab">
                    <div class="row">
                        <h1>tab6</h1>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</template>
   
 <script>
 export default {
  data() {
            var that = this;

            return {   
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
                        this.markers = response.data;  
                          
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




    

    
    


    