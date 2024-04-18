<?php

namespace App\Http\Controllers;

use App\Models\BarangModel;
use App\Models\DetailPenjualanModel;
use App\Models\PenjualanModel;
use App\Models\UserModel;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;

class PenjualanController extends Controller
{
    public function index()
    {
        $breadcrumb = (object) [
            'title' => 'Daftar Penjualan',
            'list'  => ['Home', 'Penjualan']
        ];

        $page = (object) [
            'title' => 'Daftar penjualan yang terdapat dalam sistem'
        ];

        $activeMenu = 'penjualan'; // set menu yang sedang aktif
        $barang = BarangModel::all();

        return view('penjualan.index', ['breadcrumb' => $breadcrumb, 'page' => $page, 'activeMenu' => $activeMenu, 'barang' => $barang]);
    }

    public function list(Request $request)
    {
        $penjualans = PenjualanModel::select('penjualan_id', 'pembeli', 'user_id', 'penjualan_tanggal', 'penjualan_kode')->with('user')
            ->withCount(['penjualan_detail as total_harga' => function (Builder $query) {
                $query->select(DB::raw('SUM(harga) as total_harga')); // Gunakan alias untuk hasil perhitungan
            }]);

        if ($request->barang_id) {
            $penjualans->whereHas('penjualan_detail', function($query) use ($request) {
                $query->where('barang_id', $request->barang_id);
            });
        }

        return DataTables::of($penjualans)
            ->addIndexColumn()
            ->addColumn('aksi', function ($penjualan) {
                $btn = '<a href="' . url('/penjualan/' . $penjualan->penjualan_id) . '" class="btn btn-info btn-sm">Detail</a> ';
                $btn .= '<a href="' . url('/penjualan/' . $penjualan->penjualan_id . '/edit') . '" class="btn btn-warning btn-sm">Edit</a> ';
                $btn .= '<form class="d-inline-block" method="POST" action="' . url('/penjualan/' . $penjualan->penjualan_id) . '">' . csrf_field() . method_field('DELETE') . '<button type="submit" class="btn btn-danger btn-sm" onclick="return confirm(\'Apakah Anda yakin menghapus data ini?\');">Hapus</button></form>';
                return $btn;
            })
            ->rawColumns(['aksi'])
            ->make(true);
    }

    public function create()
    {
        $breadcrumb = (object) [
            'title' => 'Tambah Penjualan',
            'list'  => ['Home', 'Penjualan', 'Tambah']
        ];

        $page = (object) [
            'title' => 'Tambah penjualan baru'
        ];

        $barang = BarangModel::all();
        $user = UserModel::all();
        $activeMenu = 'penjualan';       

        return view('penjualan.create', ['breadcrumb' => $breadcrumb, 'page' => $page, 'barang' => $barang, 'user' => $user, 'activeMenu' => $activeMenu]);
    }

    public function store(Request $request): RedirectResponse
    {
        $validated = $request->validate([
            'user_id'           => 'bail|required|integer',  
            'pembeli'           => 'required|string|max:100',
            'penjualan_kode'    => 'required|string|max:100|unique:t_penjualan,penjualan_kode',
            'penjualan_tanggal' => 'required|date',  
            'barang_id'         => 'required|array',
            'total_harga'       => 'required|array',
            'jumlah'            => 'required|array'           
        ]);

        $penjualan = PenjualanModel::create([
            'user_id'           => $request->user_id,
            'pembeli'           => $request->pembeli,
            'penjualan_kode'    => $request->penjualan_kode,
            'penjualan_tanggal' => $request->penjualan_tanggal,
        ]);

        foreach ($request->barang_id as $key => $barangId) {
            DetailPenjualanModel::create([
                'penjualan_id'  =>$penjualan->penjualan_id,
                'barang_id'     =>$barangId,
                'harga'         =>$request->total_harga[$key],
                'jumlah'        =>$request->jumlah[$key]
            ]);
        }

        return redirect('/penjualan')->with('success', 'Data penjualan berhasil disimpan');
    }

    public function getHarga($id)
    {
        $barang = BarangModel::findOrFail($id); // Cari barang berdasarkan ID

        return response()->json([
            'harga_jual' => $barang->harga_jual // Kembalikan harga jual barang dalam respons JSON
        ]);
    }

    public function show(string $id)
    {
        $penjualan = PenjualanModel::find($id);
        $penjualanDetail = DetailPenjualanModel::where('penjualan_id', $penjualan->penjualan_id)->get();

        $breadcrumb = (object) [
            'title' => 'Detail Penjualan',
            'list'  => ['Home', 'Penjualan', 'Detail']
        ];

        $page = (object) [
            'title' => 'Detail penjualan'
        ];

        $activeMenu = 'penjualan';   // set menu yang sedang aktif

        return view('penjualan.show', ['breadcrumb' => $breadcrumb, 'page' => $page, 'penjualan' => $penjualan, 'penjualanDetail' => $penjualanDetail, 'activeMenu' => $activeMenu]);
    }

    public function edit(string $id)
    {
        $penjualan = PenjualanModel::find($id);
        $barang = BarangModel::all();
        $user = UserModel::all();
        $penjualanDetail = DetailPenjualanModel::where('penjualan_id', $penjualan->penjualan_id)->get();

        $breadcrumb = (object) [
            'title' => 'Edit Penjualan',
            'list'  => ['Home', 'Penjualan', 'Edit']
        ];

        $page = (object) [
            'title' => 'Edit penjualan'
        ];

        $activeMenu = 'penjualan';   // set menu yang sedang aktif

        return view('penjualan.edit', ['breadcrumb' => $breadcrumb, 'page' => $page, 'barang' => $barang, 'penjualan' => $penjualan, 'user' => $user, 'penjualanDetail' => $penjualanDetail, 'activeMenu' => $activeMenu]);
    }

    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'user_id'           => 'bail|required|integer',  
            'pembeli'           => 'required|string|max:100',
            'penjualan_kode'    => 'required|string|max:100|unique:t_penjualan,penjualan_kode,' . $id . ',penjualan_id',
            'penjualan_tanggal' => 'required|date',
            'barang_id'         => 'required|array',
            'total_harga'       => 'required|array',
            'jumlah'            => 'required|array',
        ]);

        DetailPenjualanModel::where('penjualan_id', $id)->delete();

        // Menambahkan kembali detail penjualan yang baru
        foreach ($request->barang_id as $index => $barang_id) {
            // Tambahkan detail penjualan baru
            DetailPenjualanModel::create([
                'penjualan_id'  =>$id,
                'barang_id'     =>$barang_id,
                'jumlah'        =>$request->jumlah[$index],
                'harga'         =>$request->total_harga[$index]
            ]);
        }

        return redirect('/penjualan')->with('success', 'Data penjualan berhasil dirubah');
    }

    public function destroy(string $id)
    {
        $check = PenjualanModel::find($id);
        if (!$check) {  
            return redirect('/penjualan')->with('error', 'Data penjualan tidak ditemukan');
        }

        try{
            $penjualanDetail = DetailPenjualanModel::where('penjualan_id', $check->penjualan_id)->get();
            
            // Hapus semua detail penjualan
            foreach ($penjualanDetail as $detail) {
                $detail->delete();
            }

            PenjualanModel::destroy($id);

            return redirect('/penjualan')->with('success', 'Data penjualan berhasil dihapus');
        }catch (\Illuminate\Database\QueryException $e){

            // Jika terjadi error ketika menghapus data, redirect kembali ke halaman dengan membawa pesan error
            return redirect('/penjualan')->with('error', 'Data penjualan gagal dihapus karena masih terdapat tabel lain yang terkait dengan data ini');
        }
    }
}
