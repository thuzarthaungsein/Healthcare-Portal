<template>
 <div class="row">
      <div class="col-12">
          <div class="card">
              <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h4 class="page-header header">ステーション作成</h4>
                            <br>
                        </div>
                        <div class="col-md-12">
                             <form @submit.prevent="add">
                            <div class="form-group">
                                <label>駅名 :<span class="error">*</span></label>
                                <input type="text" class="form-control"  v-model="category.name"  placeholder="カテゴリ 名" >
                                  <span v-if="errors.name" class="error">{{errors.name[0]}}</span>
                            </div>

                            <div class="form-group">
                                <router-link class="btn btn-danger all-btn" to="/categorylist" > キャンセル </router-link>
                                <button class="btn news-post-btn all-btn">作成する</button>
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
                this.axios.post('/api/category/add', this.category)
                    .then((response) => {
                        this.name = ''
                        this.$swal({
                            position: 'top-end',
                            type: 'success',
                            title: '作成されました',
                            showConfirmButton: false,
                            timer: 1800,
                            width: 250,
                            height: 200,
                        })
                        // alert('Successfully Created')
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


