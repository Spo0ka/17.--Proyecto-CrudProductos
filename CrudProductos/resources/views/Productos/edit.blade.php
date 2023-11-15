@extends('layout.app')

@section('container')

<h1 class="text-center"> Editar Productos </h1>
<div class="container">
<form action="{{route('ProductosUpdate',$producto->id)}}" method="POST">
    @csrf @method('PATCH')
    @csrf
    <div class="form-group">
<label for="nombre" class="form-label"> Nombre</label>
<input type="text" name="nombre" id="nombre" class="form-control" value="{{old('nombre',$producto->Nombre)}}">
    </div>

    <div class="form-group">
        <label for="descripcion" class="form-label"> Descricion</label>
        <input type="text" name="descripcion" id="descripcion" class="form-control" value="{{old('descripcion',$producto->Descripcion)}}">
    
        @error('nombre')
        <div style="color:red">{{$message}}</div>     
      @enderror  

            </div>

         

     <div class="form-group">
    <label for="precio" class="form-label"> Precio</label>
    <input type="text" name="precio" id="precio" class="form-control" value="{{old('precio',$producto->Precio)}}">
    @error('nombre')
    <div style="color:red">{{$message}}</div>     
  @enderror  
    </div>         
        <div class="form-group mt-4">
            <button type="submit" class="btn btn-primary">Guardar</button>
            <a href="{{route('ProductosIndex')}}" class="btn btn-danger">Cancelar</a>
        </div> 

</form>
</div>

@endsection

