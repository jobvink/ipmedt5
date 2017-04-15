@extends('layouts.app')

@section('content')
    <h2>Voeg een product toe:</h2>
    <br>
<form method="POST" action="/article/{{$article->id}}/products/store">
    {{ csrf_field() }}
    <div class="form-group">
        <div class="form-group">
        <label hidden for="article_id" >Atriclenummer:</label>
        <input hidden type="number" value="{{$article->id}}" id="article_id" name="article_id">
        </div>
        <div class="form-group">
        <label for="id" >Barcode:</label>
        <input placeholder="Barcode" class="form-control" id="id" name="id">
        </div>
        <label for="size" >Maat:</label>
        <div class="form-group">
        <select class="form-control" id="size" name="size">
        @foreach($sizes as $size)
                <option>{{$size}}</option>
        @endforeach
        </select>
        </div>

        <label for="article_id" >Aantal op voorraad:</label>
        <input type="number" min="0" placeholder="Voorraad" class="form-control" id="stock" name="stock">
    </div>

    @include('includes.errors')

    <button type="submit" class="btn btn-default">Voeg product toe</button>
</form>
@endsection