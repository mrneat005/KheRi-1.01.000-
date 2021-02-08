<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Catagories extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('catagories', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('parent_id')->default(0);
            $table->integer('section_id')->default(0);
            $table->string('name');
            $table->string('photo')->default('profile.png');
            $table->text('discription')->nullable();
            $table->string('url')->nullable();
            $table->float('discount')->default(0);
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
