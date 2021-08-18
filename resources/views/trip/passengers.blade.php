<div class="container grid gap-2">
    <span class="h4">
        <div class="badge badge-primary">
            Passengers list
        </div>
    </span>
    <table class="table table-striped">
        <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">First name</th>
            <th scope="col">Last name</th>
            <th scope="col">National code</th>
        </tr>
        </thead>
        <tbody>
        @foreach($trip->passengers as $passenger)
            <tr>
                <th scope="row">{{ $loop->index+1 }}</th>
                <td>{{ $passenger->first_name }}</td>
                <td>{{ $passenger->last_name }}</td>
                <td>{{ $passenger->national_code }}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
