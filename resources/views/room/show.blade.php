<x-app-layout>
    <x-slot name="header">
        <div class="row">
            <div class="col-9">
                <div class="grid gap-2">
                    <span class="h4">
                        <div class="badge badge-primary">
                            Room Info
                        </div>
                    </span>
                    <span class="h5">
                        Number: {{ $room->number }}
                    </span>
                    <span class="h5">
                        Capacity : {{ $room->max_capacity }}
                    </span>
                    <span class="h5">
                        Price : {{ $room->price }}
                        Tooman
                        (per night)
                    </span>
                    <span class="h4">
                        <div class="badge badge-primary">
                            Hotel info
                        </div>
                    </span>
                    <div class="h5">
                        <span class="font-bold">
                            Name : {{ $room->hotel->name }}
                        </span>
                        <span class="badge badge-warning">
                            {{ $room->hotel->star }}
                            <i class='bx bxs-star'></i>
                        </span>
                    </div>
                    <div class="h6">
                        <i class='bx bxs-location-plus'></i>
                        Address :
                        {{ $room->hotel->city->name }},
                        {{ $room->hotel->address }}
                    </div>
                </div>
            </div>
            <div class="col-3">
                <img class="rounded" src="{{ $room->hotel->image }}" alt="{{ $room->hotel->name }}}">
            </div>
        </div>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <form action="#" method="get" class="flex justify-around">
                            <div>
                                <span class="h5">
                                    <i class='bx bx-down-arrow-alt'></i>
                                    Arrive :
                                </span>
                                {{ request()->input('start') }}
                            </div>
                            <div>
                                <span class="h5">
                                    <i class='bx bx-up-arrow-alt' ></i>
                                    Leave :
                                </span>
                                {{ request()->input('end') }}
                            </div>
                        </form>
                    </div>
                </div>
        </div>
    </div>
    <passenger-form></passenger-form>
</x-app-layout>
