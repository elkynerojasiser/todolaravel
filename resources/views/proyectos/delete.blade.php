@extends('layouts.base')
@section('titulo','Eliminar un proyecto')
@section("botonera")
<a href="{{ route('proyectos.index') }}" class="btn btn-success">Regresar a proyectos</a>
@endsection

@section('contenido')

<div class="text-center">
    <h3 class="text-center text-danger">
        ¿Está seguro de eliminar el proyecto?
    </h3>
    <form action="{{ route('proyectos.destroy',['proyecto' => $proyecto->id]) }}" method="POST">
        @csrf
        @method('delete')
        <button type="submit" class="btn btn-danger mt-3">Eliminar</button>
    </form>
</div>

@endsection
