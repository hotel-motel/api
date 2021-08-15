<template>
	<div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" v-if="typeof errors=='string'">
            <div class="alert alert-danger">
                {{ errors }}
            </div>
        </div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex justify-end">
            <Button class="btn btn-primary" @click="addPassengerField" v-if="passengers.length<capacity">
                <i class='bx bx-plus'></i>
                new passenger
            </Button>
            <Button class="btn btn-danger" v-else disabled>
                Room capacity is full
            </Button>
        </div>
        <!--   TODO: check inputs must be not empty and must be same thing we need     -->
		<div class="py-12">
            <div>
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 grid gap-2">
                        <div class="grid gap-3">
                            <div>
                                <span class="h4" v-if="passengers.length>0">
                                    <i class='bx bxs-calendar' ></i>
                                    Passengers list :
                                </span>
                            </div>
                            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg" v-for="(passenger, index) in passengers">
                                <div class="p-6 bg-white border-b border-gray-200">
                                    <div class="flex justify-around">
                                        <div>
                                        <span class="alert alert-dark">
                                            {{ index+1 }}
                                        </span>
                                        </div>
                                        <div class="grid gap-2">
                                            <div>
                                            <span class="h5">
                                                First name :
                                            </span>
                                                <input class="form-control" type="text" v-model="passenger.first_name" required>
                                            </div>
                                            <div class="alert alert-danger" v-if="errors['passengers.'+[index]+'.first_name']!==undefined">
                                                {{ errors['passengers.'+[index]+'.first_name'][0] }}
                                            </div>
                                        </div>
                                        <div class="grid gap-2">
                                            <div>
                                            <span class="h5">
                                            Last name :
                                        </span>
                                                <input class="form-control" type="text" v-model="passenger.last_name" required>
                                            </div>
                                            <div class="alert alert-danger" v-if="errors['passengers.'+[index]+'.last_name']!==undefined">
                                                {{ errors['passengers.'+[index]+'.last_name'][0] }}
                                            </div>
                                        </div>
                                        <div class="grid gap-2">
                                            <div>
                                            <span class="h5">
                                                National code :
                                            </span>
                                                <input class="form-control" type="text" v-model="passenger.national_code" required>
                                            </div>
                                            <div class="alert alert-danger" v-if="errors['passengers.'+[index]+'.national_code']!==undefined">
                                                {{ errors['passengers.'+[index]+'.national_code'][0] }}
                                            </div>
                                        </div>
                                        <div>
                                            <button class="btn btn-danger" @click="removePassenger(index)">
                                                <i class='bx bx-minus'></i>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="py-1">
                                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 grid gap-2" v-show="passengers.length>0">
                                    <Button class="btn btn-success" @click="checkForm()" >
                                        Continue
                                    </Button>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
	export default{
	    props:['capacity'],
		data(){
			return {
				passengers:[],
                errors: {}
			}
		},
		methods:{
			addPassengerField(){
				this.passengers.push({'first_name':'', 'last_name':'', 'national_code':''})
                console.log(this.passengers.length<this.capacity);
			},
            removePassenger(index){
			    this.passengers.splice(index, 1)
            },
            checkForm(){
                const urlParams = new URLSearchParams(window.location.search);
                axios.post(window.location.href.split('?')[0]+'/trips', {
                    'passengers':this.passengers,
                    'start':urlParams.get('start'),
                    'end':urlParams.get('end')
                })
                .then(response=> window.location.href='/trips/'+response.data+'/pay')
                .catch(error=> this.errors=error.response.data.errors);
            }
		}
	}
</script>
