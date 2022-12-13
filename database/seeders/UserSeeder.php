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
                'name' => 'Martuani Sitohang',
                'email' => 'sitohangmartuani@gmail.com',
                'password' => Hash::make('martuani123'),
                'telp' => '082276858074',
                'level_id' => 1,
                'status' => 'aktif',
            ],
            [
                'name' => 'Darwin Sibarani',
                'email' => 'darwin@gmail.com',
                'password' => Hash::make('poibe123'),
                'telp' => '082209876523',
                'level_id' => 4,
                'status' => 'aktif',
            ],
            [
                'name' => 'Daniel Simamora',
                'email' => 'daniel@gmail.com',
                'password' => Hash::make('merry123'),
                'telp' => '087843651234',
                'level_id' => 5,
                'status' => 'aktif',
            ],
        ]);
    }
}
