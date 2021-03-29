<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class VendorMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //

        Schema::create('vendors', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('shop_number')->default(0);
            $table->string('shop_name');
            $table->string('Address')->nullable();
            $table->string('Location')->nullable();
            $table->text('discription')->nullable();
            $table->string('plan')->nullable();
            $table->string('main_photo')->nullable();
            $table->string('Second_photo')->nullable();
            $table->string('Third_photo')->nullable();
            $table->string('cnic_front')->nullable();
            $table->string('cnic_back')->nullable();
            $table->string('shop_reg_doc_photo')->nullable();
            $table->string('slogan')->nullable();
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
