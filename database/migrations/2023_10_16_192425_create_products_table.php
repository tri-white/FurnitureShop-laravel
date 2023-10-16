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
        Schema::create('products', function (Blueprint $table) {
            $table->id(); // Auto-incremental primary key
            $table->string('name');
            $table->decimal('price', 10, 2); // Assuming a decimal data type for price with 10 total digits and 2 decimal places
            $table->unsignedBigInteger('category_id'); // Foreign key reference to the "Category" table
            $table->foreign('category_id')->references('id')->on('categories'); // Assuming the related table is named "categories"
            $table->string('photo'); // Path to the image file (you might want to use a longer string type if needed)
            $table->timestamps(); // Created_at and updated_at timestamps
        });
    }

    public function down()
    {
        Schema::dropIfExists('products');
    }
};
