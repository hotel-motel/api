require('./bootstrap');

require('alpinejs');

import Vue from 'vue/dist/vue.js';
import searchRoom from "./components/searchRoom";
import passengerForm from './components/passengerform';
import popularCities from "./components/popularCities";

new Vue({
    el:'#app',
    components:{
        searchRoom,
        popularCities,
        passengerForm
    }
});
