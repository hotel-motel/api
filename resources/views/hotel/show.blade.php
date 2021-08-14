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
    {{--    show error of search --}}
    @if ($errors->any())
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    @endif
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="grid gap-2">
                <span class="h4">
                    <i class='bx bxs-calendar' ></i>
                    Choose your trip times :
                </span>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200">
                        <form action="#" method="get" class="flex justify-around">
                            <div>
                                <span class="h5">
                                    <i class='bx bx-down-arrow-alt'></i>
                                    Arrive :
                                </span>
                                <input type="date" name="start" value="{{ request()->get('start') }}" min="{{ now()->toDateString() }}" required>
                            </div>
                            <div>
                                <span class="h5">
                                    <i class='bx bx-up-arrow-alt' ></i>
                                    Leave :
                                </span>
                                <input type="date" name="end" value="{{ request()->get('end') }}" min="{{ now()->toDateString() }}" required>
                            </div>

                            <button type="submit" class="btn btn-primary">
                                <i class='bx bx-search'></i>
                            </button>
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
                    <i class='bx bx-list-ul'></i>
                    Rooms list :
                </span>
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 bg-white border-b border-gray-200 flex justify-around">
                        <div class="font-bold">
                            Number
                        </div>
                        <div class="font-bold">
                            Capacity
                        </div>
                        <div class="font-bold">
                            Floor
                        </div>
                        <div class="font-bold">
                            Price
                            <span class="font-bold">
                               (for {{ $trip_duration }} day)
                            </span>
                        </div>
                        <div class="font-bold">
                            Reserve Status
                        </div>
                    </div>
                </div>
                    @foreach($hotel->rooms as $room)
                        <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                            <div class="p-6 bg-white border-b border-gray-200 flex justify-around">
                                <div>
                                    {{ $room->number }}
                                </div>
                                <div>
                                    {{ $room->max_capacity }}
                                </div>
                                <div>
                                    {{ $room->floor }}
                                </div>
                                <div>
                                    {{ $trip_duration * $room->price }}
                                    <span class="badge badge-warning">
                                        Tooman
                                    </span>
                                </div>
                                <div>
                                    <form method="get" action="{{ route('rooms.reserve', ['room'=> $room->id]) }}">
                                        <input type="hidden" name="start" value="{{ request()->input('start') }}">
                                        <input type="hidden" name="end" value="{{ request()->input('end') }}">
                                        @if(in_array($room->id, $reserved))
                                            <input type="submit" class="btn btn-danger" value="Reserved"  disabled>
                                        @else
                                            <input type="submit" class="btn btn-dark" value="Reserve" >
                                        @endif
                                    </form>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    @endif
</x-app-layout>
