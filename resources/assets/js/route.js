import home from './components/home.vue';
import hospitalSearch from './components/hospitalSearch.vue';
import JobApply from './components/JobApply.vue';
import customerlist from './components/customerlist.vue';
import JobSearchListComponent from './components/JobSearchListComponent.vue';
import JobOfferComponent from './components/JobOfferComponent.vue';
import categorylist from './components/categorylist.vue';
import createcategory from './components/createcategory.vue';
<<<<<<< HEAD

import FacilitiesListComponent from './components/FacilitiesListComponent.vue';
import CreateFacilityComponent  from './components/CreateFacilityComponent.vue';



=======
import FacilitiesListComponent from './components/FacilitiesListComponent.vue';
import CreateFacilityComponent  from './components/CreateFacilityComponent.vue';

>>>>>>> 0bedcd6903c3c4303888c96281abdff0bdb4a144
export const routes = [
       {
        name: 'home',
        path: '/',
        component: home
    },
       {
        name: 'hospital_search',
        path: '/hospitalsearch',
        component: hospitalSearch
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
      },
      {
      name: 'facilitieslist',
      path: '/facilitieslist',
      component: FacilitiesListComponent
    },
    {
      name: 'createfacility',
      path: '/createfacility',
      component: CreateFacilityComponent
    }
];
