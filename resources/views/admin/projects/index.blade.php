@extends('layouts.admin')

@section('content')
    <h1>Progetti</h1>
    <a class="btn btn-success" href="{{route('admin.projects.create')}}">Aggiungi un nuovo progetto</a>
    @if(session()->has('message'))
    <div class="alert alert-success mb-3 mt-3">
        {{ session()->get('message') }}
    </div>
    @endif
    <table class="table table-striped">
        <thead>
        <tr>
            <th scope="col">#</th>
            <th scope="col">Title</th>
            <th scope="col">Description</th>
            <th scope="col">Workflow</th>
            <th scope="col">Edit</th>
            <th scope="col">Delete</th>
        </tr>
        </thead>
        <tbody>
        @foreach($projects as $project)
                <tr>
                    <th scope="row">{{$project->id}}</th>
                    <td><a href="{{route('admin.projects.show', $project->slug)}}" title="View project">{{$project->title}}</a></td>
                    <td>{{Str::limit($project->description,100)}}</td>
                    @foreach($types as $type)
                        @if($type->id === $project->type_id)
                        <td>{{$type->workflow}}</td>
                        @endif
                    @endforeach
                    <td><a class="link-secondary" href="{{route('admin.projects.edit', $project->slug)}}" title="Edit project"><i class="fa-solid fa-pen"></i></a></td>
                    <td>
                        <form action="{{route('admin.projects.destroy', $project->slug)}}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="delete-button btn btn-danger ms-3" data-item-title="{{$project->title}}"><i class="fa-solid fa-trash-can"></i></button>
                     </form>
                    </td>
                </tr>
        @endforeach
        </tbody>
    </table>
    @include('partials.admin.modal-delete')
@endsection

