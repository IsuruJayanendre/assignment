@foreach ($people as $person)
    @include('person.partials.person-row', ['person' => $person])
@endforeach