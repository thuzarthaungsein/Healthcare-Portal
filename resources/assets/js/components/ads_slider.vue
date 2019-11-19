<template>
<div class="ads-slider">
    <slick ref="slick" :options="slickOptions" v-if="ads_list.length > 0">  
        <div class="list-group-item adslist-card" v-for="adsList in ads_list" :key="adsList.id">
            <a :href="adsList.link" target="_blank">
                <div class="slide-img">
                    <img :src="'/upload/advertisement/'+ adsList.photo" alt class="img-fluid ads-img" @error="imgUrlAlt"/>
                </div>
                <h3 class="smallads-title">{{adsList.title}}</h3>
            </a>       
        </div>
    </slick>
</div>
</template>

<script>
import Slick from 'vue-slick';


export default {
    components: { Slick },
    data() {
        return {
            ads_list: [],
            slickOptions: {
                slidesToShow: 3,
                slidesToScroll: 3,
                infinite: true,
                accessibility: true,
                adaptiveHeight: false,
                edgeFriction: 0.30,
                swipe: true,
                autoplay: true,
                lazyLoad: 'ondemand',
                
            },
        }
    },
    created() {
    this.axios.get("/api/advertisement/ads").then(response => {
      this.ads_list = response.data;
    });
  },
    methods: {
        next() {
            this.$refs.slick.next();
        },
        prev() {
            this.$refs.slick.prev();
        },
        reInit() {
            // Helpful if you have to deal with v-for to update dynamic lists
            this.$nextTick(() => {
                this.$refs.slick.reSlick();
            });
        },
         imgUrlAlt(event) 
        {
            event.target.src = "images/noimage.jpg"
        }
    }
   
}
</script>


<style scoped>
/* Slider */

</style>