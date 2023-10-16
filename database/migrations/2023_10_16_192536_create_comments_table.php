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
        Schema::create('comments', function (Blueprint $table) {
            $table->id(); // Auto-incremental primary key
            $table->unsignedBigInteger('user_id'); // Foreign key reference to the "users" table
            $table->foreign('user_id')->references('id')->on('users'); // Assuming the related table is named "users"
            $table->unsignedBigInteger('product_id'); // Foreign key reference to the "products" table
            $table->foreign('product_id')->references('id')->on('products'); // Assuming the related table is named "products"
            $table->text('text'); // Text of the comment
            $table->timestamps(); // Created_at and updated_at timestamps
        });
    }

    public function down()
    {
        Schema::dropIfExists('comments');
    }
};
