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
        Schema::create('employees', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_category_id')->references('id')->on('employee_categories');
            $table->string('employee_name')->nullable(false);
            $table->string('guardian_name')->nullable(true);
            $table->date('dob')->nullable(true);
            $table->date('doj')->nullable(true);
            $table->enum('sex', array('M', 'F', 'O'))->default('O');
            $table->string('address')->nullable(true);
            $table->string('city',50)->nullable(true);
            $table->string('district',50)->nullable(true);
           
            $table->string('pin',8)->nullable(true);
            $table->string('whatsapp_number',15)->nullable(true);
            $table->string('contact_number',15)->nullable(true);
            $table->string('email_id',255)->nullable(true);
            $table->string('qualification',50)->nullable(true);
            
            // create STATE Foreign Key
            $table->bigInteger('state_id')->unsigned()->default(1);
            $table ->foreign('state_id')->references('id')->on('states');

            //for Bank only
            $table->String('bank_name', 100)->nullable(true);
            $table->String('account_number', 30)->nullable(true);
            $table->String('ifsc', 20)->nullable(true);

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
        Schema::dropIfExists('employees');
    }
};
