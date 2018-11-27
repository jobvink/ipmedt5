@extends('layouts.app')

@section('articletable')

    <a class="btn btn-default" href="/article/index" role="button">Terug naar index</a>

    <div class="container">
        <h2>Productnaam: {{$product->name}}</h2>
        <h4>Article number: {{$product->article_id}}</h4>
        <h4>Maat: {{$product->size}}</h4>
        <h4>Aantal op voorraad: {{$product->stock}}</h4>
    </div>
    <footer style="height: 100px;"></footer>
@endsection

