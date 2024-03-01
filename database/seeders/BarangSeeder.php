<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'barang_id' => 1,
                'kategori_id' => 1,
                'barang_kode' => 'MKN1',
                'barang_nama' => 'Indomie',
                'harga_beli' => 3000,
                'harga_jual' => 3500,
            ],
            [
                'barang_id' => 2,
                'kategori_id' => 1,
                'barang_kode' => 'MKN2',
                'barang_nama' => 'Oreo',
                'harga_beli' => 6000,
                'harga_jual' => 6500,
            ],
            [
                'barang_id' => 3,
                'kategori_id' => 2,
                'barang_kode' => 'MNM1',
                'barang_nama' => 'Sprite',
                'harga_beli' => 4000,
                'harga_jual' => 4500,
            ],
            [
                'barang_id' => 4,
                'kategori_id' => 2,
                'barang_kode' => 'MNM2',
                'barang_nama' => 'Indomilk',
                'harga_beli' => 6500,
                'harga_jual' => 7000,
            ],
            [
                'barang_id' => 5,
                'kategori_id' => 3,
                'barang_kode' => 'PKN1',
                'barang_nama' => 'Nevada',
                'harga_beli' => 250000,
                'harga_jual' => 300000,
            ],
            [
                'barang_id' => 6,
                'kategori_id' => 3,
                'barang_kode' => 'PKN2',
                'barang_nama' => 'Smayka',
                'harga_beli' => 150000,
                'harga_jual' => 200000,
            ],
            [
                'barang_id' => 7,
                'kategori_id' => 4,
                'barang_kode' => 'BRT1',
                'barang_nama' => 'Sapu',
                'harga_beli' => 25000,
                'harga_jual' => 30000,
            ],
            [
                'barang_id' => 8,
                'kategori_id' => 4,
                'barang_kode' => 'BRT2',
                'barang_nama' => 'Kemoceng',
                'harga_beli' => 15000,
                'harga_jual' => 20000,
            ],
            [
                'barang_id' => 9,
                'kategori_id' => 5,
                'barang_kode' => 'SKC1',
                'barang_nama' => 'Wardah',
                'harga_beli' => 45000,
                'harga_jual' => 50000,
            ],
            [
                'barang_id' => 10,
                'kategori_id' => 5,
                'barang_kode' => 'SKC2',
                'barang_nama' => 'Nivea',
                'harga_beli' => 60000,
                'harga_jual' => 65000,
            ]
        ];
        DB::table('m_barang')->insert($data);
    }
}
