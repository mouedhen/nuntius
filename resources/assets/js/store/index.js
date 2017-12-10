import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);

import jobs from './modules/contacts/jobs'

export default new Vuex.Store({
    modules: {
        jobs
    },
    strict: true
})
