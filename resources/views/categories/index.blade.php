@extends('layouts.master')

@section('content')

    <h1>List of Categories</h1>

    <a class="btn btn-success" href="{{ route('categories.create')}}">Create</a>

    @if(empty($categories))
        <div class="alert alert-warning">
            The list of categories is empty.
        </div>
    @else
    <div class="table-responsive">
        <table class="table table-striped">
            <thead class="thead-light">
                <tr>
                    <th>Id</th>
                    <th>Name</th>
                    <th>Description</th>
                    <th>Parent Category</th>
                    <th>Slug</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categories as $category)
                    <tr>
                        <td>{{ $category->id }}</td>
                        <td>{{ $category->name }}</td>
                        <td>{{ $category->description }}</td>
                        <td>
                            @if ($category->parent)
                                {{ $category->parent->name }} <!-- Acceder de forma segura a la propiedad 'name' de parent -->
                            @else
                                No Parent
                            @endif
                        </td>

                        <td>{{ $category->slug }}</td>
                        <td>
                            <a class="btn btn-link" href="{{ route('categories.show', ['category' => $category->id]) }}">Show</a>
                            <a class="btn btn-success" href="{{ route('categories.edit', ['category' => $category->id]) }}">Edit</a>

                            <!-- Formulario de eliminación -->
                            <form method="POST" action="{{ route('categories.destroy', ['category' => $category->id]) }}" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-link">Delete</button>
                            </form>

                            <!-- Si la categoría tiene subcategorías, las mostramos con un enlace de expansión -->
                            @if ($category->children->isNotEmpty())
                                <ul>
                                    @foreach ($category->children as $child)
                                        <li>
                                            {{ $child->name }}
                                            <a href="{{ route('categories.edit', ['category' => $child->id]) }}" class="btn btn-link btn-sm">Edit</a>
                                        </li>
                                    @endforeach
                                </ul>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    @endif

@endsection
