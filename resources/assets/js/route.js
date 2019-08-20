import home from './components/home.vue';
import JobApply from './components/JobApply.vue';

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
    }

];
