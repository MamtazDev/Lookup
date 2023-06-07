require('./bootstrap');
require('admin-lte');

window.Vue = require('vue');
window.Fire = new Vue();

import Vue from 'vue'
import {BootstrapVue, IconsPlugin } from 'bootstrap-vue'

//Install BootstrapVue
Vue.use(BootstrapVue)
//Optionally install the Bootstrap icon components plugin 
Vue.use(IconsPlugin)

const app = new Vue({
	el: '#app'
})
