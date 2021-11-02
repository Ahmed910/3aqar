<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ads', function (Blueprint $table) {
            $table->id();
            $table->string('ad_type')->nullable();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->string('status')->default('pending'); // pending - waiting_to_approve_by_admin - confirmed - banned
            $table->float('lat',8,4)->nullable();
            $table->float('lng',8,4)->nullable();
            $table->string('address')->nullable();
            $table->unsignedBigInteger('frontage_id')->nullable();
            $table->foreign('frontage_id')->references('id')->on('frontages')->onDelete('set null');
            $table->unsignedBigInteger('residence_type_id')->nullable();
            $table->foreign('residence_type_id')->references('id')->on('residence_types')->onDelete('set null');
            $table->decimal('price')->nullable();
            $table->longText('desc')->nullable();
            $table->string('advertiser_relationship_with_aqar')->nullable();

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
        Schema::dropIfExists('ads');
    }
}
