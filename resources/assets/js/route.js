import home from './components/home.vue';
import JobApply from './components/JobApply.vue';
import customerlist from './components/customerlist.vue';
import JobSearchListComponent from './components/JobSearchListComponent.vue';
import JobOfferComponent from './components/JobOfferComponent.vue';
import categorylist from './components/categorylist.vue';
import createcategory from './components/createcategory.vue';

export const routes = [
       {
        name: 'home',
        path: '/home',
        component: home
    },
    {
        name: 'jobapply',
        path: '/jobapply',
        component: JobApply
    },
    {
        name: 'customerlist',
        path: '/customerlist',
        component: customerlist
    },
    {
      name: 'jobsearchlist',
      path: '/jobsearchlist',
      component: JobSearchListComponent
    },
    {
      name: 'joboffer',
      path: '/joboffer',
      component: JobOfferComponent
    },
    {
        name: 'categorylist',
        path: '/categorylist',
        component: categorylist
      },
      {
        name: 'createcategory',
        path: '/createcategory',
        component: createcategory
      }
];
