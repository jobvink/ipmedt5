@extends('layouts.app')

@section('content')

    <a class="btn btn-default" href="/article/index" role="button">Terug naar Index</a>

    <h2>Voeg een product toe:</h2>
    <br>
    <form method="POST" action="/article/{{$article->id}}">
        {{ method_field('PATCH') }}
        {{ csrf_field() }}
        <div class="form-group">
            <label for="id">Atriclenummer:</label>
            <input type="number" min="0" value="{{$article->id}}" class="form-control col-4" id="id" name="id">
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
        @include('includes.errors')
        <button type="submit" class="btn btn-default">Pas het article aan</button>
    </form>
    <footer style="height: 100px;"></footer>

@endsection