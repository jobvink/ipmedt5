@extends('layouts.app')

@section('tabel')
    <div class="container">

        <a class="btn btn-default" href="/rack/index" role="button">Terug naar index</a>

        <h2>Rack beschrijving: {{$rack->description}}</h2>
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>Article names:</th>
                <th>Article id:</th>
                <th>In stock:</th>
                <th>Description:</th>
                <th>Barcode:</th>
                <th>Aantal:</th>
            </tr>
            </thead>
            <tbody>
            @foreach($products as $product)
            <tr>
                <td>{{$product->article->name}}</td>
                <td>{{$product->article->id}}</td>
                <td>{{$product->stock}}</td>
                <td>{{$product->article->description}}</td>
                <td>{{$product->id}}</td>
                <td>{{$product->pivot->count}}</td>
            </tr>
                @endforeach
            </tbody>
        </table>
        <ul class="list-inline">
            <li>
                <div class="list-group">
                    <a class="btn btn-primary" href="/rack/{{$rack->id}}/edit" role="button">Aanpassen</a>
                </div>
            </li>
            <li>
                <form class="list-group" method="POST" action="/rack/{{$rack->id}}">
                    {{method_field("DELETE")}}
                    {{csrf_field()}}
                    <button class="btn btn-danger" type="submit">Verwijderen</button>
                </form>
            </li>
        </ul>
    </div>
@endsection