@extends('layouts.admin')

@section('content')

    <h1>{{$project->title}}</h1>
    @if ($project->type)
    <p class="fw-bold">Workflow: {{$project->type->workflow}}</p>
    @endif
    <p>{{$project->description}}</p>
    <img src="{{ asset('storage/' . $project->cover_image) }}">

@endsection