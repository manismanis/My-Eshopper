<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class SliderTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //--- LOAD DEMO
        DB::table('sliders')->insert([
            [
                'title' => 'Casual Jeans for Women',
                'description' => 'New Casual Jeans For Ladies. Casual Wear for Summer. Can be fit on Boot, Shoes and Slipoer as well.',
                'status' => 1,
                'image' => '476abec5635e551a0089165deb83dce3.jpg', //-- Hard Coded--just put the name and done
                'created_at' => date('y-m-d h:i:s'),
                'updated_at' => date('y-m-d h:i:s')
            ],
            [
                'title' => 'Casual Short Sleeve Flower Print Long Dress',
                'description' => 'This chic dress features full of Floral print,Deep V design. High waist highlights graceful body,The thin fabric used in this dress has elasticity.',
                'status' => 1,
                'image' => '9d2a5990b2e53fc089d2e14d82deee22.jpg', //-- Hard Coded
                'created_at' => date('y-m-d h:i:s'),
                'updated_at' => date('y-m-d h:i:s')
            ],
            [
                'title' => 'Maroon Lining Textured Rayon Slub Top For Women',
                'description' => 'Create your personalized style by wearing this stylish top from Bisesh Creation. Tailored using rayon, this regular-fit top ensures long lasting comfort for the wearer all day long.',
                'status' => 1,
                'image' => 'a44c4f03fba07f7c1358980965eae394.jpg', //-- Hard Coded
                'created_at' => date('y-m-d h:i:s'),
                'updated_at' => date('y-m-d h:i:s')
            ]
        ]);
    }
}
