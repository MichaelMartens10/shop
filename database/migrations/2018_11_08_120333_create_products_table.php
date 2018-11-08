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
            $table->increments('id');
            $table->string('title');

            /*Insert image to db*/
            //https://laravel.io/forum/02-17-2014-how-do-you-save-image-to-database-and-display-it-on-website
            $table->text('image')->nullable()->default(NULL);
            $table->text('imageType')->nullable()->default(NULL);

            $table->mediumText('description');
            $table->integer('price');
            $table->text('type');
            $table->integer('stock');
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
