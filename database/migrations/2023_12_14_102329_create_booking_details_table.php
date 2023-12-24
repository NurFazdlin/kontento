<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('booking_details', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email');
            $table->string('icnumber')->unique();
            $table->string('phone_number')->unique();
            $table->enum('typeofhomestay', ['kontena','villaredan','glamping']);
            $table->string('roomnumber')->unique();
            $table->date('checkin');
            $table->date('checkout');
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
        Schema::dropIfExists('booking_details');
    }
};
