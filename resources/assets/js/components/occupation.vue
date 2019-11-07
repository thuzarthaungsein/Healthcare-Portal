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
                                    <label>職種名 :<span class="error">*</span></label>
                                    <input type="text" class="form-control"  v-model="occupation.name"  placeholder="職種名を入力してください。" >
                                    <span v-if="errors.name" class="error">{{errors.name[0]}}</span>
                                </div>
                                <div class="form-group">
                                <label>ペアレント :<span class="error">*</span></label>
                                    <select v-model="selectedValue" class="form-control" @change='getOccupation()'>
                                        <option value="0">選択してください。</option>
                                        <option v-for="occupations in occupationList" :key="occupations.id" v-bind:value="occupations.id">
                                            {{occupations.name}}
                                        </option>
                                    </select>
                            </div><br/>
                            <div class="form-group ">
                                <button class="btn main-bg-color white all-btn">{{subtitle}}</button>
                                <router-link class="btn btn-danger all-btn" to="/occupationlist" > キャンセル </router-link>
                                <!-- <router-link class="btn news-post-btn all-btn" to="/featurelist" >Create</router-link>             -->                                
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

                 occupation: {
                        name: '',
                        parent:'',
                    },
                occupationList:{
                        id: '',
                        name: ''
                   },

                selectedValue:0,
                header: '職種作成',
                subtitle: '作成する'

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
                        this.header = ' 職種更新';
                        this.subtitle = '更新する';
                        return this.header;
                        return this.subtitle;
                    }

                });

        },


         methods: {
            add() {
                          if( `${this.$route.params.id}` == "undefined")
                {
                    this.$swal({
                                title: "作成",
                            text: "作成よろしでしょうか。",
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
                                  this.axios.post('/api/occupation/add', this.occupation)
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
                        this.$router.push({name: 'occupationlist'});
                        }).catch(error=>{

                    if(error.response.status == 422){

                        this.errors = error.response.data.errors

                    }
                })
                            })

                }
                else{
                     this.updateType();
                }
            },

               getOccupation: function(){

               this.occupation.parent = this.selectedValue;
                },

              updateType() {
                  this.$swal({
                            title: "確認",
                            text: "更新よろしでしょうか。",
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
                    .post(`/api/occupation/update/${this.$route.params.id}`, this.occupation)
                    .then(response => {
                        // this.name = ''
                        //   alert('Successfully Updated!')
                        this.$swal({
                            position: 'top-end',
                            type: 'success',
                            title: '更新されました。',
                            confirmButtonText: "はい",
                            confirmButtonColor: "#6cb2eb",
                            width: 250,
                            height: 200,
                        })
                        this.$router.push({name: 'occupationlist'});
                    }).catch(error=>{

                    if(error.response.status == 422){

                        this.errors = error.response.data.errors

                    }
                });
                         });
                
            },



        }

}
</script>
