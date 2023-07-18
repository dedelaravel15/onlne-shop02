@extends('style.admin.order.index')

@section('order')
<table class="table">
  <thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Nama Pelanggan</th>
      <th scope="col">Tanggal di buat</th>
      <th scope="col">Status</th>
      <th scope="col">Bukti pembayaran</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
 @foreach($orders as $order)
    <tr>
            <td>{{$order->id}}</td>
            <td>{{$order->name}}</td>
            <td>{{$order->created_at}}</td>
            <td>
            @if($order->is_paid == true)
                    paid
                @else
                    Unpaid     
                @endif 
            </td>
            <td>
                @if($order->payment_recipe)
                    <a href="{{url('storage/'.$order->payment_recipe)}}">Lihat Bukti</a>
                @endif
            </td>
            <td>
                <form action="{{route('confirm', $order)}}" method="post">
                    @csrf
                    <button type="submit" class="btn btn-success">Konfirmasi</button>
                </form>
            </td>
    </tr>
@endforeach  
  </tbody>
</table>
@endsection


<!-- @foreach($orders as $order)
            <p> ID : {{$order->id}}</p>
            <p> name : {{$order->name}}</p>
            <p>di buat pada : {{$order->created_at}}</p>
            <p>
                @if($order->is_paid == true)
                    <p>paid</p>
                @else
                    <p>Unpaid</p> 
                    @if($order->payment_recipe)
                        <a href="{{url('storage/'.$order->payment_recipe)}}">Lihat Bukti</a>
                    @endif    
                @endif   
            </p>   
            <form action="{{route('confirm', $order)}}" method="post">
                @csrf
                <button type="submit" class="btn btn-success">Konfirmasi</button>
            </form>
    @endforeach -->