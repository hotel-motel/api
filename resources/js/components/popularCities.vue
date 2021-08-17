<template>
    <div class="container text-white rounded bg-dark">
        <div class="row top mb-3">
            <div class="col-11 mt-3 h4">
                Popular cities
            </div>
            <div class="col-1 mt-3">
                <a class="text-white" href="/cities">
                    show all
                </a>
            </div>
        </div>
        <div class="row">
            <div class="col" v-for="city in cities">
                <city :name="city.name" :image="city.image"></city>
            </div>
        </div>
        <br>
    </div>
</template>

<script>
import city from "./city";
export default {
    components:{
        city
    },
    data(){
        return{
            cities:[
                {
                    name:'Tehran',
                    image:'https://unsplash.com/photos/kVACg-kVKA0/download?force=true&w=640',
                },
                {
                    name:'Mashhad',
                    image:'https://unsplash.com/photos/jDgZrAPV_cI/download?force=true&w=640',
                },
                {
                    name:'Tabriz',
                    image:'https://unsplash.com/photos/6jBKmH4klU8/download?force=true&w=640',
                },
                {
                    name:'Shiraz',
                    image:'https://unsplash.com/photos/kmjH-aZnzYU/download?force=true&w=640',
                }
            ]
        };
    }
};
</script>

