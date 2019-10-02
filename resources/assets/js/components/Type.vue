<template>

<div class="row">
      <div class="col-12">
          <div class="card ">
                    <div class="card-header text-center jt1">
                        <h4 style="padding-top: 20px;"> タイプを作成</h4>
                    </div>
                    <div class="card-body">
                        <div class="row">
                         <div class="col-sm-1"></div>
                         <div class="col-sm-9">
                                <form @submit.prevent ="add" class="m-t-16">
                                        <div class="form-group row">
                                            <div class="col-sm-3 text-right">
                                                <label for ="name"  ><strong> 名前 : <span class="error">*</span></strong>  </label>
                                            </div>
                                             <div class="col-sm-9">
                                                <input type="name" class="form-control box" id="name"  name="name" v-model="Type.name"  >
                                             </div>
                                        </div>
                                          <div class="form-group row">
                                                <div class="col-sm-3">
                                                </div>
                                                <div class="col-sm-9">
                                                     <span v-if="errors.name" class="error">{{errors.name[0]}}</span>
                                                </div>
                                         </div>

                                        <div class="form-group row">
                                                <div class="col-sm-3 text-right">
                                                        <label for ="description" ><strong> ペアレント :</strong>  </label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <select v-model="selectedValue" class="form-control" @change='getParent()'>
                                                        <option value="0">None</option>
                                                        <option v-for="typelist in TypeList" :key="typelist.id" v-bind:value="typelist.id">
                                                           {{typelist.name}}
                                                        </option>
                                                    </select>
                                                </div>
                                        </div>

                                          <div class="form-group row">
                                                <router-link class="btn btn-danger all-btn" to="/typelist" > キャンセル </router-link>
                                                <div class="col-sm-2">
                                                     <button class="btn news-post-btn">作成</button>
                                                </div>
                                        </div>
                                </form>
                           </div>
                            <div class="col-sm-2"></div>

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

                selectedValue:0

            }
        },
         created() {

             this.axios.get('/api/types/typelist')
              .then(function (response) {
                   this.TypeList = response.data;

              }.bind(this));
        },
        mounted() {
             this.axios
               .get(`/api/types/edit/${this.$route.params.id}`)
                .then((response) => {

                    if( `${this.$route.params.id}` == "undefined")
                    {

                    }
                    else{

                        this.Type.name = response.data.name;
                        this.Type.parent = response.data.parent;
                        this.selectedValue = response.data.parent;
                        this.TypeList.name = response.data.name;
                    }

                });

        },

         methods: {
            add() {
                if( `${this.$route.params.id}` == "undefined")
                {
                    this.axios.post('/api/types/add', this.Type)
                        .then((response) => {
                            this.name = ''
                        alert('Successfully Created')
                        this.$router.push({name: 'typelist'});
                        }).catch(error=>{

                    if(error.response.status == 422){

                        this.errors = error.response.data.errors

                    }
                })
                }
                else{
                     this.updateType();
                }
            },
             getParent: function(){

               this.Type.parent = this.selectedValue;

           },
           updateType() {

                this.axios
                    .post(`/api/types/update/${this.$route.params.id}`, this.Type)
                    .then((response) => {
                        this.name = ''
                          alert('Successfully Updated!')
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
