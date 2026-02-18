@extends('layouts.app')

@section('content')
<h1>Liste des shifts</h1>

<ul>
@foreach($shifts as $shift)
    <li>{{ $shift->start_time }} → {{ $shift->end_time }}</li>
@endforeach
</ul>
@endsection
