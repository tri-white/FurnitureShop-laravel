<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('order_items', function (Blueprint $table) {
            $table->id(); // Auto-incremental primary key
            $table->unsignedBigInteger('order_id'); // Foreign key reference to the "orders" table
            $table->foreign('order_id')->references('id')->on('orders'); // Assuming the related table is named "orders"
            $table->unsignedBigInteger('product_id'); // Foreign key reference to the "products" table
            $table->integer('quantity'); // Quantity of the product in the order item
            $table->timestamps(); // Created_at and updated_at timestamps
        });
    }

    public function down()
    {
        Schema::dropIfExists('order_items');
    }
};
