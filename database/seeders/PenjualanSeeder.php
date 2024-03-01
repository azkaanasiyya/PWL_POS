<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenjualanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            [
                'penjualan_id' => 1,
                'user_id' => 3,
                'pembeli' => 'Diana',
                'penjualan_kode' => 'PJ1',
                'penjualan_tanggal' => '2024-01-02'
            ],
            [
                'penjualan_id' => 2,
                'user_id' => 3,
                'pembeli' => 'Doni',
                'penjualan_kode' => 'PJ2',
                'penjualan_tanggal' => '2024-01-02'
            ],
            [
                'penjualan_id' => 3,
                'user_id' => 3,
                'pembeli' => 'Wulan',
                'penjualan_kode' => 'PJ3',
                'penjualan_tanggal' => '2024-01-03'
            ],
            [
                'penjualan_id' => 4,
                'user_id' => 3,
                'pembeli' => 'Putri',
                'penjualan_kode' => 'PJ4',
                'penjualan_tanggal' => '2024-01-03'
            ],
            [
                'penjualan_id' => 5,
                'user_id' => 3,
                'pembeli' => 'Karin',
                'penjualan_kode' => 'PJ5',
                'penjualan_tanggal' => '2024-01-04'
            ],
            [
                'penjualan_id' => 6,
                'user_id' => 3,
                'pembeli' => 'Lala',
                'penjualan_kode' => 'PJ6',
                'penjualan_tanggal' => '2024-01-04'
            ],
            [
                'penjualan_id' => 7,
                'user_id' => 3,
                'pembeli' => 'Jihan',
                'penjualan_kode' => 'PJ7',
                'penjualan_tanggal' => '2024-01-05'
            ],
            [
                'penjualan_id' => 8,
                'user_id' => 3,
                'pembeli' => 'Rani',
                'penjualan_kode' => 'PJ8',
                'penjualan_tanggal' => '2024-01-05'
            ],
            [
                'penjualan_id' => 9,
                'user_id' => 3,
                'pembeli' => 'Chika',
                'penjualan_kode' => 'PJ9',
                'penjualan_tanggal' => '2024-01-06'
            ],
            [
                'penjualan_id' => 10,
                'user_id' => 3,
                'pembeli' => 'Zaki',
                'penjualan_kode' => 'PJ10',
                'penjualan_tanggal' => '2024-01-06'
            ]
        ];
        DB::table('t_penjualan')->insert($data);
    }
}
