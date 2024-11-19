{{-- resources/views/categories/index.blade.php --}}

@extends('layouts.app')

@section('content')
    <h1>Categorías</h1>
    <a href="{{ route('categories.create') }}">Crear Nueva Categoría</a>

    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Descripción</th>
                <th>Slug</th>
                <th>Productos</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($categories as $category)
                <tr>
                    <td>{{ $category->name }}</td>
                    <td>{{ $category->description }}</td>
                    <td>{{ $category->slug }}</td>
                    <td>{{ $category->products_count }}</td> {{-- Aquí mostramos el contador de productos --}}
                    <td>
                        <a href="{{ route('categories.edit', $category) }}">Editar</a>
                        <form action="{{ route('categories.destroy', $category) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit">Eliminar</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
