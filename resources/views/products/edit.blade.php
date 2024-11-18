@extends('layouts.master')

@section('content')

    <h1>Edit a product</h1>
    <form method="POST" action="{{ route('products.update', ['product' => $product->id]) }}">
    <!-- con route('products.update') el helper route recibe el nombre de la ruta especifica y resuelve la url
     tambien debo indicar el id del producto, y cual es el producto(que pase como parametro en la ruta en web.php)-->

    <!-- token de csrrs -->
    @csrf

    <!-- los navegadores solo soportan peticiones de tipo get o post, para hacer patch se hace lo siguiente: -->

    @method('PUT')
    <div class="form-row">
        <label>Title</label>
        <input class="form-control" type="text" name="title" value="{{ $product->title }}">
     </div>
     <div class="form-row">
        <label>Description</label>
        <input class="form-control" type="text" name="description" value="{{ $product->description }}" >
     </div>
     <div class="form-row">
        <label>Price</label>
        <input class="form-control" type="number" min="1.00" name="price" value="{{ $product->price }}" >
     </div>
     <div class="form-row">
        <label>Stock</label>
        <input class="form-control" type="number" name="stock" value="{{ $product->stock }}">
     </div>
     <div class="form-row">
        <label>Status</label>

        <select class="custom-select" name="status" required>
            <option {{ trim($product -> status) === 'avaliable' ? 'selected' : ' ' }}
                value ="available">available</option>
            <option {{ trim($product -> status) === 'unavaliable' ? 'selected' : ' ' }}
                value="unavailable">unavaliable</option>
            <!-- si el estado actual del producto coincide con available, si si es selected, sino se pone algo vacio para indicar la condicion final -->

        </select>
        <div class="form-row">
            <button type="submit" class="btn btn-primary btn-lg">Edit Product</button>
        </div>
    </div>

    </form>



@endsection


<!-- para que blade interprete que quiero referirme a esas vbles lo hago como interpolación usando {{}} -->
