<?php

namespace Database\Seeders;

use App\Models\HasilPemantauan;
use Illuminate\Database\Seeder;

class HasilPemantauanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        HasilPemantauan::insert([
            [
                'kode' => 'X',
                'nama_pemantauan' => 'Sehat',
                'created_by' => 1,
                'updated_by' => 1
            ],
            [
                'kode' => 'D',
                'nama_pemantauan' => 'Demam',
                'created_by' => 1,
                'updated_by' => 1
            ],
            [
                'kode' => 'B',
                'nama_pemantauan' => 'Batuk',
                'created_by' => 1,
                'updated_by' => 1
            ],
            [
                'kode' => 'S',
                'nama_pemantauan' => 'Sesak nafas',
                'created_by' => 1,
                'updated_by' => 1
            ],
            [
                'kode' => 'P',
                'nama_pemantauan' => 'Pilek',
                'created_by' => 1,
                'updated_by' => 1
            ],
            [
                'kode' => 'L',
                'nama_pemantauan' => 'Gejala Lain',
                'created_by' => 1,
                'updated_by' => 1
            ],
            [
                'kode' => 'A',
                'nama_pemantauan' => 'Aman',
                'created_by' => 1,
                'updated_by' => 1
            ],
            [
                'kode' => 'R',
                'nama_pemantauan' => 'Rujuk Rumah Sakit',
                'created_by' => 1,
                'updated_by' => 1
            ],
        ]);
    }
}
