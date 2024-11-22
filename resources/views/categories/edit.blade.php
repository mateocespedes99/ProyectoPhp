@extends('layouts.master')

@section('content')
    <h1>Editar Categoría</h1>

    <form method="POST" action="{{ route('categories.update', ['category' => $category->id]) }}">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ old('name', $category->name) }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Descripción</label>
            <textarea class="form-control" id="description" name="description" rows="3" required>{{ old('description', $category->description) }}</textarea>
        </div>

        <!-- Dropdown para seleccionar la categoría padre -->
        <div class="mb-3">
            <label for="parent_id" class="form-label">Categoría Padre</label>
            <select class="form-select" id="parent_id" name="parent_id">
                <option value="">Sin Categoría Padre</option>
                @foreach ($categories as $cat)
                    <option value="{{ $cat->id }}" {{ $category->parent_id == $cat->id ? 'selected' : '' }}>{{ $cat->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Guardar</button>
    </form>
@endsection
