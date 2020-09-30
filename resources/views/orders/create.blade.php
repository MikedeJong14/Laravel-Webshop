@extends('layouts.app')

@section('content')
    <a href="{{ url()->previous() }}" class="btn btn-outline-dark mb-3">Go back</a>
    <h1>Make an order</h1>
    <p>Are you sure you want to make an order?</p>
    <a href="/orders/store" class="btn btn-primary">Yes</a>
@endsection
