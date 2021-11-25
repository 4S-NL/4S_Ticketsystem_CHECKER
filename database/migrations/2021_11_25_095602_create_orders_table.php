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
            $table->foreignId('customer_id')
                    ->references('id')
                    ->on('customers');

            $table->foreignId('event_id')
                    ->references('id')
                    ->on('events');

            $table->integer('order_number')
                    ->unique()
                    ->startingValue(10000);

            $table->dateTime('order_date');
            $table->enum('status', ['paid', 'open', 'cancelled', 'declined']);

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
