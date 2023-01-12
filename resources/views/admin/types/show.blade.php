@extends('layouts.admin')

@section('content')

    <h1>{{$type->workflow}}</h1>
    <ul>
        @foreach ($type->projects as $project)
            <li>{{$project->title}}</li>
        @endforeach
    </ul>

    {{-- <img src="{{ asset('storage/' . $type->cover_image) }}"> --}}

@endsection