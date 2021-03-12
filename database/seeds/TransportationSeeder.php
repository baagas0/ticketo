<?php

use Illuminate\Database\Seeder;
use App\Transportation;

class TransportationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Transportation::create([
        	'name' 			=> 'Lion Air',
        	'economy_seat'  => 100,
            'economy_price'  => 1500,
            'bussiness_seat'  => 20,
            'bussiness_price'  => 2000,
            'first_seat'        => 5,
            'first_price'  => 3000,
        ]);

        Transportation::create([
            'name'          => 'Garuda Air',
            'economy_seat'  => 130,
            'economy_price'  => 1500,
            'bussiness_seat'  => 15,
            'bussiness_price'  => 2000,
            'first_seat'        => 2,
            'first_price'  => 3000,
        ]);

        Transportation::create([
            'name'          => 'Batik Air',
            'economy_seat'  => 170,
            'economy_price'  => 1500,
            'bussiness_seat'  => 25,
            'bussiness_price'  => 2000,
            'first_seat'        => 5,
            'first_price'  => 3000,
        ]);
    }
}
