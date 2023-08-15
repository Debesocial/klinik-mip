<?php

namespace Database\Seeders;

use App\Models\Produk;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class ProdukSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        Produk::truncate();
        $csvFile = fopen(base_path("database/data/produk.csv"), "r");
        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ";")) !== FALSE) {
            if (!$firstline) {
                Produk::create([
                    "nama_produk" => $data['0'],
                    "satuan_obat_id" => $data['1'],
                    "ukuran" => $data['2'],
                    "bobot_obat_id" => $data['3'],
                    "distributor" => $data['4'],
                    "harga" => $data['5'],
                ]);    
            }
            $firstline = false;
        }
        Schema::enableForeignKeyConstraints();
        fclose($csvFile);
    }
}
