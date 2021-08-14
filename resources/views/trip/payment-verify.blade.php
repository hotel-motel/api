<x-app-layout>
    <x-slot name="header">
        @if(isset($error))
            <div class="alert alert-danger">
                {{ $error }}
            </div>
        @else
            <div class="alert alert-success">
                Room reserved
            </div>
        @endif
    </x-slot>
</x-app-layout>
