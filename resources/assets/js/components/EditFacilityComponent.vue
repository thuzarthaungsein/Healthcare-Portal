<template>
 <div class="row">
      <div class="col-12">
          <div class="card">
              <div class="card-body">
                <div class="col-md-12">
                    <div class="row">
                        <div class="col-md-12">
                            <h4 class="page-header">Edit Facility</h4>
                            <br>
                        </div>
                        <div class="col-md-12">
                             <form @submit.prevent="updateFacility">
                            <div class="form-group">
                                <label>Facility Name :<span class="error">*</span></label>
                                <input type="text" class="form-control"  v-model="facility.description"  >
                                  <span v-if="errors.description" class="error">{{errors.description[0]}}</span>  
                            </div>

                            <div class="form-group ">
                                <div class="form-group row">
                                    <div class="col-1 pad-free">
                                        <button class="btn news-post-btn">Edit</button>
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
        created() {
            this.axios
                .get(`/api/facility/edit/${this.$route.params.id}`)
                .then((response) => {
                    this.facility = response.data;

                });
        },

         methods: {
            updateFacility() {
                this.axios
                    .post(`/api/facility/update/${this.$route.params.id}`, this.facility)
                    .then((response) => {
                        this.description = ''
                          alert('Successfully Updated!')
                        this.$router.push({name: 'facilitieslist'});
                    }).catch(error=>{
                        
                    if(error.response.status == 422){
                      
                        this.errors = error.response.data.errors       
                          
                    }
                })  ;
            }

        }

}
</script>


