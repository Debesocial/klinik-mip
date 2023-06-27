<?php

namespace Database\Seeders;

use App\Models\SpecialPermission;
use Illuminate\Database\Seeder;

class SpecialPermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        SpecialPermission::truncate();
        $csvFile = fopen(base_path("database/data/special_permission.csv"), "r");
        $firstline = true;
        while (($data = fgetcsv($csvFile, 2000, ";")) !== FALSE) {
            if (!$firstline) {
                SpecialPermission::create([
                    "user_id" => $data['0'],
                    "permission_id" => $data['1'],
                ]);    
            }
            $firstline = false;
        }
   
        fclose($csvFile);
    }
}
