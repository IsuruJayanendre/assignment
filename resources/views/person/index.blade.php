@extends('layouts.dashboard')

@section('title', 'Dashboard')

@section('content')

@if (Auth::user()->user_type == '1')

 <div class="text-end">
    <a href="{{ route('person.create') }}" class="btn btn-primary">Register person</a>
    <br>
    <br>
  </div>

@endif

  <div class="row">
    <div class="col">
        <div class="mb-3">
            <label for="search-nic" class="form-label">National ID Number</label>
            <input type="text" id="search-nic" class="form-control">
        </div>
    </div>
    <div class="col">
        <div class="mb-3">
            <label for="search-name" class="form-label">Full Name</label>
            <input type="text" id="search-name" class="form-control">
        </div>
    </div>
    <div class="col">
        <div class="mb-3">
            <label for="search-dob" class="form-label">Date of Birth</label>
            <input type="date" id="search-dob" class="form-control">
        </div>
    </div>
</div>

  <table class="table">
    <thead>
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>NIC</th>
            <th>DOB</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody id="people-table-body">
        @foreach($people as $person)
            @include('person.partials.person-row', ['person' => $person])
        @endforeach
    </tbody>
</table>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const nameInput = document.getElementById('search-name');
    const nicInput = document.getElementById('search-nic');
    const dobInput = document.getElementById('search-dob');

    [nameInput, nicInput, dobInput].forEach(input => {
        input.addEventListener('input', fetchFilteredData);
    });

    function fetchFilteredData() {
        const name = nameInput.value;
        const nic = nicInput.value;
        const dob = dobInput.value;

        fetch(`/person/search?name=${name}&nic=${nic}&dob=${dob}`)
            .then(res => res.text())
            .then(data => {
                document.getElementById('people-table-body').innerHTML = data;
            });
    }
});
</script>


@endsection