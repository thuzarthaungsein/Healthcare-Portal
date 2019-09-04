<template>    
 <div class="row">
      <div class="col-12">  
          <div class="card">
              <div class="card-body">
                <div class="col-md-12">
                    <div class="row">
                         
                        <div class="col-md-12">
                            <h4 class="page-header">Create Facility</h4>
                            <br>
                        </div>
                        <div class="col-md-12">
                             <form @submit.prevent="add">
                            <div class="form-group">
                                <label>Facility Name :<span class="error">*</span></label>
                                <input type="text" class="form-control"  v-model="facility.description"  placeholder="Facility Name" >
                                   <span v-if="errors.description" class="error">{{errors.description[0]}}</span>  
                            </div>
                        
                            <div class="form-group ">
                                <div class="form-group row">
                                    <div class="col-1 pad-free">
                                        <button class="btn news-post-btn">Create</button>
                                    </div>
                                    <div class="col-1 pad-free">
                                        <router-link class="btn btn-warning" to="/facilitieslist" >  Cancel </router-link>
                                    </div>
                                </div>
                            </div>  
                                </form>  
                            </div>
                         </div>       
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
                errors: [],
                facility: {
                        description: '',
                    }
            }
        },
       
         methods: {
            add() {
                axios.post('http://localhost:8000/api/facility/add', this.facility)
                    .then((response) => {
                        this.description = ''
                    alert('Successfully Created')
                    console.log(response);
                     this.$router.push({name: 'facilitieslist'});
                    }).catch(error=>{
                        
                    if(error.response.status == 422){
                      
                        this.errors = error.response.data.errors       
                          
                    }
                })  
            }
           
        }
             
}
</script>


