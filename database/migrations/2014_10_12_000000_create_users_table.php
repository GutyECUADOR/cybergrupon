<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->integer('location')->nullable();
            $table->integer('id_usuario_location')->nullable();
            $table->string('nickname')->unique();
            $table->string('nickname_promoter');
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->string('role')->default('USER_ROLE');
            $table->string('phone');
            $table->string('avatar')->default('default.png');
            $table->string('link_publicidad')->nullable();
            $table->string('link_redireccion')->nullable();
            $table->string('link_publicidad2')->nullable();
            $table->string('link_redireccion2')->nullable();
            $table->string('link_publicidad3')->nullable();
            $table->string('link_redireccion3')->nullable();
            $table->string('link_publicidad4')->nullable();
            $table->string('link_redireccion4')->nullable();
            $table->string('link_publicidad5')->nullable();
            $table->string('link_redireccion5')->nullable();

            $table->string('link_publicidadVIP')->nullable();
            $table->string('link_redireccionVIP')->nullable();
            $table->string('link_publicidadVIP2')->nullable();
            $table->string('link_redireccionVIP2')->nullable();
            $table->string('link_publicidadVIP3')->nullable();
            $table->string('link_redireccionVIP3')->nullable();
            $table->string('link_publicidadVIP4')->nullable();
            $table->string('link_redireccionVIP4')->nullable();
            $table->string('link_publicidadVIP5')->nullable();
            $table->string('link_redireccionVIP5')->nullable();
            $table->boolean('is_payed')->default(false);
            $table->string('imagen_recibo')->nullable();
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
        Schema::dropIfExists('users');
    }
}
