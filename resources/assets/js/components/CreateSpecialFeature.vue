<template>
 <div class="row">
      <div class="col-12">
          <div class="card">
              <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <!-- <h4 class="page-header header" id="myspan">特殊機能作成</h4> -->
                            <h4 class="page-header header">{{ header }}</h4>
                        </div>
                        <div class="col-md-12">
                             <form @submit.prevent="add">
                            <div class="form-group">
                                <label>特徴 :<span class="error">*</span></label>
                                <input type="text" class="form-control"  v-model="feature.name"  placeholder="特徴を入力してください。" >
                                <!-- <span v-if="errors.name" class="error">{{errors.name[0]}}</span> -->
                                  <span v-if="errors.name" class="error">{{errors.name}}</span>
                            </div>
                            <div class="form-group">
                                <label>特徴の略語 :<span class="error">*</span></label>
                                <input type="text" class="form-control" v-model="feature.short_name"  placeholder="特徴の略語を入力してください。" >
                                 <!-- <span v-if="errors.short_name" class="error">{{errors.short_name[0]}}</span> -->
                                   <span v-if="errors.short_name" class="error">{{errors.short_name}}</span>
                            </div>
                            <div class="form_group">
                                <label> カテゴリー:<span class="error">*</span></label>
                                <select v-model="feature.type" name="type" class="form-control">
                                        <option v-bind:value='-1'>選択してください。 </option>
                                        <option value="病院" >病院</option>
                                        <option value="介護">介護</option>
                                </select>
                                <span v-if="errors.type" class="error">{{errors.type}}</span>
                                    <!-- <span v-if="errors.nur" class="error">{{errors.nur}}</span> -->
                            </div> <br/>

                            <div class="form-group ">
                                  <span class="btn main-bg-color white all-btn" @click="checkValidate()"> {{subtitle}}</span>
                                <!-- <button class="btn main-bg-color white all-btn">{{subtitle}}</button> -->
                                <router-link class="btn btn-danger all-btn" to="/featurelist" > キャンセル </router-link>
                                <!-- <router-link class="btn news-post-btn all-btn" to="/featurelist" >Create</router-link>             -->
                                <!-- <button class="btn news-post-btn all-btn" >{{subtitle}}</button> -->
                              
                                <!-- {{ this.errors.type }} -->
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
                   name:"",
				   short_name:"",
                   selectedValue:"",
                   host:"",
                   nurse:"",
                   type: ""

                },
                feature: {
                        name: '',
                        short_name:'',
                        type: '-1',
                        host:"",
                        nurse:""
                    },
                    selectedValue:0,
                    header: '特殊を作成',
                    subtitle: '作成する'
            }
        },
          created() {
            //   console.log('22222');
              console.log(this.$route.params.id);
              if(this.$route.params.id){
              //  alert('title');
                //  this.title = this.title.toUpperCase();

                  this.axios
                    .get(`/api/feature/edit/${this.$route.params.id}`)
                    .then((response) => {

                    this.feature= response.data;
                    if(this.feature.type == '病院')
                    {
                        this.feature.type = '病院';
                    }
                    else if (this.feature.type == '介護') {
                        this.feature.type = '介護';
                    }
                      this.header = ' 特徴更新';
                        this.subtitle = '更新する';
                        return this.header;
                        return this.subtitle;

                });
              }
        },

         methods: {
              checkValidate() {
                //   alert(1);
                     if (this.feature.name) {
                        // console.log('exist');
                        this.errors.name = "";
                    } else {
                        // console.log('null');
                        this.errors.name = " 特徴が必須です。";
                    }

                    if (this.feature.short_name) {
                        // console.log('exist');
                        this.errors.short_name = "";
                    } else {
                        // console.log('null');
                        this.errors.short_name = " 特徴の略語が必須です。";
                    }
                    

                    if (this.feature.type == '-1') {
                        console.log(this.feature.type);
                        this.errors.type = " カテゴリが必須です。";
                    }
                    else {
                        this.errors.type = "";
                    }

                   if (
                        !this.errors.name &&
                        !this.errors.short_name &&
                        !this.errors.type
                        
                    ) {
                        
                        this.add();
                    }
                },
				
            add() {
                 if( !this.$route.params.id || this.$route.params.id == 'undefined')
                {
                    // console.log(`${this.$route.params.id}`);
                    // console.log('this.$route.params.id');
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
                            }).then(response =>{
                                   axios.post('/api/feature/add', this.feature)
                        .then(response => {
                            this.name = ''
                            console.log(response);
                            this.$swal({
                            position: 'top-end',
                            type: 'success',
                            title: '作成されました。',
                            confirmButtonText: "はい",
                            confirmButtonColor: "#6cb2eb",
                            // showConfirmButton: false,
                            // timer: 1800,
                            width: 250,
                            height: 200,
                        })
                        // alert('Successfully Created')
                        this.$router.push({name: 'featurelist'});
                        }).catch(error=>{

                    if(error.response.status == 422){

                        this.errors = error.response.data.errors

                    }
                })
            })

                }
                else{
                    //console.log('bbbbb');
                    console.log(this.$route.params.id);
                     this.updateFeature();
                }

            },
        //     onChange: function(){
        //        this.feature.type = this.selectedValue;
        //     //    console.log(this.selectedValue);

        //    },
            updateFeature() {
                 this.$swal({
                            title: "確認",
                            text: "更新よろしいでしょうか。",
                            type: "info",
                            width: 350,
                            height: 200,
                            showCancelButton: true,
                            confirmButtonColor: "#6cb2eb",
                            cancelButtonColor: "#b1abab",
                            cancelButtonTextColor: "#000",
                            confirmButtonText: "更新",
                            cancelButtonText: "キャンセル",
                            confirmButtonClass: "all-btn",
                            cancelButtonClass: "all-btn"
                        }).then(response => { 
                             this.axios
                .post(`/api/feature/update/${this.$route.params.id}`, this.feature)
                .then((response) => {

               
                    this.$swal({
                            position: 'top-end',
                            type: 'success',
                            title: '更新されました。',
                            confirmButtonText: "はい",
                            confirmButtonColor: "#6cb2eb",
                            width: 250,
                            height: 200,
                        })
                    this.$router.push({name: 'featurelist'});
                }).catch(error=>{

                if(error.response.status == 422){

                    this.errors = error.response.data.errors

                }
                         });
           
             }) ;
           }

        }

}
</script>


