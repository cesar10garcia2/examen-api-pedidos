/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
import Vue from 'vue'

import axios from 'axios'
import VueAxios from 'vue-axios'
import VueRouter from 'vue-router'
import router from './router'
import store from './store'
import App from './layouts/App'


axios.defaults.withCredentials = true
axios.defaults.baseURL= '/api/';
const token = localStorage.getItem('token')
if(token){
  axios.defaults.headers.common['Authorization'] = token
}


window.Vue = require('vue');


Vue.use(VueAxios, axios)
Vue.use(VueRouter)



const app = new Vue({
    store,
    el: '#app',
    components: {App},
    router
});
