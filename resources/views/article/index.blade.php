@extends('layouts.app')
@section('content')
    <table class="table table-striped table-bordered table-hover">
        <thead>
        <tr>
            <th>Articlenummer:</th>
            <th>naam:</th>
            <th>beschrijving:</th>
        </tr>
        </thead>
        <tbody>
        @foreach($articles as $article)

                <tr class='clickable-row' data-href='/article/{{$article->id}}'>
                    <td>{{$article->id}}</td>
                    <td>{{$article->name}}</td>
                    <td>{{$article->description}}</td>
                </tr>

        @endforeach
        </tbody>
    </table>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>
        jQuery(document).ready(function($) {
            $(".clickable-row").click(function() {
                    window.location = $(this).data("href");
            });
        });
    </script>
@endsection