<?php

namespace Database\Seeders;

use App\Models\SubKlasifikasi;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class SubKlasifikasiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        SubKlasifikasi::truncate();
        $csvFile = fopen(base_path("database/data/sub_klasifikasi.csv"), "r");
        $firstline = false;
        while (($data = fgetcsv($csvFile, 2000, ";")) !== FALSE) {
            if (!$firstline) {
                SubKlasifikasi::create([
                    "id" => $data['1'],
                    "nama_penyakit" => $data['0'],
                    "klasifikasi_penyakit_id" => $data['2'],
                ]);    
            }
            $firstline = false;
        }
        Schema::enableForeignKeyConstraints();
        fclose($csvFile);
    }
}
