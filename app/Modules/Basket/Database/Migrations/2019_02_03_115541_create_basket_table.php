<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBasketTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('baskets', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('order_id', false, true)->nullable()->default(null)->index()->unique()->comment('Пореден номер на поръчката');
            $table->mediumText('data')->nullable();
            $table->mediumText('saved_state')->nullable()->default(null);
            $table->string('session_id')->nullable()->default(null)->index();
            $table->float('shipping_price')->default(0);
            $table->string('status')->default('new');
            $table->dateTime('ordered_at')->nullable()->default(null)->index()->comment('Кога е завършена поръчката?');
            $table->timestamps();
        });

        Schema::create('basket_products', function (Blueprint $table) {
            $table->increments('id');

            $table->integer('basket_id')->unsigned()->index();
            $table->foreign('basket_id')->references('id')->on('baskets')->onDelete('cascade');

            $table->integer('product_id')->unsigned()->index();
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');

            $table->integer('product_option_id')->unsigned()->nullable()->index();
            $table->foreign('product_option_id')->references('id')->on('products_options')->onDelete('cascade');

            $table->smallInteger('quantity')->unsigned()->default(1);

            $table->unique([
                'basket_id',
                'product_id',
                'product_option_id'
            ], 'spo_unique');

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
        DB::statement('SET FOREIGN_KEY_CHECKS = 0');
        Schema::drop('baskets');
        Schema::drop('basket_products');
        DB::statement('SET FOREIGN_KEY_CHECKS = 1');
    }
}
