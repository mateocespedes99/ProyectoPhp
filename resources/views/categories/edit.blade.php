@extends('layouts.master')

@section('content')
    <h1>Editar Categoría</h1>

    <form method="POST" action="{{ route('categories.update', ['category' => $category->id]) }}">
        @csrf
        @method('PUT')
        <div>
            <label for="name">Nombre</label>
            <input type="text" name="name" id="name" value="{{ $category->name }}" required>
        </div>
        <div>
            <label for="description">Descripción</label>
            <textarea name="description" id="description" required>{{ $category->description }}</textarea>
        </div>
        <div>
            <label for="slug">Slug</label>
            <input type="text" name="slug" id="slug" value="{{ $category->slug }}" required>
        </div>
        <div>
            <button type="submit">Guardar</button>
        </div>
    </form>
@endsection
