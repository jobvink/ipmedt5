@extends('layouts.app')

@section('articletable')
    <div class="container">
        <h2>Productnaam: {{$article->name}}</h2>
        <h4>Article number: {{$article->id}}</h4>
        <h4>Article description: {{$article->description}}</h4>
        <table class="table table-striped table-bordered table-hover">
            <thead>
            <tr>
                <th>Barcode:</th>
                <th>In stock:</th>
                <th>Size:</th>
            </tr>
            </thead>
            <tbody>
            @foreach($article->products as $product)
                <tr class='clickable-row' data-href='/article/edit/{{$article->id}}'>
                    <td>{{$product->id}}</td>
                    <td>{{$product->stock}}</td>
                    <td>{{$product->size}}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script>
            jQuery(document).ready(function($) {
                $(".clickable-row").click(function() {
                    window.location = $(this).data("href");
                });
            });
        </script>
    </div>
@endsection