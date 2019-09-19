
   <template>
            <div class="fullpage-container" style="height:150vh;"> 
                <div class="button-group">
                        <button type="button" :class="{active:index ==0}" @click="moveTo(0)">Equipment</button>
                        <button type="button" :class="{active:index ==1}" @click="moveTo(1)">Map</button>
                        <button type="button" :class="{active:index ==2}" @click="moveTo(2)">Preview</button>  
                         
                </div>
              
                <div class="fullpage-wp" v-fullpage="opts" ref="fullpage">
                    <div class="page-1 page">
                        <h1 align="center">Facility Overview</h1>
                        <hr>
                        <div v-for="nus in nusfacilities" :key="nus.id" class="col-md-6 offset-md-3" >
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

                        <h1 align="center">Cooperate Medical </h1>
                        <hr>
                        <div v-for="co in cooperate_medical" :key="co.clinical_subject" class="col-md-6 offset-md-3">
                           <table border="1" class="table">
                               <tbody>
                                   <tr>
                                       <td> Clinical subjects </td>
                                       <td> {{co.clinical_subject}} </td>
                                   </tr>
                                   <tr>
                                       <td> Details of cooperation </td>
                                       <td> {{co.details}}</td>
                                   </tr>
                               </tbody>
                           </table>
                        </div>

                        <h1 align="center">Medical Acceptance  </h1>
                        <hr>
                        <div v-for="medical in medical_acceptance" :key="medical.name" class="col-md-6 offset-md-3">
                           <table border="1" class="table">
                               <tbody>
                                   <tr>
                                       <td> Name </td>
                                       <td> {{medical.name}} </td>
                                   </tr>
                                  
                               </tbody>
                           </table>
                        </div>

                        <h1 align="center"> Staff </h1>
                        <hr>
                        <div v-for="st in staff" :key="st.staff" class="col-md-6 offset-md-3">
                           <table border="1" class="table">
                               <tbody>
                                   <tr>
                                       <td> Staff </td>
                                       <td> {{st.staff}}</td>
                                   </tr>
                                  
                               </tbody>
                           </table>
                        </div>  
                     </div> 
                    
                    <div class="page-2 page">
                        <h2 class="part-2" > Map </h2>
                        <GmapMap id="googlemap" ref="map" :center="center" :zoom="10">
                           <GmapMarker v-for="(m, index) in markers" :key="index" :position="m.position" :clickable="true" :draggable="true" @click="center=m.position"  @dragend="updateCoordinates" />
                        </GmapMap>
                    </div>
                    <div class="page-3 page">     
                        <h2 class="part-3" >Working On Tablets</h2> 
                    </div>
                  
                </div>
            </div>
        </template>
   
 <script>
 export default {
  data() {
            var that = this;
            return {  
                markers: [
                    { position: { lat: 0.0000000, lng: 0.0000000 } }
                ],
                center: { lat: 0.0000000, lng: 0.0000000 },
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
                }
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
        methods: {
            moveTo: function(index) {          
                this.$refs.fullpage.$fullpage.moveTo(index, true);
            }
           
        }
 }
       
</script>


<style scoped>
.google-map {
  width: 800px;
  height: 600px;
  margin: 0 auto;
  background: gray;
}
</style>

<style scoped>

.fullpage-container {
    display: flex;
  width: 100%;
  height: 100%;
  overflow: hidden;
    
}

.page-container {
  position: absolute;
  left: 0;
  top: 0;
  width: 100%;
  height: 100%;
}
.sticky {
  position: fixed;
  top: 0;
  width: 100%;
}

.sticky + .content {
  padding-top: 102px;
}

</style>




    

    
    


    