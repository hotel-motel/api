<template>
    <div>
        <div class="grid gap-7 h5" v-if="user">
            <div class="row">
                <div class="col">
                    <i class='bx bx-user-pin bx-sm'></i>
                    Name:
                    {{ user.name }}
                </div>
                <div class="col">
                    <i class='bx bx-envelope bx-sm'></i>
                    Email :
                    {{ user.email }}
                </div>
            </div>
            <div>
                <i class='bx bx-calendar-heart bx-sm'></i>
                Joined at :
                {{ getJoinedAt }}
            </div>
            <div class="row">
                <div class="col">
                    <i class='bx bx-trip bx-sm'></i>
                    Trips Count :
                    <router-link to="/trips">
                        {{ user.trips.length }}
                    </router-link>
                </div>
                <div class="col">
                    <i class='bx bx-calculator bx-sm' ></i>
                    Days in trip : {{ getTotalTripsDuration }}
                </div>
            </div>
        </div>

    </div>
</template>

<script>
import moment from 'moment';
export default {
    data(){
        return{
            user:null
        }
    },
    mounted() {
        axios.get('/user')
        .then(response=>this.user=response.data)
    },
    computed:{
        getTotalTripsDuration(){
            let response=0
            this.user.trips.forEach(trip=>{
                let differentInDay =moment.duration(moment(trip.end).diff(moment(trip.start))).asDays()+1
                response+=differentInDay
            })
            return response
        },
        getJoinedAt(){
            return moment(this.user.created_at).format('DD-MMM-YYYY')
        }
    }
}
</script>
