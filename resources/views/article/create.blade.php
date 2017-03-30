@extends('layouts.app')

@section('content')
    <h2>Voeg een product toe:</h2>
    <br>
<form method="POST" action="/article/store">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="">Productnaam</label>
        <input type="text" class="form-control" id="text" placeholder="Voer hier de productnaam in" name="name">
    </div>
    <div class="form-group">
        <label for="">Beschrijving</label>
        <input type="text" class="form-control" id="text" placeholder="Voer hier de beschrijving in" name="description">
    </div>
    <div class="form-group">
        <label for="">Barcode</label>
        <input type="number" class="form-control" id="text" placeholder="Voer hier de barcode in" name="description">
    </div>
    <!--<div class="form-group">
        <label for="">Barcode</label>
        <input type="number" class="form-control" id="nmb-XS" maxlength="13" name="id">
    </div>-->
    <br>
    <h3>Artikelen op voorraad:</h3>
    <h4>Maat:</h4>
    <div class="form-inline">
        <label for="" class="col-sm-2 col-form-label">XS</label>
        <input type="number" min="0" placeholder="Voorraad" class="form-control col-4" id="stck-xs">
        <input type="number" min="0" max="9999999999999" placeholder="Barcode" class="form-control col-4" id="id">
    </div>
    <br>
    <div class="form-inline">
        <label for="" class="col-sm-2 col-form-label">S</label>
        <input type="number" min="0" placeholder="Voorraad" class="form-control col-4" id="stck-s">
        <input type="number" min="0" max="9999999999999" placeholder="Barcode" class="form-control col-4" id="id">
    </div>
    <br>
    <div class="form-inline">
        <label for="" class="col-sm-2 col-form-label">M</label>
        <input type="number" min="0" placeholder="Voorraad" class="form-control col-4" id="stck-m">
        <input type="number" min="0" max="9999999999999" placeholder="Barcode" class="form-control col-4" id="id">
    </div>
    <br>
    <div class="form-inline">
        <label for=""  class="col-sm-2 col-form-label">L</label>
        <input type="number" min="0" placeholder="Voorraad" class="form-control col-4" id="stck-l">
        <input type="number" min="0" max="9999999999999" placeholder="Barcode" class="form-control col-4" id="id">
    </div>
    <br>
    <div class="form-inline">
        <label for="" class="col-sm-2 col-form-label">XL</label>
        <input type="number" min="0" placeholder="Voorraad" class="form-control col-4" id="stck-xl">
        <input type="number" min="0" max="9999999999999" placeholder="Barcode" class="form-control col-4" id="id">
    </div>
    <br>
    <button type="submit" class="btn btn-default">Voeg product toe</button>
</form>
@endsection