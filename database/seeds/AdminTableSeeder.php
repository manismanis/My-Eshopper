<?php

use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Admin::create([
            'fullname' => 'Harry Lama',
            'username' => 'hary',
            'email' => 'hary@gmail.com',
            'password' => bcrypt('hary'),
            'status' => 1

        ]);
    }
}
