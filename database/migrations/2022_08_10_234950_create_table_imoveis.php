<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableImoveis extends Migration
{
    
    public function up()
    {
        Schema::create('imoveis', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id');
            $table->string('descricao');
            $table->string('conteudo');
            $table->float('preco',10,2);
            $table->integer('banheiro');
            $table->integer('quarto');
            $table->integer('area_propriedade');
            $table->integer('total_area_propriedade');
            $table->string('slug');
            $table->timestamps();

            $table->foreign('user_id')->references('id')->on('users');
        });
    }

}
