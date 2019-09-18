
<template>
   <div class="row">
       <div class="col-12">
        <div class="row m-b-15">
            <div class="col-md-12">
            <router-link to="/advertisement" class="float-right main-bg-color create-btn all-btn" style="color: blue;"><i class="fas fa-plus-circle"></i> 広告を作成する</router-link>
            </div>
        </div>

    <div class="col-md-12 col-md-12 tab-content tab-content1 tabs pad-free border-style">
        <h4 class="main-color m-b-10"> 広告検索</h4>
        <div class="row">
            <div class="col-md-12">
                <input type="text" class="form-control" placeholder="検索" id="search-item" @keyup="searchAdvertisment()">
            </div>
        </div>
    <hr>
    <h5 class="header">広告</h5>
    <div class="scrolldiv col-12">
         <div v-if="!this.advertisements.length"  class="card card-default m-b-20" style="padding-top:30px; height:700px; text-align:center ">
                           
                         No Record Data  
                          
                 </div> 
            <div v-else v-for="ads in advertisements" :key="ads.id" class="card card-default m-b-20">
            <div class="card-body news-post">
                 <div class="row">
                    <div class="col-md-2" >
                        <img :src="'/upload/advertisement/'+ ads.photo" class="img-fluid" alt="ads">

                    </div>
                    <div class="row col-md-10">
                        <div class="col-md-2 max-width16"><strong>タイトル  :</strong></div><div class="col-md-10">{{ads.title}}</div>
                        <!-- <div class="col-md-2 max-width16"><strong>描写  :</strong></div><div class="col-md-10">{{ads.description}}</div> -->


                        <div class="row col-12 mt-2">
                            <div class="col-4 col-offset-4 pl-3">
                                 <router-link :to="{name: 'editadvertisement', params: { id: ads.id }}" class="btn edit-borderbtn">編集</router-link>
                                <button class="btn delete-borderbtn" @click="deleteAds(ads.id)">削除</button>
                                <!-- <button class="btn delete-borderbtn" @click="toggleModal">削除</button>                                 -->

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
            advertisements:[],
             isOpen: false,
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
            // toggleModal() { 
            //     this.isOpen = !this.isOpen; 
            // },
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
            },

            searchAdvertisment() {
                var search_word = $('#search-item').val();
                let fd = new FormData();
                    fd.append('search_word', search_word)
                this.axios.post('/api/advertisement/search', fd)
                    .then(response => {
                        this.advertisements = response.data;
                    });
            }

        }
}
</script>

