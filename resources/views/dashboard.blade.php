@extends('layouts.dashboard')

@section('title', 'Dashboard')

@section('content')
  
<div class="card" style="width: 18rem;">
    <img src="{{url('images/pericon.png')}}" class="card-img-top" alt="...">
    <div class="card-body">
      <h5 class="card-title">Registered people: {{$count}}</h5>
    </div>
</div>


@endsection
