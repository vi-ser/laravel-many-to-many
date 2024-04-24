@extends('layouts.app')

@section('content')

<div id="projects">

    <div class="container p-5">

        <h2 class="fw-bold">
            Nuovo progetto
        </h2>

        <form action="{{ route('admin.projects.store')}}" method="POST" class="pt-5" enctype="multipart/form-data">
            @csrf

            <div class="mb-3">
              <label for="name" class="form-label">Nome</label>
              <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{old('name')}}" required>
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
                    <option value="{{$type->id}}" {{ $type->id == old('type_id') ? 'selected' : '' }}>{{ $type->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label for="description" class="form-label">Descrizione</label>
                <textarea type="text" class="form-control @error('description') is-invalid @enderror" id="description" name="description">{{old('description')}}</textarea>
                @error('description')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="src" class="form-label">Immagine di copertina</label>
                <input type="file" class="form-control @error('src') is-invalid @enderror" id="src" name="src" value="{{old('src')}}">
                 @error('src')
                 <div class="invalid-feedback">
                    {{$message}}
                </div>
                 @enderror
            </div>

            <div class="mb-3">
                <label for="technology" class="form-label">Tecnologie utilizzate</label>
                <input type="text" class="form-control @error('technology') is-invalid @enderror" id="technology" name="technology" value="{{old('technology')}}">
                @error('technology')
                <div class="invalid-feedback">
                    {{$message}}
                </div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="github_link" class="form-label">Link progetto</label>
                <input type="text" class="form-control @error('github_link') is-invalid @enderror" id="github_link" name="github_link" value="{{old('github_link')}}" required>
                 @error('github_link')
                 <div class="invalid-feedback">
                    {{$message}}
                </div>
                 @enderror
            </div>

            <div class="mb-3">
                <label for="date" class="form-label">Data progetto</label>
                <input type="date" class="form-control @error('date') is-invalid @enderror" id="date" name="date" required>
                @error('date')
                <div class="invalid-feedback">
                  {{$message}}
                </div>
                @enderror
            </div>
            

            <button type="submit" class="btn btn-primary mt-3">Aggiungi</button>
        </form>
       
    </div>

</div>
@endsection
