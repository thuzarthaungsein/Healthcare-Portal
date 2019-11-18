<template>    
 <div class="row">
      <div class="col-12">  
          <div class="card">
              <div class="card-body">                
                    <div class="row">
                         
                        <div class="col-md-12">
                            <h4 class="page-header header">施設作成</h4>
                        </div>
                        <div class="col-md-12">
                             <form @submit.prevent="add">
                            <div class="form-group">
                                <label>施設の種類:<span class="error">*</span></label>
                                <input type="text" class="form-control"  v-model="facility.description"  placeholder="施設の種類を入力してください。" >
                                      <span v-if="errors.description" class="error">{{errors.description}}</span>
                            </div>
                        
                            <div class="form-group">
                                <span class="btn main-bg-color white all-btn" @click="checkValidate()"> 作成する</span>
                                <router-link to="/facilitieslist" class="btn btn-danger all-btn">キャンセル</router-link>    
                                <!-- <button class="btn news-post-btn all-btn" > 作成する </button> -->
                                                                         
                                <!-- <router-link to="/facilitieslist" class="btn news-post-btn all-btn">更新</router-link> -->
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
        description:"",
      },
      facility: {
        description: ""
      }
    };
  },

  methods: {
    add() {
     this.$swal({
                            title: "確認",
                            text: "作成よろしいでしょうか。",
                            type: "success",
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
                     this.axios.post("/api/facility/add", this.facility)
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
                     this.$router.push({ name: "facilitieslist" });
                    }).catch(error=>{

                    if(error.response.status == 422){

                        this.errors = error.response.data.errors

                    }
                });
            });
    },
     checkValidate() {
                     if (this.facility.description) {
                        // console.log('exist');
                        this.errors.description = "";
                    } else {
                        // console.log('null');
                        this.errors.description = " 施設の種類が必須です。";
                    }
                   if (
                        !this.errors.description
                        
                    ) {
                        this.add();
                    }
                },
  }
};
</script>


