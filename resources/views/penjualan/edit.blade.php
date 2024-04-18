@extends('layouts.template')

@section('content')
    <div class="card card-outline card-primary">
        <div class="card-header">
            <h3 class="card-title">{{ $page->title }}</h3>
            <div class="card-tools"></div>
        </div>
        <div class="card-body">
            @if (!$penjualan)
                <div class="alert alert-danger alert-dismissible">
                    <h5><i class="icon fas fa-ban"></i> Kesalahan!</h5>
                    Data yang Anda cari tidak ditemukan
                </div>
                <a href="{{ url('penjualan') }}" class="btn btn-sm btn-default mt-2">Kembali</a>
            @else
                <form action="{{ url('/penjualan/'.$penjualan->penjualan_id) }}" method="POST" class="form-horizontal">
                    @csrf
                    @method('PUT') <!-- Menggunakan metode PUT untuk proses edit -->
                    <div class="form-group row">
                        <label class="col-1 control-label col-form-label">Pembeli</label>
                        <div class="col-11">
                            <input type="text" class="form-control" id="pembeli" name="pembeli" value="{{old('pembeli', $penjualan->pembeli)}}" required>
                            @error('pembeli')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-1 control-label col-form-label">Kode Penjualan</label>
                        <div class="col-11">
                            <input type="text" class="form-control" id="penjualan_kode" name="penjualan_kode" value="{{ old('penjualan_kode', $penjualan->penjualan_kode) }}" required>
                            @error('penjualan_kode')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-1 control-label col-form-label">Tanggal Penjualan</label>
                        <div class="col-11">
                            <input type="date" class="form-control" id="penjualan_tanggal" name="penjualan_tanggal" value="{{ date('Y-m-d') }}" required>
                            @error('penjualan_tanggal')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-1 control-label col-form-label">Petugas</label>
                        <div class="col-11">
                            <select name="user_id" id="user_id" class="form-control" required>
                                <option value="">- Pilih Petugas -</option>
                                @foreach ($user as $item)
                                    <option value="{{$item->user_id}}" @if ($item->user_id == $penjualan->user_id) selected @endif>{{ $item->nama }}</option>
                                @endforeach
                            </select>
                            @error('user_id')
                                <small class="form-text text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <!-- Input untuk detail penjualan -->
                    <div class="form-group">
                        <label for="detail">Detail Penjualan:</label>
                        <table class="table table-bordered" id="detail">
                            <thead>
                                <tr>
                                    <th>Nama Barang</th>
                                    <th>Harga</th>
                                    <th>Jumlah</th>
                                    <th>Total Harga</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($penjualanDetail as $detail)
                                <tr>
                                    <td>
                                        <select name="barang_id[]" class="form-control barang" required>
                                            <option value="">Pilih Barang</option>
                                            @foreach ($barang as $item)
                                                <option value="{{$item->barang_id}}" @if ($item->barang_id == $detail->barang_id) selected @endif>{{ $item->barang_nama }}</option>
                                            @endforeach
                                        </select>
                                    </td>
                                    <td><input type="number" class="form-control harga" name="harga[]" readonly value="{{$detail->barang->harga_jual}}"></td>
                                    <td><input type="number" class="form-control jumlah" name="jumlah[]" required value="{{ old('jumlah', $detail->jumlah) }}"></td>
                                    <td>
                                        <input type="number" class="form-control total_harga" name="total_harga[]" readonly value="{{ old('harga', $detail->harga) }}">
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <button type="button" class="btn btn-primary btn-sm" id="tambahBarang">Tambah Barang</button>
                    </div>

                    <div class="form-group row">
                        <div class="col-11 offset-1">
                            <button type="submit" class="btn btn-primary btn-sm">Simpan</button>
                            <a href="{{ url('penjualan') }}" class="btn btn-sm btn-default ml-1">Kembali</a>
                        </div>
                    </div>
                </form>
            @endif
        </div>
    </div>
@endsection

    @push('css')
    @endpush

    @push('js')
    <script>
        $(document).ready(function() {
            // Ketika tombol "Tambah Barang" diklik
            $('#tambahBarang').click(function() {
                // Tambahkan baris baru ke tabel detail penjualan
                $('#detail tbody').append('<tr>' +
                    '<td><select name="barang_id[]" class="form-control barang" required><option value="">Pilih Barang</option>@foreach ($barang as $item)<option value="{{ $item->barang_id }}">{{ $item->barang_nama }}</option>@endforeach</select></td>' +
                    '<td><input type="text" class="form-control harga" name="harga[]" readonly></td>' +
                    '<td><input type="number" class="form-control jumlah" name="jumlah[]" required></td>' +
                    '<td><input type="number" class="form-control total_harga" name="total_harga[]" readonly></td>' +
                    '</tr>');
            });
    
            // Ketika dropdown barang dipilih, perbarui harga secara otomatis
            $('body').on('change', 'select[name="barang_id[]"]', function() {
                var selectedId = $(this).val();
                var hargaInput = $(this).closest('tr').find('.harga');
                // Lakukan AJAX request untuk mendapatkan harga barang berdasarkan ID yang dipilih
                $.ajax({
                    url: '{{ url("penjualan/get-harga") }}/' + selectedId,
                    type: 'GET',
                    success: function(response) {
                        hargaInput.val(response.harga_jual);
                    },
                    error: function() {
                        hargaInput.val('');
                    }
                });
            });
    
            $('body').on('input', 'input[name="jumlah[]"]', function() {
                updateTotalHarga();
            });
    
            // Fungsi untuk memperbarui total harga
            function updateTotalHarga() {
                $('tbody tr').each(function() {
                    var hargaPerUnit = parseFloat($(this).find('.harga').val());
                    var jumlah = parseFloat($(this).find('.jumlah').val());
                    // var totalHarga = hargaPerUnit * jumlah;
                    var totalHarga = 0;
                    if (!isNaN(hargaPerUnit) && !isNaN(jumlah) && jumlah > 0) {
                        totalHarga = hargaPerUnit * jumlah;
                    }
                    $(this).find('.total_harga').val(totalHarga.toFixed(2));
                });
            }
        });
    </script>
    @endpush