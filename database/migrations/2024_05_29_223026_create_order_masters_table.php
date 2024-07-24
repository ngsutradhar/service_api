<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_masters', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_id')->references('id')->on('customers');
            $table->string('order_no',100)->nullable(false);
            $table->date('order_date')->nullable(false);
            $table->string('order_description')->nullable(true);
            // create Service Type Foreign Key
            $table->bigInteger('service_type_id')->unsigned()->default(null);
            $table ->foreign('service_type_id')->references('id')->on('service_types');

              // create organisation Foreign Key
            $table->bigInteger('organisation_id')->unsigned()->default(1);
            $table ->foreign('organisation_id')->references('id')->on('organisations');
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
        Schema::dropIfExists('order_masters');
    }
};
