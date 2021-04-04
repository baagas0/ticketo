<?php

use Illuminate\Database\Seeder;
use App\Schedulle;
use App\Helpers\Calc;
use Carbon\Carbon;

class SchedulleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $price1 = Calc::price([
                        'idTransportation'  => 1,
                        'from'              => 84,
                        'destination'       => 252,
                 ]);
        Schedulle::create([
        	'transportation_id'	=> 1,
        	'date'				=> Carbon::parse('now')->addDays('+2'),
            'image'             => 'images/schedulle/surabaya.png',
        	'from_code'			=> 84,
        	'destination_code'	=> 252,
        	'economy_price'		=> $price1['economy_price'],
            'bussiness_price'   => $price1['bussiness_price'],
            'first_price'       => $price1['first_price']
        ]);

        $price2 = Calc::price([
                        'idTransportation'  => 2,
                        'from'              => 85,
                        'destination'       => 23,
                 ]);
        Schedulle::create([
            'transportation_id' => 2,
            'date'              => Carbon::parse('now')->addDays('+2'),
            'image'             => 'images/schedulle/Fiumicino.jpg',
            'from_code'         => 85,
            'destination_code'  => 23,
            'economy_price'     => $price2['economy_price'],
            'bussiness_price'   => $price2['bussiness_price'],
            'first_price'       => $price2['first_price']
        ]);

        $price3 = Calc::price([
                        'idTransportation'  => 2,
                        'from'              => 86,
                        'destination'       => 45,
                 ]);
        Schedulle::create([
            'transportation_id' => 2,
            'date'              => Carbon::parse('now')->addDays('+2'),
            'image'             => 'images/schedulle/Newark Liberty Intl.jpg',
            'from_code'         => 86,
            'destination_code'  => 45,
            'economy_price'     => $price3['economy_price'],
            'bussiness_price'   => $price3['bussiness_price'],
            'first_price'       => $price3['first_price']
        ]);

        $price4 = Calc::price([
                        'idTransportation'  => 3,
                        'from'              => 1,
                        'destination'       => 2,
                 ]);
        Schedulle::create([
            'transportation_id' => 3,
            'date'              => Carbon::parse('now')->addDays('+2'),
            'image'             => 'images/schedulle/Chicago Ohare Intl.jpg',
            'from_code'         => 1,
            'destination_code'  => 2,
            'economy_price'     => $price4['economy_price'],
            'bussiness_price'   => $price4['bussiness_price'],
            'first_price'       => $price4['first_price']
        ]);

        $price5 = Calc::price([
                        'idTransportation'  => 2,
                        'from'              => 3,
                        'destination'       => 4,
                 ]);
        Schedulle::create([
            'transportation_id' => 2,
            'date'              => Carbon::parse('now')->addDays('+2'),
            'image'             => 'images/schedulle/Heathrow.jpg',
            'from_code'         => 3,
            'destination_code'  => 4,
            'economy_price'     => $price5['economy_price'],
            'bussiness_price'   => $price5['bussiness_price'],
            'first_price'       => $price5['first_price']
        ]);

        $price6 = Calc::price([
                        'idTransportation'  => 2,
                        'from'              => 5,
                        'destination'       => 6,
                 ]);
        Schedulle::create([
            'transportation_id' => 2,
            'date'              => Carbon::parse('now')->addDays('+2'),
            'image'             => 'images/schedulle/Los Angeles Intl.jpg',
            'from_code'         => 5,
            'destination_code'  => 6,
            'economy_price'     => $price6['economy_price'],
            'bussiness_price'   => $price6['bussiness_price'],
            'first_price'       => $price6['first_price']
        ]);

        $price7 = Calc::price([
                        'idTransportation'  => 3,
                        'from'              => 7,
                        'destination'       => 8,
                 ]);
        Schedulle::create([
            'transportation_id' => 3,
            'date'              => Carbon::parse('now')->addDays('+2'),
            'image'             => 'images/schedulle/Dallas Fort Worth Intl.JPG',
            'from_code'         => 7,
            'destination_code'  => 8,
            'economy_price'     => $price7['economy_price'],
            'bussiness_price'   => $price7['bussiness_price'],
            'first_price'       => $price7['first_price']
        ]);

        $price8 = Calc::price([
                        'idTransportation'  => 2,
                        'from'              => 9,
                        'destination'       => 10,
                 ]);
        Schedulle::create([
            'transportation_id' => 2,
            'date'              => Carbon::parse('now')->addDays('+2'),
            'image'             => 'images/schedulle/Schiphol.jpg',
            'from_code'         => 9,
            'destination_code'  => 10,
            'economy_price'     => $price8['economy_price'],
            'bussiness_price'   => $price8['bussiness_price'],
            'first_price'       => $price8['first_price']
        ]);

        $price9 = Calc::price([
                        'idTransportation'  => 2,
                        'from'              => 11,
                        'destination'       => 12,
                 ]);
        Schedulle::create([
            'transportation_id' => 2,
            'date'              => Carbon::parse('now')->addDays('+2'),
            'image'             => 'images/schedulle/Changi Intl.jpg',
            'from_code'         => 11,
            'destination_code'  => 12,
            'economy_price'     => $price9['economy_price'],
            'bussiness_price'   => $price9['bussiness_price'],
            'first_price'       => $price9['first_price']
        ]);

        $price10 = Calc::price([
                        'idTransportation'  => 3,
                        'from'              => 13,
                        'destination'       => 14,
                 ]);
        Schedulle::create([
            'transportation_id' => 3,
            'date'              => Carbon::parse('now')->addDays('+2'),
            'image'             => 'images/schedulle/Changi Intl seoul.jpg',
            'from_code'         => 13,
            'destination_code'  => 14,
            'economy_price'     => $price10['economy_price'],
            'bussiness_price'   => $price10['bussiness_price'],
            'first_price'       => $price10['first_price']
        ]);
    }
}
