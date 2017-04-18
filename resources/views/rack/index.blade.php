@extends('layouts.app')

@section('content')

    <a class="btn btn-default" href="/home" role="button">Terug naar Home</a>

    @foreach($racks as $rack)
        <h2>Rack: <a href="/rack/{{$rack->id}}" >{{$rack->id}}</a></h2>
    @endforeach

    <a class="btn btn-default" href="/rack/create" role="button">Maak een rek aan</a>

@endsection

