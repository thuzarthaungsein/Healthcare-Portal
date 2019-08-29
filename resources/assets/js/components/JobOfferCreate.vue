<template>    
 <div class="row">
      <div class="col-12">
          <div class="card ">
                    <div class="card-header text-center">
                        <h4 style="padding-top: 20px;"> Job Create </h4>
                    </div>
                    <div class="card-body ">    
                        <div class="row">  
                         <div class="col-sm-1"></div>
                         <div class="col-sm-9">
                                <form @submit.prevent ="add" class="m-t-16">
                                        <div class="form-group row">
                                            <div class="col-sm-3 text-right">
                                                <label for ="title"  ><strong> Title :</strong>  </label>
                                            </div>
                                             <div class="col-sm-9">
                                                <input type="title" class="form-control box" id="title"  name="title" v-model="joboffer.title" required>
                                             </div>
                                        </div>
                                       
                                        <div class="form-group row">
                                                <div class="col-sm-3 text-right">
                                                        <label for ="description" ><strong> Description :</strong>  </label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <textarea name="description" class="form-control" cols="50" rows="5" v-model="joboffer.description" required></textarea>  
                                                </div>
                                        </div>
                                         <div class="mb-1 row">
                                            <div class = "col-sm-3"></div>
                                            <div class = "col-sm-9">
                                            <!-- <span id="addnew"><a href="javascript:new_link()" class="btn btn-sm main-bg-color all-btn white">  Add New Skill  </a></span> -->
                                             <a class="btn btn-success"  @click="addRow">Add New Skill</a>
                                             <a class="btn btn-danger"   @click="delRow">Delete</a>    
                                            </div>
                                           
                                        </div>

                                        <div class="form-group row sk" id="newlinktpl"  v-for="field in joboffer.fields" :key="field.id">
                                            <div class="col-sm-3 text-right">
                                                <label for ="skill"><strong> Skill : </strong></label>
                                            </div>
                                            <div class="col-sm-9"  >
                                                 <input type="text" class="form-control" v-model="field.skills"> 
                                                <!-- <input type="text" class="form-control"  v-model="joboffer.skills" >  -->
                                            </div>  
                                            <!-- <div class="col-sm-1">
                                                 <a class="text-danger" style="padding-top: 1px;" href = "#" @click="delRow">delete</a>    
                                            </div> -->
                                        </div> 

                                        <div id="newlink" ></div>   

                                         <div class="form-group row">
                                                <div class="col-sm-3 text-right">
                                                        <label for ="location" ><strong> Location :</strong>  </label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <textarea name="location" class="form-control" cols="50" rows="5" v-model="joboffer.location"  required></textarea>  
                                                </div>
                                        </div>

                                        <div class="form-group row">
                                                <div class="col-sm-3 text-right">
                                                        <label for ="neareststation" ><strong> Nearest Station :</strong>  </label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <textarea name="neareststation" class="form-control" cols="50" rows="5" v-model="joboffer.nearest_station" ></textarea>  
                                                </div>
                                        </div>

                                        
                                        <div class="form-group row" v-for="emstatus in joboffer.employment_status" :key="emstatus.id">
                                                <div class="col-sm-3 text-right">
                                                        <label for ="neareststation" ><strong> Employment Status :</strong>  </label>
                                                </div>
                                                <div class="col-sm-9">
                                                  <label> <input type = "checkbox"  value = "Part" name = "part_time" v-model="emstatus.pchecked"  > <strong>Part Time </strong></label>
                                                  <label> <input type = "checkbox"  value= "Full" name = "full-time" v-model="emstatus.fchecked" ><strong> Full Time </strong> </label>
                                                </div>
                                        </div>

                                        <div class="form-group row">
                                                <div class="col-sm-3 text-right">
                                                        <label for ="salary" ><strong> Salary :</strong>  </label>
                                                </div>
                                                <div class="col-sm-9">
                                                     <input type = "text" class="form-control"  v-model="joboffer.salary" name = "salary" required>
                                                </div>
                                        </div>

                                         <div class="form-group row">
                                                <div class="col-sm-3 text-right">
                                                        <label for ="allowance" ><strong> Allowance :</strong>  </label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <textarea name="allowance" class="form-control" cols="50" rows="5" v-model="joboffer.allowances"></textarea>  
                                                </div>
                                        </div>

                                          <div class="form-group row">
                                                <div class="col-sm-3 text-right">
                                                        <label for ="insurance" ><strong> Insurance :</strong>  </label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <textarea name="insurance" class="form-control" cols="50" rows="5" v-model="joboffer.insurance" ></textarea>  
                                                </div>
                                        </div>

                                          <div class="form-group row">
                                                <div class="col-sm-3 text-right">
                                                        <label for ="workhour" ><strong> Working Hours :</strong>  </label>
                                                </div>
                                                <div class="col-sm-9">
                                                     <input type = "workhour" class="form-control"  name = "workhour" v-model="joboffer.working_hours" required>
                                                </div>
                                        </div>

                                          <div class="form-group row">
                                                <div class="col-sm-3 text-right">
                                                        <label for ="holiday" ><strong> Holidays :</strong>  </label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <textarea name="holiday" class="form-control" cols="50" rows="5" v-model="joboffer.holidays" ></textarea>  
                                                </div>
                                        </div>
                                            
                                        <div class="form- group row">
                                            <div class="col-sm-3"></div>
                                        </div>

                                       
                                        <button class="btn news-post-btn">Create</button>
                                        <!-- <button type = "button" class="btn btn-md main-bg-color  all-btn white" id = "submit"> Submit </button>   -->
                                        
                                </form>
                           </div>
                            <div class="col-sm-3"></div>
                           
                       </div>
                     
                     </div>
                </div>
             </div>
         </div>
 

</template>

<script>
export default {
         
          data() {
            return {
                joboffer: {
                        title: '',
                        customer_id: '',
                        description : '',
                        fields:[{
                            skills:'',
                            id:''
                        }],
                        location : '',
                        nearest_station : '',
                        employment_status : [{
                            pchecked: false,
                            fchecked:false
                        }],
                        salary : '',
                        allowances:'',
                        insurance : '',
                        working_hours : '',
                        holidays : '',
                        user_id :'',
                        recordstatus:''
                    }, 
                  
            }
        },
         created() {
        
            this.axios
                .get(`http://localhost:8000/api/job/edit/${this.$route.params.id}`)
                .then((response) => { 
                   
                    this.joboffer.title = response.data.title;
                    this.joboffer.customer_id = response.data.customer_id;
                    this.joboffer.description = response.data.description;
                    this.joboffer.fields.skills = response.data.skills;
                    let arr = [];
                    arr = (this.joboffer.fields.skills).split(',');
                    this.createskill(arr);
                    this.joboffer.location = response.data.location;
                    this.joboffer.nearest_station = response.data.nearest_station;               
                    this.ischeck = response.data.employment_status;
                    this.createCheck(this.ischeck);
                    this.joboffer.salary = response.data.salary;
                    this.joboffer.allowances = response.data.allowances;
                    this.joboffer.insurance = response.data.insurance;
                    this.joboffer.working_hours = response.data.working_hours;
                    this.joboffer.holidays = response.data.holidays;
                    this.joboffer.user_id = response.data.user_id;
                    this.joboffer.recordstatus = response.data.recordstatus;
                   
                });
        },

       
         methods: {
            add() {
              
                if( `${this.$route.params.id}` == "undefined")
                {
                    axios.post('http://localhost:8000/api/job/add', this.joboffer)
                    .then((response) => {
                    alert('Successfully Created')
                    console.log(response);
                    this.$router.push({name: 'jobofferlist'});
                    this.$route.params.id = null;
                
                    })        
                }
                else{
                     this.updateJob();   
                }     
            },
            addRow: function() { 
                this.joboffer.fields.push({
                skills: '',
                id:''  });      
            },
            delRow: function() {
                this.joboffer.fields.pop();
            },
            createskill: function(arr){  
                this.joboffer.fields.shift()  
                for(var i = 0; i < arr.length; i++){
                     
                      this.joboffer.fields.push({
                        skills: arr[i],
                     
                            });
                    }
            },
            createCheck: function(check){ 
                 this.joboffer.employment_status.shift()   
               if(check == "Full"){
                 this.joboffer.employment_status.push({
                            fchecked: 1,
                            pchecked:0   });
               }
               else if(check == "Part"){
                    this.joboffer.employment_status.push({
                            fchecked: 0,
                            pchecked:1  });
               }
               else{
                    this.joboffer.employment_status.push({
                            fchecked: 1,
                            pchecked:1  });
               }    
            },
             updateJob() {
                this.axios
                    .post(`http://localhost:8000/api/job/update/${this.$route.params.id}`, this.joboffer)
                    .then((response) => {
                          alert('Successfully Updated!')
                        this.$router.push({name: 'jobofferlist'});
                    });
            },
            
        }
             
}
</script>


