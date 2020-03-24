@extends('layouts.master')
@section('title')
    Edit Transaksi
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center"> 
        <div class="col-md-8"> 
 
            <div class="card"> 
                <div class="card-header text-white bg-primary">
                    <b>Edit Transaksi</b>
                    <a href="{{ url('/transaksi') }}" class="float-right btn btn-sm btn-warning">Kembali</a>
                </div>
                <div class="card-body">

                    <form method="post" action="{{ url('/transaksi/update/'.$transaksi->id) }}">

                        @csrf

                        {{ method_field('PUT') }}

                        <div class="form-group">

                            <label>Tanggal Transaksi</label>
                            <input type="date" name="tanggal" class="form-control" value="{{ $transaksi->tanggal }}">

                            @if($errors->has('tanggal'))
                            <span class="text-danger">
                                <strong>{{ $errors->first('tanggal') }}</strong>
                            </span>
                            @endif
                            
                        </div>

                        <div class="form-group">

                            <label>Jenis</label>
                            <select class="form-control" name="jenis">
                                <option value="">- Pilih Jenis</option>
                                <option <?php if($transaksi->jenis == "Pemasukan"){ echo "selected='selected'"; } ?> value="Pemasukan">Pemasukan</option>
                                <option <?php if($transaksi->jenis == "Pengeluaran"){ echo "selected='selected'"; } ?> value="Pengeluaran">Pengeluaran</option>
                            </select>

                            @if($errors->has('jenis'))
                            <span class="text-danger">
                                <strong>{{ $errors->first('jenis') }}</strong>
                            </span>
                            @endif
                            
                        </div>

                        <div class="form-group">

                            <label>Kategori</label>
                            <select class="form-control" name="kategori">
                                <option value="">- Pilih Kategori</option>
                                @foreach($kategori as $k)
                                <option <?php if($k->id == $transaksi->kategori_id){ echo "selected='selected'"; } ?> value="{{ $k->id }}">{{ $k->kategori }}</option>
                                @endforeach
                            </select>

                            @if($errors->has('kategori'))
                            <span class="text-danger">
                                <strong>{{ $errors->first('kategori') }}</strong>
                            </span>
                            @endif
                            
                        </div>

                        <div class="form-group">

                            <label>Nominal</label>
                            <input type="number" name="nominal" class="form-control" value="{{ $transaksi->nominal }}">

                            @if($errors->has('nominal'))
                            <span class="text-danger">
                                <strong>{{ $errors->first('nominal') }}</strong>
                            </span>
                            @endif
                            
                        </div>

                        <div class="form-group">

                            <label>Keterangan</label>
                            <textarea class="form-control" name="keterangan">{{ $transaksi->keterangan }}</textarea>

                            @if($errors->has('keterangan'))
                            <span class="text-danger">
                                <strong>{{ $errors->first('keterangan') }}</strong>
                            </span>
                            @endif
                            
                        </div>

                        <input type="submit" class="btn btn-success" value="Simpan">

                    </form>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection