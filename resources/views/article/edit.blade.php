@extends('layouts.app')

@section('content')
    <h2>Voeg een product toe:</h2>
    <br>
    <form method="POST" action="/article/{{$article->id}}">
        {{method_field('PATCH')}}
        {{ csrf_field() }}
        <div class="form-group">
            <label for="id">Atriclenummer:</label>
            <input type="number" min="0" value="{{$article->id}}" class="form-control col-4" id="id">
        </div>
        <div class="form-group">
            <label for="name">Productnaam:</label>
            <input type="text" class="form-control" id="name" value="{{$article->name}}" name="name">
        </div>
        <div class="form-group">
            <label for="description">Beschrijving:</label>
            <input type="text" class="form-control" id="description" value="{{$article->description}}" name="description">
        </div>
        <!--<div class="form-group">
            <label for="">Barcode</label>
            <input type="number" class="form-control" id="nmb-XS" maxlength="13" name="id">
        </div>-->
        <br>
        <h3>Artikelen op voorraad:</h3>
        <h4>Maat:</h4>
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
        {{--<div class="form-inline">--}}
            {{--<label for="id_xs" class="col-sm-2 col-form-label">XS</label>--}}
            {{--<input hidden value="{{$article->products()->where('size', 'XS')->get()->first()->id}}" id="id_old_xs" name="id_old_xs">--}}
            {{--<input type="number" min="0" value="{{$article->products()->where('size', 'XS')->get()->first()->stock}}" class="form-control col-4" id="stck_xs" name="stck_xs">--}}
            {{--<input type="number" min="0" max="9999999999999" value="{{$article->products()->where('size', 'XS')->get()->first()->id}}" class="form-control col-4" id="id_xs" name="id_xs">--}}
        {{--</div>--}}
        {{--<br>--}}
        {{--<div class="form-inline">--}}
            {{--<label for="id_s" class="col-sm-2 col-form-label">S</label>--}}
            {{--<input hidden value="{{$article->products()->where('size', 'S')->get()->first()->id}}" id="id_old_s" name="id_old_s">--}}
            {{--<input type="number" min="0" value="{{$article->products()->where('size', 'S')->get()->first()->stock}}" class="form-control col-4" id="stck_s" name="stck_s">--}}
            {{--<input type="number" min="0" max="9999999999999" value="{{$article->products()->where('size', 'S')->get()->first()->id}}" class="form-control col-4" id="id_s" name="id_s">--}}
        {{--</div>--}}
        {{--<br>--}}
        {{--<div class="form-inline">--}}
            {{--<label for="id_m" class="col-sm-2 col-form-label">M</label>--}}
            {{--<input hidden value="{{$article->products()->where('size', 'M')->get()->first()->id}}" id="id_old_m" name="id_old_m">--}}
            {{--<input type="number" min="0" value="{{$article->products()->where('size', 'M')->get()->first()->stock}}" class="form-control col-4" id="stck_m" name="stck_m">--}}
            {{--<input type="number" min="0" max="9999999999999" value="{{$article->products()->where('size', 'M')->get()->first()->id}}" class="form-control col-4" id="id_m" name="id_m">--}}
        {{--</div>--}}
        {{--<br>--}}
        {{--<div class="form-inline">--}}
            {{--<label for="id_l"  class="col-sm-2 col-form-label">L</label>--}}
            {{--<input hidden value="{{$article->products()->where('size', 'L')->get()->first()->id}}" id="id_old_l" name="id_old_l">--}}
            {{--<input type="number" min="0" value="{{$article->products()->where('size', 'L')->get()->first()->stock}}" class="form-control col-4" id="stck_l" name="stck_l">--}}
            {{--<input type="number" min="0" max="9999999999999" value="{{$article->products()->where('size', 'L')->get()->first()->id}}" class="form-control col-4" id="id_l" name="id_l">--}}
        {{--</div>--}}
        {{--<br>--}}
        {{--<div class="form-inline">--}}
            {{--<label for="id_xl" class="col-sm-2 col-form-label">XL</label>--}}
            {{--<input hidden value="{{$article->products()->where('size', 'XL')->get()->first()->id}}" id="id_old_xl" name="id_old_xl">--}}
            {{--<input type="number" min="0" value="{{$article->products()->where('size', 'XL')->get()->first()->stock}}" class="form-control col-4" id="stck_xl" name="stck_xl">--}}
            {{--<input type="number" min="0" max="9999999999999" value="{{$article->products()->where('size', 'XL')->get()->first()->id}}" class="form-control col-4" id="id_xl" name="id_xl">--}}
        {{--</div>--}}
        <br>
        <button type="submit" class="btn btn-default">Pas het product aan</button>
    </form>
    <footer style="height: 100px;"></footer>

@endsection