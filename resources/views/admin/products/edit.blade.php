@extends('layouts.app')
@section('content')
<div class="container">
  <div class="section text-center">
     <h2 class="title">Editar producto</h2>
     <form method="post" action="{{url('/admin/products/'.$product->id.'/edit')}}" class="d-flex justify-content-center">
       {{ csrf_field() }}
       <div class="col-sm-4 ">
           <div class="form group label floating">
              <label class="control-label">Nombre del Producto</label>
              <input type="text" class="form-control" name="name"  value="{{$product->name}}">
           </div>

           <div class="form group label floating">
              <label class="control-label">Precio del producto</label>
              <input type="number" step="0.01" class="form-control" name="price" value="{{$product->price}}">
           </div>

           <div class="form group label floating">
              <label class="control-label">Descripción corta</label>
              <input type="text" class="form-control" name="description" value="{{$product->description}}">
           </div>


           <div class="form group label floating">
             <label class="control-label">Descripción Extensa</label>
             <textarea class="form-control" placeholder="Descripción extensa del producto" rows="5"
             name="long_description">{{$product->long_description}}</textarea>
           </div>

           <button class="btn btn-primary">Guardar Cambios</button>
           <a href="{{url('/admin/products')}}">Cancelar</a>
     </div>

     </form>
  </div>
</div>
@endsection
