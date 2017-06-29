
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('mobile-login',       require('./components/mobile/Login.vue'));

Vue.component('mobile-status',      require('./components/mobile/Status.vue'));
Vue.component('mobile-description', require('./components/mobile/Description.vue'));
Vue.component('mobile-button',      require('./components/mobile/Button.vue'));

Vue.component('mobile-introduction', require('./components/mobile/Introduction.vue'));
Vue.component('mobile-compare',      require('./components/mobile/Compare.vue'));

Vue.component('mobile-logout',       require('./components/mobile/Logout.vue'));

const app = new Vue({
    el: '#app'
});
