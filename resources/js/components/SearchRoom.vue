<template>
    <div>
        <div class="py-12" v-if="error!=null">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="alert alert-danger">
                    {{ error }}
                </div>
            </div>
        </div>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="grid gap-2">
                <span class="h4">
                    <i class='bx bxs-calendar' ></i>
                    Choose your trip times :
                </span>
                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <div class="p-6 bg-white border-b border-gray-200">
                            <div class="d-flex justify-content-center mt-3" v-if="is_loading">
                                <div class="spinner-border" role="status"></div>
                            </div>
                            <div class="flex justify-around" v-else>
                                <div>
                                <span class="h5">
                                    <i class='bx bx-down-arrow-alt'></i>
                                    Arrive :
                                </span>
                                    <input type="date" name="start" v-model="start" :min="getCurrentDate()" required>
                                </div>
                                <div>
                                <span class="h5">
                                    <i class='bx bx-up-arrow-alt' ></i>
                                    Leave :
                                </span>
                                    <input type="date" name="end" v-model="end" :min="getCurrentDate()" required>
                                </div>
                                <button class="btn btn-primary" @click="search()">
                                    <i class='bx bx-search'></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="py-12" v-if="rooms!=null">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="grid gap-2">
                    <span class="h3">
                        <i class='bx bx-list-ul'></i>
                        Rooms list :
                    </span>
                    <table class="table table-hover">
                        <thead>
                        <tr>
                            <th scope="col">Number</th>
                            <th scope="col">Capacity</th>
                            <th scope="col">Floor</th>
                            <th scope="col">
                                Price(for{{ getSearchDuration() }} day)
                            </th>
                            <th scope="col">Reserve Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr v-for="room in rooms">
                            <th scope="row">{{ room.number }}</th>
                            <td>{{ room.max_capacity }}</td>
                            <td>{{ room.floor }}</td>
                            <td>
                                {{ getSearchDuration() * room.price }}
                                <span class="badge badge-warning">
                                        Tooman
                                </span>
                            </td>
                            <td>
                                <form method="get" :action="'/rooms/'+room.id">
                                    <input type="hidden" name="start" :value="start">
                                    <input type="hidden" name="end" :value="end">
                                    <input type="submit" class="btn btn-danger" value="Reserved" v-if="reserved.includes(room.id)"  disabled>
                                    <input type="submit" class="btn btn-dark" value="Reserve" v-else>
                                </form>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import moment from 'moment'
export default {
    data(){
        return{
            end:'',
            start:'',
            error:null,
            rooms:null,
            reserved:[],
            is_loading:false
        }
    },
    methods:{
        search(){
            this.is_loading=true
            this.rooms=null
            this.reserved=null
           axios.post(window.location.href, {
               start:this.start,
               end:this.end
           }).then(response=>this.loadData(response.data))
            .catch(error=>this.error=error.response.data.errors.end[0])
            .finally(()=>{ this.is_loading=false })

        },
        loadData(response){
            this.rooms=response.rooms
            this.reserved=response.reserved
        },
        getSearchDuration(){
            // Note: add 1 because moment do not calculate end date fo get diff
            return moment(this.end).diff(moment(this.start), 'days')+1
        },
        getCurrentDate(){
            return moment().format(moment.HTML5_FMT.DATE)
        }
    }
}
</script>
