@extends('style.admin.product.show_product')
@section('show_product')
<form action="{{route('add_product')}}" method="get">
  <button type="submit" class="btn btn-success m-2">Tambah produk</button>
</form>
<table class="table">
  <thead>
    <tr class="">
      <th scope="col">No.</th>
      <th scope="col">Nama produk</th>
      <th scope="col">Harga</th>
      <th scope="col">Deskripsi</th>
      <th scope="col">Stok</th>
      <th scope="col">Gambar</th>
      <th scope="col">Aksi</th>
    </tr>
  </thead>
  <tbody>
    @foreach($products as $product)
    <tr>
        <td>{{$loop->iteration}}</td>
        <td>{{$product->name}}</td>
        <td>{{$product->price}}</td>
        <td>{{$product->description}}</td>
        <td>{{$product->amount}}</td>
        <td><img src="{{url('storage/' . $product->image)}}" alt="gambar"></td>
        <td class="d-flex m">
          <form action="{{route('edit', $product)}}" method="get">
            @csrf
            <button type="submit" class="btn btn-warning" style="margin-right: 15px;"><i class="fa-solid fa-wrench"></i></button>
          </form>
          <form action="{{route('delete', $product)}}" method="post">
            @csrf
            @method('delete')
            <button type="submit" class="btn btn-danger"><i class="fa-solid fa-trash"></i></button>
          </form>
        </td>
    </tr>
    @endforeach
    
  </tbody>
</table>
@endsection