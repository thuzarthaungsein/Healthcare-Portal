<template>
 <div class="">
     
      <div class="col-12 col-lg-12 col-md-10 tab" >
       
          <div class="card title_comment" style="background:#fff4ee;">
     
                    <!-- <div class="card-header text-center jt1">
                        <h4 style="padding-top: 20px;"><i class="	fa fa-comments" style="font-size:;"></i> 口コミ作成 </h4>
                    </div> -->
                       <div class="col-12 m-b-10 m-t-8"><h4 class="comment-apply-color" style="margin-left:5px;"><i class="fa fa-comments com_ic"></i> 口コミ作成</h4></div>
                    <div class="card-body ">
                        <div class="row">
                         <div class="col-sm-10 offset-1">
                                <form @submit.prevent ="add" class="m-t-16 sendEmail comform"  method="post">
                                        <div class="form-group row">
                                            <div class="col-sm-4 text-right">
                                                <label for ="title"  ><strong> 口コミタイトル <span class="error sp1">必須</span></strong>   </label>
                                            </div>
                                             <div class="col-sm-8">
                                                <input type="title"  class="form-control box " id="title"  name="title" v-model="comments.title">
                                             </div>
                                        </div>
                                         <div class="form-group row">
                                                <div class="col-sm-4">
                                                </div>
                                                <div class="col-sm-8">
                                                     <span v-if="errors.title" class="error">{{errors.title[0]}}</span>
                                                </div>
                                         </div>

                                       
                                        <div class="form-group row">
                                                <div class="col-sm-4">
                                                </div>
                                                <div class="col-sm-8">
                                                     <span v-if="errors.comment" class="error">{{errors.comment[0]}}</span>
                                                </div>
                                         </div>

                                          <div class="form-group row">
                                                <div class="col-sm-4 text-right">
                                                        <label for ="email" ><strong> メールアドレス（半角英数字）<span class="error sp1">必須</span></strong>  </label>
                                                </div>
                                                <div class="col-sm-8">
                                                      <input type="email"  class="form-control box " id="email"  name="email" v-model="comments.email">
                                                </div>
                                        </div>
                                        <div class="form-group row">
                                                <div class="col-sm-4">
                                                </div>
                                                <div class="col-sm-8">
                                                     <span v-if="errors.email" class="error">{{errors.email[0]}}</span>
                                                </div>
                                         </div>

                                         <div class="form-group row">
                                            <div class="col-sm-4 text-right">
                                                <label for ="name"  ><strong> お名前 <span class="error sp1">必須</span></strong>   </label>
                                            </div>
                                             <div class="col-sm-8">
                                                <input type="name" class="form-control box " id="name"  name="name" v-model="comments.name">
                                             </div>
                                        </div><br>


                                         <div class="form-group row">
                                            <div class="col-sm-4 text-right">
                                                <label for ="year"  ><strong> 生まれた年 <span class="error sp1">必須</span></strong>   </label>
                                            </div>
                                             <div class="col-sm-8">
                                                <select id="dob" class="form-control"  v-model="selectedValue" @change="getYear()">
                                                    <option value="0">選択してください:</option>
                                                    <option v-for="year in years" :key="year.id"  :value="year">{{ year }}</option>
                                                </select>
                                             </div>
                                        </div><br>

                                        <div class="form-group row">
                                            <div class="col-sm-4 text-right">
                                                <label for ="gender"  ><strong> 性別 <span class="error sp1">必須</span></strong>   </label>
                                            </div>
                                             <div class="col-sm-8">
                                                   <label class="control control--radio"> <input type="radio" class="custom-radio" v-model="comments.gender" value="0"  > 男性  <div class="control__indicator"></div></label>
                                                   <label class="control control--radio"> <input type="radio" class="custom-radio" v-model="comments.gender" value="1" >女性  <div class="control__indicator"></div></label>
                                             </div>
                                        </div><br>

                                        <div class="form-group row"  v-for="field in comments.fields" :key="field.id">
                                            <div class="col-sm-4 text-right">
                                                <label for ="zipcode" ><strong> 郵便番号(半角数字) <span class="error sp1">必須</span></strong>   </label>
                                            </div>
                                             <div class="col-sm-4">
                                                 <input type="text" class="form-control box fnumericzip" value="firstzip" v-model="field.fzipcode" maxlength="3" v-on:keyup="CheckFirstZipcode" >
                                              <span v-if="errors.fzipcode" class="error">{{errors.fzipcode[0]}}</span>
                                             </div>
                                               <div class="col-sm-4">
                                                 <input type="text" class="form-control box lnumericzip" value="secondzip" v-model="field.lzipcode" maxlength="4" v-on:keyup="CheckFirstZipcode" >
                                                  <span v-if="errors.lzipcode" class="error">{{errors.lzipcode[0]}}</span>
                                             </div>
                                        </div><br>

                                          <div class="form-group row">
                                                <div class="col-sm-4 text-right">
                                                        <label for ="comment" ><strong> 口コミ内容 <span class="error sp1">必須</span></strong>  </label>
                                                </div>
                                                <div class="col-sm-8">
                                                    <textarea name="comment" id="comment" class="form-control" cols="50" rows="5" v-model="comments.comment"></textarea>
                                                </div>
                                        </div>
                                        
                                        <div class="form-group row">
                                                <div class="col-sm-4">
                                                </div>
                                                <div class="col-sm-8">
                                                     <span v-if="errors.fields" class="error">{{errors.fields}}</span>
                                                </div>
                                         </div>

                                        <div class="form-group row">
                                            <div class="col-sm-5"></div>
                                            <div class="col-sm-4">
                                              <!-- <a href="#" ><strong> 利用規約 </strong></a>
                                              <a href="#" ><strong> 個人情報保護方針 </strong></a>      -->
                                              <router-link to="/termsAndConditions" > <strong>「プライバシーポリシー」</strong></router-link>
                                            </div>
                                            <div class="col-sm-3"></div>

                                        </div>

                                        <div class="form-group row">
                                            
                                            <div class="col-sm-12 text-center">
                                                 <router-link class="btn btn-danger all-btn" to="/commentlist" > キャンセル </router-link>
                                                 <!-- <button class="btn main-bg-color white all-btn"> 利用規約、個人情報の取り扱いについてに同意して確認する </button> -->
                                                 <button class="btn main-bg-color white all-btn"> 作成する </button>
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
                errors:[],
                comments: {
                        type:'confirm',
                        title: '',
                        comment:'',
                        email:'',
                        year:'',
                        gender:'',
                        fields:[{
                            fzipcode:'',
                            lzipcode:'',
                            id:''
                        }],
                        customer_id:'',
                        status:'',
                        recordstatus:'',

                    },
                    selectedValue:0,
            }

        },
        computed : {
            years () {
            const year = new Date().getFullYear()
            return Array.from({length: year - 1900}, (value, index) => 1901 + index)
            }
        },
        created(){
            this.comments.gender = 0;
        },


         methods: {
            add() {
                  this.$loading(true);
                  this.axios.post('/api/comments/add', this.comments)
                    .then((response) => {
                        this.$loading(false);
                        this.type="completed";
                    this.name = ''
                        this.$swal({
                            position: 'top-end',
                            type: 'success',
                            title: '作成されました',
                            showConfirmButton: false,
                            timer: 1800,
                            width: 250,
                            height: 200,
                        })

                     this.$router.push({name: 'commentlist'});
                    }).catch(error=>{

                    if(error.response.status == 422){

                        this.errors = error.response.data.errors

                    }
                })


            },
             getYear: function(){

               this.comments.year = this.selectedValue;

           },
           CheckFirstZipcode(){
               var fzip = $('.fnumericzip').val();
               var lzip = $('.lnumericzip').val();

                if(!fzip.match('^(0|[1-9][0-9]*)$')){

                   this.errors.fields = 'Zipcode must be numeric !'
                }
                else if(fzip.match('^(0|[1-9][0-9]*)$') && lzip == '' )
                {
                     this.errors.fields = ''
                }
                else if(fzip.match('^(0|[1-9][0-9]*)$') && !lzip.match('^(0|[1-9][0-9]*)$'))
                {

                     this.errors.fields = 'Zipcode must be numeric !'
                }
                else if(!fzip.match('^(0|[1-9][0-9]*)$') && lzip.match('^(0|[1-9][0-9]*)$'))
                {
                     this.errors.fields = 'Zipcode must be numeric !'
                }
                else{
                    this.errors.fields = ''
                }

            }


         }
}



</script>


