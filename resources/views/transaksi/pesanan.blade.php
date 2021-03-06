@extends('layouts.master')
@section('title')
Pesanan
@endsection
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-sm-12">
      <div class="card">
        <div class="card-header text-white bg-primary">
          
          <b>Data Pesanan</b> 

          {{ csrf_field() }}

        </div>
        <br>
        <div class="col-md-3"> 
          <form action="{{ url('/pesanan/cari') }}" method="get" class="form-inline"> 
            <input type="text" name="cariii" value="<?php if(isset($_GET['cariii'])){ echo $_GET['cariii']; } ?>" class="form-control" placeholder="Cari .."> 
            <input type="submit" class="btn btn-primary" value="Cari"> 
          </form> 
        </div> 
        <div class="card-body">
          @if(Session::has('edit')) 
                    <div class="alert alert-primary"> 
                        <button type="button" class="close" data-dismiss="alert">×</button> 
                        {{ Session::get('edit') }} 
                    </div> 
                    @endif 
                    
                    @if($notif = Session::has('hapus'))
          <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $notif }}</strong>
            {{ Session::get('hapus') }}
          </div>
          @endif
          <div class="table-responsive">
            <table class="table table-striped mb-0">
            <thead class="thead-light">
              <tr>
                <th>#</th>
                <th>ID Pesanan</th>
                <th>Pengguna</th>
                <th>Ongkir</th>
                <th>Harga</th>
                <th>Total Bayar</th>
                <th>Status</th>
                <th>Pembayaran</th>
              </tr>
            </thead>
            <tbody>
              @php
                  $no = 1;
              @endphp
              @foreach($pesanannn as $p)
              <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $p->id_pesanan }}</td>
                <td>{{ $p->pengguna->nama }}</td>
                <td>{{ "Rp.".number_format($p->ongkir).",-" }}</td>
                <td>{{ "Rp.".number_format($p->harga).",-" }}</td>
                <td>{{ "Rp.".number_format($p->total_bayar).",-" }}</td>
                <td>
                  @if ($p->status == "belum")
                  <span class="badge badge-soft-danger p-2">{{ $p->status }}</span>
                  @endif
                  @if ($p->status == "lunas")
                  <span class="badge badge-soft-success p-2">{{ $p->status }}</span>
                  @endif
                  </td>
                <td class="">
                  <a href="{{url ('pesanan/pesanan_edit', $p->id_pesanan) }}" class="btn btn-sm btn-success">Konfirmasi</a>
                  <a href="{{url ('pesanan/detail_pesanan', $p->id_pesanan) }}" class="btn btn-sm btn-info">Detail</a>
                  <a href="{{url ('pesanan/hapus', $p->id_pesanan) }}" class="btn btn-sm btn-danger hapes">Hapus</a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          {{ $pesanannn->links() }}
        </div>
      </div>
    </div>
  </div>
  <div class="container">
  <div class="row justify-content-center">
    <div class="col-sm-12">
      <div class="card">
        <div class="card-header text-white bg-success">
          
          <b>Pesanan Lunas</b> 

          {{ csrf_field() }}

        </div>
        <br>
        <div class="col-md-3"> 
          <form action="{{ url('/pesanan/cari') }}" method="get" class="form-inline"> 
            <input type="text" name="carii" value="<?php if(isset($_GET['carii'])){ echo $_GET['carii']; } ?>" class="form-control" placeholder="Cari .."> 
            <input type="submit" class="btn btn-primary" value="Cari"> 
          </form> 
        </div> 
        <div class="card-body">
          @if(Session::has('edit')) 
                    <div class="alert alert-primary"> 
                        <button type="button" class="close" data-dismiss="alert">×</button> 
                        {{ Session::get('edit') }} 
                    </div> 
                    @endif 
                    
                    @if($notif = Session::has('hapus'))
          <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <strong>{{ $notif }}</strong>
            {{ Session::get('hapus') }}
          </div>
          @endif
          <div class="table-responsive">
            <table class="table table-striped mb-0">
            <thead class="thead-light">
              <tr>
                <th>#</th>
                <th>ID Pesanan</th>
                <th>Pengguna</th>
                <th>Ongkir</th>
                <th>Harga</th>
                <th>Total Bayar</th>
                <th>Status</th>
                <th>Pembayaran</th>
              </tr>
            </thead>
            <tbody>
              @php
                  $no = 1;
              @endphp
              @foreach($pesanann as $p)
              <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $p->id_pesanan }}</td>
                <td>{{ $p->pengguna->nama }}</td>
                <td>{{ "Rp.".number_format($p->ongkir).",-" }}</td>
                <td>{{ "Rp.".number_format($p->harga).",-" }}</td>
                <td>{{ "Rp.".number_format($p->total_bayar).",-" }}</td>
                <td>
                  @if ($p->status == "belum")
                  <span class="badge badge-soft-danger p-2">{{ $p->status }}</span>
                  @endif
                  @if ($p->status == "lunas")
                  <span class="badge badge-soft-success p-2">{{ $p->status }}</span>
                  @endif
                  </td>
                <td class="">
                  <a href="{{url ('pesanan/pesanan_edit', $p->id_pesanan) }}" class="btn btn-sm btn-success">Konfirmasi</a>
                  <a href="{{url ('pesanan/detail_pesanan', $p->id_pesanan) }}" class="btn btn-sm btn-info">Detail</a>
                  <a href="{{url ('pesanan/hapus', $p->id_pesanan) }}" class="btn btn-sm btn-danger hapes">Hapus</a>
                </td>
              </tr>
              @endforeach
            </tbody>
          </table>
          {{ $pesanann->links() }}
        </div>
      </div>
    </div>
  </div>
  </div>
  </div>
  @endsection
  @section('script')
      <script type="text/javascript">
        $(document).on("click", ".hapes", function (e) {
          var link = $(this).attr("href"); // "get" the intended link in a var
          e.preventDefault();
          Swal.fire({
            title: 'Yakin ingin menghapus?',
            text: "Data pesanan akan terhapus!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Hapus!'
          }).then((result) => {
            if (result.value) {
              document.location.href = link;
              Swal.fire(
                'Terhapus!',
                'Data sudah terhapus.',
                'success'
              )
            }
          })
        });
      </script>
      @endsection