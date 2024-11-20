@extends('layouts.master')

@section('content')

    <h1>{{$category->name}}({{$category->id}})</h1>
    <p>{{$category->description}}</p>
    <p>{{$category->slug}}</p>


@endsection

<!-- para que blade interprete que quiero referirme a esas vbles lo hago como interpolación usando {{}} -->
