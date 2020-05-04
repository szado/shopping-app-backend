<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class BaseTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('customers', function (Blueprint $blueprint) {
            $blueprint->id();
            $blueprint->text('nickname');
            $blueprint->text('first_name');
            $blueprint->text('last_name');
            $blueprint->timestamps();
        });

        Schema::table('categories', function (Blueprint $blueprint) {
            $blueprint->id();
            $blueprint->text('name');
        });

        Schema::create('products', function (Blueprint $blueprint) {
            $blueprint->id();
            $blueprint->foreignId('category_id')
                ->references('id')
                ->on('categories');
            $blueprint->foreignId('customer_id')
                ->references('id')
                ->on('customers');
            $blueprint->text('title');
            $blueprint->text('description');
            $blueprint->decimal('price', 1, 2);
            $blueprint->timestamps();
            $blueprint->index(['category_id', 'customer_id', 'title', 'description']);
        });

        Schema::table('shopping_cart', function (Blueprint $blueprint) {
            $blueprint->id();
            $blueprint->foreignId('customer_id')
                ->references('id')
                ->on('customers');
            $blueprint->foreignId('product_id')
                ->references('id')
                ->on('products');
            $blueprint->integer('quantity');
            $blueprint->index(['customer_id', 'product_id']);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('shopping_cart');
        Schema::drop('products');
        Schema::drop('categories');
        Schema::drop('customers');
    }
}
