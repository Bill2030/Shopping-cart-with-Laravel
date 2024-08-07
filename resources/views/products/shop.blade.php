@extends('components.layout')

@section('content')
<div class="container">
  @if (session('success'))
    <div class="alert alert-success">{{session('success')}}</div>
  @endif
    <div class="row">
        @foreach ($products as $product)
        <div class="col-md-4">
            <div class="card mt-2 justify-center text-center" style="width: 18rem;">
                <img src="{{asset($product->image)}}" class="card-img-top" alt="...">
                <div class="card-body">
                  <h5 class="card-title">{{$product->name}}</h5>
                  <p class="card-text">{{$product->description}}</p>
                  <h5 class="text-primary">${{$product->price}}</h5><br>
                  <a href="{{route('products.addcart', $product->id)}}" class="btn btn-primary btn-sm">Add to Cart</a>
                </div>
              </div>
        </div>
        @endforeach
    </div>
</div>
@endsection