require('./bootstrap');

require('alpinejs');

import Vue from 'vue/dist/vue.js';
import passengerForm from './components/passengerform.vue';

new Vue({
    el:'#app',
    components:{
        passengerForm
    }
});
