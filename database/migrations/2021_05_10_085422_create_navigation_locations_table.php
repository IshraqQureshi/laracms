<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNavigationLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('navigation_locations', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('location_name')->unsigned();            
            $table->timestamps();
            $table->foreign('location_name')->references('id')->on('enum_navigation_locations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('navigation_locations');
    }
}
