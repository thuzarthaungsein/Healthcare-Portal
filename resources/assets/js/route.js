import home from './components/home.vue';
import hospitalSearch from './components/hospitalSearch.vue';


export const routes = [
       {
        name: 'home',
        path: '/home',
        component: home
    },
       {
        name: 'hospital_search',
        path: '/hospitalsearch',
        component: hospitalSearch
    }
    
 
    
];