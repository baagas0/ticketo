<?php

use Illuminate\Database\Seeder;
use App\Slider;

class SliderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Slider::create([
        	'image'			=> 'images/slider/img-03.jpg',
        	'title'			=> 'Planning a Trip to London?',
        	'description'	=> 'You Choose the Adventure We make it happen',
        	'url'			=> ''
        ]);

        // Slider::create([
        // 	'image'			=> 'images/slider/img-02.jpg',
        // 	'title'			=> 'Planning a Trip to London?',
        // 	'description'	=> 'You Choose the Adventure We make it happen',
        // 	'url'			=> 'Google.com'
        // ]);

        Slider::create([
        	'image'			=> 'images/slider/img-01.jpg',
        	'title'			=> 'Planning a Trip to London?',
        	'description'	=> 'You Choose the Adventure We make it happen',
        	'url'			=> ''
        ]);
    }
}
