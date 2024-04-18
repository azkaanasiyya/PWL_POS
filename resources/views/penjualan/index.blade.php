@extends('layouts.template')

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools">
                <a href="{{url('penjualan/create')}}" class="btn btn-sm btn-primary mt-1">Tambah</a>
            </div>
        </div>
        <div class="card-body">
            @if (session('success'))
                <div class="alert alert-success">{{session('success')}}</div>
            @endif
            @if (session('error'))
                <div class="alert alert-danger">{{session('error')}}</div>
            @endif
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group row">
                        <label class="col-1 control-label col-form-label">Filter:</label>
                        <div class="col-3">
                            <select name="barang_id" id="barang_id" class="form-control" required>
                                <option value="">- Semua -</option>
                                @foreach ($barang as $item)
                                    <option value="{{$item->barang_id}}">{{$item->barang_nama}}</option>
                                @endforeach
                            </select>
                            <small class="form-text text-muted">Nama Kategori</small>
                        </div>
                    </div>
                </div>
            </div>
            <table class="table table-bordered table-striped table-hover table-sm" id="table_barang">
                <thead>
                    <tr><th>ID</th><th>Pembeli</th><th>Petugas</th><th>Total Harga</th><th>Kode Penjualan</th><th>Tanggal</th><th>Aksi</th></tr>
                </thead>
            </table>
        </div>
    </div>
@endsection
@push('css')
@endpush

@push('js')
    <script>
        $(document).ready(function(){
            var dataBarang = $('#table_barang').DataTable({
                serverSide: true, //serverside true jika ingin menggunakan server side processing
                ajax: {
                    "url": "{{ url('penjualan/list') }}",
                    "dataType": "json",
                    "type": "POST",
                    "data": function (d){
                        d.barang_id = $('#barang_id').val();
                    }
                },
                columns: [
                    {
                        data: "DT_RowIndex", //nomor urut dari laravel datatable addindexcolumn()
                        classname: "text-center",
                        orderable: false,
                        searchable: false
                    },{
                        data: "pembeli",
                        classname: "",
                        orderable: true, //orderable true jika ingin kolom bisa diurutkan
                        searchable: true //searchable true jika ingin kolom bisa dicari
                    },{
                        data: "user.nama",
                        classname: "",
                        orderable: true, //orderable true jika ingin kolom bisa diurutkan
                        searchable: true //searchable true jika ingin kolom bisa dicari
                    },{
                        data: "total_harga",
                        classname: "",
                        orderable: false, //orderable true jika ingin kolom bisa diurutkan
                        searchable: false //searchable true jika ingin kolom bisa dicari
                    },{
                        data: "penjualan_kode",
                        classname: "",
                        orderable: false, //orderable true jika ingin kolom bisa diurutkan
                        searchable: false //searchable true jika ingin kolom bisa dicari
                    },{
                        data: "penjualan_tanggal",
                        classname: "",
                        orderable: false, //orderable true jika ingin kolom bisa diurutkan
                        searchable: false, //searchable true jika ingin kolom bisa dicari
                    },{
                        data: "aksi",
                        classname: "",
                        orderable: false, //orderable true jika ingin kolom bisa diurutkan
                        searchable: false //searchable true jika ingin kolom bisa dicari
                    }
                ]
            });
            // $('#barang_id').on('change', function(){
            //     dataUser.ajax.reload();
            // });
        });
    </script>
@endpush
