@extends('layouts.dashboard')

@section('title', 'Dashboard')

@section('content')
  <h2>Dashboard Overview</h2>
  <p>This is your main dashboard content area.</p>

  <div class="text-end">
    <a href="{{ route('person.create') }}" class="btn btn-primary">Register person</a>
    <br>
    <br>
  </div>

  <table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Name</th>
      <th scope="col">NIC</th>
      <th scope="col">E-mail</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach ( $people as $person )
    <tr>
      <th scope="row">{{ $person->id }}</th>
      <td>{{ $person->name }}</td>
      <td>{{ $person->nic }}</td>
      <td>{{ $person->email }}</td>
      <td>
        <div class="d-flex gap-2 align-items-center">
            <a href="{{ route('person.edit', $person->id) }}" class="btn btn-dark">View</a>
            <a href="{{ route('person.edit', $person->id) }}" class="btn btn-warning">Edit</a>
            <form action="{{ route('person.destroy', $person->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this person?');" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </div>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

@endsection