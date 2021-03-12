<?php

use Illuminate\Database\Seeder;
use App\Setting;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Setting::create([
            'slug'  => 'null',
            'name'  => 'null',
            'text'  => 'null',
            'image' => 'null'
        ]);

    	Setting::create([
        	'slug'			=> 'logo',
        	'name'			=> 'Logo Platform',
        	'image'			=> 'images/logo5.png',
        ]);

        Setting::create([
            'slug'          => 'description',
            'name'          => 'Description Platform',
            'text'   => 'Ticketo is the leading ticketing company in Southeast Asia that provides a variety of airline tickets on one platform, allowing you to create moments with loved ones',
        ]);

        Setting::create([
            'slug'          => 'number',
            'name'          => 'Number Platform',
            'text'         =>  '089506373551',
        ]);

        Setting::create([
            'slug'          => 'email',
            'name'          => 'Email Platform',
            'text'         =>  'baagas0@gmail.com',
        ]);

        Setting::create([
            'slug'          => 'login-image',
            'name'          => 'Login Image Platform',
            'image'         => 'images/login.jpg',
        ]);

    	Setting::create([
        	'slug'			=> 'bg-feature-image',
        	'name'			=> 'BG Feature Image',
        	'image'			=> 'images/parallax/mount.jpg',
        ]);

        Setting::create([
        	'slug'			=> 'feature-image',
        	'name'			=> 'Feature Image',
        	'image'			=> 'images/slider/img-03.jpg',
        ]);

        Setting::create([
        	'slug'			=> 'bg-step-image',
        	'name'			=> 'BG Step Image',
        	'image'			=> 'images/parallax/airport.jpg',
        ]);
    }
}
