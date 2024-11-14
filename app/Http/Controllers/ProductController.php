<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index () {
        return view ('products.index');
    }

    public function create() {
        return 'This is the form to create a product FROM CONTROLLER';
    }

    public function store() {
        //
    }

    public function show ($product) {
        return view ('products.show');
    }
    public function edit ($product) {
        return "Showing product with the form to edit the product with id {$product}";
    }
    public function update ($product) {
        //
    }
    public function destroy($product) {
        //
    }

}//usar comillas dobles para que php permita la interpolación, con comilla simple trata todo como texto literalmente
