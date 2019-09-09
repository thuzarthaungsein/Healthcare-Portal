
<template>
   <div class="row">
       <div class="col-12">           
        <div class="row m-b-15">
            <div class="col-md-12">
            <router-link to="/advertisement" class="float-right main-bg-color create-btn all-btn" style="color: blue;"><i class="fas fa-plus-circle"></i> 広告を作成する</router-link>
            </div>
        </div>
    
    <div class="col-md-12 col-md-12 tab-content tab-content1 tabs pad-free border-style">
    <h4 class="main-color"> 広告検索</h4>
        <div class="row">
            <div class="col-md-12">
                <input type="text" class="form-control" placeholder="検索">
            </div>
            <!-- <div class="col-md-2">
                <button class="btn secondary-bg-color all-btn white" style="width:100%;"><i class="fas fa-search"></i> 検索</button>
            </div> -->
        </div>
    <hr>
    <h5 class="header">広告</h5>
    <div class="scrolldiv col-12">       
            <div v-for="ads in advertisements" :key="ads.id" class="card card-default m-b-20">
            <div class="card-body news-post">
                 <div class="row">
                    <div class="col-md-2" >
                        <img :src="'/upload/advertisement/'+ ads.photo" class="img-fluid" alt="ads">

                    </div>
                    <div class="row col-md-10">
                        <div class="col-md-2 max-width16"><strong>Title :</strong></div><div class="col-md-10">{{ads.title}}</div>
                        <div class="col-md-2 max-width16"><strong>Description :</strong></div><div class="col-md-10">{{ads.description}}</div>


                        <div class="row col-12 mt-2">
                            <div class="col-4 col-offset-4 pl-3">
                                 <router-link :to="{name: 'editadvertisement', params: { id: ads.id }}" class="btn edit-borderbtn">編集</router-link>
                                <button class="btn delete-borderbtn" @click="deleteAds(ads.id)">削除</button>

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
            advertisements:[]
        }
    },
    created(){
        this.axios
                .get('/api/advertisement/ads')
                .then(response => {
                    this.advertisements = response.data;


                });
    },

    methods: {
            deleteAds(id) {
                if(confirm("Are you sure you want to delete?"))
                {
                    this.axios
                    .delete(`/api/advertisement/delete/${id}`)
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

