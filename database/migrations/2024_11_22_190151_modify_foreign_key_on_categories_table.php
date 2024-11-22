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
        Schema::table('categories', function (Blueprint $table) {
            $table->dropForeign(['parent_id']); // Elimina la clave foránea actual
            $table->foreign('parent_id')
                ->references('id')->on('categories')
                ->onDelete('set null'); // Crea la clave foránea con la nueva regla
        });
    }

    public function down(): void
    {
        Schema::table('categories', function (Blueprint $table) {
            $table->dropForeign(['parent_id']); // Elimina la clave con regla set null
            $table->foreign('parent_id')
                ->references('id')->on('categories')
                ->onDelete('cascade'); // Vuelve al estado anterior
        });
    }
};
