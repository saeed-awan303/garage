<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTyreDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tyre_details', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('price');
            $table->string('slug');
            $table->string('description')->nullable()->default(NULL);
            $table->unsignedBigInteger('tyre_width_id');
            $table->unsignedBigInteger('tyre_profile_id');
            $table->unsignedBigInteger('tyre_rim_id');
            $table->unsignedBigInteger('tyre_speed_id');
            $table->foreign('tyre_speed_id')->references('id')->on('tyre_speeds')->onDelete('cascade');
            $table->foreign('tyre_rim_id')->references('id')->on('tyre_rims')->onDelete('cascade');
            $table->foreign('tyre_profile_id')->references('id')->on('tyre_profiles')->onDelete('cascade');
            $table->foreign('tyre_width_id')->references('id')->on('tyre_widths')->onDelete('cascade');
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
        Schema::dropIfExists('tyre_details');
    }
}
