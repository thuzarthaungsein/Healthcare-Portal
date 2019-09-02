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
        <!-- <div class="text-center">
            <h4 style="padding-top:20px;">Customer List </h4>
        </div><br/> -->

        <div class="scrolldiv col-12">
            <div v-for="customer in customers" :key="customer.id" class="card card-default m-b-20">
                <div class="card-body news-post">
                    <div class="row">
                        <div class="col-md-2" >
                            <img src="/images/hospitalpage.jpg" class="col-md-12 " alt=" " style="height:150px;" >
                            <!-- <img :src="(customer.logo)" class="col-md-12 " alt=" " style="height:150px;" > -->
                        </div>
                        <div class="col-md-10">
                        <div class="col-sm-8 pad-free mb-2">
                            <a><strong>Name     :</strong>{{customer.name}}</a><br/>
                            <a><strong>Email    :</strong>{{customer.email}}</a><br/>
                            <a><strong>Logo     :</strong>{{customer.logo}}</a><br/>
                            <a><strong>Phone    :</strong>{{customer.phone}}</a><br/>
                            <a><strong>Address  :</strong>{{customer.address}}</a><br/>
                        </div>
                        <div class="row">
                            <div class="col-sm-5 pl-3">
                                <button class="btn btn-danger  all-btn" @click="deleteCustomer(customer.id)">Delete</button>
                                 <!-- <router-link :to="{name:'custedit',params:{id:customer.id}}" class="btn main-bg-color all-btn white">Edit</router-link> -->
                                 <button class="btn btn-info all-btn" v-if="customer.status != 0">Confirmed</button>
                                <button class="btn btn-info all-btn" v-else @click="comfirm(customer.id)">Confirm</button>

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
                .get('http://localhost:8000/api/customers')
                .then(response => {
                    this.customers = response.data;


                });
    },

    methods: {
            deleteCustomer(id) {
                this.axios
                    .delete(`http://localhost:8000/api/customer/delete/${id}`)
                    .then(response => {
                        flash('Delete Success', 'success');
                        let a = this.customers.map(item => item.id).indexOf(id);
                        this.customers.splice(a, 1)
                    });
            },
            comfirm(id){
                this.axios.get(`http://localhost:8000/api/confirm/${id}`)
                .then(response=>{
                    flash('Successfully Send Mail.', 'success');
                    console.log(response.data);
                })
            }
        }
}
</script>
