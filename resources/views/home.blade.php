@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Dashboard</div>
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    You are logged in!
                </div>

                <div class="row justify-content-center">
                  @foreach ($products as $product)
                      <div class="col-md-4">
                          <img src="{{$product->featured_image_url}}" class="img-circle" width="255">
                          <h4 class="title">{{$product->name}}<br/>
                             <small class="text-muted">{{$product->category->name}}</small>
                          </h4>
                          <p class="description">{{$product->description}}</p>
                      </div>
                   @endforeach
                </div>

            </div>
        </div>
    </div>
</div>
@endsection
