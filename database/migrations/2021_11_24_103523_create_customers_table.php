<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCustomersTable extends Migration
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

            $table->foreignId('user_id')
                ->references('id')
                ->on('users');

            $table->string('firstname');
            $table->string('insertion')->nullable();
            $table->string('lastname');
            $table->string('address');
            $table->string('zip');
            $table->string('city');
            $table->enum('gender', ['Male', 'Female','Genderneutral', 'unknown']);
            $table->date('date_of_birth');
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
}
