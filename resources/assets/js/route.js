import home from './components/home.vue';
import job_search_details from './components/job_search_details.vue';


export const routes = [
       {
        name: 'home',
        path: '/home',
        component: home
    },
    {
        name: 'job_search_details',
        path: '/job_search_details',
        component: job_search_details
    }
    
 
    
];