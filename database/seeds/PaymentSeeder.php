<?php

use Illuminate\Database\Seeder;
use App\Payment;
use Facades\Services\TripayService;

class PaymentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $channels = TripayService::channel();
        // dd($channels);
        if ($channels) {
            foreach ($channels as $channel) {
                Payment::updateOrCreate([
                    'code' => $channel['code'],
                ], [
                    'name'         => $channel['name'],
                    'group'        => $channel['group'],
                    'fee_flat'     => $channel['total_fee']['flat'],
                    'fee_percent'  => $channel['total_fee']['percent'],
                    'deactived_at' => $channel['active'] == true ? NULL : now()
                ]);
            }
        }

        return true;
    }
}
