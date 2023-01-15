@extends('layouts.admin')
@section('content')

    <h1>Dev Languages</h1>

    <div class="container my-5">
        @if(session()->has('message'))
            <div class="alert alert-success mb-3 mt-3 w-75 m-auto">
                {{ session()->get('message') }}
            </div>
        @endif
        <form action="{{ route('admin.devlangs.store') }}" method="POST" class="mb-5">
        @csrf
            <h3 class="">Aggiungi un Linguaggio</h3>
            <div class="d-flex">
                <div class="me-5">
                    <label for="name">Nome</label>
                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name" required maxlength="50">
                    @error('name')
                        <div class="invalid-feedback">{{$message}}</div>
                    @enderror
                </div>
                <div class="mt-4">
                    <button type="submit" class="btn btn-primary" id="btn-submit">Invia</button>
                    <button type="reset" class="btn btn-secondary" id="btn-reset">Resetta</button>
                </div>
            </div>
        </form>

        <table>
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Name</th>
                    <th scope="col" class="pe-4">Assigned</th>
                    <th scope="col">Delete</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($devlangs as $devlang)
                    <tr>
                        <th scope="row">{{$devlang->id}}</th>
                        <td>
                            <form action="{{route('admin.devlangs.update', $devlang->slug)}}" method="post">
                                @csrf
                                @method('PATCH')
                                <input class="border-0 bg-transparent" type="text" name="name" value="{{$devlang->name}}">
                            </form>
                        </td>
                        <td>
                            {{$devlang->projects && count($devlang->projects) > 0 ? count($devlang->projects) : 0}}
                        </td>
                        <td>
                            <form action="{{route('admin.devlangs.destroy', $devlang->slug)}}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="delete-button btn btn-danger ms-3" data-item-title="{{$devlang->name}}"><i class="fa-solid fa-trash-can"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @include('partials.admin.modal-delete')
@endsection

