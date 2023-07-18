@extends('style.user.cart.index')
@section('keranjang')
@include('nav-menu')     

@php
    $total_price = 0;
@endphp        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No.</th>
                    <th scope="col">Nama</th>
                    <th scope="col">Gambar</th>
                    <th scope="col">Kuantitas</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    @foreach($carts as $cart)
                        <th scope="col">{{$loop->iteration}}</th>
                        <td>{{$cart->product->name}}</td>
                        <td><img src="{{url('storage/'.$cart->product->image)}}" alt="gamabr" srcset=""></td>
                        <td>{{$cart->amount}}</td>  
                        
                        @php
                            $total_price += $cart->product->price * $cart->amount
                        @endphp
                    @endforeach
                </tr>
                <p>Rp : {{$total_price}}</p>
            </tbody>
        </table>

        <form action="{{route('checkout')}}" method="post">
            @csrf
            <button type="submit" class="btn btn-outline-success position-absolute bottom-0 end-0 translate-middle" @if($carts->isEmpty()) disabled @endif>Checkout</button>
        </form>
   
@endsection