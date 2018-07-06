import Vue from 'vue';
import Router from 'vue-router';
import Index from '../pages/Index';
import Posts from '../pages/Posts';

Vue.use(Router);

export default new Router({
  mode: 'hash',
  routes: [
    {
      path: '/',
      name: 'index',
      component: Index
    },
    {
      path: '/posts',
      name: 'posts',
      component: Posts
    },
    {
      path: '*',
      redirect: '/'
    }
  ]
})