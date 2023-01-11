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
    <h1>Create Project</h1>
        <div class="row bg-white">
            <div class="col-12">
                <form action="{{route('admin.projects.store')}}" method="POST" enctype="multipart/form-data" class="p-4">
                    @csrf
                    {{-- title --}}
                      <div class="mb-3">
                        <label for="title" class="form-label">Titolo</label>
                        <input type="text" class="form-control @error('title') is-invalid @enderror" id="title" name="title">
                        @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div>
                      {{-- description --}}
                      <div class="mb-3">
                        <label for="description" class="form-label">Desccrizione</label>
                        <textarea class="form-control" id="description" name="description"></textarea>
                      </div>
                      {{-- langauges --}}
                      <div class="mb-3">
                        <label for="dev_lang" class="form-label">Linguaggi utilizzati</label>
                          <input type="text" class="form-control @error('dev_lang') is-invalid @enderror" id="dev_lang" name="dev_lang">
                          @error('dev_lang')
                          <div class="invalid-feedback">{{ $message }}</div>
                          @enderror
                      </div>
                      {{-- frameworks --}}
                      <div class="mb-3">
                        <label for="framework" class="form-label">Framework utilizzati</label>
                          <input type="text" class="form-control @error('framework') is-invalid @enderror" id="framework" name="framework">
                      </div>
                      {{-- difficulty --}}
                      <div class="mb-3">
                        <label for="difficulty" class="form-label">Livello difficoltà</label>
                          <input type="number" class="form-control @error('difficulty') is-invalid @enderror" id="difficulty" name="difficulty">
                      </div>
                      {{-- team --}}
                      <div class="mb-3">
                        <label for="team" class="form-label">Collaboratori</label>
                          <input type="text" class="form-control @error('team') is-invalid @enderror" id="team" name="team">
                      </div>
                      {{-- git_link --}}
                      <div class="mb-3">
                        <label for="git_link" class="form-label">Link per git</label>
                          <input type="text" class="form-control @error('git_link') is-invalid @enderror" id="git_link" name="git_link">
                      </div>
                      {{-- image --}}
                      {{-- <div class="mb-3">
                        <label for="cover_image" class="form-label">Immagine</label>
                        <input type="file" name="cover_image" id="cover_image" class="form-control  @error('cover_image') is-invalid @enderror" >
                        @error('cover_image')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                      </div> --}}
                      <button type="submit" class="btn btn-success">Submit</button>
                      <button type="reset" class="btn btn-primary">Reset</button>
                </form>
            </div>
        </div>


@endsection