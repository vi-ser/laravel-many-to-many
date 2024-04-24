@extends('layouts.app')

@section('content')

<div id="project">

    <div class="container p-5">

        <h2 class="fw-bold">
            Modifica progetto
        </h2>

        <form action="{{route('admin.projects.update', $project->id)}}" method="POST" class="pt-5" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            <div class="mb-3">
              <label for="name" class="form-label">Nome</label>
              <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name') ?? $project->name}}" required>
              @error('name')
              <div class="invalid-feedback">
                  {{$message}}
              </div>
              @enderror
            </div>

            <div class="mb-3">
                <label for="type_id">Tipologia</label>
                <select class="form-select" name="type_id" id="type_id">      
                    <option value=""></option>
                    @foreach ($types as $type)
                    <option value="{{$type->id}}" {{ $type->id == old('type_id', $project->type ? $project->type->id : '') ? 'selected' : '' }}>
                        {{ $type->name }}
                    </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Descrizione</label>
                <textarea type="text" class="form-control @error('description') is-invalid @enderror" id="description" name="description"> {{ old('description') ?? $project->description}}</textarea>
                @error('description')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="src" class="form-label">Immagine di copertina</label>
                <input type="file" class="form-control @error('src') is-invalid @enderror" id="src" name="src">
                 @error('src')
                 <div class="invalid-feedback">
                    {{$message}}
                </div>
                 @enderror
            </div>

            <div class="mb-3">
                <label for="github_link" class="form-label">Link progetto</label>
                <input type="text" class="form-control @error('github_link') is-invalid @enderror" id="github_link" name="github_link" value="{{ old('github_link') ?? $project->github_link}}" required>
                 @error('github_link')
                 <div class="invalid-feedback">
                    {{$message}}
                </div>
                 @enderror
            </div>

            <div class="mb-3">
                <label for="date" class="form-label">Data progetto</label>
                <input type="date" class="form-control @error('date') is-invalid @enderror" id="date" name="date" value="{{ old('date') ?? $project->date}}" required>
                @error('date')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="mb-2" for="">Tecnologie utilizzate</label>
                <div class="d-flex gap-4">
                    @foreach($technologies as $technology)
                <div class="form-check ">
                    <input 
                        type="checkbox" 
                        name="technologies[]"
                        value="{{$technology->id}}" 
                        class="form-check-input" 
                        id="technology-{{$technology->id}}"
                        
                        @if($errors->any())

                        {{ in_array($technology->id, old('technologies', [])) ? 'checked' : '' }}

                        @else 

                        {{ $project->technologies->contains($technology) ? 'checked' : '' }}
                        
                        @endif
                    > 
                    
                    <label for="technology-{{$technology->id}}" class="form-check-label">{{$technology->title}}</label>
                </div>
                @endforeach
                </div>
            </div>
            

            <button type="submit" class="btn btn-primary mt-3">Salva</button>
        </form>
       
    </div>

</div>
@endsection
