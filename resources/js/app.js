import './bootstrap'
import Vue from 'vue'
import Favorite from './components/Favorite'

import VueRouter from 'vue-router';
import TopPage from "./components/TopPage.vue";

Vue.use(VueRouter);

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'toppage',
            component: TopPage
        },
    ]
});

const app = new Vue({
    el: '#app',
    router,
    components: {
        Favorite
    }
});
