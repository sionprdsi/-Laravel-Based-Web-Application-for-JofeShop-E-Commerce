<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::insert([
            [
                'nama' => 'Jerry',
                'username' => 'jerry2204',
                'email' => 'jerryandrianto22@gmail.com',
                'telp' => '08762767632',
                'password' => Hash::make('jerry123'),
                'role' => 'customer',
                'status' => 1,
            ],
            [
                'nama' => 'jofe',
                'username' => 'jofe123',
                'email' => 'jofe12@gmail.com',
                'telp' => '082116154550',
                'password' => Hash::make('jofe123'),
                'role' => 'admin',
                'status' => 1,
            ],
        ]);
    }
}
