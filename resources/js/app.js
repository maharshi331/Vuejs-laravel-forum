/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.



*/
require('./bootstrap');

import Vue from 'vue';
import VueRouter from 'vue-router'

window.Vue = require('vue').default;

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component( "Directory", require("./components/Directory.vue").default);
Vue.component( "forum", require("./components/Forum.vue").default);
Vue.component("forum-view", require("./components/forum_View.vue").default);
Vue.component("chat", require("./components/chat.vue").default);
Vue.component("view", require("./components/view.vue").default);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.use(VueRouter);
const routes = [
    {
        path: "/Forum",
        component: require("./components/forum_View.vue").default,
    },
    {
        path: "/create",
        component: require("./components/Forum.vue").default,
    },
    {
        path: "/home",
        component: require("./components/Directory.vue").default,
    },
    {
        path: "/chat",
        component: require("./components/chat.vue").default,
    },
    {
        path: "/view",
        component: require("./components/view.vue").default,
    },
];
const router = new VueRouter({
    routes: routes,
    mode: "history"
});

const app = new Vue({
    el: '#app',
    router

});





