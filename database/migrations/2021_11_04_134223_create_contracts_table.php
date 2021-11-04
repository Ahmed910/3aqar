<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateContractsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contracts', function (Blueprint $table) {
            $table->id();
            $table->dateTime('building_date')->nullable();
            $table->integer('aqar_number')->nullable();
            $table->string('aqar_address')->nullable();
            $table->string('iban_num')->nullable();
            $table->string('phone_for_owner')->nullable();
            $table->string('phone_for_citizen')->nullable();
            
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
        Schema::dropIfExists('contracts');
    }
}
