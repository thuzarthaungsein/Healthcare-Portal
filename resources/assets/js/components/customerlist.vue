<template>
<div class="row">     
    <!-- <div class="col-12"> -->
         <!-- <div class="card card-default m-b-20">
            <div class="card-body">
                <h4 class="main-color">事業者検索</h4>
                <div class="row">
                    <div class="col-md-10">
                        <input type="text" class="form-control" placeholder="検索">
                    </div>
                    <div class="col-md-2 text-right">
                        <button class="btn secondary-bg-color all-btn white" style="width:100%;"><i class="fas fa-search"></i> 検索</button>
                    </div>
                </div>
        </div>

        </div>
    </div> -->
    <div class="col-12">
                  
        <div class="col-md-12 col-md-12 tab-content tab-content1 tabs pad-free border-style">
        <h4 class="main-color">事業者検索</h4>
        <div class="row">
            <div class="col-md-12">
                <input type="text" class="form-control" placeholder="検索" id="search-word" @keyup="searchCustomer()">
            </div>
            <!-- <div class="col-md-2 text-right">
                <button class="btn secondary-bg-color all-btn white" style="width:100%;"><i class="fas fa-search"></i> 検索</button>
            </div> -->
        </div>
        <hr>
        <h5 class="header">事業者</h5>
        <div class="scrolldiv col-12">    
            <div v-if="!this.customers.length"  class="card card-default m-b-20" style="padding-top:30px; height:700px; text-align:center ">
                           
                          No record data 
                          
                 </div>         
            <div  v-else v-for="customer in customers" :key="customer.id" class="card card-default m-b-20">
                <div class="card-body news-post">
                    <div class="row">
                        <div class="col-md-2" >
                            <!-- <img src="/images/hospitalpage.jpg" alt="" class="img-fluid"> -->
                            <!-- <img :src="(customer.logo)" class="col-md-12 " alt=" " style="height:150px;" > -->
                            <img :src="'/images/'+ customer.logo" class="img-fluid" alt="cust">
                        </div>
                        <div class="row col-md-10">
                        <div class="col-md-2 max-width13"><strong>Name:</strong></div><div class="col-md-10">{{customer.name}}</div>
                        <div class="col-md-2 max-width13"><strong>Email:</strong></div><div class="col-md-10">{{customer.email}}</div>
                        <!-- <div class="col-md-2 max-width13"><strong>Logo:</strong></div><div class="col-md-10">{{customer.logo}}</div> -->
                        <div class="col-md-2 max-width13"><strong>Phone:</strong></div><div class="col-md-10">{{customer.phone}}</div>
                        <div class="col-md-2 max-width13"><strong>Address:</strong></div><div class="col-md-10">{{customer.address}}</div>
                        <div class="row col-12 mt-2">
                            <div class="col-4 col-offset-4 pl-3">
                                <button class="btn delete-borderbtn" @click="deleteCustomer(customer.id)">削除</button>
                                 <!-- <router-link :to="{name:'custedit',params:{id:customer.id}}" class="btn main-bg-color all-btn white">Edit</router-link> -->
                                 <button class="btn confirm-borderbtn" v-if="customer.status != 0">確認済</button>
                                <button class="btn confirm-borderbtn" v-else @click="comfirm(customer.id)">確認</button>

                            </div>
                        </div>
                    </div>
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
    data(){
        return {
            customers:[]
        }
    },
    created(){
        this.axios
                .get('/api/customers')
                .then(response => {
                    this.customers = response.data;


                });
    },
    methods: {
            deleteCustomer(id) {
                this.axios
                    .delete(`/api/customer/delete/${id}`)
                    .then(response => {
                        flash('Delete Success', 'success');
                        let a = this.customers.map(item => item.id).indexOf(id);
                        this.customers.splice(a, 1)
                    });
            },
            comfirm(id){
                this.axios.get(`/api/confirm/${id}`)
                .then(response=>{
                    flash('Successfully Send Mail.', 'success');
                })
            },

            searchCustomer() {
                var search_word = $('#search-word').val();
                let fd = new FormData();
                    fd.append('search_word', search_word)
                this.axios.post('/api/customer/search', fd)
                    .then(response => {
                        this.customers = response.data;
                });
            }
        }
}
</script>
 