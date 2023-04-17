<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMakeModelsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('make_models', function (Blueprint $table) {
            $table->id();
            $table->string('title')->nullable();
            $table->text('slug')->nullable();
            $table->unsignedBigInteger('make_id');
            $table->foreign('make_id')
            ->references('id')->on('makes')->onDelete('cascade');
            $table->timestamps();
        });
    }

   
    public function down()
    {
        Schema::dropIfExists('make_models');
    }
}
