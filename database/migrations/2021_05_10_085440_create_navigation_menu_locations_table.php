<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNavigationMenuLocationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('navigation_menu_locations', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('navigation_menu_id')->unsigned();
            $table->bigInteger('navigation_location_id')->unsigned();
            $table->timestamps();

            $table->foreign('navigation_menu_id')->references('id')->on('navigation_menus');
            $table->foreign('navigation_location_id')->references('id')->on('navigation_locations');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('navigation_menu_locations');
    }
}
