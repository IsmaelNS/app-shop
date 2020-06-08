@extends('layouts.app')
@section('content')
<div class="container">
  <div class="section text-center">
     <h2 class="title">Registrar nuevo Producto</h2>
     @if ($errors->any())
         <div class="alert alert-danger">
             <ul>
                 @foreach ($errors->all() as $error)
                     <li>{{ $error }}</li>
                 @endforeach
             </ul>
         </div>
     @endif
     <form method="post" action="{{url('/admin/products')}}" class="d-flex justify-content-center">
       {{ csrf_field() }}
       <div class="col-sm-4 ">
           <div class="form group label floating">
              <label class="control-label">Nombre del Producto</label>
              <input type="text" class="form-control" name="name">
           </div>

           <div class="form group label floating">
              <label class="control-label">Descripción corta</label>
              <input type="number" class="form-control" name="price">
           </div>

           <div class="form group label floating">
              <label class="control-label">Descripción corta</label>
              <input type="text" class="form-control" name="description">
           </div>

           <div class="form group label floating">
             <label class="control-label">Descripción Extensa</label>
             <textarea class="form-control" placeholder="Descripción extensa del producto" rows="5"
             name="long_description"></textarea>
           </div>

       <button class="btn btn-primary">Registrar Producto</button>
     </div>

     </form>
  </div>
</div>
@endsection
