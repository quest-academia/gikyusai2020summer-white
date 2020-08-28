import './bootstrap'
import Vue from 'vue'

// 通常コンポーネントの利用
import TopPage from "./components/TopPage.vue"
import SearchResult from "./components/SearchResult.vue"
import Favorite from './components/Favorite'
import Comment from './components/Comment'

// Vueルータコンポーネントの利用
import VueRouter from 'vue-router'
// Vuex storeコンポーネントの利用
import store from './store'
import { mapState } from "vuex";                                              
import { mapMutations } from "vuex";                                          
// Fontawesomeコンポーネントの利用
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
            component: TopPage,
        },
        {
            path: '/search-result',
            name: 'search-result',
            component: SearchResult,
        },
    ]
});

const app = new Vue({
    el: '#app',
	router,
	store,
    components: {
        Favorite,
        Comment,
    }
});
