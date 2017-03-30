@extends('layouts.app')

@section('tabel')
    <div class="container">
        <h2>Rack info</h2>
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>Article names:</th>
                <th>Article id:</th>
                <th>In stock:</th>
                <th>Description:</th>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
            <tr>
                <td>{{$product->article->name}}</td>
                <td>{{$product->article->id}}</td>
                <td>{{$product->stock}}</td>
                <td>{{$product->article->description}}</td>
            </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection