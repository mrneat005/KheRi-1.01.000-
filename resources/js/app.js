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
import moment from 'moment';
import VueProgressBar from 'vue-progressbar'
import Swal from 'sweetalert2'
window.Swal = Swal;
let Fire = new Vue();
window.Fire = Fire;
//shorter way window.Fire = new Vue();
//sweet toast
const Toast = Swal.mixin({
  toast: true,
  position: 'top-end',
  showConfirmButton: false,
  timer: 3000,
  timerProgressBar: true,
  didOpen: (toast) => {
    toast.addEventListener('mouseenter', Swal.stopTimer)
    toast.addEventListener('mouseleave', Swal.resumeTimer)
  }
})

window.Toast = Toast;



//progress bar
Vue.use(VueProgressBar, {
  color: 'rgb(143, 255, 199)',
  failedColor: 'red',
  height: '8px'
})
Vue.use(VueRouter)

//routes
const routes = [
    { path: '/example-component', component: require('./components/ExampleComponent.vue').default },
    { path: '/dashboard-component', component: require('./components/Dashboard.vue').default },
    { path: '/profile-component', component: require('./components/Profile.vue').default },
    { path: '/users-component', component: require('./components/Users.vue').default },
    { path: '/passport-component', component: require('./components/Passport.vue').default },
  ]

  const router = new VueRouter({
    routes // short for `routes: routes`
    ,mode:'history'
  })
//this will take the text and capatalize its first letter
  Vue.filter('upperCaseFirst',function name(text) {
    return text.charAt(0).toUpperCase() + text.slice(1)
  });
//All
  Vue.filter('upperCaseAll',function name(text) {
    
    return text.toUpperCase()
  });

  //Lower case all
  Vue.filter('lowerCaseAll',function name(text) {
    
    return text.toLowerCase()
  });
  //date filter and formatting
  Vue.filter('simpleDate',function name(date) {
    //moment().format('MMMM Do YYYY, h:mm:ss a');
    return moment().format('ll');
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
Vue.component(
  'passport-clients',
  require('./components/passport/Clients.vue').default
);

Vue.component(
  'passport-authorized-clients',
  require('./components/passport/AuthorizedClients.vue').default
);

Vue.component(
  'passport-personal-access-tokens',
  require('./components/passport/PersonalAccessTokens.vue').default
);
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    router,
    
});
