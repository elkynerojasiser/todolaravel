@extends('layouts.base')
@section('titulo',"Crear una nueva tarea")
@section("botonera")
<a href="{{ route('tareas.index') }}" class="btn btn-success">Regresar a tareas</a>
@endsection

@section('contenido')

<form action="{{ route('tareas.update',['tarea'=>$tarea->id]) }}" method="POST">
    @csrf
    @method('put')
    <div class="mb-3">
        <label for="titulo" class="form-label">Título</label>
        <input type="text" class="form-control" id="titulo" name="titulo" value="{{ $tarea->titulo }}">
    </div>
    <div class="mb-3">
        <label for="descripcion" class="form-label">Descripción</label>
        <textarea class="form-control" name="descripcion" id="descripcion" cols="30" rows="10">{{ $tarea->descripcion }}</textarea>
        <input type="hidden" value="{{ Auth::user()->id }}" name="user_id">
    </div>
    <div class="mb-3">
        <label for="proyecto_id" class="form-label">Proyecto</label>
        <select name="proyecto_id" id="proyecto_id" class="form-control" required>
            @foreach ($proyectos as $proyecto)
                @if($tarea->proyecto_id == $proyecto->id)
                <option value="{{ $proyecto->id }}" selected>{{ $proyecto->nombre }}</option>
                @else
                <option value="{{ $proyecto->id }}">{{ $proyecto->nombre }}</option>
                @endif
            @endforeach
        </select>
    </div>
    <div class="mb-3">
        <label for="estado" class="form-label">Estado</label>
        <select name="estado" id="estado" class="form-control" required>
            @if($tarea->estado == "pendiente")
            <option value="pendiente" selected>Pendiente</option>
            @else
            <option value="pendiente">Pendiente</option>
            @endif

            @if($tarea->estado == "iniciada")
            <option value="iniciada" selected>Iniciada</option>
            @else
            <option value="iniciada">Iniciada</option>
            @endif

            @if($tarea->estado == "terminada")
            <option value="terminada" selected>Terminada</option>
            @else
            <option value="terminada">Terminada</option>
            @endif
        </select>
    </div>
    <button type="submit" class="btn btn-primary">Guardar</button>
</form>

@endsection
