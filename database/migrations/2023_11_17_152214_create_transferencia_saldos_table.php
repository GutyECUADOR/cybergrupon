<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTransferenciaSaldosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transferencia_saldos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_envio');
            $table->foreign('user_envio')->references('id')->on('users');
            $table->unsignedBigInteger('user_recibe');
            $table->foreign('user_recibe')->references('id')->on('users');
            $table->decimal('valor');
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
        Schema::dropIfExists('transferencia_saldos');
    }
}
