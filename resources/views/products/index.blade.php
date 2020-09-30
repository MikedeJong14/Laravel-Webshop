@extends('layouts.app')

@section('content')
    <h1>Products</h1>
    @if(count($products) > 0)
        @foreach($products as $product)
            <div class="card card-body bg-light mb-1">
                <h3><a href="/products/{{$product->id}}">{{$product->name}}</a></h3>
            </div>
        @endforeach
    @else
        <p>No products found</p>
    @endif
@endsection
