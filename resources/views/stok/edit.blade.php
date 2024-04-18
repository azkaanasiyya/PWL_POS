@extends('layouts.template')

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{$page->title}}</h3>
            <div class="card-tools"></div>
        </div>
        <div class="card-body">
            @if(!$stok)
                <div class="alert alert-danger alert-dismissible">
                    <h5><i class="icon fas fa-ban"></i> Kesalahan!</h5>
                    Data yang Anda cari tidak ditemukan
                </div>
                <a href="{{url('stok')}}" class="btn btn-sm btn-default mt-2">Kembali</a>
            @else
                <form action="{{url('/stok/'.$stok->stok_id)}}" method="POST" class="form-horizontal">
                    @csrf
                    @method('PUT')  
                    <div class="form-group row">
                        <label class="col-1 control-label col-form-label">Barang</label>
                        <div class="col-11">
                            <select name="barang_id" id="barang_id" class="form-control" required>
                                <option value="">- Pilih Barang -</option>
                                @foreach ($barang as $item)
                                    <option value="{{$item->barang_id}}" @if ($item->barang_id == $stok->barang_id) selected @endif>{{$item->barang_nama}}</option>
                                @endforeach
                            </select>
                            @error('barang_id')
                                <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-1 control-label col-form-label">Tanggal Stok</label>
                        <div class="col-11">
                            <input type="date" class="form-control" id="stok_tanggal" name="stok_tanggal" value="{{old('stok_tanggal', $stok->stok_tanggal)}}" required>
                            @error('stok_tanggal')
                                <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-1 control-label col-form-label">Jumlah Stok</label>
                        <div class="col-11">
                            <input type="number" class="form-control" id="stok_jumlah" name="stok_jumlah" value="{{old('stok_jumlah', $stok->stok_jumlah)}}" required>
                            @error('stok_jumlah')
                                <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-1 control-label col-form-label">Penyetok</label>
                        <div class="col-11">
                            <select name="user_id" id="user_id" class="form-control" required>
                                <option value="">- Pilih Penyetok -</option>
                                @foreach ($user as $item)
                                    <option value="{{$item->user_id}}" @if ($item->user_id == $stok->user_id) selected @endif>{{$item->nama}}</option>
                                @endforeach
                            </select>
                            @error('user_id')
                                <small class="form-text text-danger">{{$message}}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-1 control-label col-form-label"></label>
                        <div class="col-11">
                            <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                            <a href="{{url('stok')}}" class="btn btn-sm btn-default ml-1">Kembali</a>
                        </div>
                    </div>
                </form>
            @endempty
        </div>
    </div>
@endsection
@push('css')

@endpush
@push('js')

@endpush