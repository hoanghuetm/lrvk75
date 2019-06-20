<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->bigIncrements('id');
            $table->string('name')->nullable();
            $table->string('product_code',50)->nullable();
            $table->bigInteger('category_id')->nullable();
            $table->decimal('price', 24, 0)->nullable()->default(0);
            $table->boolean('id_highlight')->nullable();
            $table->string('avatar')->nullable();
            $table->string('description')->nullable();
            $table->integer('quantity')->unsigned()->nullable()->default(0);
            $table->text('detail')->nullable();
            $table->bigInteger('created_by');
            $table->bigInteger('updated_by');
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
        Schema::dropIfExists('products');
    }
}
