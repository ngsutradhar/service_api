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
        Schema::create('item_to_services', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('work_type_id')->unsigned()->default(null);
            $table ->foreign('work_type_id')->references('id')->on('work_types');

            $table->bigInteger('item_id')->unsigned()->default(null);
            $table ->foreign('item_id')->references('id')->on('items');
            $table->string('item_to_service_description')->nullable(true);

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
        Schema::dropIfExists('item_to_services');
    }
};
