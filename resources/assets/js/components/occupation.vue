<template>

<div class="row">
      <div class="col-12">
          <div class="card ">
                    <div class="card-header text-center jt1">
                        <h4 style="padding-top: 20px;">職業作成</h4>
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
                                                <input type="name" class="form-control box" id="name"  name="name"  v-model="occupation.name" />
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
                                                        <option v-for="occupations in occupationList" :key="occupations.id" v-bind:value="occupations.id">
                                                           {{occupations.name}}
                                                        </option>
                                                    </select>
                                                </div>
                                        </div>

                                          <div class="form-group row">
                                                <div class="col-sm-10">

                                                </div>
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
             
                 occupation: {
                        name: '',
                        parent:'',
                    },
                occupationList:{
                        id: '',
                        name: ''
                   },

                selectedValue:0

            }
        },

        created() {

             this.axios.get('/api/occupation/occupationList')
              .then(function (response) {
                   this.occupationList = response.data;

              }.bind(this));
        },

         mounted() {
             this.axios
               .get(`/api/occupation/edit/${this.$route.params.id}`)
                .then((response) => {

                    if( `${this.$route.params.id}` == "undefined")
                    {

                    }
                    else{

                        this.occupation.name = response.data.name;
                        this.occupation.parent = response.data.parent;
                        this.selectedValue = response.data.parent;
                        this.occupationList.name = response.data.name;
                    }

                });

        },
       

         methods: {
            add() {
                if( `${this.$route.params.id}` == "undefined")
                {
                    this.axios.post('/api/occupation/add', this.occupation)
                        .then((response) => {
                            this.name = ''
                        alert('Successfully Created')
                        this.$router.push({name: 'occupationlist'});
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

               this.occupation.parent = this.selectedValue;
                },

              updateType() {

                this.axios
                    .post(`/api/occupation/update/${this.$route.params.id}`, this.occupation)
                    .then((response) => {
                        this.name = ''
                          alert('Successfully Updated!')
                        this.$router.push({name: 'occupationlist'});
                    }).catch(error=>{

                    if(error.response.status == 422){

                        this.errors = error.response.data.errors

                    }
                })   ;
            },
           
           

        }

}
</script>