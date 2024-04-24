@extends('layouts.app')

@section('content')
<div id="project">

    <div class="container p-5">
    
        <div id="project" class="pb-5">

            <a href="{{ route('admin.projects.index')}}" class="text-decoration-none text-secondary">&larr;
                Torna ai progetti</a>

            <img src="{{asset('storage/' . $project->src)}}" alt="{{ $project->name }}" class="w-100 my-5" style="height: 300px; object-fit: cover;">
            <div class="data-sheet">
                <h3>
                    {{ $project->name }}
                </h3>
                <small></small>
                <span class="badge bg-black text-white mb-4">{{$project->type?->name}}</span>

                <br>

                <strong>Overview del progetto</strong>
                <br>
                <span>
                    {{ $project->description }}
                </span>

                <br>
                <br>

                <strong>Tecnologie utilizzate</strong>
                <br>
                <span>
                    {{ $project->technology }}
                </span>

                <br>
                <br>

                <strong>Pubblicazione</strong>
                <br>
                <span>
                    {{ $project->date }}
                </span>

                <br>
                <br>

                <a class="text-black fw-bold" href="{{ $project->github_link }}" target="_blank">Link progetto</a>
                <br>
                <br>
                <div class="pb-5 d-flex align-items-center gap-2">
                    <a href="{{route('admin.projects.edit', $project->id)}}" class="btn btn-warning">Modifica</a><br><br>
                    <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Elimina
                    </button>
                </div>
                
            </div>

        </div>

    </div>

</div>

  <!-- Modal -->
  <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered ">
      <div class="modal-content">

        <div class="modal-header">
          <h1 class="modal-title fs-5" id="exampleModalLabel">Elimina progetto</h1>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>

        <div class="modal-body">
          Sei sicuro che vuoi eliminare il progetto "{{$project->name}}"?
        </div>

        <div class="modal-footer">

            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
            <form action="{{route('admin.projects.destroy', $project->id)}}" method="POST">
                @csrf
                @method("DELETE")
                
                <button class="btn btn-danger">Elimina</button>
            </form>

        </div>

      </div>
    </div>
</div>

</main>

@endsection