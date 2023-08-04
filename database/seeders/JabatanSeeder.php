<?php

namespace Database\Seeders;

use App\Models\Jabatan;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class JabatanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Jabatan::truncate();
        $csvFile = fopen(base_path("database/data/jabatan.csv"), "r");
        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ";")) !== FALSE) {
            if (!$firstline) {
                Jabatan::create([
                    "id" => $data['0'],
                    "nama_jabatan" => $data['1'],
                    "perusahaan_id" => $data['2'],
                    "created_by" => 1,
                    "updated_by" => 1,
                    "created_at" => date('Y-m-d H:i:s'),
                    "updated_at" => date('Y-m-d H:i:s'),
                ]);    
            }
            $firstline = false;
        }
        Schema::enableForeignKeyConstraints();
        fclose($csvFile);
    }
}
