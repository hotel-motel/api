<x-app-layout>
    <x-slot name="header">
        <div class="row">
            <div class="col-9">
                <div class="grid gap-2">
                    <div class="h2">
                <span class="font-bold">
                    {{ $hotel->name }}
                </span>
                        <span class="badge badge-warning">
                    {{ $hotel->star }}
                    <i class='bx bxs-star'></i>
                </span>
                    </div>
                    <div class="h6">
                        <i class='bx bxs-location-plus'></i>
                        {{ $hotel->city->name }},
                        {{ $hotel->address }}
                    </div>
                </div>
            </div>
            <div class="col-3">
                <img class="rounded" src="{{ $hotel->image }}" alt="{{ $hotel->name }}}">
            </div>
        </div>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @foreach($hotel->rooms as $room)
                        {{ $room->id }}
                        <hr>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
