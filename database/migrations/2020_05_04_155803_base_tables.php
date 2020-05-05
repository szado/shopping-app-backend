<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class BaseTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('customers', function (Blueprint $blueprint) {
            $blueprint->id();
            $blueprint->text('nickname');
            $blueprint->text('first_name');
            $blueprint->text('last_name');
            $blueprint->timestamps();
        });

        Schema::create('categories', function (Blueprint $blueprint) {
            $blueprint->id();
            $blueprint->text('name');
        });

        Schema::create('offers', function (Blueprint $blueprint) {
            $blueprint->id();
            $blueprint->foreignId('category_id')
                ->references('id')
                ->on('categories');
            $blueprint->foreignId('customer_id')
                ->references('id')
                ->on('customers');
            $blueprint->text('title');
            $blueprint->text('description');
            $blueprint->decimal('price', 10, 2);
            $blueprint->timestamps();
            $blueprint->index(['category_id', 'customer_id']);
        });

        Schema::create('shopping_cart', function (Blueprint $blueprint) {
            $blueprint->id();
            $blueprint->foreignId('customer_id')
                ->references('id')
                ->on('customers');
            $blueprint->foreignId('product_id')
                ->references('id')
                ->on('offers');
            $blueprint->integer('quantity');
            $blueprint->index(['customer_id', 'product_id']);
        });

        // create fulltext indexes
        // laravel cannot handle them in eloquent
        DB::statement('ALTER TABLE `offers` ADD FULLTEXT full(`title`, `description`)');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shopping_cart');
        Schema::dropIfExists('offers');
        Schema::dropIfExists('categories');
        Schema::dropIfExists('customers');
    }
}
