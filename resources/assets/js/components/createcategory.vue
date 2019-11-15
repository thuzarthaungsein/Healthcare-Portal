<template>
 <div class="row">
      <div class="col-12">
          <div class="card">
              <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <h4 class="page-header header">カテゴリー作成</h4>
                            <br>
                        </div>
                        <div class="col-md-12">
                             <form @submit.prevent="add">
                            <div class="form-group">
                                <label>カテゴリー名 :<span class="error">*</span></label>
                                <input type="text" class="form-control"  v-model="category.name"  placeholder="カテゴリー名を入力してください。" >
                                  <span v-if="errors.name" class="error">{{errors.name}}</span>
                            </div>

                            <div class="form-group">
                                <!-- <button class="btn main-bg-color white all-btn">作成する</button> -->
                                <span class="btn main-bg-color white all-btn" @click="checkValidate()"> 作成する</span>
                                <router-link class="btn btn-danger all-btn" to="/categorylist" > キャンセル </router-link>
                                <!-- <button class="btn news-post-btn all-btn"  @click="checkValidate()>作成する</button> -->
                             
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
                errors: {
                        name: "",
                },
                
    
                category: {
                        name: '',
                        user_id:'',
                        recordstatus: ''
                    }
            }
        },

         methods: {
            add() {
                 this.$swal({
                            title: "確認",
                            text: "作成よろしいでしょうか。",
                            type: "info",
                            width: 350,
                            height: 200,
                            showCancelButton: true,
                            confirmButtonColor: "#6cb2eb",
                            cancelButtonColor: "#b1abab",
                            cancelButtonTextColor: "#000",
                            confirmButtonText: "作成",
                            cancelButtonText: "キャンセル",
                            confirmButtonClass: "all-btn",
                            cancelButtonClass: "all-btn"
                        }).then(response => { 
                            this.axios.post('/api/category/add', this.category)
                    .then((response) => {
                        this.name = ''
                        this.$swal({
                            position: 'top-end',
                            type: 'success',
                            title: '作成されました。',
                            // showConfirmButton: false,
                            // timer: 1800,
                            confirmButtonText: "はい",
                            confirmButtonColor: "#6cb2eb",
                            width: 250,
                            height: 200,
                        })
                        // alert('Successfully Created')
                     this.$router.push({name: 'categorylist'});
                    }).catch(error=>{

                    if(error.response.status == 422){

                        this.errors = error.response.data.errors

                    }
                });
            });
                
            },
            checkValidate() {
                     if (this.category.name) {
                        // console.log('exist');
                        this.errors.name = "";
                    } else {
                        // console.log('null');
                        this.errors.name = " カテゴリー名が必須です。";
                    }
                   if (
                        !this.errors.name
                        
                    ) {
                        this.add();
                    }
                },

        }

}
</script>


