@extends('layouts.dashboard')

@section('title', 'Dashboard')

@section('content')
  <h2>Person Details</h2>
  <br><br>

  <div class="row">
    <div class="col-4"><div class="card" style="width: 18rem;">
        <img src="{{url('images/pericon.png')}}" class="card-img-top" alt="...">
        <div class="card-body">
          <h5 class="card-title text-center">{{ $person->name }} </h5>
        </div>
    </div>
  </div>
  <div class="col-8">
    <p><strong>Name :</strong> {{ $person->name }}</p>
    <p><strong>National ID Number :</strong> {{ $person->nic }}</p>
    <p><strong>Date of Birth :</strong> {{ $person->dob }}</p>
    <p><strong>Age :</strong> {{ $age }}</p>
    <p><strong>Gender :</strong> {{ $person->gender->name ?? 'N/A' }} </p>
    <p><strong>Religion :</strong> {{ $person->religion->name ?? 'N/A' }}</p>
    <p><strong>Address :</strong> {{ $person->address }}</p>
    <p><strong>Contact Number :</strong> {{ $person->phone }}</p>
    <p><strong>Email :</strong> {{ $person->email }}</p>
  </div>
  </div>
  

  <div class="text-end">
        <a href="{{ route('person.index') }}" class="btn btn-secondary">Back</a>
  </div>

@endsection
