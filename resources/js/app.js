require('./bootstrap');

require('alpinejs');

import Vue from 'vue/dist/vue.js';
import passengerForm from './components/passengerform.vue';

Vue.component('passenger-form', passengerForm)

new Vue({
    el:'#app',
    components:{

    }
});
