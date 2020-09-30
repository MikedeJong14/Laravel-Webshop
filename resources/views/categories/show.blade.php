@extends('layouts.app')

@section('content')
    <a href="/categories" class="btn btn-outline-dark mb-3">Go back</a>
    <h1>{{$category->name}}</h1>
    <div style="white-space: pre-line">

    </div>
    @foreach($category->products as $product)
        <h1><a href="/products/{{$product->id}}">{{$product->name}}</a></h1>
    @endforeach
@endsection
