<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdSalesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ad_sales', function (Blueprint $table) {
            $table->id();
            $table->string('north')->nullable();
            $table->string('south')->nullable();
            $table->string('east')->nullable();
            $table->string('west')->nullable();
            $table->string('disputes')->nullable();
            $table->string('mortgage_or_bond')->nullable();
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
        Schema::dropIfExists('ad_sales');
    }
}
