<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BrandTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //--- Load Demo
        DB::table('brands')->insert([
            [
                // ID 1
                'brandname' => 'Stich Nepal',
                'created_at' => date('y-m-d h:i:s'),
                'updated_at' => date('y-m-d h:i:s')
            ],
            [
                // ID 2
                'brandname' => 'Goldstar',
                'created_at' => date('y-m-d h:i:s'),
                'updated_at' => date('y-m-d h:i:s')
            ],
            [
                // ID 3
                'brandname' => 'Nike',
                'created_at' => date('y-m-d h:i:s'),
                'updated_at' => date('y-m-d h:i:s')
            ],
            [
                // ID 4
                'brandname' => 'Addidas',
                'created_at' => date('y-m-d h:i:s'),
                'updated_at' => date('y-m-d h:i:s')
            ],
            [
                // ID 5
                'brandname' => 'Acne',
                'created_at' => date('y-m-d h:i:s'),
                'updated_at' => date('y-m-d h:i:s')
            ],
            [
                // ID 6
                'brandname' => 'Levis',
                'created_at' => date('y-m-d h:i:s'),
                'updated_at' => date('y-m-d h:i:s')
            ],
            [
                // ID 7
                'brandname' => 'Denim',
                'created_at' => date('y-m-d h:i:s'),
                'updated_at' => date('y-m-d h:i:s')
            ],
            [
                // ID 8
                'brandname' => 'Samsung',
                'created_at' => date('y-m-d h:i:s'),
                'updated_at' => date('y-m-d h:i:s')
            ]
        ]);
    }
}
