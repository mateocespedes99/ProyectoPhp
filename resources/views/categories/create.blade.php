{{-- resources/views/categories/create.blade.php --}}
@extends('layouts.app')

@section('content')
    <h1>Crear Categoría</h1>

    <form action="{{ route('categories.store') }}" method="POST">
        @csrf
        <div>
            <label for="name">Nombre</label>
            <input type="text" name="name" id="name" required>
        </div>
        <div>
            <label for="description">Descripción</label>
            <textarea name="description" id="description" required></textarea>
        </div>
        <div>
            <label for="slug">Slug</label>
            <input type="text" name="slug" id="slug" required>
        </div>
        <div>
            <button type="submit">Guardar</button>
        </div>
    </form>
@endsection
