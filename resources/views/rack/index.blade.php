@extends('layouts.app')

@section('content')
    @foreach($racks as $rack)
        <h2>Rack: <a href="/rack/{{$rack->id}}" >{{$rack->id}}</a></h2>
    @endforeach
@endsection

