import VueRouter from 'vue-router'

import Home from './components/pages/Home.vue'

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'index',
            component: Home,
            meta: {}
        }
    ]
});

export default router;
