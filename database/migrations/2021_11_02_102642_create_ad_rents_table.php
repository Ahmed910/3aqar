<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdRentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ad_rents', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('period_id')->nullable();
            $table->foreign('period_id')->references('id')->on('periods')->onDelete('set null');

            $table->unsignedBigInteger('population_type_id')->nullable();
            $table->foreign('population_type_id')->references('id')->on('population_types')->onDelete('set null');
            $table->string('round_type')->nullable();
            $table->unsignedBigInteger('ad_id')->nullable();
            $table->foreign('ad_id')->references('id')->on('ads')->onDelete('cascade');

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
        Schema::dropIfExists('ad_rents');
    }
}
