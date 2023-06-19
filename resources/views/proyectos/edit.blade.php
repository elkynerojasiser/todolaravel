@extends('layouts.base')
@section('titulo',"Editar un nuevo proyecto")
@section("botonera")
<a href="{{ route('proyectos.index') }}" class="btn btn-success">Regresar a proyectos</a>
@endsection

@section('contenido')

<form action="{{ route('proyectos.update',['proyecto'=>$proyecto->id]) }}" method="POST">
    @csrf
    @method('put')
    <div class="d-flex justify-content-center">
        <input type="file" class="form-control" id="input_imagen"  style="display:none">
        <textarea name="imagen" id="imagen_texto" class="d-none">{{ $proyecto->imagen }}</textarea>
        <div style="border: solid 1px black">
            @if($proyecto->imagen != null)
            <img src="{{ $proyecto->imagen }}" alt="" id="imagen" width="150px" height="150px">
            @else
            <img src="{{ asset('img/default.png') }}" alt="" id="imagen" width="150px" height="150px">
            @endif
        </div>
    </div>
    <div class="mb-3">
        <label for="nombre" class="form-label">Nombre</label>
        <input type="text" class="form-control" id="nombre" name="nombre" value="{{ $proyecto->nombre }}">
    </div>
    <div class="mb-3">
        <label for="descripcion" class="form-label">Descripción</label>
        <textarea class="form-control" name="descripcion" id="descripcion" cols="30" rows="10">{{ $proyecto->descripcion }}</textarea>
        <input type="hidden" value="{{ Auth::user()->id }}" name="user_id">
    </div>
    <button type="submit" class="btn btn-primary">Guardar cambios</button>
</form>

@endsection

@section('scripts')
<script>
    var imagen = document.getElementById('imagen');
    var input_imagen = document.getElementById('input_imagen');
    var imagen_texto = document.getElementById('imagen_texto');
    imagen.addEventListener('click',function(){
        input_imagen.click();
    });
    input_imagen.addEventListener('change',function(){
        var file = this.files[0];
        var sizebyte = this.files[0].size;
        var sizekilobyte = parseInt(sizebyte / 1024);
        if (sizekilobyte > 4096) {
            alert('La imagen excede el tamaño permitido de 4 MB');
        } else {
            var reader = new FileReader();
            reader.onloadend = function() {
                document.getElementById("imagen").src = reader.result;
                document.getElementById("imagen_texto").value = reader.result;
            }
            reader.readAsDataURL(file);
        }
    });
</script>
@endsection
