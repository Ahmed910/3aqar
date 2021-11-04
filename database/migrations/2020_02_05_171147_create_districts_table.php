<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDistrictsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('districts', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('country_id')->nullable();
            $table->foreign('country_id')->references('id')->on('countries')->onDelete('cascade');
            $table->double('lat')->nullable();
            $table->double('lng')->nullable();
            $table->string('location')->nullable();
            $table->string('postal_code', 30)->nullable();
            $table->string('short_cut')->nullable();
            $table->softDeletes();
            $table->timestamps();
        });

        Schema::create('district_translations', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->uuid('district_id');
            $table->string('name');
            $table->string('slug')->nullable();
            $table->string('locale')->index();
            $table->unique(['district_id', 'locale']);
            $table->foreign('district_id')->references('id')->on('districts')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('district_translations');
        Schema::dropIfExists('districts');
    }
}
