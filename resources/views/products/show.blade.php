@extends('layouts.master')

@section('content')

    <h1>{{$product->title}}({{$product->id}})</h1>
    <p>{{$product->description}}</p>
    <p>{{$product->price}}</p>
    <p>{{$product->stock}}</p>
    <p>{{$product->status}}</p>

@endsection


<!-- para que blade interprete que quiero referirme a esas vbles lo hago como interpolación usando {{}} -->
