<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('inventories', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('stock_id')->index();
            $table->unsignedBigInteger('supplier_id')->index();
            $table->integer('quantity')->default(1);
            $table->string('supplier_product_code')->nullable()->index();
            $table->string('price')->nullable();
            $table->dateTime('imported_date');
            $table->dateTime('expired_date');
            $table->timestamps();

            $table->foreign('stock_id')
                ->references('id')
                ->on('stocks');

            $table->foreign('supplier_id')
                ->references('id')
                ->on('suppliers');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('inventories');
    }
};
