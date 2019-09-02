<template>    
 <div class="row">
      <div class="col-12">  
          <div class="card">
              <div class="card-body">
                <div class="col-md-12">
                    <div class="row">   
                        <div class="col-md-12">
                            <h4 class="page-header">Create Customer</h4>
                            <br>
                        </div>
                        <div class="col-md-12">
                             <form @submit.prevent="add" enctype="multipart/form-data">
                             <!-- <div class="form-group">
                                 <img :src="logo" class="img-responsive" height="70" width="90">
                             </div> -->
                                    <div class="form-group"> 
                                        <label> Logo : </label>
                                        <input type="file" accept="image/*"  @change ="onFileSelected" id="file" ref="file" class="form-control">
                                        <span v-if="errors.logo" class="error">{{errors.logo[0]}}</span>
                                    </div>
                                    <div class="form-group">
                                        <label>Customer Name :</label>
                                        <input type="text" class="form-control"  v-model="customer.name"  placeholder="Customer Name">
                                        <span v-if="errors.name" class="error">{{errors.name[0]}}</span>
                                    </div>
                                    <div class="form-group">
                                        <label>Email :</label>
                                        <input type="text" class="form-control"  v-model="customer.email"  placeholder="Email">
                                        <span v-if="errors.email" class="error">{{errors.email[0]}}</span>
                                    </div>
                                    <div class="form-group">
                                        <label>Password :</label>
                                        <input type="password" class="form-control"  v-model="customer.password"  placeholder="Password">
                                        <span v-if="errors.password" class="error">{{errors.password[0]}}</span>
                                    </div>
                                    <div class="form-group">
                                        <label>Phone No :</label>
                                        <input type="number" class="form-control"  v-model="customer.phone"  placeholder="Phone No">
                                        <span v-if="errors.phone" class="error">{{errors.phone[0]}}</span>
                                    </div>
                                    <div class="form-group">
                                        <label>Address :</label>
                                        <input type="text" class="form-control"  v-model="customer.address"  placeholder="Address">
                                        <span v-if="errors.address" class="error">{{errors.address[0]}}</span>
                                    </div>
                                
                                    <div class="form-group ">
                                        <div class="form-group row">
                                            <div class="col-1 pad-free">
                                                <button class="btn news-post-btn">Create</button>
                                            </div>
                                            <div class="col-1 pad-free">
                                                <router-link class="btn btn-warning" to="/customerlist" >  Cancel </router-link>
                                            </div>
                                        </div>
                                    </div>  
                                </form>  
                            </div>
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
                customer: {
                        name: '',
                        email:'',
                        password:'',
                        phone:'',
                        address:'',
                        user_id:'',
                        type_id:'',
                        recordstatus:'',
                        logo:''
                       

                    }
            }
        },
       
         methods: {
             onFileSelected(event) {  
                this.customer.logo = event.target.files[0]
                
               
             },
             add() {
            
                 let fd = new FormData();
                 fd.append('logo' ,this.customer.logo)
                 fd.append('name',this.customer.name)
                 fd.append('email',this.customer.email)
                 fd.append('password',this.customer.password)
                 fd.append('phone',this.customer.phone)
                 fd.append('address',this.customer.address)

                 
                 axios.post('http://localhost:8000/api/customer/add', fd )
                .then(response => {
                    this.logo = ''
                    this.name =''
                    this.email = ''
                    this.password = ''
                    this.phone = ''
                    this.address = ''
                }).catch(error=>{
                    if(error.response.status == 422){
                        this.errors = error.response.data.errors
                    }
                })

            }
           
        }
             
}
</script>


