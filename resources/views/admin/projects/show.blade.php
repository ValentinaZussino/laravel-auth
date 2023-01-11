@extends('layouts.admin')

@section('content')

    <h1>{{$project->title}}</h1>
    <p>{{$project->description}}</p>
    {{-- <img src="{{ asset('storage/' . $post->cover_image) }}"> --}}

@endsection