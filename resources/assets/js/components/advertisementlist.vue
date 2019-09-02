<template>
   <div class="col-12">
                <div class="row m-b-15">
                        <div class="col-md-12">
                        <router-link to="/advertisement" class="float-right" style="color: blue;">Create Advertisement</router-link>
                        </div>
                </div>
            <div v-for="ads in advertisement" :key="ads.id" class="card card-default m-b-20">
            <div class="card-body news-post">
                <div class="row">
                    <div class="col-md-2" >
                           <img src="/upload/advertisement/ad_1.jpg" class="col-md-12 " alt=" " style="height:100px;width:100px" >
                        <!-- <img v-bind:src="ads.photo" style="height:100px;width:100px"> -->
                        <!-- <img :src="(customer.logo)" class="col-md-12 " alt=" " style="height:150px;" > -->
                    </div>
                    <div class="col-md-10">
                        <div class="col-sm-8 pad-free mb-2">
                            <a><strong>Title    :</strong>{{ads.title}}</a><br/>
                            <a><strong>Description :</strong>{{ads.description}}</a><br/>
                        </div>
                        <div class="row">
                            <div class="col-sm-5 pl-3">
                                 <router-link :to="{name: 'editadvertisement', params: { id: ads.id }}" class="btn main-bg-color white all-btn">Edit </router-link>
                                <button class="btn btn-danger  all-btn" @click="deleteAds(ads.id)">Delete</button>

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
            advertisement:[]
        }
    },
    created(){
        this.axios
                .get('http://localhost:8000/api/advertisement/ads')
                .then(response => {
                    this.advertisement = response.data;


                });
    },

    methods: {
            deleteAds(id) {
                this.axios
                    .delete(`http://localhost:8000/api/advertisement/delete/${id}`)
                    .then(response => {
                        alert('Delete Successfully!');
                        let a = this.advertisement.map(item => item.id).indexOf(id);
                        this.advertisement.splice(a, 1)
                    });
            },

        }
}
</script>

