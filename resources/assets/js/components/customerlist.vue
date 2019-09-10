<template>
<div class="row">
     <!-- <div class="container">
        <div class="card card-default m-b-20">

            <div class="card-body">
                    <h4 class="main-color">ニュース記事を検索</h4>
                    <div class="row">
                        <div class="col-md-10">
                            <input type="text" class="form-control" placeholder="検索">
                        </div>
                        <div class="col-md-2">
                            <button class="btn secondary-bg-color all-btn white">検索</button>
                        </div>
                    </div>
            </div>
        </div>
        <div class="card-header text-center">
            <h4 style="padding-top:20px;">ユーザーリストテーブル</h4>
        </div>
        <div class="card card-default m-b-20 m-t-22">
            <div class="card-body news-post">
                <div class="row">
                    <div class="col-md-2 pad-free" >
                        <img src="/images/hospital6.jpg" class="col-md-12 " alt=" " style="height:150px;" >
                    </div>
                    <div class="col-md-10">
                        <h4 class="txt2 bold_h5">Fukuoka Kinen Hospital</h4>
                        <strong>Type   :</strong> General Hospital<br/>
                        <strong>Address:</strong> 1-1-35 Nishijin, Sawara-ku, Fukuoka-shi, Fukuoka, 814-8525<br/>
                        <strong>Contact:</strong> info@kinen.jp English, Japanese, Chinese<br/>
                        <strong>Train  :</strong> 3 minutes walk from Nishijin Station, Fukuoka City Subway Airport Line <br/>
                        <strong>Airplane:</strong> 20 minutes by car from Fukuoka Airport
                                                18 minutes by subway from Fukuoka Airport<br/><br/>
                            <div class="text-center">
                                <button class="btn main-bg-color all-btn white">Edit</button>
                                <button class="btn btn-danger all-btn">Delete</button>
                            </div>

                    </div>
                </div>
        </div>

        </div>
        <div class="card card-default m-b-20 m-t-22">
            <div class="card-body news-post">
                <div class="row">
                    <div class="col-md-2 pad-free ">
                        <img src="/images/eye.jpg" class="col-md-12 " alt="" style="height:150px;" >
                    </div>
                    <div class="col-md-10">
                        <h4 class="txt2 bold_h5">Sinjuku-Higashiguchi</h4>
                        <strong>Type   :</strong> Eye Clinic<br/>
                        <strong>Address:</strong> 9th floor of Hulic Shinjuku Building,3-25-1, Shinjuku, Shinjuku-ku, Tokyo, 160-0022<br/>
                        <strong>Contact:</strong> 03-5363-0507<br/>
                        <strong>Train  :</strong> 1-minute walk from Tokyo Metro Shinjuku Station<br/>
                        <strong>Airplane:</strong> 25 minutes by car from  Airport<br/><br/>
                        <div class="text-center"><button class="btn main-bg-color all-btn white">Edit</button></div>
                    </div>
                </div>
        </div>

        </div>
        <div class="card card-default m-b-20 m-t-22">
            <div class="card-body news-post">
                <div class="row">
                    <div class="col-md-2 pad-free ">
                        <img src="/images/grandparent.jpg" class="col-md-12 " alt="" style="height:150px;" >
                    </div>
                    <div class="col-md-10">
                        <h4 class="txt2 bold_h5">Care Center</h4>
                        <strong>Type   :</strong> grandparents and grandchildren<br/>
                        <strong>Address:</strong>  International Child Development Initiatives - ICDI. <br/>
                        <strong>Contact:</strong> Margaret Kernan and Giulia Cortellesi, info@toyproject.net <br/>
                        <strong>Train  :</strong> 1-minute walk from Tokyo Metro Shinjuku Station<br/>
                        <strong>Airplane:</strong> 25 minutes by car from  Airport<br/><br/>
                        <div class="text-center">
                            <button class="btn main-bg-color all-btn white">Edit</button>
                            <button class="btn btn-danger all-btn">Delete</button>
                        </div>
                    </div>
                </div>
        </div>

        </div>
    </div> -->
    <div class="col-12">

            <div class="card card-default m-b-20">

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
        <!-- <div class="text-center">
            <h4 style="padding-top:20px;">Customer List </h4>
        </div><br/> -->

        <div class="scrolldiv col-12 border-style">
            <h5 class="main-color header">事業者</h5>
            <div v-for="customer in customers" :key="customer.id" class="card card-default m-b-20">
                <div class="card-body news-post">
                    <div class="row">
                        <div class="col-md-2" >
                            <!-- <img src="/images/hospitalpage.jpg" alt="" class="img-fluid"> -->
                            <!-- <img :src="(customer.logo)" class="col-md-12 " alt=" " style="height:150px;" > -->
                            <img :src="'/images/'+ customer.logo" class="img-fluid" alt="cust">
                        </div>
                        <div class="row col-md-10">
                        <div class="col-md-2 max-width12"><strong>Name:</strong></div><div class="col-md-10">{{customer.name}}</div>
                        <div class="col-md-2 max-width12"><strong>Email:</strong></div><div class="col-md-10">{{customer.email}}</div>
                        <!-- <div class="col-md-2 max-width12"><strong>Logo:</strong></div><div class="col-md-10">{{customer.logo}}</div> -->
                        <div class="col-md-2 max-width12"><strong>Phone:</strong></div><div class="col-md-10">{{customer.phone}}</div>
                        <div class="col-md-2 max-width12"><strong>Address:</strong></div><div class="col-md-10">{{customer.address}}</div>
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
                    console.log(response.data);
                })
            }
        }
}
</script>
 