<?php

namespace Database\Seeders;

use App\Models\LevelPermission;
use Illuminate\Database\Seeder;

class LevelPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        LevelPermission::truncate();
        $csvFile = fopen(base_path("database/data/level_permission.csv"), "r");
        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ";")) !== FALSE) {
            if (!$firstline) {
                LevelPermission::create([
                    "level_id" => $data['0'],
                    "permission_id" => $data['1'],
                ]);    
            }
            $firstline = false;
        }
   
        fclose($csvFile);
    }
}
