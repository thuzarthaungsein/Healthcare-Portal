<template>
 <div class="row">
      <div class="col-12">
          <div class="card">
              <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h4 class="page-header header">Feature Creation</h4>
                            <br>
                        </div>
                        <div class="col-md-12">
                             <form @submit.prevent="add">
                            <div class="form-group">
                                <label>Feature Name :<span class="error">*</span></label>
                                <input type="text" class="form-control"  v-model="feature.name"  placeholder="Feature Name" >
                                <span v-if="errors.name" class="error">{{errors.name[0]}}</span>
                            </div>
<<<<<<< HEAD
                             <div class="form-group">
                                <label>Short Name :<span class="error">*</span></label>
                                <input type="text" class="form-control"  v-model="feature.name"  placeholder="Feature Name" >
                                <span v-if="errors.name" class="error">{{errors.name[0]}}</span>  
                            </div>
                             <div class="form-group">
                                <label>Feature Name :<span class="error">*</span></label>
                                <input type="text" class="form-control"  v-model="feature.name"  placeholder="Feature Name" >
                                <span v-if="errors.name" class="error">{{errors.name[0]}}</span>  
                            </div>
=======
                            <div class="form-group">
                                <label>Feature Short Name :<span class="error">*</span></label>
                                <input type="text" class="form-control"  v-model="feature.short_name"  placeholder="Feature Short Name" >
                                 <span v-if="errors.short_name" class="error">{{errors.short_name[0]}}</span>
                            </div>
                            <div class="form_group">
                                <select v-model="selectedValue" name="type" class="form-control" @change="onChange()">
                                        <option value="0">選択してください。</option>
                                        <option >病院</option>
                                        <option >看護</option>
                                </select>
                            </div> <br/>
>>>>>>> 2ac19d7b90124f6ba146bb633fc817c20f8eb4d8

                            <div class="form-group ">
                                <router-link class="btn btn-danger all-btn" to="/featurelist" > キャンセル </router-link>
                                <!-- <router-link class="btn news-post-btn all-btn" to="/featurelist" >Create</router-link>             -->
                                <button class="btn news-post-btn all-btn">Create</button>
                            </div>
                                </form>
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
                feature: {
                        name: '',
                        short_name:'',
                        type:'',
                        user_id:'',
                        recordstatus: ''
                    },
                    selectedValue:0
            }
        },
          created() {
            this.axios
                .get(`/api/feature/edit/${this.$route.params.id}`)
                .then((response) => {
                    //this.selectedValue = response.data.type;
                    this.feature = response.data;

                });
        },


         methods: {
            add() {
                  if( `${this.$route.params.id}` == "undefined")
                  {
                            axios.post('/api/feature/add', this.feature)
                    .then((response) => {
                         this.name = ''
                         this.short_name=''
                         this.type=''
                    alert('Successfully Created')
                     this.$router.push({name: 'featurelist'});
                    }).catch(error=>{

                    if(error.response.status == 422){

                        this.errors = error.response.data.errors
                     }
                  })
                }
                else{
                    this.updateFeature();
                }

            },
            onChange: function(){

               this.feature.type = this.selectedValue;

           },
            updateFeature() {
            this.axios
                .post(`/api/feature/update/${this.$route.params.id}`, this.feature)
                .then((response) => {
                    //this.name = ''
                    alert('Successfully Updated!')
                    this.$router.push({name: 'featurelist'});
                }).catch(error=>{

                if(error.response.status == 422){

                    this.errors = error.response.data.errors

                }
             }) ;
           }

        }

}
</script>


