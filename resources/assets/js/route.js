import home from './components/home.vue';
import JobSearchListComponent from './components/JobSearchListComponent.vue';


export const routes = [
       {
        name: 'home',
        path: '/home',
        component: home
    },
    {
        name: 'job',
        path: '/jobsearchlist',
        component: JobSearchListComponent
      },
];