<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePayeerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payeers', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->text('Payer_id')->nullable();
            $table->text('Email')->nullable();
            $table->text('First_name')->nullable();
            $table->text('Last_name')->nullable();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payeers');
    }
}
