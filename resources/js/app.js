/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

import Echo from 'laravel-echo'

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: 'e327059ec1ce94e6144c',
    cluster: 'eu',
    forceTLS: true
});

const channel = window.Echo.channel('flats');
const flats = document.getElementById('flats');



channel.listen('.flats-count', function(data) {
    flats.innerText = (JSON.stringify(data.counter));
});


