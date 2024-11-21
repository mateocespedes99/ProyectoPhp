<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;
use App\Models\Category;


class ProductController extends Controller
{
    public function index () {

        // $products = DB::table('products')->get();
        // dd($products); //dd detiene la ejecución y me muestra el valor

        // LA vista es lo ultimo que se retorna porque sino no me muestra lo demás

        return view ('products.index')->with(['products' => Product::all()
        ]);  //usando modelos, tambien se puede hacer la asignacion de la vble de esta forma

    }

    public function create()
{
    $categories = Category::all();

    return view('products.create')->with([
        'categories' => $categories,
    ]);
}

    public function store(Request $request)
{
    // Validación de los datos
    $rules = [
        'title' => ['required', 'max:255'],
        'description' => ['required', 'max:1000'],
        'price' => ['required', 'min:1'],
        'stock' => ['required', 'min:0'],
        'status' => ['required', 'in:available,unavailable'],
        'category_id' => ['required', 'exists:categories,id'], // Asegurarse de que la categoría exista
    ];

    $validatedData = $request->validate($rules);

    // Validación adicional para el estado y stock
    if ($validatedData['status'] == 'available' && $validatedData['stock'] == 0) {
        session()->flash('error', 'If available, the product must have stock.');
        return redirect()->back();
    }

    // Crear el producto
    $product = Product::create($validatedData); // Utiliza los datos validados para crear el producto

    return redirect()->route('products.index'); // Redirigir a la lista de productos
}


    public function show ($product) {

        // $product = DB::table('products')->where('id', $product)-> first();
        //todo esto se puede hacer gracias a queryBuilder pero siempre es mejor utiizar modelos para hacer proyectos escalables
        //Busco en la tabla productos por id el prducto que es igual al id, y lo capturo con get, get me devuelve un array si quiero la info puedo usar first() para que retorna solo la informacion

        // $product = DB::table('products')->find($product);
        //Esto tambien se puede hacer y mas facil con find() o con, si no existe el id me retorna nulo. esto retorna el primer elemento que coincida y me ahorro el where y  el first
        // dd($product);
        //capturo y muestro con dd

        //usando modelos
        $product = Product::findOrFail($product);

        return view ('products.show')->with([
            'product' => $product,  //al retornar la vista se asigna a 'product' el valor de $product. y'product se puede usar para mostrar en el html
        ]);
    }
    public function edit ($product) {

        return view('products.edit')->with([
            'product' => Product::findOrFail($product), //producto a editar, busco si existe
            'categories' => Category::all(), //todas las categorias
        ]);

    }
    public function update ($product) {

        $rules = [
            'title' => ['required', 'max:255'],
            'description' => ['required', 'max:1000'],
            'price' => ['required', 'min:1'],
            'stock' => ['required', 'min:0'],
            'status' => ['required', 'in:available,unavailable'],
            'category_ id' => ['nullable', 'exists:categories,id']
        ];

        request()->validate($rules);

        $product = Product::findOrFail($product); //mirar si si existen

        $product->update(request()->all());//update recibe toda la info necesario para actualizar

        return redirect()->route('products.index');
    }

    public function destroy($product) {
        $product = Product::findOrFail($product); //mirar si si existen

        $product->delete();//update recibe toda la info necesario para actualizar

        return redirect()->route('products.index');
    }

}//usar comillas dobles para que php permita la interpolación, con comilla simple trata todo como texto literalmente
