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
                'name' => 'Hiskia Pulungan',
                'email' => 'hiski46@gmail.com',
                'password' => Hash::make('123123'),
                'telp' => '085896224113',
                'level_id' => 1,
                'status' => 'Aktif',
            ]
        ]);
    }
}
