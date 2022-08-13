<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTableFotosImoveis extends Migration
{
    public function up()
    {
        Schema::create('fotos_imoveis', function (Blueprint $table) {
            $table->id();
            $table->string('foto');
            $table->boolean('id_thumb');
            $table->timestamps();
        });
    }
}
