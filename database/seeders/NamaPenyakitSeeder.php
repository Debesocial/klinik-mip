<?php

namespace Database\Seeders;

use App\Models\NamaPenyakit;
use Illuminate\Database\Seeder;

class NamaPenyakitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        NamaPenyakit::insert([
            [
                'primer' => 'Kolera',
                'sub_klasifikasi_id' => 1,
                'created_by' => 1,
                'updated_by' => 1
            ],
            [
                'primer' => 'Demam Tifoid',
                'sub_klasifikasi_id' => 1,
                'created_by' => 1,
                'updated_by' => 1
            ],
            [
                'primer' => 'Infeksi usus akibat bakteri non spesifik ',
                'sub_klasifikasi_id' => 1,
                'created_by' => 1,
                'updated_by' => 1
            ],
            [
                'primer' => 'Gastroenteritis',
                'sub_klasifikasi_id' => 1,
                'created_by' => 1,
                'updated_by' => 1
            ],
            [
                'primer' => 'Enteritis ',
                'sub_klasifikasi_id' => 1,
                'created_by' => 1,
                'updated_by' => 1
            ],
            [
                'primer' => 'Colitis',
                'sub_klasifikasi_id' => 1,
                'created_by' => 1,
                'updated_by' => 1
            ],
            [
                'primer' => 'Botulisme',
                'sub_klasifikasi_id' => 2,
                'created_by' => 1,
                'updated_by' => 1
            ],
            [
                'primer' => 'Keracunan makanan akibat bakteri non spesifik',
                'sub_klasifikasi_id' => 2,
                'created_by' => 1,
                'updated_by' => 1
            ],
            [
                'primer' => 'Infeksi usus akibat virus non spesifik ',
                'sub_klasifikasi_id' => 3,
                'created_by' => 1,
                'updated_by' => 1
            ],
            [
                'primer' => 'Gastroenteritis karena rotavirus',
                'sub_klasifikasi_id' => 3,
                'created_by' => 1,
                'updated_by' => 1
            ],
            [
                'primer' => 'Giardiasis',
                'sub_klasifikasi_id' => 4,
                'created_by' => 1,
                'updated_by' => 1
            ],
            [
                'primer' => 'Infeksi usus akibat parasit non spesifik',
                'sub_klasifikasi_id' => 4,
                'created_by' => 1,
                'updated_by' => 1
            ],
            [
                'primer' => 'Sifilis',
                'sub_klasifikasi_id' => 5,
                'created_by' => 1,
                'updated_by' => 1
            ],
        ]);
    }
}
