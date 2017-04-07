@extends('layouts.app')

@section('demo')
    <div class="container">
        <div>
            <h1>
                <center>Welkom bij de demo!</center>
            </h1>
            @if (Auth::check())
                <div class="container">
                    <div class="col-md-4 col-md-offset-4">
                        <a class="btn btn-primary center-block" href="/home" role="button">Ga naar het dashboard</a>
                    </div>
                </div>
            @else
                <div class="container" >
                    <center>Login om de demo te beginnen</center>
                </div>
            @endif

        </div>
    </div>
@endsection