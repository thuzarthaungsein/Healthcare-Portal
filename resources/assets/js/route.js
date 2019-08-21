import home from './components/home.vue';
import JobSearchListComponent from './components/JobSearchListComponent.vue';
import job_details from './components/job_details.vue';


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
      {
        name: 'job_details',
        path: '/job_details',
        component: job_details
      }
];