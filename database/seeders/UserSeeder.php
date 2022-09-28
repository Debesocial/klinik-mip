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
        User::create([
                'name' => 'Martuani Sitohang',
                'email' => 'sitohangmartuani@gmail.com',
                'password' => Hash::make('martuani123'),
                'jadwal_id' => 1,
                'telp' => '082276858074',
                'level_id' => 1,
        ]);
    }
}
