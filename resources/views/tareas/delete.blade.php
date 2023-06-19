@extends('layouts.base')
@section('titulo','Eliminar una tarea')
@section("botonera")
<a href="{{ route('tareas.index') }}" class="btn btn-success">Regresar a tareas</a>
@endsection

@section('contenido')

<div class="text-center">
    <h3 class="text-center text-danger">
        ¿Está seguro de eliminar la tarea?
    </h3>
    <form action="{{ route('tareas.destroy',['tarea' => $tarea->id]) }}" method="POST">
        @csrf
        @method('delete')
        <button type="submit" class="btn btn-danger mt-3">Eliminar</button>
    </form>
</div>

@endsection
