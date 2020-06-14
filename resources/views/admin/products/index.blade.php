@extends('layouts.app')
@section('title','Productos')
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
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8"><h2><b>Productos</b></h2></div>
                    <div class="col-sm-4">
                        <a href="{{url('/admin/products/create')}}" class="btn btn-info add-new"><i class="fa fa-plus"></i>Nuevo Producto</a>
                    </div>
                </div>
            </div>
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Categoria</th>
                        <th>Precio</th>
                        <th>Acción</th>
                    </tr>
                </thead>
                <tbody>
                   @foreach($products as $product)
                    <tr>
                        <td>{{$product->name}}</td>
                        <td>{{$product->description}}</td>
                        <td>{{$product->category ? $product->category->name : 'General'}}</td>
                        <td>{{$product->price}}</td>
                        <td>
							              <form method="post" action="{{url('/admin/products/'.$product->id)}}" class="d-flex justify-content-center">
                              {{ csrf_field() }}
                              {{method_field('DELETE')}}
                              <a class="add" title="Add" data-toggle="tooltip"><i class="material-icons"></i></a>
                              <a href="{{url('/admin/products/'.$product->id.'/edit')}}" class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons"></i></a>
                              <a href="{{url('/admin/products/'.$product->id.'/images')}}" class="imagen" title="Imagen Producto" data-toggle="tooltip"><i class="fa fa-image"></i></a>
                              <button type="submit" class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons"></i></button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
            </table>
            {{$products->links()}}
        </div>
    </div>
@endsection
