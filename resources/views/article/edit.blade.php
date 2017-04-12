@extends('layouts.app')

@section('content')
    <h2>Voeg een product toe:</h2>
    <br>
    <form method="POST" action="/article/{{$article->id}}">
        {{method_field('PATCH')}}
        {{ csrf_field() }}
        <div class="form-group">
            <label for="id">Atriclenummer:</label>
            <input type="number" min="0" value="{{$article->id}}" class="form-control col-4" id="id">
        </div>
        <div class="form-group">
            <label for="name">Productnaam:</label>
            <input type="text" class="form-control" id="name" value="{{$article->name}}" name="name">
        </div>
        <div class="form-group">
            <label for="description">Beschrijving:</label>
            <input type="text" class="form-control" id="description" value="{{$article->description}}" name="description">
        </div>
        <br>
        <button type="submit" class="btn btn-default">Pas het product aan</button>
    </form>
    <footer style="height: 100px;"></footer>

@endsection