@extends('layouts.app')

@section('content')
    <h1>Categories</h1>
    @if(count($categories) > 0)
        @foreach($categories as $category)
            <div class="card card-body bg-light mb-1">
                <h3><a href="/categories/{{$category->id}}">{{$category->name}}</a></h3>
            </div>
        @endforeach
        {{-- {{$posts->links()}} --}}
    @else
        <p>No categories found</p>
    @endif
@endsection
