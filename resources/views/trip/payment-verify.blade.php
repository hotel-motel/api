<x-app-layout>
    <x-slot name="header">
        <h4>
            Payment Status:
        </h4>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(isset($error))
                <div class="alert alert-danger">
                    {{ $error }}
                </div>
            @else
                <div class="alert alert-success">
                    Room reserved.
                    <a class="alert-link" href="/trips/{{ $trip->id }}">
                        Trip information
                    </a>
                </div>
            @endif
        </div>
    </div>
</x-app-layout>
