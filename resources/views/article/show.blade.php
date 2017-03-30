@extends('layouts.app')

@section('articletable')
    <div class="container">
        <h2>Productnaam: {{$article->name}}</h2>
        <h4>Article number: {{$article->id}}</h4>
        <h4>Article description: {{$article->description}}</h4>
        {{--<tbody>--}}
            {{--<tr>--}}
                {{--<td>{{$article->size}}</td>--}}
                {{--<td>{{$article->stock}}</td>--}}
            {{--</tr>--}}
        {{--</tbody>--}}
        <table class="table table-striped table-bordered">
            <thead>
            <tr>
                <th>Size:</th>
                <th>In stock:</th>
                <th>Barcode:</th>
            </tr>
            </thead>
            <tbody>
            {{--@foreach($articles as $article)--}}
                <tr>
                    <td>{{$article->size}}</td>
                    <td>{{$article->stock}}</td>
                    <td>{{$article->barcode}}</td>
                    {{--<td>{{$article->product->size}}</td>--}}
                    {{--<td>{{$article->product->stock}}</td>--}}
                    {{--<td>{{$article->$article->barcode}}</td>--}}
                </tr>
                {{--@endforeach--}}
            </tbody>
    </div>
@endsection