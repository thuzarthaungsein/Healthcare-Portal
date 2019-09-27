<template>
 <div class="row">
      <div class="col-12">
          <div class="card ">
                    <div class="card-header text-center jt1">
                        <h4 style="padding-top: 20px;"> 口コミ作成 </h4>
                    </div>
                    <div class="card-body ">
                        <div class="row">
                         <div class="col-sm-10 offset-1">
                                <form @submit.prevent ="add" class="m-t-16 sendEmail"  method="post">
                                        <div class="form-group row">
                                            <div class="col-sm-3 text-right">
                                                <label for ="title"  ><strong> 口コミタイトル <span class="error sp1">必須</span></strong>   </label>
                                            </div>
                                             <div class="col-sm-9">
                                                <input type="title"  class="form-control box" id="title"  name="title" v-model="comments.title">
                                             </div>    
                                        </div> 
                                         <div class="form-group row">
                                                <div class="col-sm-3">
                                                </div>
                                                <div class="col-sm-9">
                                                     <span v-if="errors.title" class="error">{{errors.title[0]}}</span>  
                                                </div>
                                         </div>

                                         <div class="form-group row">
                                                <div class="col-sm-3 text-right">
                                                        <label for ="comment" ><strong> 口コミ内容 <span class="error sp1">必須</span></strong>  </label>
                                                </div>
                                                <div class="col-sm-9">
                                                    <textarea name="comment" id="comment" class="form-control" cols="50" rows="5" v-model="comments.comment"></textarea>
                                                </div>
                                        </div>
                                        <div class="form-group row">
                                                <div class="col-sm-3">
                                                </div>
                                                <div class="col-sm-9">
                                                     <span v-if="errors.comment" class="error">{{errors.comment[0]}}</span>
                                                </div>
                                         </div>

                                          <div class="form-group row">
                                                <div class="col-sm-3 text-right">
                                                        <label for ="email" ><strong> メールアドレス（半角英数字）<span class="error sp1">必須</span></strong>  </label>
                                                </div>
                                                <div class="col-sm-9">
                                                      <input type="email"  class="form-control box" id="email"  name="email" v-model="comments.email">
                                                </div>
                                        </div>
                                        <div class="form-group row">
                                                <div class="col-sm-3">
                                                </div>
                                                <div class="col-sm-9">
                                                     <span v-if="errors.email" class="error">{{errors.email[0]}}</span>
                                                </div>
                                         </div>

                                         <div class="form-group row">
                                            <div class="col-sm-3 text-right">
                                                <label for ="name"  ><strong> お名前 <span class="error sp1">必須</span></strong>   </label>
                                            </div>
                                             <div class="col-sm-9">
                                                <input type="name" class="form-control box" id="name"  name="name" v-model="comments.name">
                                             </div>    
                                        </div> 
                                         
                                         
                                         <div class="form-group row">
                                            <div class="col-sm-3 text-right">
                                                <label for ="year"  ><strong> 生まれた年 <span class="error sp1">必須</span></strong>   </label>
                                            </div>
                                             <div class="col-sm-9">     
                                                <select id="dob" class="form-control"  v-model="selectedValue" @change="getYear()">
                                                    <option value="0">選択してください:</option>
                                                    <option v-for="year in years" :key="year.id"  :value="year">{{ year }}</option>
                                                    </select>
                                             </div>    
                                        </div> 

                                        <div class="form-group row">
                                            <div class="col-sm-3 text-right">
                                                <label for ="gender"  ><strong> 性別 <span class="error sp1">必須</span></strong>   </label>
                                            </div>
                                             <div class="col-sm-9">
                                                   <label> <input type="radio" class="custom-radio" v-model="comments.gender" value="0"  > 男性 </label>
                                                   <label> <input type="radio" class="custom-radio" v-model="comments.gender" value="1" >女性 </label>
                                             </div>    
                                        </div> 
                                        

                                        <div class="form-group row"  v-for="field in comments.fields" :key="field.id">
                                            <div class="col-sm-3 text-right">
                                                <label for ="zipcode"  ><strong> 郵便番号(半角数字) <span class="error sp1">必須</span></strong>   </label>
                                            </div>
                                             <div class="col-sm-2">
                                                 <input type="text" class="form-control box fnumericzip" value="firstzip" v-model="field.fzipcode" maxlength="3" v-on:keyup="CheckFirstZipcode" required>
                                              <span v-if="errors.fzipcode" class="error">{{errors.fzipcode[0]}}</span>
                                             </div>   
                                               <div class="col-sm-2">
                                                 <input type="text" class="form-control box lnumericzip" value="secondzip" v-model="field.lzipcode" maxlength="4" v-on:keyup="CheckFirstZipcode" required>      
                                                  <span v-if="errors.lzipcode" class="error">{{errors.lzipcode[0]}}</span>
                                             </div>   
                                        </div> 
                                        <div class="form-group row">
                                                <div class="col-sm-3">
                                                </div>
                                                <div class="col-sm-9">
                                                     <span v-if="errors.fields" class="error">{{errors.fields}}</span>
                                                </div>
                                         </div>

                                        <div class="form-group row" style="padding-top:60px;">
                                            <div class="col-sm-5"></div>
                                            <div class="col-sm-4">     
                                              <!-- <a href="#" ><strong> 利用規約 </strong></a>  
                                              <a href="#" ><strong> 個人情報保護方針 </strong></a>      -->
                                              <router-link to="/termsAndConditions" > <strong>「プライバシーポリシー」</strong></router-link>
                                            </div>
                                            <div class="col-sm-3"></div>
                                          
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-sm-3"></div>
                                            <div class="col-sm-7">
                                                 <button class="btn news-post-btn btn-md"> 利用規約、個人情報の取り扱いについてに同意して確認する </button>   
                                            </div>
                                            <div class="col-sm-4"></div>    
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

                  this.axios.post('/api/comments/add', this.comments)
                    .then((response) => {   
                    alert('Mail Sent Successfully !') 

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


