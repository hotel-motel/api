<template>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="row">
                    <div class="col-4" v-for="hotel in hotels">
                        <hotel :hotel="hotel"></hotel>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import hotel from "./hotel";
export default {
    props:['city_name'],
    components:{
        hotel
    },
    data(){
      return{
          hotels:null
      }
    },
    mounted() {
        axios.get('/cities/'+this.city_name+'/hotels')
        .then(response=>this.hotels=response.data)
    }
}
</script>
