@extends('layouts.dashboard')

@section('title', 'Dashboard')

@section('content')

<div class="text-end">
  <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
    Add Gender
  </button>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Add new gender</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{ route('gender.store') }}" method="POST">
        @csrf
        <div class="mb-3">
        <label for="name" class="form-label">Religion Name</label>
        <input type="text" name="name" value="{{ old('name') }}" class="form-control" id="name" required>
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
    </form>
    </div>
  </div>
</div>

<table class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Gender Name</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach ( $genders as $gender )  
    <tr>
      <th scope="row">{{ $gender->id }}</th>
      <td>{{ $gender->name }}</td>
      <td>
        <button type="button" class="btn btn-success btn-sm" data-bs-toggle="modal" data-bs-target="#editModal{{ $gender->id }}">
            Edit
        </button>

        <form action="{{ route('gender.destroy', $gender->id) }}" method="POST" class="d-inline"
              onsubmit="return confirm('Are you sure you want to delete this religion?');">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
        </form>

      </td>
    </tr>

    @foreach ($genders as $gender)
<!-- Edit Modal -->
<div class="modal fade" id="editModal{{ $gender->id }}" tabindex="-1" aria-labelledby="editModalLabel{{ $gender->id }}" aria-hidden="true">
  <div class="modal-dialog">
    <form method="POST" action="{{ route('gender.update', $gender->id) }}">
        @csrf
        @method('PUT')

        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel{{ $gender->id }}">Edit Religion</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <div class="mb-3">
                    <label for="religionName{{ $gender->id }}" class="form-label">Religion Name</label>
                    <input type="text" class="form-control" name="name" id="religionName{{ $gender->id }}" value="{{ $gender->name }}" required>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="submit" class="btn btn-primary">Update</button>
            </div>
        </div>
    </form>
  </div>
</div>
@endforeach

    @endforeach
  </tbody>
</table>

@endsection
