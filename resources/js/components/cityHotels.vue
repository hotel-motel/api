<template>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="row justify-around m-3">
                    <div class="col-4 mb-3" v-for="hotel in hotels">
                        <hotel :hotel="hotel"></hotel>
                    </div>
                </div>
            </div>
            <nav aria-label="..." v-if="last_page>1">
                <ul class="pagination justify-content-center">
                    <li class="page-item"  v-for="page in last_page" :class="{'active':page===current_page}" @click="changePage(page)">
                        <a class="page-link" href="#">
                            {{ page }}
                        </a>
                    </li>
                </ul>
            </nav>
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
          hotels:null,
          last_page:1,
          current_page:1
      }
    },
    mounted() {
        axios.get('/cities/'+this.city_name+'/hotels')
        .then(response=>this.loadData(response, 1))
    },
    methods:{
        loadData(response, page){
            this.hotels=response.data.data
            this.last_page=response.data.last_page
            this.current_page=page
        },
        changePage(page){
            if (this.current_page===page)
                return;
            this.hotels=null
            axios.get('/cities/'+this.city_name+'/hotels?page='+page)
                .then(response=>this.loadData(response, page))
        }
    }
}
</script>
