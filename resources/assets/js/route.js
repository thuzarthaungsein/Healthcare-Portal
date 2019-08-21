import home from './components/home.vue';
<<<<<<< HEAD
import JobApply from './components/JobApply.vue';
import customerlist from './components/customerlist.vue';
=======
import JobSearchListComponent from './components/JobSearchListComponent.vue';
import JobOfferComponent from './components/JobOfferComponent.vue';


>>>>>>> 0f70641de5461bdb4869bd1fc8a7c11f2f7c4ee8
export const routes = [
       {
        name: 'home',
        path: '/home',
        component: home
    },
    {
<<<<<<< HEAD
        name: 'jobapply',
        path: '/jobapply',
        component: JobApply
    },
    {
        name: 'customerlist',
        path: '/customerlist',
        component: customerlist
    }
];

=======
      name: 'jobsearchlist',
      path: '/jobsearchlist',
      component: JobSearchListComponent
    },
    {
      name: 'joboffer',
      path: '/joboffer',
      component: JobOfferComponent
    },
];
>>>>>>> 0f70641de5461bdb4869bd1fc8a7c11f2f7c4ee8
