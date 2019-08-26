<template>
         <div>
         <router-link to="/map" > Map </router-link>           
                <div class="card m-b-10 ads-card">
                        <div class="">
                                <!-- <h5 class="card-title text-center">一つ目の広告</h5> -->
                                <!-- <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6> -->
                                <img src="/images/ad_1.jpg" alt="" class="img-responsivie" style="width:100%">
                        </div>
                </div>
                <div class="card m-b-10 ads-card">
                        <div class="card-body">
                                <h5 class="card-title text-center">二つ目の広告</h5>
                                <!-- <h6 class="card-subtitle mb-2 text-muted">Card subtitle</h6> -->
                                <img src="/images/logo_japanese_horizontal.png" alt="" class="img-responsivie" style="width:100%">
                        </div>
                </div>
                <div class="card m-b-10 ads-card2">
                        <div class="card-body">
                                <ul class="list-group list-group-flush" v-for="latest_post_all_cat in latest_post_all_cats" :key="latest_post_all_cat.id">
                                        <li class="list-group-item"><a href="#">
                                                <img v-bind:src="'/images/' + latest_post_all_cat.photo" alt="" class="img-responsivie ads-img">
                                                <h3 class="ads-title text-truncate" style="ma"> {{ latest_post_all_cat.title }} </h3>
                                                <span class="source-wrapper">
                                                        <span class="subtitle"> {{ latest_post_all_cat.created_at }}</span>
                                                </span>
                                        </a></li>
                                </ul>                                                       
                        </div>
                </div>
        </div>
</template>
<script>
export default {
        data() {
            return {
                latest_post_all_cats: []
            }
        },
        created() {
            this.getLatestPostFromAllCat();
        },
        methods: {
                getLatestPostFromAllCat: function() {
                        this.axios
                        .get('http://localhost:8000/api/get_latest_post_all_cat')
                        .then(response => {
                                this.latest_post_all_cats = response.data;
                        });
                }
        }
        
}
// alert(cats[0]);
</script>