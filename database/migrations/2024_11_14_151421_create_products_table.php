<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('description', 1000);//maximo 1000 caracteres. si no se pusiera nada por defecto son 250
            $table->float('price')->unsigned();//unsigned para solo aceptar numeros positivos
            $table->integer('stock')->unsigned();
            $table->string('status')->default('unavailable');//se asume que un produto no está disponible
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
