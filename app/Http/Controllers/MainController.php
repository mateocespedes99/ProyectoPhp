<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class MainController extends Controller
{
    public function index()
    {
        $categories = Category::with('products')->get();
        $uncategorizedProducts = Product::whereNull('category_id')->get();

        return view('main', [
            'categories' => $categories,
            'uncategorizedProducts' => $uncategorizedProducts,
        ]);
    }

}


// helpers
//config = ('aca se puede pasar un valor', 'aca si no se encuentra se puede pasar uno por defecto')
// dump and die -> dd(se le pasa una vble por ej que deseo saber que valor está tomando) me muestra que valor toma y detiene la ejecución del codigo
