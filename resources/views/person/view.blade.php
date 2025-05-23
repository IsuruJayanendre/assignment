@extends('layouts.dashboard')

@section('title', 'Dashboard')

@section('content')
  <h2>Dashboard Overview</h2>
  <p>This is your main dashboard content area.</p>
  <p><strong>Name :</strong> {{ $person->name }}</p>
  <p><strong>National ID Number :</strong> {{ $person->nic }}</p>
  <p><strong>Date of Birth :</strong> {{ $person->dob }}</p>
  <p><strong>Age :</strong> {{ $age }}</p>
  <p><strong>Gender :</strong> {{ $person->gender }}</p>
  <p><strong>Religion :</strong> {{ $person->religion }}</p>
  <p><strong>Address :</strong> {{ $person->address }}</p>
  <p><strong>Contact Number :</strong> {{ $person->phone }}</p>
  <p><strong>Email :</strong> {{ $person->email }}</p>

  <div class="text-end">
        <a href="{{ route('person.index') }}" class="btn btn-secondary">Back</a>
  </div>

@endsection
