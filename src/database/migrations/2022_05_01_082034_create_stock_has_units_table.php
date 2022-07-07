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
        Schema::create('stock_has_units', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('stock_id')->index();
            $table->unsignedBigInteger('unit_id')->index();
            $table->string('price')->index();
            $table->integer('quantity');
            $table->timestamps();

            $table->foreign('stock_id')
                ->references('id')
                ->on('stocks');

            $table->foreign('unit_id')
                ->references('id')
                ->on('units');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('stock_has_units');
    }
};
