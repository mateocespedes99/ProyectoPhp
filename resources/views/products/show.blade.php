@extends('layouts.master')

@section('content')


@foreach ($products as $product)
    <tr>
        <td>{{ $product->title }}</td>
        <td>{{ $product->category->name }}</td> {{-- Aquí mostramos el nombre de la categoría --}}
        <td>{{$product->description}}</td>
        <td>{{ $product->price }}</td>
        <td>{{ $product->stock }}</td>
        <td>{{ $product->status }}</td>
    </tr>
@endforeach


    <h1>{{$product->title}}({{$product->id}})</h1>
    <p>{{$product->description}}</p>
    <p>{{$product->price}}</p>
    <p>{{$product->stock}}</p>
    <p>{{$product->status}}</p>

@endsection


<!-- para que blade interprete que quiero referirme a esas vbles lo hago como interpolación usando {{}} -->
