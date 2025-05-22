@extends('layouts.dashboard')

@section('title', 'Dashboard')

@section('content')
  
  <form action="{{ route('person.update', $person->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label for="name" class="form-label">Full Name</label>
        <input type="text" name="name" value="{{ $person->name }}" class="form-control" id="name" required>
        @error('name') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    <div class="row">
        <div class="col">
            <div class="mb-3">
                <label for="nic" class="form-label">National ID Number</label>
                <input type="text" name="nic" value="{{ $person->nic }}" class="form-control" id="nic" required>
                @error('nic') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
        </div>
        <div class="col">
            <div class="mb-3">
                <label for="dob" class="form-label">Date of Birth</label>
                <input type="date" name="dob" value="{{ $person->dob }}" class="form-control" id="dob" required>
                @error('dob') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col">
            <label class="form-label">Gender</label>
            <div class="form-check">
            <input class="form-check-input" type="radio" name="gender" id="male" value="male"
                {{ (old('gender', $person->gender) == 'male') ? 'checked' : '' }} required>
            <label class="form-check-label" for="male">Male</label>
        </div>

        <div class="form-check">
            <input class="form-check-input" type="radio" name="gender" id="female" value="female"
                {{ (old('gender', $person->gender) == 'female') ? 'checked' : '' }}>
            <label class="form-check-label" for="female">Female</label>
        </div>

            @error('gender') <small class="text-danger">{{ $message }}</small> @enderror
        </div>
        <div class="col">
            <div class="mb-3">
                <label for="religion" class="form-label">Religion</label>
                <input type="text" name="religion" value="{{ $person->religion }}" class="form-control" id="religion">
                @error('religion') <small class="text-danger">{{ $message }}</small> @enderror
            </div>
        </div>
    </div>

    <div class="mb-3">
        <label for="address" class="form-label">Address</label>
        <textarea class="form-control" id="address" rows="3" name="address" required>{{ $person->address }}</textarea>
        @error('address') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    <div class="mb-3">
        <label for="phone" class="form-label">Contact Number</label>
        <input type="text" name="phone" value="{{ $person->phone }}" class="form-control" id="phone" required>
        @error('phone') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    <div class="mb-3">
        <label for="email" class="form-label">Email address</label>
        <input type="email" name="email" value="{{ $person->email }}" class="form-control" id="email" required>
        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
        @error('email') <small class="text-danger">{{ $message }}</small> @enderror
    </div>

    <div class="text-end">
        <a href="{{ route('person.index') }}" class="btn btn-secondary">Cancel</a>
        <button type="submit" class="btn btn-success">Update</button>
    </div>
</form>

@endsection