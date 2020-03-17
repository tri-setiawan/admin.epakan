@extends('layouts.master')
@section('title')
    Status Pencairan
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center"> 
        <div class="col-md-8"> 
 
            <div class="card"> 
                <div class="card-header"> Ubah Status Pencairan
                    <a href="{{ url('/pencairan') }}" class="float-right btn btn-sm btn-primary">Kembali</a>
                </div>
                <div class="card-body">

                    <form method="post" action="{{ url('/pencairan/cairkan_proses/'.$pencairan->id) }}">

                        @csrf

                        {{ method_field('PUT') }}

                        <div class="form-group">

                            <label>Status</label>
                            <select class="form-control" name="status">
                                <option value="">- Pilih Staus</option>
                                <option <?php if($pencairan->status == "belum"){ echo "selected='selected'"; } ?> value="belum">Belum Cair</option>
                                <option <?php if($pencairan->status == "cair"){ echo "selected='selected'"; } ?> value="cair">Sudah Cair</option>
                            </select>
                            
                        </div>

                        <input type="submit" class="btn btn-primary" value="Simpan">

                    </form>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection