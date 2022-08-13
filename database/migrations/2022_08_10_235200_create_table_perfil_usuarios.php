<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTablePerfilUsuarios extends Migration
{
    public function up()
    {
        Schema::create('fotos_perfil_usuarios', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('user_id');
            $table->string('sobre')->nullable(true);
            $table->string('redes_sociais')->nullable(true);
            $table->string('telefone');
            $table->string('celular');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
        });
    }
}
