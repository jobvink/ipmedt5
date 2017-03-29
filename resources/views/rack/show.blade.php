@extends('layouts.app')

@section('content')
    <ul>
    @foreach($products as $product)
        <li>{{$product->article->name}}</li>
    @endforeach
    </ul>
@endsection