@extends('style.user.product.index')

@section('product')
@include('nav-menu')


<!-- Start kode untuk form pencarian -->
<form class="form" method="get" action="{{ route('search') }}">
    <div class="form-group w-100 mb-3">
        <label for="search" class="d-block mr-2">Pencarian</label>
        <input type="text" name="search" class="form-control w-75 d-inline" id="search" placeholder="Masukkan keyword">
        <button type="submit" class="btn btn-primary mb-1">Cari</button>
    </div>
</form>
<!-- Start kode untuk form pencarian -->
@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif
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