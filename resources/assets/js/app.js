import 'babel-polyfill'
import axios from 'axios'
import Vue from 'vue'

window.Vue = Vue;
window.axios = axios;

import VueRouter from 'vue-router'
import VueResource from 'vue-resource'
import Vuex from 'vuex'

Vue.use(VueRouter);
Vue.use(VueResource);
Vue.use(Vuex);

import ElementUI from 'element-ui'
import locale from 'element-ui/lib/locale/lang/fr'
import DataTables from 'vue-data-tables'

Vue.use(ElementUI, { locale });
Vue.use(DataTables);

//@todo add authentication logic

import router from './routes'
import store from './store'
import App from './components/App.vue'

Vue.component('app', App);
const app = new Vue({
    router,
    store
}).$mount('#app');
