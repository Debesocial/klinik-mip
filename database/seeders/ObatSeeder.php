<?php

namespace Database\Seeders;

use App\Models\Obat;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class ObatSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call([
            SatuanObatSeeder::class,
            BobotObatSeeder::class,
            GolonganObatSeeder::class
        ]);

        Schema::disableForeignKeyConstraints();
        Obat::truncate();
        $csvFile = fopen(base_path("database/data/obat.csv"), "r");
        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ";")) !== FALSE) {
            if (!$firstline) {
                Obat::create([
                    "nama_obat" => $data['0'],
                    "golongan_obat_id" => $data['2'],
                    "satuan_obat_id" => $data['4'],
                    "bobot_obat_id" => $data['6'],
                    "komposisi_obat" => $data['7'],
                    "komposisi_obat" => $data['7'],
                    "harga" => $data['8'],
                ]);    
            }
            $firstline = false;
        }
        Schema::enableForeignKeyConstraints();
        fclose($csvFile);
    }
}
