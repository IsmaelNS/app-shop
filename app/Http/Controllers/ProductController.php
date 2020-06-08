<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Product;

class ProductController extends Controller
{
    public function index()
    {
      $products = Product::paginate(10);
      return view('admin.products.index')->with(compact('products'));
    }

    public function create()
    {
    return view('admin.products.create');
    }

    public function store(Request $request)
    {
      //dd($request->all());
      $messages =[
        'name.required' => 'Es necesario ingresar un nombre al producto',
        'name.min' => 'El nombre necesita al menos 3 carácteres',
      ];
      $rules = [
         'name' => 'required|min:3',
         'description' => 'required|max:200',
         'price' => 'required|numeric|min:0',
      ];
      $this->validate($request,$rules,$messages);
      $product = new Product();
      $product->name = $request->input('name');
      $product->description = $request->input('description');
      $product->price = $request->input('price');
      $product->long_description = $request->input('long_description');
      $product->save(); //insert
      return redirect('/admin/products');
    }

    public function edit($id)
    {
      $product = Product::find($id);
      return view('admin.products.edit')->with(compact('product'));
    }

    public function update(Request $request, $id)
    {
      //dd($request->all());
      $product =  Product::find($id);
      $product->name = $request->input('name');
      $product->description = $request->input('description');
      $product->price = $request->input('price');
      $product->long_description = $request->input('long_description');
      $product->save(); //insert
      return redirect('/admin/products');
    }

    public function destroy($id)
    {
      $product =  Product::find($id);
      $product->foreign('product_id')
      ->references('id')->on('product_images')
      ->onDelete('cascade');
      return back();
    }
}
