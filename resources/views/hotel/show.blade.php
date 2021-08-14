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
    {{-- TODO: shwo error of search rooms   --}}
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid gap-2">
                <span class="h4">
                    Choose your trip time :
                </span>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <form action="#" method="get" class="flex justify-around">
                            <div>
                                <span class="h5">
                                    Arrive :
                                </span>
                                <input type="date" name="start" value="{{ request()->get('start') }}" min="{{ now()->toDateString() }}" required>
                            </div>
                            <div>
                                <span class="h5">
                                    Leave :
                                </span>
                                <input type="date" name="end" value="{{ request()->get('end') }}" min="{{ now()->toDateString() }}" required>
                            </div>
                            <input type="submit" value="search" class="btn btn-primary">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @if(request()->has('start') && request()->has('end'))
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="grid gap-2">
                <span class="h3">
                    Rooms List :
                </span>
                    @foreach($hotel->rooms as $room)
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-6 bg-white border-b border-gray-200 flex justify-around">
                                <div>
                                    Number: {{ $room->number }}
                                </div>
                                <div>
                                    Capacity: {{ $room->max_capacity }}
                                </div>
                                <div>
                                    Floor : {{ $room->floor }}
                                </div>
                                <div>
                                    Price : {{ $trip_duration * $room->price }}
                                    <span class="badge badge-warning">
                                    Tooman
                                </span>
                                    <span class="h6">
                                    (For {{ $trip_duration }} day)
                                </span>
                                </div>
                                <div>
                                    @if(in_array($room->id, $reserved))
                                        <span class="badge badge-danger">
                                        Reserved for this period
                                    </span>
                                    @else
                                        <form method="get" action="{{ route('rooms.reserve', ['room'=> $room->id]) }}">
                                            <input type="hidden" name="start" value="{{ request()->input('start') }}">
                                            <input type="hidden" name="end" value="{{ request()->input('end') }}">
                                            <input type="submit" class="btn btn-primary" value="Reserve">
                                        </form>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif
</x-app-layout>
