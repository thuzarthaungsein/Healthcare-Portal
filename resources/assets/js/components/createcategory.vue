<template>
 <div class="row">
      <div class="col-12">
          <div class="card">
              <div class="card-body">                
                    <div class="row">
                        <div class="col-md-12">
                            <h4 class="page-header header">カテゴリ作成</h4>
                            <br>
                        </div>
                        <div class="col-md-12">
                             <form @submit.prevent="add">
                            <div class="form-group">
                                <label>カテゴリ名 :<span class="error">*</span></label>
                                <input type="text" class="form-control"  v-model="category.name"  placeholder="カテゴリ 名" >
                                  <span v-if="errors.name" class="error">{{errors.name[0]}}</span>  
                            </div>

                            <div class="form-group ">
                                <router-link class="btn btn-danger all-btn" to="/categorylist" > キャンセル </router-link>
                                <router-link class="btn news-post-btn all-btn" to="/categorylist" >カテゴリを投稿する</router-link>                                
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
                category: {
                        name: '',
                        user_id:'',
                        recordstatus: ''
                    }
            }
        },

         methods: {
            add() {
                axios.post('http://localhost:8000/api/category/add', this.category)
                    .then((response) => {
                        this.name = ''
                    alert('Successfully Created')
                    console.log(response);
                     this.$router.push({name: 'categorylist'});
                    }).catch(error=>{
                        
                    if(error.response.status == 422){
                      
                        this.errors = error.response.data.errors       
                          
                    }
                })   
            }

        }

}
</script>


