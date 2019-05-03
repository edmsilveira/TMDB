
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

// Plugins
require('./plugins/prototypes');
require('./util');

import { Lazyload } from './mixins'
import {VueMasonryPlugin} from 'vue-masonry'
import VueRouter from 'vue-router'

Vue.use(VueMasonryPlugin);
Vue.use(VueRouter);

Vue.component('menu-component', require('./components/MenuComponent.vue'));
Vue.component('feed-component', require('./components/FeedComponent.vue'));
Vue.component('search-component', require('./components/SearchComponent.vue'));
Vue.component('modal-component', require('./components/ModalComponent.vue'));

// Routes

const routes = [
    {path: '/', component: Vue.component('feed-component')},
    {path: '/home', component: Vue.component('feed-component')},
    {path: '/search', component: Vue.component('search-component')},
    {path: '/modal', component: Vue.component('modal-component')},
    
]

const router = new VueRouter({
    mode: 'history',
    routes
})

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.cmponent(key.split('/').pop().split('.')[0], files(key)))

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */


var feed = new Vue({
    mixins: [Lazyload],
    router
}).$mount('#feed');

