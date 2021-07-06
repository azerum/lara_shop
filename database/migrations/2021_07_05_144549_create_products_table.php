<?php

use App\Models\Subcategory;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title', 256);
            $table->text('description')->nullable();
            $table->unsignedInteger('price');
            $table->unsignedInteger('quantity')->default(0);

            $table->timestamps();

            $table->foreignIdFor(Subcategory::class, 'subcategory_id');

            $table->foreign('subcategory_id')
                ->references('id')
                ->on('subcategories');
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
}
