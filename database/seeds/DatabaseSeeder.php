<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(PessengerSeeder::class);
        $this->call(AdminSeeder::class);
        $this->call(UserSeeder::class);
        $this->call(AirportSeeder::class);
        // $this->call(TimoKoerber\LaravelJsonSeeder\JsonDatabaseSeeder::class);
        $this->call(TransportationSeeder::class);
        $this->call(TypeTransportationSeeder::class);
        $this->call(SchedulleSeeder::class);
        $this->call(NotificationSeeder::class);
        $this->call(DemoSeeder::class);
        $this->call(PaymentSeeder::class);
    }
}
