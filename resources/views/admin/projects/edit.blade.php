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
          <label for="devlangs" class="me-2">Linguaggi utilizzati: </label>
          @foreach ($devlangs as $devlang)
            @if (old("devlangs"))
            <input type="checkbox" class="form-check-input" id="{{$devlang->slug}}" name="devlangs[]" value="{{$devlang->id}}" {{in_array( $devlang->id, old("devlangs", []) ) ? 'checked' : ''}}>
            <span class="text-capitalize pe-2">{{$devlang->name}}</span>
            @else
            <input type="checkbox" class="form-check-input" id="{{$devlang->slug}}" name="devlangs[]" value="{{$devlang->id}}" {{$project->devlangs->contains($devlang) ? 'checked' : ''}}>
            <span class="text-capitalize pe-2">{{$devlang->name}}</span>
            @endif
          @endforeach
        </div>
        {{-- frameworks --}}
        <div class="mb-3">
          <label for="framework" class="form-label">Framework utilizzati</label>
            <input type="text" class="form-control @error('framework') is-invalid @enderror" id="framework" name="framework" value="{{old('framework', $project->framework)}}">
        </div>
        {{-- difficulty --}}
        <div class="mb-3">
          <label for="difficulty">Livello di difficoltà (da 1 a 10)</label>
          <select name="difficulty" class="form-control @error('difficulty') is-invalid @enderror">
            @for ($i=0; $i<=10;$i++)
                <option value="{{$i}}" {{old('difficulty') == $i ? 'selected': ''}}>{{$i}}</option>
            @endfor
          </select>
          @error('difficulty')
              <div class="invalid-feedback">{{$message}}</div>
          @enderror
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
        {{-- workflow type --}}
        <div class="mb-3">
          <label for="type_id" class="form-label">Seleziona workflow</label>
          <select name="type_id" id="type_id" class="form-control @error('type_id') is-invalid @enderror">
            <option value="">Seleziona workflow</option>
            @foreach ($types as $type)
                <option value="{{$type->id}}" {{ $type->id == old('type_id') ? 'selected' : '' }}>{{$type->workflow}}</option>
            @endforeach
          </select>
          @error('type_id')
          <div class="invalid-feedback">{{ $message }}</div>
          @enderror
        </div>
        {{-- image --}}
        <div class="d-flex">
          <div class="media me-4">
            @if($project->cover_image)
              <img class="shadow" width="150" src="{{asset('storage/' . $project->cover_image)}}" alt="{{$project->title}}">
              @else
              <img class="shadow" width="150" src="https://via.placeholder.com/1200x840/DDDDDD/444444?text=VZ+Portfolio" alt="C/O https://placeholder.com/">
            @endif
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
  <script src="//js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
  <script type="text/javascript">
    bkLib.onDomLoaded(nicEditors.allTextAreas);
  </script>
@endsection