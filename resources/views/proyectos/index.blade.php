@extends('layouts.base')
@section('titulo', 'Proyectos')
@section('botonera')

    <a href="{{ route('proyectos.create') }}" class="btn btn-primary">Nuevo proyecto</a>

@endsection

@section('contenido')

    <div class="tabla-lista">
        <table class="table table-bordered table-hover">
            <thead>
                <tr>
                    <td>ID</td>
                    <td>Imagen</td>
                    <td>Nombre</td>
                    <td>Descripción</td>
                    <td>Acciones</td>
                </tr>
            </thead>
            <tbody>
                @foreach ($proyectos as $proyecto)
                    <tr>
                        <td>
                            {{ $proyecto->id }}
                        </td>
                        <td>
                            @if($proyecto->imagen != null)
                            <img src="{{ $proyecto->imagen }}" alt="" width="50px" height="50px">
                            @else
                            <img src="{{ asset('img/default.png') }}" alt="" width="50px" height="50px">
                            @endif
                        </td>
                        <td>
                            {{ $proyecto->nombre }}
                        </td>
                        <td>
                            {{ $proyecto->descripcion }}
                        </td>
                        <td>
                            <div class="d-flex">
                                <a href="{{ route('proyectos.show',['proyecto'=>$proyecto->id]) }}" class="btn btn-success">Detalle</a>
                                <a href="{{ route('proyectos.edit',['proyecto'=>$proyecto->id]) }}" class="btn btn-warning" style="margin-left: 10px">Editar</a>
                                <a href="{{ route('proyectos.delete',['proyecto'=>$proyecto->id]) }}" class="btn btn-danger" style="margin-left: 10px">Eliminar</a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

@endsection
