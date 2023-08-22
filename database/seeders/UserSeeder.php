<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::insert([
            [
                'name' => 'Super Admin',
                'email' => 'admin.klinik@mandirigroup.net',
                'password' => Hash::make('123123'),
                'telp' => '085896224113',
                'level_id' => 1,
                'jadwal_id'=>1,
                'status' => 'Aktif',
            ],
            
        ]);
    }
}
