@extends('layouts.app')

@section('content')
    <h2>Voeg een product toe:</h2>
    <br>
    <form method="POST" action="/article/{{$product->article_id}}/products/{{$product->id}}">
        {{ csrf_field() }}
        {{method_field('PATCH')}}
        <div class="form-group">
            <div class="form-group">
                <label for="article_id" >Atriclenummer:</label>
                <input type="number" value="{{$product->article_id}}" class="form-control" id="article_id" name="article_id">
            </div>
            <div class="form-group">
                <label for="id" >Barcode:</label>
                <input min="0" max="9999999999999" value="{{$product->id}}"  class="form-control" id="id" name="id">
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
            <input type="number" min="0" value="{{$product->stock}}" class="form-control" id="stock" name="stock">
        </div>
        @include('includes.errors')
        <button type="submit" class="btn btn-default">Pas product aan</button>
    </form>
@endsection