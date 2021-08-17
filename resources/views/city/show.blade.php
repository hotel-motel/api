<x-app-layout>
    <x-slot name="header">
        <h4 class="font-bold">
            {{ $city->name }} hotels
        </h4>
    </x-slot>
    <city-hotels city_name="{{ $city->name }}"></city-hotels>
</x-app-layout>
