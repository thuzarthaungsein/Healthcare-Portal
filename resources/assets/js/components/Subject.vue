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
                                    <label>科目 :<span class="error">*</span></label>
                                    <input type="text" class="form-control"  v-model="Subject.name"  placeholder="科目を入力してください。" >
                                    <span v-if="errors.name" class="error">{{errors.name}}</span>
                                </div>
                                <div class="form-group">
                                <label>ペアレント :<span class="error">*</span></label>
                                    <select v-model="selectedValue" class="form-control" @change='getParent()'>
                                        <option value="0">選択してください。</option>
                                        <option v-for="Subjectlist in SubjectList" :key="Subjectlist.id" v-bind:value="Subjectlist.id">
                                            {{Subjectlist.name}}
                                        </option>
                                    </select>
                            </div><br/>
                                 <div class="form-group">
                                        <span class="btn main-bg-color white all-btn" @click="checkValidate()">{{subtitle}}</span>
                                        <router-link class="btn btn-danger all-btn" to="/subjectlist" > キャンセル </router-link>
                                         <!-- <button class="btn news-post-btn all-btn">{{subtitle}}</button> -->
                                        
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
                 errors:{
                     name:""
                 },
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
                header: '診療科目作成',
                subtitle: '作成する'

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
                        this.header = ' 診療科目更新';
                        this.subtitle = '更新する';
                        return this.header;
                        return this.subtitle;
                });
            }


        },

         methods: {
               checkValidate() {
                     if (this.Subject.name) {
                        // console.log('exist');
                        this.errors.name = "";
                    } else {
                        // console.log('null');
                        this.errors.name = "科目が必須です。";
                    }
                   if (
                        !this.errors.name
                        
                    ) {
                        this.add();
                    }
                },
				
            add() {
                 if( `${this.$route.params.id}` == "undefined")
                {
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
                                   this.axios.post('/api/subjects/add', this.Subject)
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
                        this.$router.push({name: 'subjectlist'});
                        }).catch(error=>{

                    if(error.response.status == 422){

                        this.errors = error.response.data.errors

                    }
                })
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
                    .post(`api/subjects/update/${this.$route.params.id}`, this.Subject)
                    .then((response) => {
                        this.$swal({
                            position: 'top-end',
                            type: 'success',
                            title: '更新されました。',
                            // showConfirmButton: false,
                            // timer: 1800,
                            confirmButtonText: "はい",
                            confirmButtonColor: "#6cb2eb",
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
                         });
               
            },

        }

}
</script>
