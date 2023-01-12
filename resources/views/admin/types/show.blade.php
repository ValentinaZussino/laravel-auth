@extends('layouts.admin')

@section('content')

    <h1>{{$project->title}}</h1>
    <p>{{$project->description}}</p>
    <img src="{{ asset('storage/' . $project->cover_image) }}">

@endsection