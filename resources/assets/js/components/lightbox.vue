<template>  
  <div :class="{ 'vue-lightbox' : !resetstyles }" v-bind:style="{zIndex: z_index}">      
    <ul class="row">     
      <li v-for="(image, index) in images" :key="index" class="col-sm-4 col-md-4 col-lg-3">       
          <img :src ="'/upload/nursing_profile/' + image.photo" :alt="image.caption" @click="clickImage(index)" :key="index" style="width:100%;border:7px solid #eee;" class="img-responsive">        
          <span style="color:orange;font-weight:bold;">{{image.title}}</span>
      </li>         
    </ul>
    <transition name="fade">
    <div v-if="show">
     <div class="lightbox-overlay" v-if="overlayActive" @click.self="closeOverlay">       
        <div class="holder">
            <div :class="'slider' + (isSlidingToPrevious ? ' sliding-to-previous' : '')">
            <transition-group tag="div" name="slide" class="img-slider">
                 <div v-for="number in [currentImage]" v-bind:key="number" > 
                     <!-- <p style="color:#fff;top:100px;"> test</p>  -->
                        
                <img v-bind:src="'/upload/nursing_profile/' + images[currentImage].photo" id="l_img">
                </div>   
            </transition-group>                           
            <div class="nav" v-if="nav">            
                <a class="close" nohref @click="closeOverlay"><span>&times;</span></a>
                <a class="prev" nohref @click="prevImage"><span>&#8592;</span></a>                   
                <a class="next" nohref @click="nextImage"><span>&#8594;</span></a>          
            </div>         
            <p v-if="caption && images[currentImage].caption">{{ images[currentImage].caption }}</p>
            </div>
        </div>  
     </div>
     </div>
     </transition>
  </div>
</template>
<script>


export default {

  props: {
    resetstyles: {
      default: false,
      type: Boolean,
    },
    title: {
      type: String,
    },
    images: {
      type: Array,
    },
    loop: {
      default: true,
      type: Boolean,
    },
    nav: {
      default: true,
      type: Boolean,
    },
    caption: {
      default: true,
      type: Boolean,
    },
  },
  data() {
    return {
      currentImage: null,
      overlayActive: false,
      isSlidingToPrevious : false,
      show: false,
      z_index: 0,
      nat_image: '',
      width: '',
      height: '',
      url: ''
    };
  },
  created() {

  },
  mounted() {
    const self = this;
    window.addEventListener('keydown', (e) => {
      self.handleGlobalKeyDown(e);
    });
  },
  methods: {
    clickImage(index) {     
      this.currentImage = index;    
      this.overlayActive = true;
      this.show = true;
      this.z_index = 99999;
      
    //   this.width = this.nat_image.width;
    //   this.height = this.nat_image.naturalHeight;
      
    //   for(var i =0; i<this.images.length; i++){
    //       this.url = this.images[i].photo;
    //       this.nat_image = '<img :src="/upload/nursing_profile/day4.jpg">';
          
    //   }
      
    //   console.log('height',this.height)
    },
    nextImage() {
        this.isSlidingToPrevious = false
      if (this.currentImage === (this.images.length - 1)) {
        if (this.loop) {
          this.currentImage = 0;
        }
      } else {
        this.currentImage += 1;
      }
    },
    prevImage() {
         this.isSlidingToPrevious = true
      if (this.currentImage === 0) {
        if (this.loop) {
          this.currentImage = (this.images.length - 1);       
        }
      } else {
        this.currentImage -= 1;
        
      }   
    },
    closeOverlay() {
      this.overlayActive = false;
      this.show = false;
      this.z_index = 0;
      this.nat_image = document.getElementById("l_img");
      console.log('image',this.nat_image.width)
    },
    handleGlobalKeyDown(e) {
      switch (e.keyCode) {
        case 37: this.prevImage(); break;
        case 39: this.nextImage(); break;
        case 27: this.closeOverlay(); break;
        default: break;
      }
    },
  },
};
</script>

<style scoped>
.slide-leave-active, .slide-enter-active {
	 transition: 0.5s;
}
 .slide-enter {
	 transform: translate(100%, 0);
}
 .slide-leave-to {
	 transform: translate(-100%, 0);
}
 .sliding-to-previous .slide-enter {
	 transform: translate(-100%, 0);
}
 .sliding-to-previous .slide-leave-to {
	 transform: translate(100%, 0);
}
.fade-enter-active, .fade-leave-active {
  transition: opacity .5s;
}
.fade-enter, .fade-leave-to /* .fade-leave-active below version 2.1.8 */ {
  opacity: 0;
}
.img-slider {
    position: relative;
     width:600px;
    height: 100vh;
    overflow: hidden;
     
}
.img-slider div {
    position: absolute;
    width:600px;
    top: 19%;    
}
.vue-lightbox {
   position: relative;
}

.vue-lightbox ul li {
    list-style-type: none;
}
.vue-lightbox ul li img {
    display: block;
    width: 200px;
    transition: all 0.4s ease;
}
.lightbox-overlay {
  width: 100%;
  height: 100%;
  position: fixed;
  top: 0;
  left: 0;
  background: rgba(0, 0, 0, 0.9);
  text-align: center;
  box-sizing: border-box;
  z-index: 99999;
}
.lightbox-overlay .holder {
  max-width: 600px;
  margin: 0 auto;
  position: relative;
  max-height: 100vh; 
}
.lightbox-overlay .holder img {
  position: relative;
  border: 10px solid #fff;
}
.lightbox-overlay .holder p {
  color: #ffffff;
  margin: 0;
  background-color: rgba(0, 0, 0, 0.4);
  position: absolute;
  bottom: 0;
  left: 0;
  right: 0;
  box-sizing: border-box;
  padding: 10px;
}
.lightbox-overlay .holder .nav {
  max-width: 600px;
  margin: 0 auto;
  font-size: 14px;
}
.lightbox-overlay .holder .nav a {
  color: white;
  opacity: 0.3;
  -webkit-user-select: none;
  cursor: pointer;
}
.lightbox-overlay .holder .nav a:hover {
  opacity: 1;
}
.lightbox-overlay .holder .nav .next, .lightbox-overlay .holder .nav .prev {
  position: absolute;
  top: 0;
  bottom: 0;
  padding: 10px;
  width: 50%;
  box-sizing: border-box;
  font-size: 40px;
}
.lightbox-overlay .holder .nav .next span, .lightbox-overlay .holder .nav .prev span {
  top: 50%;
  transform: translateY(50%);
  position: relative;
}
.lightbox-overlay .holder .nav .next {
  right: 0;
  text-align: right;
}
.lightbox-overlay .holder .nav .prev {
  left: 0;
  text-align: left;
}
.lightbox-overlay .holder .nav .close {
    position: absolute;
    right: -17px;
    top: 17%;
    font-size: 25px;
    opacity: 1;
    background: #000;
    border-radius: 50%;
    width: 35px;
    height: 35px;
    text-align: center;
    line-height: 32px;
    vertical-align: middle;
    border: 2px solid #fff;
}
.lightbox-overlay .holder .nav .close:hover {
  opacity: 1;
}

</style>