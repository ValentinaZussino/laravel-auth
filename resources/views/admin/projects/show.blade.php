@extends('layouts.admin')

@section('content')

    <h1>{{$project->title}}</h1>

    <div class="w-25 h-25">
        @if($project->cover_image)
        <img src="{{ asset('storage/' . $project->cover_image) }}">    
            @else
            <img src="https://via.placeholder.com/1200x840/DDDDDD/444444?text=VZ+Portfolio" alt="C/O https://placeholder.com/"> 
        @endif
    </div>

    <div class="mt-4">
        <p> <span class="fw-bold">Linguaggi utilizzati: </span>  
            @if (count($project->devlangs))
                @foreach ($project->devlangs as $devlang)
                <span>{{$devlang->name}}</span>
                @endforeach
            @endif
        </p>
       
        @if ($project->type)
        <p> <span class="fw-bold">Workflow: </span> {{$project->type->workflow}}</p>
        @endif

        <p> <span class="fw-bold">Link Git: </span> {{$project->git_link}}</p>

        <p> <span class="fw-bold">Difficoltà: </span> {{$project->difficulty}}</p>

        <p> <span class="fw-bold">Collaboratori: </span> {{$project->team}}</p>

        <p><span class="fw-bold">Descrizione: </span> <br>
            {{$project->description}}</p>
    </div>
    
    

@endsection