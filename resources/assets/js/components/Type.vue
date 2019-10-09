<template>
<div class="row">
      <div class="col-12">
          <div class="card">
              <div class="card-body">
                  <div class="row">
                      <div class="col-md-12">
                            <h4 class="page-header header">{{ header }}</h4>
                        </div>
                        <div class="col-md-12">
                            <form @submit.prevent ="add">
                                <div class="form-group">
                                    <label>名前 :<span class="error">*</span></label>
                                    <input type="text" class="form-control"  v-model="Type.name"  placeholder="名前" >
                                    <span v-if="errors.name" class="error">{{errors.name[0]}}</span>
                                </div>
                                <div class="form-group">
                                <label>ペアレント :<span class="error">*</span></label>
                                    <select v-model="selectedValue" class="form-control" @change='getParent()'>
                                        <option value="0">None</option>
                                        <option v-for="typelist in TypeList" :key="typelist.id" v-bind:value="typelist.id">
                                            {{typelist.name}}
                                        </option>
                                    </select>
                            </div><br/>
                             <div class="form-group ">
                                <router-link class="btn btn-danger all-btn" to="/typelist" > キャンセル </router-link>
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
                 errors:[
                ],
                //  Parents : [ { id: 0,name : 'None'},{ id: 1, name: 'Hospital' },{ id: 2, name: 'Nursing' }],
                 Type: {
                        name: '',
                        parent:'',
                    },
                TypeList:{
                        id: '',
                        name: ''
                   },

                selectedValue:0,
                header: 'タイプを作成',
                subtitle: '作る'

            }
        },
         created() {

             this.axios.get('/api/types/typelist')
              .then(function (response) {
                   this.TypeList = response.data;
              }.bind(this));
        },
        mounted() {
            if(this.$route.params.id)
            {
               this.axios
               .get(`/api/types/edit/${this.$route.params.id}`)
                .then((response) => {

                        this.Type.name = response.data.name;
                        this.Type.parent = response.data.parent;
                        this.selectedValue = response.data.parent;
                        this.TypeList.name = response.data.name;
                        this.header = ' 特徴更新';
                        this.subtitle = '更新';
                        return this.header;
                        return this.subtitle;


                });
            }


        },

         methods: {
            add() {
                if(this.$route.params.id)
                {
                     this.updateType();
                }
                else{

                      this.axios.post('/api/types/add', this.Type)
                        .then((response) => {
                            this.name = ''
                            console.log(response);
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
                        this.$router.push({name: 'typelist'});
                        }).catch(error=>{

                    if(error.response.status == 422){

                        this.errors = error.response.data.errors

                    }
                  })
                }
            },
             getParent: function(){

               this.Type.parent = this.selectedValue;

           },
           updateType() {

                this.axios
                    .post(`/api/types/update/${this.$route.params.id}`, this.Type)
                    .then((response) => {
                        // this.name = ''
                        //   alert('Successfully Updated!')
                        this.$swal({
                            position: 'top-end',
                            type: 'success',
                            title: '作成されました',
                            showConfirmButton: false,
                            timer: 1800,
                            width: 250,
                            height: 200,
                        })
                        this.$router.push({name: 'typelist'});
                    }).catch(error=>{

                    if(error.response.status == 422){

                        this.errors = error.response.data.errors

                    }
                })   ;
            },

        }

}
</script>
