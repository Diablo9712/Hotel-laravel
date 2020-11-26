<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHotelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hotels', function (Blueprint $table) {
            $table->id();
            $table->string('namehotel');
            $table->foreignId('CountryId')
            ->constrained('countries')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->foreignId('CityId')
            ->constrained('countries')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->string('address');
            $table->integer('codepostal');            
            $table->string('phone',20);
           // $table->string('image');
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
        Schema::dropIfExists('hotels');
    }
}
