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
        Schema::create('items', function (Blueprint $table) {
           
            $table->increments('id');
            $table->string('distributer_name');
            $table->string('billno');
            $table->string('batch');

           

            $table->string('items');
            $table->string('expiry_date');
            $table->integer('quantity');
            $table->float('rate',12,2);
            $table->float('total_amt',12,2);
            $table->float('mrp',12,2);
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
        Schema::dropIfExists('items');
    }
};
