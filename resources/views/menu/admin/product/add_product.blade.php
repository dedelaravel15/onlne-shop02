@extends('style.admin.product.add_product')
@section('add')
<form class="row g-3 needs-validation" style="margin: 10px;" enctype="multipart/form-data" action="{{route('store_add_product')}}" method="post">
@csrf
  <div class="col-md-4">
    <label for="validationCustom01" class="form-label">Nama Produk</label>
    <input type="text" class="form-control" id="validationCustom01"  name="name" required>
    <div class="valid-feedback">
      Looks good!
    </div>
  </div>
  <div class="col-md-4">
    <label for="validationCustom02" class="form-label">Harga</label>
    <input type="text" class="form-control" id="validationCustom02" name="price" required>
    <div class="valid-feedback">
      Looks good!
    </div>
  </div>
  <div class="col-md-4">
    <label for="validationCustomUsername" class="form-label">Deskripsi</label>
    <input type="text" class="form-control" id="validationCustom02" name="description" required>
  </div>
  <div class="col-md-6">
    <label for="validationCustom03" class="form-label">Stok</label>
    <input type="text" class="form-control" id="validationCustom03" name="amount" required>
    <div class="invalid-feedback">
      Please provide a valid amount.
    </div>
  </div>
  <div class="col-md-3">
    <label for="validationCustom04" class="form-label">Gambar</label>
    <input type="file" class="form-control" id="validationCustom03" name="image" required>
    <div class="invalid-feedback">
      Please select a valid image.
    </div>
  </div>
  
  <div class="col-12">
  </div>
  <div class="col-12">
    <button class="btn btn-primary" type="submit">Tambah Produk</button>
  </div>
</form>
@endsection