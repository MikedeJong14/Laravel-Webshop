@extends('layouts.app')

@section('content')
    <a href="{{ url()->previous() }}" class="btn btn-outline-dark mb-3">Go back</a>
    <h1>{{$product->name}}</h1>
    <div style="white-space: pre-line">
        {{$product->description}}
        <hr>
        <h4>€{{$product->price}},-</h4>
    </div>
    {!! Form::open(['action' => ['CartController@addToCart', $product->id], 'method' => 'POST']) !!}
        <div class="form-group">
            {{Form::label('amount', 'Amount')}}
            {{Form::number('amount', 1, ['min' => "1", 'max' => "100"])}}
        </div>
        {{Form::hidden('previousUrl', url()->previous())}}
        {{Form::submit('Add to Cart', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection
