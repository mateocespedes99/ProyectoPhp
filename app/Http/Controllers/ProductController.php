<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Product;


class ProductController extends Controller
{
    public function index () {

        // $products = DB::table('products')->get();
        // dd($products); //dd detiene la ejecución y me muestra el valor

        // LA vista es lo ultimo que se retorna porque sino no me muestra lo demás

        return view ('products.index')->with(['products' => Product::all()
        ]);  //usando modelos, tambien se puede hacer la asignacion de la vble de esta forma

    }

    public function create() {
        return view('products.create');

    }

    public function store() {
        // $product = Product::create([
        //     'title'=> request()->title, //helper que sirve para acceder a la información de esa petición
        //     'description'=> request()->description,
        //     'price'=> request()->price,
        //     'stock'=> request()->stock,
        //     'status'=> request()->status,
        // ]);

        $rules = [
            'title' => ['required', 'max:255'],
            'description' => ['required', 'max:1000'],
            'price' => ['required', 'min:1'],
            'stock' => ['required', 'min:0'],
            'status' => ['required', 'in:available,unavailable'],
        ];

        request()->validate($rules);

        if (request()->status == 'available' && request()->stock == 0){
            ////put agrega el mensaje de error a la session pero lo deja ahí, es poco util
            //session()->put('error', 'If available must have stock');
            ////flash solo establece el valor en la session, si me muevo, refresco, voy a otro lado, el elemento desaparece
            session()->flash('error', 'If available must have stock');

            return redirect()->back();
        }

        $product = Product::create(request()->all()); //aun asi apunte a todos solo va a tener en cuenta los que haya definido en el fillable

        // return redirect()->back(); ////retorna a la ubicación anterior
        // return redirect()->action([MainController::class, 'index']); ////retorna la vista al metodo del controlador
        return redirect()->route('products.index'); //retorna la vista a una ruta especifica
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
            'product' => Product::findOrFail($product), //mirar si si existen
        ]);

    }
    public function update ($product) {

        $rules = [
            'title' => ['required', 'max:255'],
            'description' => ['required', 'max:1000'],
            'price' => ['required', 'min:1'],
            'stock' => ['required', 'min:0'],
            'status' => ['required', 'in:available,unavailable'],
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
