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
    Schema::table('products', function (Blueprint $table) {
        $table->dropForeign(['category_id']); // Elimina la clave foránea actual
        $table->foreign('category_id')
              ->references('id')->on('categories')
              ->onDelete('set null'); // Crea la clave foránea con la nueva regla
    });
}

public function down(): void
{
    Schema::table('products', function (Blueprint $table) {
        $table->dropForeign(['category_id']); // Elimina la clave con regla set null
        $table->foreign('category_id')
              ->references('id')->on('categories')
              ->onDelete('cascade'); // Vuelve al estado anterior
    });
}
};
