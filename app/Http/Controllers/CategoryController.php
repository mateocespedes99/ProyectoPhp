<?php

namespace App\Http\Controllers;

use App\Http\Requests\Category\StoreRequest;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::withCount('products')->get(); // Esto carga todas las categorías y cuenta los productos por cada una
        return view(
            'categories.index',
            ["categories"=> $categories], 
            ['nombre'=> 'Diego 8a'] 
        );
    }

    public function store(StoreRequest $request)
    {
        Category::create($request->all());
        
        return redirect()->route('categories.index');
    }

    public function create()
    {
        $categories = Category::all(); // Trae todas las categorías para el selector
        return view('categories.create', compact('categories'));//pasa la vble $categories a la vista
    }

    public function show (Category $category)
    {
        return view('categories.show')->with([
            'category' => $category,  //al retornar la vista se asigna a 'product' el valor de $product. y'product se puede usar para mostrar en el html
        ]);
    }

    public function edit($category)
    {
        $category = Category::findOrFail($category);
        $categories = Category::all(); // Obtener todas las categorías para el dropdown
        return view('categories.edit', compact('category', 'categories'));
    }

    public function update(Request $request, Category $category)
    {
        $rules = [
            'name' => ['required', 'max:255'],
            'description' => ['required', 'max:1000'],
            'parent_id' => ['nullable', 'exists:categories,id'], // Validar que la categoría padre exista
        ];

        $request->validate($rules);

        $category->update($request->all());

        return redirect()->route('categories.index');
    }

    public function destroy(Category $category)
    {
        $category->delete();
        return redirect()->route('categories.index');
    }
}
