<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        //-- Default users
        $this->call(AdminTableSeeder::class);
        $this->call(UserTableSeeder::class);
    }
}
