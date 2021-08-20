require('./bootstrap');

require('alpinejs');

import Vue from 'vue/dist/vue.js';
import VueRouter from 'vue-router';
import city from "./components/city";
import dashboard from "./components/dashboard";
import searchRoom from "./components/searchRoom";
import cityHotels from "./components/cityHotels";
import passengerForm from './components/passengerform';
import popularCities from "./components/popularCities";

Vue.use(VueRouter)

new Vue({
    el:'#app',
    components:{
        city,
        dashboard,
        searchRoom,
        cityHotels,
        popularCities,
        passengerForm
    }
});
