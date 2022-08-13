<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableCategorias extends Migration
{
    
    public function up()
    {
        Schema::create('categorias', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('imovel_id');
            $table->string('nome');
            $table->string('descricao');
            $table->string('slug');
            $table->timestamps();

            $table->foreign('imovel_id')->references('id')->on('imoveis');
        });
    }

}
