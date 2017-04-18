@extends('layouts.app')

@section('content')

    <a class="btn btn-default" href="/rack/{{$rack->id}}" role="button">Terug naar het rack</a>

    <h2>Voeg een product toe:</h2>
    <br>
    <form method="POST" action="/rack/update">
        {{ csrf_field() }}
        {{ method_field('PATCH') }}
        <div class="form-group">
            <div class="form-group">
                <label hidden for="id" >Rek ID:</label>
                <input hidden type="number" value="{{$rack->id}}" id="id" name="id">
            </div>
            <div class="form-group">
                <label for="description" >Beschrijving</label>
                <input value="{{$rack->description}}" class="form-control" id="description" name="description">
            </div>
        </div>

        @include('includes.errors')

        <button type="submit" class="btn btn-default">Pas het rek aan</button>
    </form>
@endsection