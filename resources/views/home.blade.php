@extends('layouts.app')
@extends('includes.header')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>

                <div class="panel-body">
                    <a class="btn btn-primary" href="/rack" role="button">Go to rack</a>
                </div>
            </div>
            {{--<div class="button" >--}}
                {{--<a class="btn btn-primary" href="/rack" role="button">Rek</a>--}}
            {{--</div>--}}
        </div>
    </div>
</div>
@endsection
@extends('includes.footer')

