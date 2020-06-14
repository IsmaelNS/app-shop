@extends('layouts.app')
@section('title','Imagenes Productos')
@section('content')
<style>
body {
     color: #404E67;
     background: #F5F7FA;
     font-family: 'Open Sans', sans-serif;
}
.table-wrapper {
     width: 90%;
     margin: 30px auto;
     background: #fff;
     padding: 20px;
     box-shadow: 0 1px 1px rgba(0,0,0,.05);
 }
 .table-title {
     padding-bottom: 10px;
     margin: 0 0 10px;
 }
 .table-title h2 {
     margin: 6px 0 0;
     font-size: 22px;
 }
 .table-title .add-new {
     float: right;
     height: 30px;
     font-weight: bold;
     font-size: 12px;
     text-shadow: none;
     min-width: 100px;
     border-radius: 50px;
     line-height: 13px;
 }
.table-title .add-new i {
      margin-right: 4px;
}
 table.table {
     table-layout: fixed;
 }
 table.table tr th, table.table tr td {
     border-color: #e9e9e9;
 }
 table.table th i {
     font-size: 13px;
     margin: 0 5px;
     cursor: pointer;
 }
 table.table th:last-child {
     width: 100px;
 }
 table.table td a {
     cursor: pointer;
     display: inline-block;
     margin: 0 5px;
     min-width: 24px;
 }
table.table td a.add {
     color: #27C46B;
 }
 table.table td a.edit {
     color: #FFC107;
 }
 table.table td button.delete {
     color: #E34724;
 }
 table.table td i {
     font-size: 19px;
 }
table.table td a.add i {
     font-size: 24px;
     margin-right: -1px;
     position: relative;
     top: 3px;
 }
 table.table .form-control {
     height: 32px;
     line-height: 32px;
     box-shadow: none;
     border-radius: 2px;
 }
table.table .form-control.error {
 border-color: #f50000;
}


</style>
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<div class="container">
  <div class="section text-center">
    <h2 class="title">Imágenes del producto {{$product->name}}</h2>
    <form method="post" action="" enctype="multipart/form-data">
      {{csrf_field()}}
      <input type="file" name="photo" required>
      <button type="submit" class="btn btn-info add-new"><i class="fa fa-plus"></i>Subir nueva imagen</button>
      <a href="{{url('/admin/products')}}" class="btn btn-default "><i class="fa fa-return"></i>Regreso</a>
    </form>
    <div class="row">
    @foreach ($images as $image)
    <div class="col-md-4">
      <div class="panel panel-default">
        <div class="panel-body">
          <img src="{{$image->url}}" width="250" height="250">
          <form action="" method="post">
            {{csrf_field()}}
            {{method_field('DELETE')}}
            <input type="hidden" name="image_id" value="{{$image->id}}">
            <button type="submit" class="btn btn-danger add-danger"><i class="fa fa-plus"></i>Eliminar Imagen</button>
          </form>
        </div>
      </div>
    </div>
    @endforeach
  </div>
  </div>
</div>
@endsection
