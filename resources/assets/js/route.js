import home from './components/home.vue';
import hospitalSearch from './components/hospitalSearch.vue';
import JobApply from './components/JobApply.vue';
import customerlist from './components/customerlist.vue';
import JobSearchListComponent from './components/JobSearchListComponent.vue';
import JobOfferComponent from './components/JobOfferComponent.vue';
import job_details from './components/job_details.vue';
import news_list from './components/news_list.vue';
import create_news from './components/create_news.vue';

import categorylist from './components/categorylist.vue';
import createcategory from './components/createcategory.vue';
import FacilitiesListComponent from './components/FacilitiesListComponent.vue';
import CreateFacilityComponent  from './components/CreateFacilityComponent.vue';
import custedit from './components/custedit.vue';

import EditFacilityComponent from './components/EditFacilityComponent.vue';
import editcategory from './components/editcategory.vue';

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
        name: 'job_details',
        path: '/job_details',
        component: job_details
      },
      {
        name: 'news_list',
        path: '/news_list',
        component: news_list
      },
      {
        name: 'create_news',
        path: '/create_news',
        component: create_news
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
      name: 'editcategory',
      path: '/editcategory',
      component: editcategory
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
    },
    {
        name: 'custedit',
        path: '/custedit',
        component: custedit
      },
    {
      name: 'editfacility',
      path: '/editfacility',
      component: EditFacilityComponent
    }
];
