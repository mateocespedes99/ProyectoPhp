<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */

    // el codigo abajo agrega una columna category_id a la tabla products, la cual actuará como una clave foránea que hace referencia
    // a la columna id de la tabla categories. Además, establece que si una categoría es eliminada, todas las filas en products que
    // hacen referencia a esa categoría también se eliminarán automáticamente gracias al onDelete('cascade').
    public function up(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->foreignId('category_id')->constrained()->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */

    // el codigo abajo => la función down() revierte los cambios realizados en la migración up(). Primero, elimina la restricción de clave
    // foránea en la columna category_id (que estaba referenciando la tabla categories), y luego elimina la propia columna category_id de la
    // tabla products. Esto asegura que si se ejecuta la migración en reversa, la tabla products volverá a su estado anterior sin la columna
    // de la relación con categorías.
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropForeign(['category_id']);
            $table->dropColumn('category_id');
        });
    }
};
