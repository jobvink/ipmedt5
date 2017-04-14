@extends('layouts.app')

@section('content')
    <h2>Voeg een product toe:</h2>
    <br>
<form method="POST" action="/article/store">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="id">Atriclenummer:</label>
        <input type="number" min="0" placeholder="Articlenummer" class="form-control col-4" id="id" name="id">
    </div>
    <div class="form-group">
        <label for="">Productnaam</label>
        <input type="text" class="form-control" id="name" placeholder="Voer hier de productnaam in" name="name">
    </div>
    <div class="form-group">
        <label for="">Beschrijving</label>
        <input type="text" class="form-control" id="description" placeholder="Voer hier de beschrijving in" name="description">
    </div>
    @include('includes.errors')
    <br>

    <button type="submit" class="btn btn-default">Voeg product toe</button>
</form>
@endsection