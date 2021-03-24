<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Products extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('catagory_id')->default(0);
            $table->integer('section_id')->default(0);
            $table->string('name');
            $table->string('code')->nullable();
            $table->string('color')->nullable();
            $table->string('price')->nullable();
            $table->float('discount')->default(0);
            $table->string('weight')->nullable();
            $table->string('main_photo')->nullable();
            $table->string('side_photo')->nullable();
            $table->string('front_photo')->nullable();
            $table->string('size')->nullable();
            $table->string('stock')->nullable();
            $table->text('discription')->nullable();
            $table->string('url')->nullable();
            $table->enum('is_featured',['yes','no']);
            $table->string('meta_title')->nullable();
            $table->string('meta_discription')->nullable();
            $table->string('meta_keyword')->nullable();
            $table->string('status')->nullable();
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
        //
    }
}
