
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

Vue.component('dashboard-fast-check-in',     require('./components/dashboard/FastCheckIn.vue'));
Vue.component('dashboard-patients',          require('./components/dashboard/Patients.vue'));
Vue.component('dashboard-waiting-too-long',  require('./components/dashboard/WaitingTooLong.vue'));
Vue.component('dashboard-last-ten-patients', require('./components/dashboard/LastTenPatients.vue'));

const app = new Vue({
    el: '#app'
});
