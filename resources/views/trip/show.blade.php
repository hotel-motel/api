<x-app-layout>
    <x-slot name="header">
        <h4>
            Trip Information
        </h4>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="grid gap-7 mt-4 mb-4">
                    @include('trip.information')
                    @include('trip.room')
                    @include('trip.passengers')
                    @include('trip.payment')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
