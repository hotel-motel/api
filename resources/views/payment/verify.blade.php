@if(isset($exception))
    {{ $exception->getMessage() }}
@else
    {{ dd($receipt) }}
@endif
