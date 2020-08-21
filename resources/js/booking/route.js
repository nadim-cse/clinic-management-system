import BookingList from './BookingList';
import VueRouter from 'vue-router';

window.axios = require('axios');

export default new VueRouter({
    routes: [
        {
            path: '/',
            name: 'booking-list',
            component: BookingList,
        },
    ]
});
