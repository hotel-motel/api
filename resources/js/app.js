require('./bootstrap');

require('alpinejs');

import city from "./components/city";
import Vue from 'vue/dist/vue.js';
import searchRoom from "./components/searchRoom";
import cityHotels from "./components/cityHotels";
import passengerForm from './components/passengerform';
import popularCities from "./components/popularCities";

new Vue({
    el:'#app',
    components:{
        city,
        searchRoom,
        cityHotels,
        popularCities,
        passengerForm
    }
});
