<?php

use Illuminate\Database\Seeder;
use App\Tour;

class TourSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tour::create([
        	'schedulle_id'	=> 3132,
        	'image'			=> 'images/slider/img-01.jpg',
        	'title'			=> 'City Tours in Surabaya, Indonesia',
        	'description'	=> 'You Choose the Adventure We make it happen',
        ]);
        Tour::create([
            'schedulle_id'  => 3133,
            'image'         => 'images/slider/img-02.jpg',
            'title'         => 'City Tours in Rome, Italy',
            'description'   => 'You Choose the Adventure We make it happen',
        ]);
        Tour::create([
            'schedulle_id'  => 3134,
            'image'         => 'images/slider/img-03.jpg',
            'title'         => 'City Tours in Newark, US',
            'description'   => 'You Choose the Adventure We make it happen',
        ]);
    }
}
