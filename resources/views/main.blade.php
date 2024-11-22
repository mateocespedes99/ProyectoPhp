@extends('layouts.master')

@section('content')

<div class="container mt-4">
    <h1 class="text-center mb-4">Menú Principal</h1>

    <nav class="mb-4">
        <ul class="nav nav-pills justify-content-center">
            <li class="nav-item">
                <a class="nav-link active" href="{{ route('products.index') }}">Productos</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('categories.index') }}">Categorías</a>
            </li>
        </ul>
    </nav>

    <h2>Categorías</h2>
    <ul class="list-group mb-4">
        @foreach($categories as $category)
        <li class="list-group-item">
            <details>
                <summary>{{ $category->name }}</summary>
                <ul class="list-group list-group-flush">
                    @forelse($category->products as $product)
                    <li class="list-group-item">{{ $product->title }}</li>
                    @empty
                    <li class="list-group-item">Sin productos</li>
                    @endforelse
                </ul>
            </details>
        </li>
        @endforeach
    </ul>

    <h2>Productos sin Categoría</h2>
    <details>
        <summary>Ver productos</summary>
        <ul class="list-group">
            @forelse($uncategorizedProducts as $product)
            <li class="list-group-item">{{ $product->title }}</li>
            @empty
            <li class="list-group-item">No hay productos sin categoría</li>
            @endforelse
        </ul>
    </details>
</div>

@endsection
