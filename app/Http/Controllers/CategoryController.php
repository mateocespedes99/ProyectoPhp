<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Category;
use Illuminate\Support\Str;


class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::withCount('products')->get(); // Esto carga todas las categorías y cuenta los productos por cada una
        return view('categories.index', compact('categories'));
    }




    public function store() {

        $rules = [
            'name' => ['required', 'max:255'],
            'description' => ['required', 'max:1000'],
            'parent_id' => ['nullable', 'exists:categories,id'], // Validar que la categoría padre exista
        ];

        request()->validate($rules);

        // Generar el slug a partir del nombre de la categoría
        $slug = Str::slug(request('name'));


        $category = Category::create([
            'name' => request('name'),
            'description' => request('description'),
            'parent_id' => request('parent_id'),
            'slug' => $slug, // Aquí se asigna el slug
        ]);
        // return redirect()->back(); ////retorna a la ubicación anterior
        // return redirect()->action([MainController::class, 'index']); ////retorna la vista al metodo del controlador
        return redirect()->route('categories.index'); //retorna la vista a una ruta especifica
    }





    public function create()
    {
        $categories = Category::all(); // Trae todas las categorías para el selector
        return view('categories.create', compact('categories'));//pasa la vble $categories a la vista
    }






    public function show ($category) {

        $category = Category::findOrFail($category);

        return view ('categories.show')->with([
            'category' => $category,  //al retornar la vista se asigna a 'product' el valor de $product. y'product se puede usar para mostrar en el html
        ]);
    }





    public function edit($category)
    {
    $category = Category::findOrFail($category);
    $categories = Category::all(); // Obtener todas las categorías para el dropdown
    return view('categories.edit', compact('category', 'categories'));
    }


    // public function edit(Category $category)
    // {
    //     return view('categories.edit', compact('category'));
    // }


    public function update(Request $request, $category)
    {
    $rules = [
        'name' => ['required', 'max:255'],
        'description' => ['required', 'max:1000'],
        'parent_id' => ['nullable', 'exists:categories,id'], // Validar que la categoría padre exista
    ];

    $request->validate($rules);

    $category = Category::findOrFail($category);
    $category->update($request->all());

    return redirect()->route('categories.index');
    }


    // public function update(Request $request, Category $category)
    // {
    //     $request->validate([
    //         'name' => 'required|string|max:255',
    //         'description' => 'required|string',
    //         'slug' => 'required|string|max:255',
    //     ]);

    //     $category->update($request->all());

    //     return redirect()->route('categories.index');
    // }


    public function destroy($category) {
        $category = Category::findOrFail($category); //mirar si si existen

        $category->delete();//update recibe toda la info necesario para actualizar

        return redirect()->route('categories.index');
    }

    // public function destroy(Category $category)
    // {
    //     $category->delete();

    //     return redirect()->route('categories.index');
    // }
}
