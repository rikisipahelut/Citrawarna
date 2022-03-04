<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'admin',
            'email' => 'admin@cwabali.id',
            'password' => bcrypt('admin'),
            'isAdmin' => true,
        ]);
        DB::table('users')->insert([
            'name' => 'riki',
            'email' => 'rikisipahelut@gmail.com',
            'password' => bcrypt('password'),
            'isAdmin' => false,
        ]);
    }
}
