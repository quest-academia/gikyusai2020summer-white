import './bootstrap'
import axios from 'axios'
import Vue from 'vue'
import Favorite from './components/Favorite'
import Hello from './components/Hello'

const app = new Vue({
    el: '#app',
    components: {
        Favorite,Hello,
    }
});
