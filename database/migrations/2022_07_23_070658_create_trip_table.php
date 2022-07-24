<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTripTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('trips', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('from_location_id');
            $table->unsignedBigInteger('to_location_id');
            $table->integer('distance')->default(0);
            $table->enum('status',['progress','completed'])->default('progress');
            $table->integer('created_by');
            $table->integer('updated_by');
            $table->foreign('customer_id')->references('id')->on('customers');
            $table->foreign('from_location_id')->references('id')->on('locations');
            $table->foreign('to_location_id')->references('id')->on('locations');
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
        Schema::dropIfExists('trips');
    }
}
