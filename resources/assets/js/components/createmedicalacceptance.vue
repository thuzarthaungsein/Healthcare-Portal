<template>    
 <div class="row">
      <div class="col-12">  
          <div class="card">
              <div class="card-body">
                <div class="col-md-12">
                    <div class="row">
                         
                        <div class="col-md-12">
                            <h4 class="page-header">Create Medical Acceptance</h4>
                            <br>
                        </div>
                        <div class="col-md-12">
                             <form @submit.prevent="add">
                            <div class="form-group">
                                <label>medical acceptance Name :<span class="error">*</span></label>
                                <input type="text" class="form-control"  v-model="medical.name"  placeholder="medical acceptance" required>
                       
                            </div>
                        
                            <div class="form-group ">
                                <div class="form-group row">
                                    <div class="col-1 pad-free">
                                        <button class="btn news-post-btn">Create</button>
                                    </div>
                                    <div class="col-1 pad-free">
                                        <router-link class="btn btn-warning" to="/medicalacceptancelist" >  Cancel </router-link>
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
                medical: {
                        name: '',
                        user_id:'',
                        recordstatus: ''
                    }
            }
        },
       
         methods: {
           add() {
               axios.post('/api/medical/add', this.medical)
                    .then((response) => {
                    alert('Successfully Created')
                    console.log(response);
                     this.$router.push({name: 'medicalacceptancelist'});
                    })
            }
           
        }
             
}
</script>


