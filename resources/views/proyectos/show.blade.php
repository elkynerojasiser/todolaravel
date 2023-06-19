@extends('layouts.base')
@section('titulo', 'Detalle de proyecto')
@section("botonera")
<a href="{{ route('proyectos.index') }}" class="btn btn-success">Regresar a proyectos</a>
@endsection
@section('contenido')

    <div class="row d-flex justify-content-center">
        <div class="col-md-6">
            <div class="mt-3 mb-3 d-flex justify-content-center">
                @if($proyecto->imagen != null)
                <img src="{{ $proyecto->imagen }}" alt="" id="imagen" width="150px" height="150px">
                @else
                <img src="{{ asset('img/default.png') }}" alt="" id="imagen" width="150px" height="150px">
                @endif
            </div>
            <h1>{{ $proyecto->nombre }}</h1>
            <p>
                {{ $proyecto->descripcion }}
            </p>
        </div>
    </div>
    <div class="row d-flex justify-content-center">
        <div class="col-md-12">
            <h2 class="text-center text-primary mb-3">Tareas</h2>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <td width="10%">ID</td>
                        <td width="45%">Título</td>
                        <td width="45%">Descripción</td>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tareas as $tarea)
                        <tr>
                            <td>{{ $tarea->id }}</td>
                            <td>{{ $tarea->titulo }}</td>
                            <td>{{ $tarea->descripcion }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

@endsection
