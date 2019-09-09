<template>
 <div class="row">
      <div class="col-12">
          <div class="card ">
                    <div class="card-header text-center">
                        <h4 style="padding-top: 20px;"> Job Create </h4>
                    </div>
                    <div class="card-body ">
                        <div class="row">
                         <div class="col-sm-1"></div>
                         <div class="col-sm-9">
                                <form @submit.prevent ="add" class="m-t-16 sendEmail"  method="post">
                                        <div class="form-group row">
                                            <div class="col-sm-3 text-right">
                                                <label for ="title"  ><strong> Title : <span class="error">*</span></strong>   </label>
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
                                                        <label for ="comment" ><strong> Comment : <span class="error">*</span></strong>  </label>
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
                                                        <label for ="email" ><strong> Email : <span class="error">*</span></strong>  </label>
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
                                                <label for ="name"  ><strong> Name : </strong>   </label>
                                            </div>
                                             <div class="col-sm-9">
                                                <input type="name" class="form-control box" id="name"  name="name" v-model="comments.name">
                                             </div>    
                                        </div> 
                                         
                                         
                                         <div class="form-group row">
                                            <div class="col-sm-3 text-right">
                                                <label for ="year"  ><strong> Year : </strong>   </label>
                                            </div>
                                             <div class="col-sm-9">     
                                                <select id="dob"  v-model="selectedValue" @change="getYear()">
                                                    <option value="0">Choose Year:</option>
                                                    <option v-for="year in years" :key="year.id"  :value="year">{{ year }}</option>
                                                    </select>
                                             </div>    
                                        </div> 

                                        <div class="form-group row">
                                            <div class="col-sm-3 text-right">
                                                <label for ="gender"  ><strong> Gender : </strong>   </label>
                                            </div>
                                             <div class="col-sm-9">
                                                   <label> <input type="radio"  v-model="comments.gender" value="0" > Male </label>
                                                   <label> <input type="radio" v-model="comments.gender" value="1" >Female </label>
                                             </div>    
                                        </div> 
                                        

                                          <div class="form-group row"  v-for="field in comments.fields" :key="field.id">
                                            <div class="col-sm-3 text-right">
                                                <label for ="zipcode"  ><strong> Zipcode : </strong>   </label>
                                            </div>
                                             <div class="col-sm-2">
                                                 <input type="text" class="form-control box" value="firstzip" v-model="field.fzipcode">
                                              
                                             </div>   
                                               <div class="col-sm-2">
                                                 <input type="text" class="form-control box" value="secondzip" v-model="field.lzipcode">      
                                             </div>   
                                        </div> 
                                        
                                        <button class="btn news-post-btn">Create</button>    
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


         methods: {
            add() {
                
                axios.post('http://localhost:8000/api/comments/add', this.comments)
                    .then((response) => {
                       
                    alert('Successfully Created')

                    // this.$router.push({name: 'categorylist'});
                    }).catch(error=>{
                        
                    if(error.response.status == 422){
                      
                        this.errors = error.response.data.errors       
                          
                    }
                })   
            },
             getYear: function(){

               this.comments.year = this.selectedValue;

           },
         }
     
}

</script>


