<template>    
 <div class="row">
      <div class="col-12">  
          <div class="card">
              <div class="card-body">
                <div class="col-md-12">
                    <div class="row">
                         
                        <div class="col-md-12">
                            <h4 class="page-header">カテゴリを作成</h4>
                            <br>
                        </div>
                        <div class="col-md-12">
                             <form @submit.prevent="add">
                            <div class="form-group">
                                <label>カテゴリ 名 :<span class="error">*</span></label>
                                <input type="text" class="form-control"  v-model="category.name"  placeholder="カテゴリ 名" required>
                            </div>
                        
                            <div class="form-group ">
                                <div class="form-group row">
                                    <div class="col-1 pad-free">
                                        <button class="btn news-post-btn">Create</button>
                                    </div>
                                    <div class="col-1 pad-free">
                                        <router-link class="btn btn-warning" to="/categorylist" > キャンセル </router-link>
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
                    alert('Successfully Created')
                    console.log(response);
                     this.$router.push({name: 'categorylist'});
                    })
            }
           
        }
             
}
</script>


