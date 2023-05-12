<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('last_name')->nullable()->default(null);
            $table->string('email');
            $table->string('phone_number')->nullable()->default(null);
            $table->string('work_details')->nullable()->default(null);
            $table->string('street_address_1');
            $table->string('street_address_2')->nullable()->default(null);
            $table->string('city');
            $table->string('post_code')->nullable()->default(null);
            $table->string('seller_name');
            $table->string('seller_phone_number');
            // $table->string('name_on_card');
            // $table->string('card_number');
            // $table->string('cvc');
            // $table->string('expiry_month');
            // $table->string('expiry_year');
            $table->string('currency');
            $table->double('amount',10);
            $table->unsignedBigInteger('make_id');
            $table->unsignedBigInteger('make_model_id');
            $table->unsignedBigInteger('fuel_type_id');
            // $table->index('make_id');
            // $table->index('make_model_id');
            // $table->index('fuel_type_id');
            $table->foreign('make_id')->references('id')->on('makes')->onDelete('cascade');
            $table->foreign('make_model_id')->references('id')->on('make_models')->onDelete('cascade');
            $table->foreign('fuel_type_id')->references('id')->on('fuel_types')->onDelete('cascade');
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
        Schema::dropIfExists('orders');
    }
}
