@extends('layouts.app')

@section('content')
<main>
<div id="project">

    <div class="container p-5">

        <h2 class="fw-bold mb-3">
            I miei progetti
        </h2>

        <a href="{{ route('admin.projects.create')}}" class="btn btn-primary mb-5">Aggiungi progetto</a>

    
        <ul id="project-list" class="d-flex gap-4 flex-wrap p-0">

            @foreach ($projects as $project)

            <li class="card" style="width: 18rem;">
                <img src="{{asset('storage/' . $project->src)}}" class="card-img-top object-fit-cover" alt="{{ $project->name }}" style="height: 220px">
                <div class="card-body">
                <span class="badge bg-transparent border border-2 border text-black mb-4">{{$project->type?->name}}</span>
                  <h5 class="card-title">{{ $project->name }}</h5>
                  <p class="card-text">{{ $project->description }}</p>
                  <a href="{{ route('admin.projects.show', $project->id) }}" class="btn btn-dark">Scopri</a>
                </div>
            </li>
      
            @endforeach
        </ul>

    </div>

</div>

</main>

@endsection