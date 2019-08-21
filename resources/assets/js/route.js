import home from './components/home.vue';
import Newsdetails from './components/Newsdetails.vue';
import categorieslist from './components/categorieslist.vue';


export const routes = [
       {
        name: 'home',
        path: '/home',
        component: home
    },

    {
        name: 'newsdetails',
        path: '/newsdetails',
        component: Newsdetails
    },
    {
        name: 'categorieslist',
        path: '/categorieslist',
        component: categorieslist
    }
    
 
    
];