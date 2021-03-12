<?php

use Illuminate\Database\Seeder;
use App\Pessenger;
use Hash as Bcrypt;

class PessengerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Pessenger::create([
        	'name' => 'penumpang Bagas',
        	'email' => 'penumpang@gmail.com',
            'gender' => 1,
        	'password' => Bcrypt::make('123456'),
        ]);
    }
}
