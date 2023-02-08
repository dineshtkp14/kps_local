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
        Schema::create('sales', function (Blueprint $table) {
          
            $table->increments('id');
            $table->integer('items_id');
            $table->string('items');
            $table->integer('quantity');
            $table->float('rate',12,2);
            $table->float('amount',12,2);
            $table->float('discount',12,2);
            $table->float('total_amt');
          
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
        Schema::dropIfExists('sales');
    }
};
