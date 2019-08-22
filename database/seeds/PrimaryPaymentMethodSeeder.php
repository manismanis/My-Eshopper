<?php

use Illuminate\Database\Seeder;

class PrimaryPaymentMethodSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //--- Set Defaults
        \Illuminate\Support\Facades\DB::table('primary_payment_methods')->insert([
            [
                'title' => 'Cash in Delivery',
                'created_at' => date('y-m-d h:i:s'),
                'updated_at' => date('y-m-d h:i:s')
            ],
            [
                'title' => 'eSewa',
                'created_at' => date('y-m-d h:i:s'),
                'updated_at' => date('y-m-d h:i:s')
            ],
            [
                'title' => 'Credit/Debit Card',
                'created_at' => date('y-m-d h:i:s'),
                'updated_at' => date('y-m-d h:i:s')
            ]
        ]);
    }
}
