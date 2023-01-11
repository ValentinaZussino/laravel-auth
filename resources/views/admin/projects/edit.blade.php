@extends('layouts.admin')

@section('content')
        {{-- <div>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
        </div> --}}
        <h1>Edit Project: {{$project->title}}</h1>
        <div class="row bg-white">
            <div class="col-12">
                <form action="{{route('admin.projects.update', $project->slug)}}" method="POST" enctype="multipart/form-data" class="p-4">
                    @csrf
                    @method('PUT')
                    {{-- title --}}
                      <div class="mb-3">
                        <label for="title" class="form-label">Titolo</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title" value="{{old('title', $project->title)}}">
                        @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                      {{-- description --}}
                      <div class="mb-3">
                        <label for="description" class="form-label">description</label>
                        <textarea class="form-control" id="description" name="description">{{old('description', $project->description)}}</textarea>
                      </div>
                      {{-- langauges --}}
                      <div class="mb-3">
                        <label for="dev_lang" class="form-label">Linguaggi utilizzati</label>
                          <input type="text" class="form-control @error('dev_lang') is-invalid @enderror" id="dev_lang" name="dev_lang" value="{{old('dev_lang', $project->dev_lang)}}">
                          @error('dev_lang')
                          <div class="invalid-feedback">{{ $message }}</div>
                          @enderror
                      </div>
                      {{-- frameworks --}}
                      <div class="mb-3">
                        <label for="framework" class="form-label">Framework utilizzati</label>
                          <input type="text" class="form-control @error('framework') is-invalid @enderror" id="framework" name="framework" value="{{old('framework', $project->framework)}}">
                      </div>
                      {{-- difficulty --}}
                      <div class="mb-3">
                        <label for="difficulty" class="form-label">Livello difficoltà</label>
                          <input type="number" class="form-control @error('difficulty') is-invalid @enderror" id="difficulty" name="difficulty" value="{{old('difficulty', $project->difficulty)}}">
                      </div>
                      {{-- team --}}
                      <div class="mb-3">
                        <label for="team" class="form-label">Collaboratori</label>
                          <input type="text" class="form-control @error('team') is-invalid @enderror" id="team" name="team" value="{{old('team', $project->team)}}">
                      </div>
                      {{-- git_link --}}
                      <div class="mb-3">
                        <label for="git_link" class="form-label">Link per git</label>
                          <input type="text" class="form-control @error('git_link') is-invalid @enderror" id="git_link" name="git_link" value="{{old('git_link', $project->git_link)}}">
                      </div>
                      <div class="d-flex">
                            <div class="media me-4">
                                <img class="shadow" width="150" src="{{asset('storage/' . $project->cover_image)}}" alt="{{$project->title}}">
                            </div>
                            <div class="mb-3">
                                <label for="cover_image" class="form-label">Replace project image</label>
                                <input type="file" name="cover_image" id="cover_image" class="form-control  @error('cover_image') is-invalid @enderror" >
                                @error('cover_image')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                       </div>
                      <button type="submit" class="btn btn-success">Submit</button>
                      <button type="reset" class="btn btn-primary">Reset</button>
                </form>
            </div>
        </div>

@endsection