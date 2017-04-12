@extends('layouts.app')

@section('content')
    <h2>Voeg een product toe:</h2>
    <br>
    <form method="POST" action="/article/{{$article->id}}">
        {{method_field('PATCH')}}
        {{ csrf_field() }}
        @foreach($sizes as $size)
            @if(count($article->products()->where('size', $size)->get()->first()))
                <div class="form-inline">
                    <label for="id_{{$size}}" class="col-sm-2 col-form-label">{{$size}}</label>
                    <input hidden value="{{$article->products()->where('size', $size)->get()->first()->id}}" id="id_old_{{$size}}" name="id_old_{{$size}}">
                    <input type="number" min="0" value="{{$article->products()->where('size', $size)->get()->first()->stock}}" class="form-control col-4" id="stck_{{$size}}" name="stck_{{$size}}">
                    <input type="number" min="0" max="9999999999999" value="{{$article->products()->where('size', $size)->get()->first()->id}}" class="form-control col-4" id="id_{{$size}}" name="id_{{$size}}">
                </div>
            @else
                <div class="form-inline">
                    <label for="id_{{$size}}" class="col-sm-2 col-form-label">{{$size}}</label>
                    <input hidden id="id_old_{{$size}}" name="id_old_{{$size}}">
                    <input type="number" min="0" class="form-control col-4" id="stck_{{$size}}" name="stck_{{$size}}">
                    <input type="number" min="0" max="9999999999999" class="form-control col-4" id="id_{{$size}}" name="id_{{$size}}">
                </div>
            @endif
        @endforeach
        <br>
        <button type="submit" class="btn btn-default">Pas het product aan</button>
    </form>
    <footer style="height: 100px;"></footer>

@endsection