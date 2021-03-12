<?php

use Illuminate\Database\Seeder;
use App\Admin;
use Hash as Bcrypt;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admin::create([
        	'name' => 'User Bagas',
        	'email' => 'admin@gmail.com',
        	'password' => Bcrypt::make('123456'),
        ]);
    }
}
