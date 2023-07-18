<nav class="navbar navbar-expand-lg navbar-light bg-primary " >
  <div class="container-fluid">
    <a class="navbar-brand" href="{{route('beranda')}}">Ongkir aja</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent d-flex justify-content-end">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="{{route('show_cart')}}">Keranjang</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="">Transaksi</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Akun</a>
        </li>
      </ul>
      
    </div>
  </div>
</nav>