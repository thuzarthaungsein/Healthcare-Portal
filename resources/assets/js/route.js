import home from './components/home.vue';
import Newsdetails from './components/Newsdetails.vue';

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
import CustomerSearchListComponent from './components/CustomerSearchListComponent.vue';

import map from './components/map.vue';
import EditFacilityComponent from './components/EditFacilityComponent.vue';
import editcategory from './components/editcategory.vue';
import createcustomer from './components/CreateCustomer.vue';
import joboffercreate from './components/JobOfferCreate.vue';
import editPost from './components/editNewsPost.vue';
import profile from './components/Profile.vue';
import JobOfferList from './components/JobOfferList.vue';

import GuestWatchHistory from './components/HospitalHistory.vue';

export const routes = [

       {
        name: 'home',
        path: '/',
        component: home
      },
      {
        name: 'home',
        path: '/home',
        component: home
      },

    {
        name: 'newdetails',
        path: '/newsdetails/:id',
        component: Newsdetails
    },
       {
        name: 'hospital_search',
        path: '/hospital_search',
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
      name: 'customersearchlist',
      path: '/customersearchlist',
      component: CustomerSearchListComponent
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
        path: '/job_details/:id',
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
        name: 'editPost',
        path: '/editPost',
        component: editPost
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
      name: 'editfacility',
      path: '/editfacility',
      component: EditFacilityComponent
    },
    {
      name:'createcustomer',
      path: '/createcustomer',
      component: createcustomer
    },
    {
      name : 'joboffercreate',
      path : '/joboffercreate',
      component : joboffercreate
    },
    {
      name: 'map',
      path: '/map',
      component: map
    },
    {
      name: 'profile',
      path: '/profile',
      component: profile
    },
    {
      name: 'jobofferlist',
      path: '/jobofferlist',
      component: JobOfferList
    },
    {
      name: 'guest_watch_history',
      path: '/guest_watch_history',
      component: GuestWatchHistory
    },
];
