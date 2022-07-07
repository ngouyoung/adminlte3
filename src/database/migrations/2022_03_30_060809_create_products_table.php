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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('category_id')->nullable()->index();
            $table->unsignedBigInteger('currency_id')->nullable()->index();
            $table->unsignedBigInteger('slot_id')->nullable()->index();
            $table->unsignedBigInteger('create_uid')->nullable()->index();
            $table->string('name')->nullable();
            $table->string('code')->nullable();
            $table->string('image')->default('img/default_product.png');
            $table->integer('discount')->nullable();
            $table->text('description')->nullable();
            $table->boolean('status')->default(true);
            $table->timestamps();

            $table->foreign('category_id')
                ->references('id')
                ->on('categories');

            $table->foreign('currency_id')
                ->references('id')
                ->on('currencies');

            $table->foreign('slot_id')
                ->references('id')
                ->on('slots');

            $table->foreign('create_uid')
                ->references('id')
                ->on('users')
                ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('products');
    }
};
