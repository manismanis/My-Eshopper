<?php

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
        $date = date_create("1996-10-28");

        \App\User::create([
            'email' => 'stokesy@gmail.com',
            'password' => bcrypt('11111111'),
            'name' => 'Ben Stokes',
            'gender' => 'male',
            'dob' => date_format($date,"Y/m/d H:i:s"),
            'phone_no' => '98430-21502',
            'image' => '04f64ef6888634c0a4ec8c0c2725ec21.jpg',
        ]);

    }
}
