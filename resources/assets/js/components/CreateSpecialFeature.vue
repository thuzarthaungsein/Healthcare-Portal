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
                                <input type="text" class="form-control"  v-model="feature.name"  placeholder="特徴" >
                                <span v-if="errors.name" class="error">{{errors.name[0]}}</span>
                            </div>
                            <div class="form-group">
                                <label>機能の短い名前 :<span class="error">*</span></label>
                                <input type="text" class="form-control" v-model="feature.short_name"  placeholder="機能の短い名前" >
                                 <span v-if="errors.short_name" class="error">{{errors.short_name[0]}}</span>
                            </div>
                            <div class="form_group">
                                <label> カテゴリー:<span class="error">*</span></label>
                                <select v-model="selectedValue" name="type" class="form-control" @change="onChange()">
                                        <option value="0">選択してください。</option>
                                        <option value="病院">病院</option>
                                        <option value="介護">介護</option>
                                </select>
                                 <span v-if="errors.type" class="error">{{errors.type[0]}}</span>
                            </div> <br/>

                            <div class="form-group ">
                                <router-link class="btn btn-danger all-btn" to="/featurelist" > キャンセル </router-link>
                                <!-- <router-link class="btn news-post-btn all-btn" to="/featurelist" >Create</router-link>             -->
                                <button class="btn news-post-btn all-btn">{{subtitle}}</button>
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
                    },
                    selectedValue:0,
                    header: '特殊機能作成',
                    subtitle: '作る'
            }
        },
          created() {
              if(this.$route.params.id){
              //  alert('title');
                //  this.title = this.title.toUpperCase();

                  this.axios
                    .get(`/api/feature/edit/${this.$route.params.id}`)
                    .then((response) => {

                    this.feature= response.data;
                    if(this.feature.type == '病院')
                    { 
                        this.selectedValue = '病院';
                    }
                    else if (this.feature.type == '介護') {
                        this.selectedValue = '介護';
                    }
                      this.header = ' 特徴更新';
                        this.subtitle = '更新';
                        return this.header;
                        return this.subtitle;

                });
              }
        },

         methods: {
            add() {
                // console.log("add");
                // console.log(this.feature);
                // alert('add');
                  if( `${this.$route.params.id}` == "undefined")
                  {
                            axios.post('/api/feature/add', this.feature)
                    .then((response) => {
                         this.name = ''
                         this.short_name=''
                         this.type=''
                         console.log(response);
                    //alert('Successfully Created');
                    this.$swal({
                            position: 'top-end',
                            type: 'success',
                            title: '作成されました',
                            showConfirmButton: false,
                            timer: 1800,
                            width: 250,
                            height: 200,
                        })
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

                    //alert('Successfully Updated!')
                    this.$swal({
                            position: 'top-end',
                            type: 'success',
                            title: '作成されました',
                            showConfirmButton: false,
                            timer: 1800,
                            width: 250,
                            height: 200,
                        })
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


