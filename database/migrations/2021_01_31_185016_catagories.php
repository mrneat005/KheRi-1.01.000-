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
            $table->text('discription');
            $table->string('url');
            $table->float('discount')->default(0);
            $table->string('meta_title');
            $table->string('meta_discription');
            $table->string('meta_keyword');
            $table->string('status');
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
