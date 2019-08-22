<template>
 <div>
     <h1 class="text-center">Customer Edit</h1>
     <form @submit.prevent="CustomerUpdate">
         <div class="row">
             <div class="col-md-6">
                 <div class="form-group">
                     <label>Name</label>
                     <input type="text" class="form-control" v-model="customer.name" required>
                 </div>
             </div>
         </div>
         <div class="row">
             <div class="col-md-6">
                 <div class="form-group">
                     <label> Email</label>
                     <input type="text" class="form-control" v-model="customer.email" required>
                 </div>
             </div>
         </div>
         <div class="row">
             <div class="col-md-6">
                 <div class="form-group">
                     <label> Logo</label>
                     <input type="text" class="form-control" v-model="customer.logo" required>
                 </div>
             </div>
         </div>
         <div class="row">
             <div class="col-md-6">
                 <div class="form-group">
                     <label> Phone</label>
                     <input type="text" class="form-control" v-model="customer.phone" required>
                 </div>
             </div>
         </div>
         <div class="row">
             <div class="col-md-6">
                 <div class="form-group">
                     <label>Address</label>
                     <input type="text" class="form-control" v-model="customer.address" required>
                 </div>
             </div>
         </div><br/>
         <div class="col-sm-4 text-center">
            <button class="btn main-bg-color all-btn">Update</button>
            <router-link class="btn btn-info all-btn" to="/customerlist" > Cancel </router-link>
        </div>
     </form>
 </div>
</template>

<script>
export default {
    data(){
        return {
            errors: [],
            customer:{
                    name :'',
                    email:'',
                    logo:'',
                    phone:'',
                    address:'',

            }
        }
    },
    created(){
        this.axios
                .get(`http://localhost:8000/api/customer/edit/${this.$route.params.id}`)
                .then((response) => {
                    this.customer = response.data;

                });
    },
     methods:{
        CustomerUpdate() {
                this.axios
                    .post(`http://localhost:8000/api/customer/update/${this.$route.params.id}`, this.customer)
                    .then((response) => {
                          alert('Successfully Updated!')
                        this.$router.push({name: 'customerlist'});
                    });
            }

        }
}
</script>
