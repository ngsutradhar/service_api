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
        Schema::create('customers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('customer_category_id')->references('id')->on('customer_categories');
            $table->string('customer_name')->nullable(false);
            $table->string('address')->nullable(true);
            $table->string('city',50)->nullable(true);
            $table->string('district',50)->nullable(true);
           
            $table->string('pin',8)->nullable(true);
            $table->string('whatsapp_number',15)->nullable(true);
            $table->string('contact_number',15)->nullable(true);
            $table->string('email_id',255)->nullable(true);
            // create STATE Foreign Key
            $table->bigInteger('state_id')->unsigned()->default(1);
            $table ->foreign('state_id')->references('id')->on('states');

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
        Schema::dropIfExists('customers');
    }
};
