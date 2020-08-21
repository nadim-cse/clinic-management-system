import PatientVisit from './PatientVisit.vue';
import VueRouter from 'vue-router';

window.axios = require('axios');

export default new VueRouter({
    routes: [
        {
            path: '/',
            name: 'patient-visit',
            component: PatientVisit,
        },
    ]
});
