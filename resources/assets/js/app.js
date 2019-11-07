/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */


require('./bootstrap');
// window.Vue = require('vue');

// import App from './App.vue';
import VueRouter from 'vue-router';
import VueAxios from 'vue-axios';
import axios from 'axios';

import { routes } from './route';
import * as VueGoogleMaps from "vue2-google-maps";
// import Vue from 'vue';
import Autocomplete from 'vuejs-auto-complete';

//start onepage
import 'animate.css'
// import 'fullpage.js/vendors/scrolloverflow'
// import './fullpage.scrollHorizontally.min'
import 'fullpage-vue/src/fullpage.css'
import VueFullpage from 'fullpage-vue'
Vue.use(VueFullpage)
    //end onepage

//vue carousel
import VueCarousel from '@chenfengyuan/vue-carousel';
Vue.component(VueCarousel.name, VueCarousel);


//vue slick
import Slick from 'vue-slick';
Vue.use(Slick);


//pano
// import Pano from 'vue-pano';
// Vue.use(Pano);


//vue-pannellum
import VuePannellum from '../../../resources/assets/js/components/vue-pannellum.vue'
Vue.use(VuePannellum);
Vue.component('VPannellumn', VuePannellum)


//vue Panorama 
import Panorama from 'vuejs-panorama';
Vue.use(Panorama);

//profile_slider

// import Lightbox from 'vue-easy-lightbox'
// Vue.use(Lightbox)
//import Vue from 'vue'


//vue vuetify
// import Vuetify from "vuetify";
// import "vuetify/dist/vuetify.min.css";
// Vue.use(Vuetify);

//vue sweetaler
import VueSweetAlert from 'vue-sweetalert';
Vue.use(VueSweetAlert)


//start editor
import CKEditor from '@ckeditor/ckeditor5-vue';
Vue.use(CKEditor);
//end editor

import ReadMore from 'vue-read-more';
Vue.use(ReadMore);

//start Light Gallery
import Lightbox from 'vue-my-photos'
Vue.use(Lightbox)
    //end Light Gallery

Vue.use(require('vue-moment'));

//vuejs loading
import VueLoading from 'vuejs-loading-plugin'
Vue.use(VueLoading, {
    text: '送信中'
})

window.events = new Vue();
window.flash = function(message) {
    window.events.$emit('flash', message);
}
Vue.component('flash', require('./components/Flash.vue'));

Vue.use(VueRouter);
Vue.use(VueAxios, axios);
Vue.use(VueGoogleMaps, {
    load: {
        key: "AIzaSyC-2U_IRuSrajQavHadFp8FlXNi61MA3nw",
        libraries: "places" // necessary for places input
    }
});

Vue.component('passport-clients', require('./components/passport/Clients.vue'));
Vue.component('ads_slider', require('./components/ads_slider.vue'));
Vue.component('passport-authorized-clients', require('./components/passport/AuthorizedClients.vue'));
Vue.component('passport-personal-access-tokens', require('./components/passport/PersonalAccessTokens.vue'));
Vue.component('autocomplete', Autocomplete);

const router = new VueRouter({
    mode: 'history',
    routes: routes
});


const app = new Vue({
    el: '#app',
    router: router,
    // render: h => h(App),

});