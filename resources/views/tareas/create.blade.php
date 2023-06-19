@extends('layouts.base')
@section('titulo',"Crear una nueva tarea")
@section("botonera")
<a href="{{ route('tareas.index') }}" class="btn btn-success">Regresar a tareas</a>
@endsection

@section('contenido')

<form action="{{ route('tareas.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label for="titulo" class="form-label">Título</label>
        <input type="text" class="form-control" id="titulo" name="titulo">
    </div>
    <div class="mb-3">
        <label for="descripcion" class="form-label">Descripción</label>
        <textarea class="form-control" name="descripcion" id="descripcion" cols="30" rows="10"></textarea>
        <input type="hidden" value="{{ Auth::user()->id }}" name="user_id">
    </div>
    <div class="mb-3">
        <label for="proyecto_id" class="form-label">Proyecto</label>
        <select name="proyecto_id" id="proyecto_id" class="form-control" required>
            <option value="">--Seleccione--</option>
            @foreach ($proyectos as $proyecto)
                <option value="{{ $proyecto->id }}">{{ $proyecto->nombre }}</option>
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="estado" class="form-label">Estado</label>
        <select name="estado" id="estado" class="form-control" required>
            <option value="pendiente">Pendiente</option>
            <option value="iniciada">Inicada</option>
            <option value="terminada">Terminada</option>
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Crear</button>
</form>

@endsection
