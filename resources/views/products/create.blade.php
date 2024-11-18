@extends('layouts.master')

@section('content')

    <h1>Create a product</h1>
    <form method="POST" action="{{ route('products.store') }}">
    <!-- con route('products.store') el helper route recibe el nombre de la ruta especifica y resuelve la url -->
    @csrf
    <div class="form-row">
        <label>Title</label>
        <input class="form-control" type="text" name="title">
     </div>
     <div class="form-row">
        <label>Description</label>
        <input class="form-control" type="text" name="description">
     </div>
     <div class="form-row">
        <label>Price</label>
        <input class="form-control" type="number" min="1.00" name="price">
     </div>
     <div class="form-row">
        <label>Stock</label>
        <input class="form-control" type="number" name="stock">
     </div>
     <div class="form-row">
        <label>Status</label>
        <select class="custom-select" name="status">
            <option value="" selected>Select...</option>
            <option value="available">Available</option>
            <option value="unavailable">Unavaliable</option>
        </select>
        <div class="form-row">
            <button type="submit" class="btn btn-primary btn-lg">Create Product</button>
        </div>
    </div>

    </form>


@endsection


<!-- para que blade interprete que quiero referirme a esas vbles lo hago como interpolación usando {{}} -->
