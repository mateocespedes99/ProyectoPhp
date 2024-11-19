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
        Schema::create('categories', function (Blueprint $table) {
            $table->id();
            $table->string('name'); // Nombre de la categoría
            $table->string('description'); // Descripción de la categoría
            $table->foreignId('parent_id')->nullable()->constrained('categories')->onDelete('cascade'); // Relación de subcategorías
            $table->string('slug'); //Un nombre amigable para URLs, como de administracion, como "ropa-de-hombre" para la categoría "Ropa de Hombre".
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('categories');
    }
};


// parent_id: Columna para almacenar el ID de la categoría principal (si la categoría tiene una).
// nullable(): Permite que la categoría no tenga categoría principal (si es una categoría de nivel superior).
// constrained('categories'): Define que parent_id hace referencia a la columna id de la tabla categories (relación de clave foránea).
// onDelete('cascade'): Elimina las subcategorías automáticamente si se elimina la categoría principal.

