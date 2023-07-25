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
            [
                'name' => 'Dokter',
                'email' => 'dokter.klinik@mandirigroup.net',
                'password' => Hash::make('123123'),
                'telp' => '085896224113',
                'level_id' => 2,
                'jadwal_id'=>1,
                'status' => 'Aktif',
            ],
            [
                'name' => 'Perawat',
                'email' => 'perawat.klinik@mandirigroup.net',
                'password' => Hash::make('123123'),
                'telp' => '085896224113',
                'level_id' => 3,
                'jadwal_id'=>1,
                'status' => 'Aktif',
            ],
            [
                'name' => 'Apoteker',
                'email' => 'apoteker.klinik@mandirigroup.net',
                'password' => Hash::make('123123'),
                'telp' => '085896224113',
                'level_id' => 4,
                'jadwal_id'=>1,
                'status' => 'Aktif',
            ],
        ]);
    }
}
