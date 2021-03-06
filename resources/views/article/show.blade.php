@extends('layouts.app')

@section('articletable')
    <div class="container">

        <a class="btn btn-default" href="/article/index" role="button">Terug naar index</a>

        <h2>Productnaam: {{$article->name}}</h2>
        <h4>Article number: {{$article->id}}</h4>
        <h4>Article description: {{$article->description}}</h4>
        <ul class="list-inline">
            <li>
                <div class="list-group">
                    <a class="btn btn-primary" href="/article/{{$article->id}}/edit" role="button">Aanpassen</a>
                </div>
            </li>
            <li>
                <form class="list-group" method="POST" action="/article/{{$article->id}}">
                    {{method_field("DELETE")}}
                    {{csrf_field()}}
                    <button class="btn btn-danger" type="submit">Verwijderen</button>
                </form>
            </li>
        </ul>
        <table class="table table-striped table-bordered table-hover">
                <thead>
                <tr>
                    <th>Barcode:</th>
                    <th>In stock:</th>
                    <th>Size:</th>
                    <th>Opcties:</th>

                </tr>
                </thead>

                <tbody>

                @foreach($products as $product)
                    <tr data-href='/article/{{$article->id}}/edit'>
                        <td>{{$product->id}}</td>
                        <td>
                            <form class="form-inline" method="POST" action="/article/{{$article->id}}/products/{{$product->id}}">
                                {{ csrf_field() }}
                                {{method_field("PATCH")}}
                                <input hidden id="article_id" name="article_id" value="{{$product->article_id}}">
                                <input hidden id="id" name="id" value="{{$product->id}}"/>
                                <input type="number" value="{{$product->stock}}" class="form-control" id="stock" name="stock">
                                <input hidden id="size" name="size" value="{{$product->size}}">
                                <button class="btn btn-success" type="submit">Pas voorraad aan</button>
                            </form>
                        </td>
                        <td>{{$product->size}}</td>
                        <td>
                            <ul class="list-inline">
                                <li>
                            <a class="btn btn-primary" href="/article/{{$article->id}}/products/{{$product->id}}/edit" role="button">aanpassen</a>
                                </li>
                                <li>
                                    <form method="POST" action="/article/{{$article->id}}/products/{{$product->id}}">
                                    {{method_field("DELETE")}}
                                    {{csrf_field()}}
                                    <button class="btn btn-danger" type="submit">Verwijderen</button>
                                </form>
                                </li>
                            </ul>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        <div class="list-group">
            <a class="btn btn-primary" href="/article/{{$article->id}}/products/create" role="button">Voeg een product toe</a>
        </div>
        @if(count($pickups))
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h1>Aantal keren van het rek gehaald:</h1>
                </div>
                <div class="panel-body">
        <div class="row" style="margin-top: 5%;">
            <div class="col-xl-12 col-md-12">
                <div id="chart_div"></div>
            </div>
        </div>
        <div class="row" style="margin-top: 5%;">

            <div class="col-xl-12 col-md-12">
                <form id="pickup-form" class="form-inline">
                    <div class="col-xl-4 col-md-4">
                        <div class="col-xl-5 col-md-5">
                            <label><h4>Begin maand:</h4></label>
                        </div>
                        <div class="col-xl-7 col-md-7">
                            <select id="pickup-begin" class="dropdown-menu" style="display: inline !important;">
                                {{$iter = 0}}
                                @foreach(array_keys($pickups) as $year)

                                    @foreach(array_keys($pickups[$year]) as $month)

                                        <option value="{{$iter}}">{{$year . ' - ' . \App\Pickup::toMonthName($month)}}</option>
                                        {{$iter++}}
                                    @endforeach

                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-4">
                        <div class="col-xl-5 col-md-5">
                            <label><h4>Eind maand:</h4></label>
                        </div>
                        <div class="col-xl-7 col-md-7">
                            <select id="pickup-eind" class="dropdown-menu" style="display: inline !important;">
                                {{$iter = 0}}
                                @foreach(array_keys($pickups) as $year)
                                    @foreach(array_keys($pickups[$year]) as $month)
                                        <option id="pickup-eind-{{$iter}}" value="{{$iter}}">{{$year . ' - ' . \App\Pickup::toMonthName($month)}}</option>
                                        {{$iter++}}
                                    @endforeach
                                @endforeachi
                            </select>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        @endif
        </div>
        </div>
    </div>
    <footer style="height: 100px;"></footer>
@endsection

@section('footerscripts')

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {packages: ['corechart', 'bar']});
        google.charts.setOnLoadCallback(drawBasic);

        function toMonthName($month){
            if ($month === 1) {
                return 'Jannuari';
            } else if ($month === 2) {
                return 'Februari';
            } else if ($month === 3) {
                return 'Maart';
            } else if ($month === 4) {
                return 'April';
            } else if ($month === 5) {
                return 'Mei';
            } else if ($month === 6) {
                return 'Juni';
            } else if ($month === 7) {
                return 'Juli';
            } else if ($month === 8) {
                return 'Augustus';
            } else if ($month === 9) {
                return 'September';
            } else if ($month === 10) {
                return 'Oktober';
            } else if ($month === 11) {
                return 'November';
            } else if ($month === 12) {
                return 'December';
            } else {
                throw newException('Geen maand bij getal');
            }
        }

        function drawBasic() {

            var data = new google.visualization.DataTable();



//            data.addColumn('date', 'Maanden');
            data.addColumn('string', 'Maanden');
            @foreach($sizes as $size)
                data.addColumn('number', '{{$size}}');
            @endforeach
            pickups = [];
            @foreach(array_keys($pickups) as $year)

                @foreach(array_keys($pickups[$year]) as $month)

                    year = {{$year}}
                    month = {{$month}}
                    {{--XS = {{$pickups[$year][$month]['XS']}}--}}
                    {{--S = {{$pickups[$year][$month]['S']}}--}}
                    {{--M = {{$pickups[$year][$month]['M']}}--}}
                    {{--L = {{$pickups[$year][$month]['L']}}--}}
                    {{--XL = {{$pickups[$year][$month]['XL']}}--}}
                    {{--statistics = {--}}
                        {{--'XS': XS,--}}
                        {{--'S': S,--}}
                        {{--'M': M,--}}
                        {{--'L': L,--}}
                        {{--'XL': XL--}}
                    {{--};--}}
                    statistics = {
                        @foreach($sizes as $size)
                            '{{$size}}': {{$pickups[$year][$month][$size]}},
                        @endforeach
                    };

//            pickups.push([toMonthName(month), statistics['XS'], statistics['S'], statistics['M'], statistics['L'], statistics['XL'],]);
            pickups.push([toMonthName(month), @foreach($sizes as $size) statistics['{{$size}}'], @endforeach]);

                @endforeach

            @endforeach

            data.addRows(pickups);

            var options = {
                hAxis: {
                    title: 'Maanden'
                },
                vAxis: {
                    title: 'Aantal',
                    format: '#'
                }
            };

            var chart = new google.visualization.ColumnChart(
                document.getElementById('chart_div'));

            chart.draw(data, options);

            var pickupsRows = [];
            function rowSet(begin, eind) {
                var set = [];
                for(var i = parseInt(begin); i <= parseInt(eind); i++){
                    set.push(i);
                }
                return set;
            }

            var pickupsBegin = document.getElementById('pickup-begin');
            var pickupsEind = document.getElementById('pickup-eind');

            pickupsBegin.onchange = function () {
                view = new google.visualization.DataView(data);
                view.setRows(rowSet(pickupsBegin.value, pickupsEind.value));
                chart.draw(view, options);
            };

            pickupsEind.onchange = function () {
                view = new google.visualization.DataView(data);
                view.setRows(rowSet(pickupsBegin.value, pickupsEind.value));
                chart.draw(view, options);
            };

            $('#pickup-xs-button').onchange = function () {
                console.log('test');
            };

        }

        $('#pickup-eind-@if(isset($iter)){{$iter-1}}@endif').prop('selected', true);

    </script>

@endsection