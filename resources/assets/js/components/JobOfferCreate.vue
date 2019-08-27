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
                         <div class="col-sm-10">
                                <form @submit.prevent ="add" class="m-t-16">
                                        <div class="form-group row">
                                            <div class="col-sm-2 text-right">
                                                <label for ="title"  ><strong> Title :</strong>  </label>
                                            </div>
                                             <div class="col-sm-10">
                                                <input type="title" class="form-control box" id="title"  name="title" v-model="joboffer.title">
                                             </div>
                                        </div>
                                       
                                        <div class="form-group row">
                                                <div class="col-sm-2 text-right">
                                                        <label for ="description" ><strong> Description :</strong>  </label>
                                                </div>
                                                <div class="col-sm-10">
                                                    <textarea name="description" class="form-control" cols="50" rows="5" v-model="joboffer.description" ></textarea>  
                                                </div>
                                        </div>
                                         <div class="mb-1 row">
                                            <div class = "col-sm-2"></div>
                                            <div class = "col-sm-10">
                                            <!-- <span id="addnew"><a href="javascript:new_link()" class="btn btn-sm main-bg-color all-btn white">  Add New Skill  </a></span> -->
                                             <a class="btn btn-success" @click="addRow">Add New Skill</a>
                                                <a class="btn btn-danger" @click="delRow">Delete Skill</a>
                                            </div>
                                           
                                        </div>

                                          <div class="form-group row input-group" v-for="field in joboffer.fields" :key="field.skills">
                                            <div class="col-sm-2 text-right">
                                                <label for ="skill"><strong> Skill : </strong></label>
                                            </div>
                                            <div class="col-sm-10"  >
                                                 <input type="text" class="form-control" v-model="field.skills"> 
                                                <!-- <input type="text" class="form-control"  v-model="joboffer.skills" >  -->
                                            </div>         
                                        </div> 

                                        <!-- <div class="form-group row">
                                            <div class="input-group">
                                           
                                            <div class="input-group-btn">
                                               
                                            </div>
                                            </div>
                                        </div>

                                        <div class="input-group" v-for="field in joboffer.fields" :key="field.skills">
                                             <label for ="skill" ><strong> Skill :</strong>  </label>
                                             
                                        </div> -->


                                        <div id="newlink" ></div>   

                                         <div class="form-group row">
                                                <div class="col-sm-2 text-right">
                                                        <label for ="location" ><strong> Location :</strong>  </label>
                                                </div>
                                                <div class="col-sm-10">
                                                    <textarea name="location" class="form-control" cols="50" rows="5" v-model="joboffer.location" ></textarea>  
                                                </div>
                                        </div>

                                        <div class="form-group row">
                                                <div class="col-sm-2 text-right">
                                                        <label for ="neareststation" ><strong> Nearest Station :</strong>  </label>
                                                </div>
                                                <div class="col-sm-10">
                                                    <textarea name="neareststation" class="form-control" cols="50" rows="5" v-model="joboffer.nearest_station" ></textarea>  
                                                </div>
                                        </div>

                                        
                                        <div class="form-group row">
                                                <div class="col-sm-2 text-right">
                                                        <label for ="neareststation" ><strong> Employment Status :</strong>  </label>
                                                </div>
                                                <div class="col-sm-10">
                                                   <input type = "checkbox"  value = "Part" name = "part_time" v-model="joboffer.employment_status" > <strong>Part Time </strong>
                                                   <input type = "checkbox" value="Full" name = "full-time" v-model="joboffer.employment_status"><strong> Full Time </strong>
                                                </div>
                                        </div>

                                        <div class="form-group row">
                                                <div class="col-sm-2 text-right">
                                                        <label for ="salary" ><strong> Salary :</strong>  </label>
                                                </div>
                                                <div class="col-sm-10">
                                                     <input type = "text" class="form-control"  v-model="joboffer.salary" name = "salary">
                                                </div>
                                        </div>

                                         <div class="form-group row">
                                                <div class="col-sm-2 text-right">
                                                        <label for ="allowance" ><strong> Allowance :</strong>  </label>
                                                </div>
                                                <div class="col-sm-10">
                                                    <textarea name="allowance" class="form-control" cols="50" rows="5" v-model="joboffer.allowances" ></textarea>  
                                                </div>
                                        </div>

                                          <div class="form-group row">
                                                <div class="col-sm-2 text-right">
                                                        <label for ="insurance" ><strong> Insurance :</strong>  </label>
                                                </div>
                                                <div class="col-sm-10">
                                                    <textarea name="insurance" class="form-control" cols="50" rows="5" v-model="joboffer.insurance" ></textarea>  
                                                </div>
                                        </div>

                                          <div class="form-group row">
                                                <div class="col-sm-2 text-right">
                                                        <label for ="workhour" ><strong> Working Hours :</strong>  </label>
                                                </div>
                                                <div class="col-sm-10">
                                                     <input type = "workhour" class="form-control"  name = "workhour" v-model="joboffer.working_hours">
                                                </div>
                                        </div>

                                          <div class="form-group row">
                                                <div class="col-sm-2 text-right">
                                                        <label for ="holiday" ><strong> Holidays :</strong>  </label>
                                                </div>
                                                <div class="col-sm-10">
                                                    <textarea name="holiday" class="form-control" cols="50" rows="5" v-model="joboffer.holidays" ></textarea>  
                                                </div>
                                        </div>
                                            
                                        <div class="form- group row">
                                            <div class="col-sm-2"></div>
                                        </div>

                                        <!-- <div id="newlinktpl" style="display:none">
                                            <div class="form-group row" style="margin-top:30px;">
                                                    <div class="col-sm-2 text-right">
                                                        <label for ="skill"> <strong> Skill : </strong> </label>
                                                    </div>
                                                    <div class="col-sm-10 ">
                                                        <input type="text" class="form-control"   v-model="joboffer.skills"  > 
                                                    </div>         
                                            </div>
                                       </div>    -->
                                        <button class="btn news-post-btn">Create</button>
                                        <!-- <button type = "button" class="btn btn-md main-bg-color  all-btn white" id = "submit"> Submit </button>   -->
                                        
                                </form>
                           </div>
                            <div class="col-sm-2"></div>
                            <!-- <div id="newlinktpl" style="display:none">
                                    <div class="form-group row" style="margin-top:30px;">
                                            <div class="col-sm-2 text-right">
                                                <label for ="skill"> <strong> Skill : </strong> </label>
                                            </div>
                                            <div class="col-sm-10 ">
                                                <input type="text" class="form-control" id="skill" name="skill"  > 
                                            </div>         
                                    </div>
                                   
                            </div>      -->
                       </div>
                       <!-- <div class="row">
                           <div class = "col-sm-1"></div>
                           <div class="col-sm-10">
                                    <div class="mb-1 row">
                                            <div class = "col-sm-2"></div>
                                            <div class = "col-sm-10">
                                               <button type = "button" class="btn btn-md main-bg-color  all-btn white" id = "submit"> Submit </button>
                                            </div>       
                                   </div>
                           </div>  -->
                     </div>
                </div>
             </div>
         </div>
 

</template>

<script>
export default {
         
          data() {
            return {
                errors: [],
                joboffer: {
                        title: '',
                        customer_id: '',
                        description : '',
                        fields:[{
                            skills:'',
                        }],
                        // skills :'',
                        location : '',
                        nearest_station : '',
                        employment_status : [],
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
       
         methods: {
            add() {
                axios.post('http://localhost:8000/api/job/add', this.joboffer)
                    .then((response) => {
                    alert('Successfully Created')
                    console.log(response);
                    //  this.$router.push({name: 'facilitieslist'});
                    })
            },
            addRow: function() {
            this.joboffer.fields.push({
            skills: '',
         
                });
            },
            delRow: function() {
                this.joboffer.fields.pop();
            },
            
           
        }
             
}
</script>


