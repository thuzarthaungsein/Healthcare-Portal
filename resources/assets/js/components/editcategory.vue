<template>
      <div id="content">
            <div class="container">
                <div class="col-md-12">
                    <div class="card  text-dark">
                        <div class="card-body">
                            <div class="col-md-12">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h4 class="page-header">Edit Category</h4>
                                        <br>
                                    </div>
                                    <div class="col-md-12">
                                        <form @submit.prevent = "updateCategory">
                                        <div class="form-group">
                                            <label>Category Name :<span class="error">*</span></label>
                                            <input type="text" class="form-control" v-model="category.name" >
                                              <span v-if="errors.name" class="error">{{errors.name[0]}}</span>  
                                        </div>
                                   
                                        <div class="form-group row">
                                            <div class="col-1 pad-free">
                                                <button class="btn news-post-btn">Update</button>
                                            </div>
                                            <div class="col-3 pad-free">
                                                <!-- <a href="categorylist" class="btn btn-warning">Cancel</a> -->
                                                <router-link to="/categorylist" class="btn btn-warning">Cancel</router-link>
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
                category: {
                        name: '',
                        user_id:'',
                        recordstatus:''
                    }
            }
        },
        created() {
            this.axios
                .get(`http://localhost:8000/api/category/edit/${this.$route.params.id}`)
                .then((response) => {
                    this.category = response.data;
                   
                });
        },
       
         methods: {
            updateCategory() {
                this.axios
                    .post(`http://localhost:8000/api/category/update/${this.$route.params.id}`, this.category)
                    .then((response) => {
                        this.name = ''
                          alert('Successfully Updated!')
                        this.$router.push({name: 'categorylist'});
                    }).catch(error=>{
                        
                    if(error.response.status == 422){
                      
                        this.errors = error.response.data.errors       
                          
                    }
                })   ;
            }
           
        }
             
}
</script>