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
        Schema::create('order_details', function (Blueprint $table) {
            $table->id();
            $table->foreignId('order_master_id')->references('id')->on('order_masters');

            $table->bigInteger('work_type_id')->unsigned()->default(null);
            $table ->foreign('work_type_id')->references('id')->on('work_types');
            $table->decimal('rate');
            $table->date('working_date')->nullable(false);
            $table->string('working_time',10)->nullable(false);
           
            $table->bigInteger('employee_id')->unsigned()->default(null);
            $table ->foreign('employee_id')->references('id')->on('employees');

            $table->bigInteger('status_id')->unsigned()->default(1);
            $table ->foreign('status_id')->references('id')->on('statuses');

            $table->enum('inforce', array(0, 1))->default(1);
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
        Schema::dropIfExists('order_details');
    }
};
