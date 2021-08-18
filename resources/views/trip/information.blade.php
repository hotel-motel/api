<div class="container">
    <div class="flex justify-around">
        <div>
            <span class="h5">
                <i class='bx bx-down-arrow-alt'></i>
                Arrive :
            </span>
            {{ $trip->start }}
        </div>
        <div>
            <span class="h5">
                <i class='bx bx-up-arrow-alt' ></i>
                Leave :
            </span>
            {{ $trip->end }}
        </div>
    </div>
</div>
