@extends('layouts.app')

@section('content')

    <a class="btn btn-default" href="/article/index" role="button">Terug naar het index</a>

    <h2>Voeg een product toe:</h2>
    <br>
<form method="POST" action="/article/store">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="id">Atriclenummer:</label>
        <input required type="number" min="0" placeholder="Articlenummer" class="form-control col-4" id="id" name="id">
    </div>
    <div class="form-group">
        <label for="">Productnaam</label>
        <input required type="text" class="form-control" id="name" placeholder="Voer hier de productnaam in" name="name">
    </div>
    <div class="form-group">
        <label for="">Beschrijving</label>
        <input required type="text" class="form-control" id="description" placeholder="Voer hier de beschrijving in" name="description">
    </div>
    @include('includes.errors')
    <br>

    <button type="submit" class="btn btn-default">Voeg product toe</button>
</form>
@endsection