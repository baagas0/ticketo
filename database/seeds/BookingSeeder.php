<?php

use Illuminate\Database\Seeder;
use App\Booking;

class BookingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Booking::create([
        	'code' => 'BOOK161725340400001',
        	'reference' => 'DEV-T32028970KVQQC',
        	'user_id' => 1,
        	'payment_id' => 2,
        	'schedulle_id' => 3132,
        	'status' => 1,
        	'type' => 'Economy',
        	'number_of_person' => 1,
        	'total' => '1036751.00',
        ]);
    }
}
