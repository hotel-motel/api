<x-app-layout>
    <x-slot name="header">
        <h4 class="font-bold">
            Cities List
        </h4>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="row justify-around m-3">
                    @foreach($cities as $city)
                        <div class="col-4 mb-3">
                            <city name="{{ $city->name }}" image="{{ $city->image }}"></city>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
