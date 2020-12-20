/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
//vform js
import { Form, HasError, AlertError } from 'vform'
window.Form = Form;
Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)
//vue Router
import Vue from 'vue'
import VueRouter from 'vue-router'

Vue.use(VueRouter)

//routes
const routes = [
    { path: '/example-component', component: require('./components/ExampleComponent.vue').default },
    { path: '/dashboard-component', component: require('./components/Dashboard.vue').default },
    { path: '/profile-component', component: require('./components/Profile.vue').default },
    { path: '/users-component', component: require('./components/Users.vue').default },
  ]

  const router = new VueRouter({
    routes // short for `routes: routes`
    ,mode:'history'
  })




/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    router,
    
});
