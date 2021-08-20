<template>
    <div class="grid gap-3">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th scope="col"> </th>
                    <th scope="col">Start date</th>
                    <th scope="col">End data</th>
                    <th scope="col">City</th>
                    <th scope="col">Hotel</th>
                    <th scope="col"> </th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="(trip, index) in trips">
                    <td>{{ index+1 }}</td>
                    <td>{{ trip.start }}</td>
                    <td>{{ trip.end }}</td>
                    <td>
                        <a :href="'/cities/'+trip.room.hotel.city.name">
                            {{ trip.room.hotel.city.name }}
                        </a>
                    </td>
                    <td>
                        <a :href="'/hotels/'+trip.room.hotel.id">
                            {{ trip.room.hotel.name }}
                        </a>
                    </td>
                    <td>
                        <a class="btn btn-warning" :href="'/trips/'+trip.id">
                            Details
                        </a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>

<script>
export default {
    data(){
        return{
          trips:[],
        }
    },
    mounted() {
        //TODO: catch error of request
        axios.get('/trips')
        .then(response=>this.trips=response.data)
    }
}
</script>
