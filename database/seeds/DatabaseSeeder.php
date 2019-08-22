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
//        $this->call(AdminTableSeeder::class);
//        $this->call(UserTableSeeder::class);

        //Demo insertions
//        $this->call(SliderTableSeeder::class);
//        $this->call(CategoriesTableSeeder::class);
//        $this->call(SubCategoriesTableSeeder::class);
//        $this->call(BrandTableSeeder::class);
//        $this->call(UserTableSeeder::class);
        $this->call(PrimaryPaymentMethodSeeder::class);
//        $this->call(ItemsTableSeeder::class);
    }
}
