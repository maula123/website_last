<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \App\User::create([
            'username'    => 'admin',
            'email'    => 'Mendahara_Ulu@gmail.com',
            'password'    => bcrypt('maju2022'),
            'role'  => 0,
    ]);
    }
}
