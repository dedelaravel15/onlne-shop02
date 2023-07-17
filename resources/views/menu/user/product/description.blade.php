@extends('style.user.product.description')
@section('description')
@include('nav-menu')
<div class="card m-2" style="width: 18rem;">
  <img src="{{url('storage/'.$product->image)}}" class="card-img-top" alt="gambar">
  <div class="card-body">
    <p class="card-text">{{$product->price}}</p>
    <p class="card-text">{{$product->description}}</p>
  </div>
</div>
@endsection