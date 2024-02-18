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
        Schema::create('feedback', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('roomnumber')->unique();
            $table->date('date');
            $table->enum('staffservice', ['excellent','good','fair','poor'])->nullable();
            $table->enum('cleanliness', ['excellent','good','fair','poor'])->nullable();
            $table->enum('housekeeping', ['excellent','good','fair','poor'])->nullable();
            $table->enum('cafefood', ['excellent','good','fair','poor'])->nullable();
            $table->enum('amenities', ['excellent','good','fair','poor'])->nullable();
            $table->enum('overallhomestayrating', ['excellent','good','fair','poor']);
            $table->text('othercomments')->nullable();
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
        Schema::dropIfExists('feedback');
    }
};
