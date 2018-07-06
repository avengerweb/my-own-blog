import Vue from 'vue';

import router from './router'
import store from './store'

/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
require('./bootstrap');

window.Vue = Vue;

const app = new Vue({
  router,
  store,
  el: '#app',
  data: () => ({
    dialog: false,
    drawer: null,
  })
});