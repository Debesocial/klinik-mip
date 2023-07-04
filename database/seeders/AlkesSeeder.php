<?php

namespace Database\Seeders;

use App\Models\Alkes;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class AlkesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            GolonganAlkesSeeder::class
        ]);

        Schema::disableForeignKeyConstraints();
        Alkes::truncate();
        $csvFile = fopen(base_path("database/data/alkes.csv"), "r");
        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ";")) !== FALSE) {
            if (!$firstline) {
                Alkes::create([
                    "nama_alkes" => $data['0'],
                    "golongan_alkes_id" => $data['2'],
                    "satuan_obat_id" => $data['4'],
                    "bobot_obat_id" => $data['6'],
                    "komposisis" => $data['7'],
                    "harga" => $data['8'],
                ]);    
            }
            $firstline = false;
        }
        Schema::enableForeignKeyConstraints();
        fclose($csvFile);

    }
}
