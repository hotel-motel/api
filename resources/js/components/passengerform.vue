<template>
	<div>
		<div class="py-12">
	        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 grid gap-2">
	                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg" v-for="passenger in passengers">
	                    <div class="p-6 bg-white border-b border-gray-200">
	                        <form action="#" method="get" class="flex justify-around">
	                            <div>
	                                <span class="h5">
	                                    First name :
	                                </span>
	                                <input class="form-control" type="text" name="first_name" v-model="passenger.first_name" required>
	                            </div>
	                            <div>
	                                <span class="h5">
	                                    Last name :
	                                </span>
	                                <input class="form-control" type="text" name="last_name" v-model="passenger.last_name" required>
	                            </div>
	                            <div>
	                                <span class="h5">
	                                    National code :
	                                </span>
	                                <input class="form-control" type="text" name="national_code" v-model="passenger.national_code" required>
	                            </div>
	                        </form>
	                    </div>
	                </div>
	        	</div>
	        	<div class="max-w-7xl mx-auto sm:px-6 lg:px-8 grid gap-2">
		            <button class="btn btn-primary" @click="addPassengerField">
						Add new passenger
					</button>
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
			}
		}
	}
</script>
