<?php

namespace Database\Seeders;

use App\Models\KategoriPasien;
use Illuminate\Database\Seeder;

class KategoriPasienSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        KategoriPasien::insert([
            [
                'nama_kategori' => 'Karyawan MIP',
                'created_by' => 1,
                'updated_by' => 1
            ],
            [
                'nama_kategori' => 'Karyawan Mitra Kerja',
                'created_by' => 1,
                'updated_by' => 1
            ],
            [
                'nama_kategori' => 'Visitor Mitra Kerja',
                'created_by' => 1,
                'updated_by' => 1
            ],
            [
                'nama_kategori' => 'Penduduk Lokal',
                'created_by' => 1,
                'updated_by' => 1
            ],
            [
                'nama_kategori' => 'Visitor MIP',
                'created_by' => 1,
                'updated_by' => 1
            ],
            [
                'nama_kategori' => 'Karyawan Vendor MIP',
                'created_by' => 1,
                'updated_by' => 1
            ],
            [
                'nama_kategori' => 'Karyawan Vendor mitra kerja',
                'created_by' => 1,
                'updated_by' => 1
            ],
            
        ]);
    }
}
