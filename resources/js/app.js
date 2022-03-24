<<<<<<< HEAD
require('./bootstrap');
=======
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
 import Vue from 'vue';
 import BootstrapVue from "bootstrap-vue"　// ★追加
 import 'bootstrap/dist/css/bootstrap.css'　// ★追加
 import 'bootstrap-vue/dist/bootstrap-vue.css'　// ★追加
 import VModal from 'vue-js-modal'
 
 Vue.use(VModal)
 import StudentlayoutComponent from "./components/LayoutComponent";
 import router from './router'

require('./bootstrap');

window.Vue = require('vue').default;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 * 
 */
// import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'
 Vue.use(BootstrapVue)
 //Vue.use(IconsPlugin)

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('studentlayout-component', StudentlayoutComponent);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    router,
    BootstrapVue,
});
>>>>>>> 54d70f903eae386f658222ced14cb5862c74934f
