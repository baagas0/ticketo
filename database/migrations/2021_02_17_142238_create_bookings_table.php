<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBookingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bookings', function (Blueprint $table) {
            $table->id();
            $table->string('code');
            $table->string('reference')->nullable();
            $table->foreignId('user_id');
            $table->foreignId('schedulle_id');
            $table->foreignId('payment_id');
            $table->enum('type', ['Economy', 'Bussiness', 'First']);
            $table->integer('number_of_person');
            $table->decimal('total', 11, 2);
            $table->tinyInteger('status')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bookings');
    }
}
