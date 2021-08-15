require('./bootstrap');

require('alpinejs');

import Vue from 'vue/dist/vue.js';
import SearchRoom from "./components/searchRoom";
import PassengerForm from './components/passengerform';
import popularCities from "./components/popularCities";

new Vue({
    el:'#app',
    components:{
        SearchRoom,
        popularCities,
        PassengerForm
    }
});
