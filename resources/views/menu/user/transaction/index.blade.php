@extends('style.user.transaction.index')

@section('transaction')
    <p>ID : {{$order->id}}</p>
    <p>User : {{$order->user->name}}</p>
    @foreach($order->transactions as $transaction)
            <p>{{$transaction->product->name}}</p>
            <p>{{$transaction->amount}}</p>
    @endforeach

    @if($order->id_paid == false && $order->payment_recipe == null)
        <form action="{{route('submit_payment', $order)}}" method="post" enctype="multipart/form-data">
            @csrf
            <br>
            <label for="payment_recipe">Kirim bukti pembayaran</label><br>
            <input type="file" name="payment_recipe"><br>
            <button type="submit">Kirim</button>
        </form>
    @endif
@endsection
