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
                                    <input type="text" class="form-control"  v-model="Subject.name"  placeholder="名前" >
                                    <span v-if="errors.name" class="error">{{errors.name[0]}}</span>
                                </div>
                                <div class="form-group">
                                <label>ペアレント :<span class="error">*</span></label>
                                    <select v-model="selectedValue" class="form-control" @change='getParent()'>
                                        <option value="0">None</option>
                                        <option v-for="Subjectlist in SubjectList" :key="Subjectlist.id" v-bind:value="Subjectlist.id">
                                            {{Subjectlist.name}}
                                        </option>
                                    </select>
                            </div><br/>
                                 <div class="form-group">
                                        <router-link class="btn btn-danger all-btn" to="/subjectlist" > キャンセル </router-link>
                                        <button class="btn news-post-btn">作成</button>
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
                 Subject: {
                        name: '',
                        parent:'',
                    },
                SubjectList:{
                        id: '',
                        name: ''
                   },

                selectedValue:0,
                header: 'Create Subject',
                subtitle: '作る'

            }
        },
         created() {

             this.axios.get('/api/subjects/subjectlist')
              .then(function (response) {
                   this.SubjectList = response.data;
                   console.log(this.SubjectList);

              }.bind(this));
        },
        mounted() {

            if(this.$route.params.id)
            {

                this.axios
               .get(`/api/subjects/edit/${this.$route.params.id}`)
                .then((response) => {
                        this.Subject.name = response.data.name;
                        this.Subject.parent = response.data.parent;
                        this.selectedValue = response.data.parent;
                        this.SubjectList.name = response.data.name;
                });
            }


        },

         methods: {
            add() {
                if( `${this.$route.params.id}` == "undefined")
                {
                    this.axios.post('/api/subjects/add', this.Subject)
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
                        this.$router.push({name: 'subjectlist'});
                        }).catch(error=>{

                    if(error.response.status == 422){

                        this.errors = error.response.data.errors

                    }
                })
                }
                else{
                     this.updateSubject();
                }
            },
             getParent: function(){

               this.Subject.parent = this.selectedValue;

           },
           updateSubject() {
                this.axios
                    .post(`api/subjects/update/${this.$route.params.id}`, this.Subject)
                    .then((response) => {
                        this.$swal({
                            position: 'top-end',
                            type: 'success',
                            title: '作成されました',
                            showConfirmButton: false,
                            timer: 1800,
                            width: 250,
                            height: 200,
                        })
                        // this.name = ''
                        //   alert('Successfully Updated!')
                        this.$router.push({name: 'subjectlist'});
                    }).catch(error=>{

                    if(error.response.status == 422){

                        this.errors = error.response.data.errors

                    }
                });
            },

        }

}
</script>
