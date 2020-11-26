<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateRoomsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('rooms', function (Blueprint $table) {
            $table->id();
           
            $table->integer('number');            
            $table->string('phone',20);
            $table->boolean('occupée')->default(0);
         //   $table->string('image');
            $table->foreignId('CatId')
            ->constrained('categories')
            ->onDelete('cascade')
            ->onUpdate('cascade');
            $table->foreignId('HotelId')
            ->constrained('hotels')
            ->onDelete('cascade')
            ->onUpdate('cascade');
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
        Schema::dropIfExists('rooms');
    }
}
