import router from './route';
import Vue from 'vue'
import VueRouter from 'vue-router';


Vue.use(VueRouter)
Vue.use(require('vue-moment'))
import VueConfirmDialog from 'vue-confirm-dialog'
 
Vue.use(VueConfirmDialog)
Vue.component('vue-confirm-dialog', VueConfirmDialog.default)

import VueToast from 'vue-toast-notification';
// Import one of available themes
import 'vue-toast-notification/dist/theme-default.css';
Vue.use(VueToast);

new Vue({
    router,
}).$mount('#app');