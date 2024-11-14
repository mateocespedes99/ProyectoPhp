<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\MainController;

Route::get('/', [MainController::class, 'index'])->name('main');

Route::get('products', [ProductController::class, 'index'])->name('products.index'); // el mensaje lo estoy retornando en el controlador, llamo la funcion del controlador con el ProductController@index--> funciona solo en laravel 7 hacia abajo
 //para laravel 7 hacia arriba se usa --> Route::get('/', [NameController::class, 'helo']); se manda en un arreglo la primera posicion es el espacio de nombre del controlador y la segunda es el nombre de la acción dentro del controlador (o nombre de la funcion en este caso) el '/' se refiere a la carpeta raiz, en este caso public

//por ejemplo antes estaban así:
// Route::get('products/create', function () {
//     return 'This is the form to create a product';
// })->name('products.create');

Route::get('products/create', [ProductController::class, 'create'])->name('products.create');

Route::post('products',[ProductController::class, 'store'])->name('products.store');

// Route::get('products/{product}', function ($product) {// puede ser un string, un id, etc
//     return "Showing product with id {$product}"; //se usa un parametro (parametro en la ruta) el parametro es obligatorio
// })->name('products.show'); //como lo pido php me lo permite mandar

Route::get('products/{product}',[ProductController::class, 'show'])->name('products.show');

Route::get('products/{product}/edit',[ProductController::class, 'edit'])->name('products.edit');

Route::match(['put', 'patch'], 'products/{product}', [ProductController::class, 'update'])->name('products.update');

Route::delete('products/{product}/edit', [ProductController::class, 'destroy'])->name('products.destroy');
