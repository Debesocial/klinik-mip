<?php

namespace Database\Seeders;

use App\Models\Permissions;
use Illuminate\Database\Seeder;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permissions::truncate();
        $csvFile = fopen(base_path("database/data/permission.csv"), "r");
        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ";")) !== FALSE) {
            if (!$firstline) {
                Permissions::create([
                    "code" => $data['0'],
                    "description" => $data['1'],
                    "parent" => $data['2'],
                ]);    
            }
            $firstline = false;
        }
   
        fclose($csvFile);
    }
}
