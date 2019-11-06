<template>
      <div id="content">
            <div class="container">
                <div class="col-md-12">
                    <div class="card  text-dark">
                        <div class="card-body">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h4 class="page-header">Edit Medicalacceptance</h4>
                                        <br>
                                    </div>
                                    <div class="col-md-12">
                                        <form @submit.prevent = "updatemedical">
                                        <div class="form-group">
                                            <label>Medicalacceptance Name :<span class="error">*</span></label>
                                            <input type="text" class="form-control" v-model="medical.name" required>
                                        </div>
                                   
                                        <div class="form-group row">
                                            <div class="col-1 pad-free">
                                                <button class="btn news-post-btn">Update</button>
                                            </div>
                                            <div class="col-3 pad-free">
                                                <!-- <a href="categorylist" class="btn btn-warning">Cancel</a> -->
                                                <router-link to="/medicalacceptancelist" class="btn btn-warning">キャンセル</router-link>
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
                        recordstatus:''
                    }
            }
        },
        created() {
            this.axios
                .get(`/api/medical/edit/${this.$route.params.id}`)
                .then((response) => {
                    this.medical = response.data;
                   
                });
        },
       
         methods: {
            updatemedical() {
                this.axios
                    .post(`/api/medical/update/${this.$route.params.id}`, this.medical)
                    .then((response) => {
                          alert('Successfully Updated!')
                        this.$router.push({name: 'medicalacceptancelist'});
                    });
            }
           
        }
             
}
</script>