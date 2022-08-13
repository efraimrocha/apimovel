<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableImovelCategoria extends Migration
{
    public function up()
    {
        Schema::create('imovel_categoria', function (Blueprint $table) {
            $table->unsignedBigInteger('imovel_id');
            $table->unsignedBigInteger('categoria_id');

            $table->timestamps();

            $table->foreign('imovel_id')->references('id')->on('imoveis');
            $table->foreign('categoria_id')->references('id')->on('categorias');
        });
    }
}
