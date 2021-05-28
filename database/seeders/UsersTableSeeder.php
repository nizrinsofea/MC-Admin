<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->truncate(); //for cleaning earlier data to avoid duplicate entries
        DB::table('users')->insert([
            'username' => 'superadmin',
            'role' => 'superadmin',
            'password' => Hash::make('password'),
            'pwshow' => 'password',
        ]);
        DB::table('users')->insert([
            'username' => 'admin',
            'role' => 'admin',
            'password' => Hash::make('password'),
            'pwshow' => 'password',
        ]);
        DB::table('users')->insert([
            'username' => 'lecturer',
            'role' => 'lecturer',
            'password' => Hash::make('password'),
            'pwshow' => 'password',
        ]);
    }
}
