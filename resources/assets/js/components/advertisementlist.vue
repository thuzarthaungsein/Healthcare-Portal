
<template>
   <div class="row">
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
    <div class="row m-b-15">
                        <div class="col-md-12">
                        <router-link to="/advertisement" class="float-right" style="color: blue;">Create Advertisement</router-link>
                        </div>
    </div>
    <div class="scrolldiv col-12">
            <div v-for="ads in advertisements" :key="ads.id" class="card card-default m-b-20">
            <div class="card-body news-post">
                 <div class="row">
                    <div class="col-md-2" >
                        <img :src="'/images/'+ ads.photo" class="col-md-12" alt="no_image">

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
   </div>
   </div>
</template>
<script>
export default {
    data(){
        return {
            advertisements:[]
        }
    },
    created(){
        this.axios
                .get('http://localhost:8000/api/advertisement/ads')
                .then(response => {
                    this.advertisements = response.data;


                });
    },

    methods: {
            deleteAds(id) {
                if(confirm("Are you sure you want to delete?"))
                {
                this.axios
                    .delete(`http://localhost:8000/api/advertisement/delete/${id}`)
                    .then(response => {
                        alert('Delete Successfully!');
                        let a = this.advertisements.map(item => item.id).indexOf(id);
                        this.advertisements.splice(a, 1)
                    });
            }
         }

        }
}
</script>

