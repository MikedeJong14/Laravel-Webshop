@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <h1>Orders</h1>
                    <p>view your orders here</p>
                    <table class="table table-striped">
                        <tr>
                            <th>Order ID</th>
                            <th>Product IDs</th>
                            <th>User ID</th>
                        </tr>
                        @foreach($orders as $order)
                            <tr>
                                <th>{{$order->id}}</th>
                                <th>
                                    @foreach(unserialize($order->products_data) as $product)
                                        <p>{{$product['id']}} ({{$product['amount']}}x)</p>
                                    @endforeach
                                </th>
                                <th>{{$order->user_id}}</th>
                            </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
