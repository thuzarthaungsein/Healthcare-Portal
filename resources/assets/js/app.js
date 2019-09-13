
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

import {routes} from './route';
import * as VueGoogleMaps from "vue2-google-maps";
// import Vue from 'vue';
import Autocomplete from 'vuejs-auto-complete';


//start editor


import CKEditor from '@ckeditor/ckeditor5-vue';

Vue.use( CKEditor );
//end editor


window.events = new Vue();
window.flash = function(message) {
    window.events.$emit('flash',message);
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

Vue.component('passport-clients',require('./components/passport/Clients.vue'));
Vue.component('passport-authorized-clients',require('./components/passport/AuthorizedClients.vue'));
Vue.component('passport-personal-access-tokens',require('./components/passport/PersonalAccessTokens.vue'));
Vue.component('autocomplete',Autocomplete);

const router = new VueRouter({
    mode: 'history',
    routes: routes
});

const app = new Vue({
    el: '#app',
    router: router,
    // render: h => h(App),
});

