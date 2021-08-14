<template>
	<div>
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 flex justify-end">
            <Button class="btn btn-primary" @click="addPassengerField">
                Add new passenger
            </Button>
        </div>
        <!--   TODO: check inputs must be not empty and must be same thing we need     -->
		<div class="py-12">
            <div>
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 grid gap-2">
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg" v-for="(passenger, index) in passengers">
                            <div class="p-6 bg-white border-b border-gray-200">
                                <div class="flex justify-around">
                                    <div>
                                        <span class="h5">
                                            First name :
                                        </span>
                                        <input class="form-control" type="text" name="first_name[]" v-model="passenger.first_name" required>
                                    </div>
                                    <div>
                                        <span class="h5">
                                            Last name :
                                        </span>
                                        <input class="form-control" type="text" name="last_name[]" v-model="passenger.last_name" required>
                                    </div>
                                    <div>
                                        <span class="h5">
                                            National code :
                                        </span>
                                        <input class="form-control" type="text" name="national_code[]" v-model="passenger.national_code" required>
                                    </div>
                                    <div>
                                        <button class="btn btn-danger" @click="removePassenger(index)">
                                            Remove
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 grid gap-2" v-show="passengers.length>0">
                    <Button class="btn btn-success" @click="checkForm()" >
                        Continue
                    </Button>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
	export default{
		data(){
			return {
				passengers:[]
			}
		},
		methods:{
			addPassengerField(){
				this.passengers.push({'first_name':'', 'last_name':'', 'national_code':''})
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
                .then(response=> alert('redirect to payment'))
                .catch(error=> alert('we have error on send request'));
            }
		}
	}
</script>
