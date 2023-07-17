@extends('style.user.product.index')

@section('product')
@include('nav-menu')
<form class="d-flex m-2">
        <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
        <button class="btn btn-outline-primary text-center" type="submit">Search</button>
</form>
        @foreach($products as $product)
            <a href="{{route('description', $product)}}" class="text-decoration-none">
                <div class="card m-2" style="width: 18rem;">
                    <img src="{{url('storage/'.$product->image)}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{$product->name}}</h5>
                        <p class="card-text">{{$product->price}}</p>
                    </div>
                </div>
            </a>
        @endforeach
@endsection