/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

//Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

import TopPage from "./components/TopPage.vue"

// Vueルータの導入
import VueRouter from 'vue-router'
// Fontawesomeライブラリの導入
import { library } from '@fortawesome/fontawesome-svg-core'
import { fas } from '@fortawesome/free-solid-svg-icons'
import { fab } from '@fortawesome/free-brands-svg-icons'
import { far } from '@fortawesome/free-regular-svg-icons'
import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
library.add(fas)

// 各種ライブラリのコンポーネント登録
Vue.component('font-awesome-icon', FontAwesomeIcon)
Vue.use(VueRouter)

// Vueルータのルーティング設定
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
	router
});
