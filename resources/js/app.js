require('./bootstrap');

import Vue from 'vue'
import App from './components/app.vue'

import router from './router'
import Toast from "vue-toastification";
import "vue-toastification/dist/index.css";

const options = {
    // You can set your default options here
};

Vue.use(Toast, options)

const app = new Vue({
    el: '#app',
    router,
    components: {App}
})

