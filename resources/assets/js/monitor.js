
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

Vue.component('monitor-header',         require('./components/monitor/Header.vue'));
Vue.component('monitor-title',          require('./components/monitor/Title.vue'));
Vue.component('monitor-triage',         require('./components/monitor/Triage.vue'));
Vue.component('monitor-triage-counter', require('./components/monitor/TriageCounter.vue'));
Vue.component('monitor-patients',       require('./components/monitor/Patients.vue'));
Vue.component('monitor-news',           require('./components/monitor/News.vue'));
Vue.component('monitor-weather',        require('./components/monitor/Weather.vue'));
Vue.component('monitor-site',           require('./components/monitor/Site.vue'));

const app = new Vue({
    el: '#app'
});
