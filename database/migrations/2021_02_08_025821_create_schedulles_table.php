<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSchedullesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('schedulles', function (Blueprint $table) {
            $table->id()->unsigned();
            $table->foreignId('transportation_id');
            $table->string('image');
            $table->datetime('date');
            $table->integer('from_code');
            $table->foreignId('destination_code');
            $table->decimal('economy_price', 24,2);
            $table->decimal('bussiness_price', 24,2);
            $table->decimal('first_price', 24,2);
            $table->timestamps();
        });

        DB::update("ALTER TABLE schedulles AUTO_INCREMENT = 3132;");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('schedulles');
    }
}
