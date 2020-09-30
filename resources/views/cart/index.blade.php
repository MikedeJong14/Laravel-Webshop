@extends('layouts.app')

@section('content')
    <h1>Cart</h1>
    @if($cartData ?? '')
        @foreach($cartData as $product)
            <div class="card card-body bg-light mb-1">
                <a href="/cart/remove/{{$product->id}}" title="Remove item" class="btn btn-light far fa-times-circle fa-2x p-0" style="width: 34px; position: absolute; right: 18px;"></a>
                <h4>{{$product->name}} ({{$product->itemQty}}x)</h4>
                <h6>€{{$product->price}},-</h6>
                <div style="position: absolute; right: 100px; top: 16px;">
                    <a onclick="changeQty({{$product->id}}, 1)" class="btn btn-light fas fa-plus fa-2x p-0 mr-1 d-inline" style="width: 25px;"></a>
                    <h4 id="itemCounter{{$product->id}}" class="d-inline align-middle">{{$product->itemQty}}</h4>
                    <a onclick="changeQty({{$product->id}}, -1)" class="btn btn-light fas fa-minus fa-2x p-0 ml-1 d-inline" style="width: 25px;"></a>
                    {!! Form::open(['action' => ['CartController@updateItemQty', $product->id], 'method' => 'POST']) !!}
                        {{Form::hidden('amount', $product->itemQty, ['id' => 'form' . $product->id])}}
                        {{Form::submit('Update', ['class' => 'btn btn-secondary btn-sm', 'style' => 'margin: 5px 0 0 13px;'])}}
                    {!! Form::close() !!}
                </div>
            </div>
        @endforeach
        <hr>
        <h4>Totaal van cart: €{{$totalPrice}},-</h4>
    @else
        <p>No data found in cart</p>
    @endif
    <hr>
    @if($cartData ?? '')
        <a href="/orders/create" class="btn btn-primary">Make order</a>
    @else
        <a href="/" class="btn btn-primary disabled">Make order</a>
    @endif

    <a href="/cart/empty" class="btn btn-danger float-right">Empty cart</a>

    <script type="text/javascript" src="{{ URL::asset('js/javascript.js') }}"></script>
@endsection
