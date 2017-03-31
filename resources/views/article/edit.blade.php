@extends('layouts.app')

@section('content')
    <h2>Voeg een product toe:</h2>
    <br>
    <form method="POST" action="/article/{{$article->id}}">
        {{method_field('PATCH')}}
        {{ csrf_field() }}
        <div class="form-inline">
            <label for="" class="col-sm-2 col-form-label">Atriclenummer:</label>
            <input type="number" min="0" value="{{$article->id}}" class="form-control col-4" id="id">
        </div>
        <div class="form-group">
            <label for="">Productnaam</label>
            <input type="text" class="form-control" id="name" value="{{$article->name}}" name="name">
        </div>
        <div class="form-group">
            <label for="">Beschrijving</label>
            <input type="text" class="form-control" id="description" value="{{$article->description}}" name="description">
        </div>
        <!--<div class="form-group">
            <label for="">Barcode</label>
            <input type="number" class="form-control" id="nmb-XS" maxlength="13" name="id">
        </div>-->
        <br>
        <h3>Artikelen op voorraad:</h3>
        <h4>Maat:</h4>
        <h1>{{$article->products()->where('size', 'XS')->get()->first()->id}}</h1>
        <div class="form-inline">
            <label for="" class="col-sm-2 col-form-label">XS</label>
            <input type="number" min="0" value="{{$article->products()->where('size', 'XS')->get()->first()->stock}}" class="form-control col-4" id="stck_xs" name="stck_xs">
            <input type="number" min="0" max="9999999999999" value="{{$article->products()->where('size', 'XS')->get()->first()->id}}" class="form-control col-4" id="id_xs" name="id_xs">
        </div>
        <br>
        <div class="form-inline">
            <label for="" class="col-sm-2 col-form-label">S</label>
            <input type="number" min="0" value="{{$article->products()->where('size', 'S')->get()->first()->stock}}" class="form-control col-4" id="stck_s" name="stck_s">
            <input type="number" min="0" max="9999999999999" value="{{$article->products()->where('size', 'S')->get()->first()->id}}" class="form-control col-4" id="id_s" name="id_s">
        </div>
        <br>
        <div class="form-inline">
            <label for="" class="col-sm-2 col-form-label">M</label>
            <input type="number" min="0" value="{{$article->products()->where('size', 'M')->get()->first()->stock}}" class="form-control col-4" id="stck_m" name="stck_m">
            <input type="number" min="0" max="9999999999999" value="{{$article->products()->where('size', 'M')->get()->first()->id}}" class="form-control col-4" id="id_m" name="id_m">
        </div>
        <br>
        <div class="form-inline">
            <label for=""  class="col-sm-2 col-form-label">L</label>
            <input type="number" min="0" value="{{$article->products()->where('size', 'L')->get()->first()->stock}}" class="form-control col-4" id="stck_l" name="stck_l">
            <input type="number" min="0" max="9999999999999" value="{{$article->products()->where('size', 'L')->get()->first()->id}}" class="form-control col-4" id="id_l" name="id_l">
        </div>
        <br>
        <div class="form-inline">
            <label for="" class="col-sm-2 col-form-label">XL</label>
            <input type="number" min="0" value="{{$article->products()->where('size', 'XL')->get()->first()->stock}}" class="form-control col-4" id="stck_xl" name="stck_xl">
            <input type="number" min="0" max="9999999999999" value="{{$article->products()->where('size', 'XL')->get()->first()->id}}" class="form-control col-4" id="id_xl" name="id_xl">
        </div>
        <br>
        <button type="submit" class="btn btn-default">Voeg product toe</button>
    </form>
@endsection