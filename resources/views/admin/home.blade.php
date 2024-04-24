@extends('layouts.app')

@section('content')

<div class="container p-5">
    <h1>Pagina di amministrazione</h1>
    <p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Atque eveniet ex incidunt error. Veritatis, rem ab voluptatum sunt dicta odit eius! Doloribus laudantium molestias distinctio iure, explicabo ipsam nostrum sit!</p>
    <a href="{{ route('admin.projects.index') }}" class="btn btn-primary">Progetti</a>
</div>

@endsection