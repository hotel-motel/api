<div class="container">
    <div class="row">
        <div class="col-9">
            <div class="grid gap-2">
                    <span class="h4">
                        <div class="badge badge-primary">
                            Room Info
                        </div>
                    </span>
                <span class="h5">
                    Number: {{ $trip->room->number }}
                </span>
                <span class="h5">
                    Capacity : {{ $trip->room->max_capacity }}
                </span>
                <span class="h4">
                        <div class="badge badge-primary">
                            Hotel info
                        </div>
                </span>
                <div class="h5">
                    Name :
                    <a class="font-bold text-gray-900 no-underline" href="{{ route('hotels.show', ['hotel'=> $trip->room->hotel->id]) }}">
                        {{ $trip->room->hotel->name }}
                    </a>
                    <span class="badge badge-warning">
                            {{ $trip->room->hotel->star }}
                            <i class='bx bxs-star'></i>
                        </span>
                </div>
                <div class="h6">
                    <i class='bx bxs-location-plus'></i>
                    Address :
                    {{ $trip->room->hotel->city->name }},
                    {{ $trip->room->hotel->address }}
                </div>
            </div>
        </div>
        <div class="col-3">
            <img class="rounded" src="{{ $trip->room->hotel->image }}" alt="{{ $trip->room->hotel->name }}}">
        </div>
    </div>
</div>
