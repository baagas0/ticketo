<?php

use Illuminate\Database\Seeder;
use App\Airport;
// use DB;

class AirportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$path = 'database/sql/airports.sql';

    	$sql = file_get_contents($path);

    	DB::unprepared($sql);

    }
}
