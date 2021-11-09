<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddCityIdAndDistrictIdToAdsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('ads', function (Blueprint $table) {
            $table->uuid('district_id')->nullable()->after('price');
            $table->foreign('district_id')->references('id')->on('districts')->onDelete('set null');
            $table->uuid('city_id')->nullable()->after('district_id');
            $table->foreign('city_id')->references('id')->on('cities')->onDelete('set null');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('ads', function (Blueprint $table) {
            //
        });
    }
}
