@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-heading">
                    <a class="btn btn-primary" href="/rack" role="button">Go to rack</a>
                </div>

                <div class="panel-heading">
                    <a class="btn btn-primary" href="/article/index" role="button">Go to article</a>
                </div>

                <div class="panel-heading">
                    <a class="btn btn-primary" href="/article/create" role="button">Add article</a>
                </div>
                <div class="panel-heading">
                    <a class="btn btn-primary" href="/statistics" role="button">See statistics about rack</a>
                </div>

                <passport-clients></passport-clients>
                <passport-authorized-clients></passport-authorized-clients>
                <passport-personal-access-tokens></passport-personal-access-tokens>
            </div>
        </div>
    </div>
</div>
@endsection

{{--@extends('includes.footer')--}}
