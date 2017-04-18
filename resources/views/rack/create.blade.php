@extends('layouts.app')

@section('content')

    <a class="btn btn-default" href="/rack/index" role="button">Terug naar het Index</a>

    <h2>Voeg een product toe:</h2>
    <br>
    <form method="POST" action="/rack/store">
        {{ csrf_field() }}
        <div class="form-group">
            <div class="form-group">
                <label hidden for="id" >Rek ID:</label>
                <input hidden type="number" placeholder="Rek id" id="id" name="id">
            </div>
            <div class="form-group">
                <label for="description" >Beschrijving</label>
                <input required placeholder="Beschrijving" class="form-control" id="description" name="description">
            </div>
        </div>

        @include('includes.errors')

        <button type="submit" class="btn btn-default">Voeg product toe</button>
    </form>
@endsection