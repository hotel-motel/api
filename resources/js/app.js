require('./bootstrap');

require('alpinejs');

import Vue from 'vue/dist/vue.js';
import SearchRoom from "./components/SearchRoom";
import PassengerForm from './components/passengerform';

new Vue({
    el:'#app',
    components:{
        PassengerForm,
        SearchRoom
    }
});
