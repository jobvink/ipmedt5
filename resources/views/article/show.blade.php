@extends('layouts.app')

@section('articletable')
    <div class="container">
        <h2>Productnaam: {{$article->name}}</h2>
        <h4>Article number: {{$article->id}}</h4>
        <h4>Article description: {{$article->description}}</h4>
        <div class="list-group">
            <a class="btn btn-primary" href="/article/{{$article->id}}/edit" role="button">Aanpassen</a>
        </div>
        <form class="list-group" method="POST" action="/article/{{$article->id}}">
            {{method_field("DELETE")}}
            {{csrf_field()}}
            <button class="btn btn-danger" type="submit">Verwijder</button>
        </form>
        <form method="POST" action="/product/{{$article->id}}/edit">
            {{method_field('PATCH')}}
            {{csrf_field()}}
            <table class="table table-striped table-bordered table-hover">
                <thead>
                <tr>
                    <th>Barcode:</th>
                    <th>In stock:</th>
                    <th>Size:</th>

                </tr>
                </thead>

                <tbody>

                @foreach($article->products as $product)
                    <tr data-href='/article/{{$article->id}}/edit'>
                        <td>{{$product->id}}</td>
                        <td>
                            <label for="{{$product->id}}" hidden id="{{$product->id}}"></label>
                            <input type="number" value="{{$product->stock}}" class="form-control" id="{{$product->id}}" name="{{$product->id}}">
                        </td>
                        <td>{{$product->size}}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <button type="submit" class="btn btn-success">Bevestig</button>
        </form>

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

                                        <option value="{{$iter}}">{{$year . ' - ' . \App\Pickup::toMonthName($month)}}</option>
                                        {{$iter++}}
                                    @endforeach

                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-xl-4 col-md-4">
                        <div class="btn-group" data-toggle="buttons">
                            <label class="btn btn-primary active">
                                <input type="checkbox">XS
                            </label>
                            <label class="btn btn-primary active">
                                <input type="checkbox">S
                            </label>
                            <label class="btn btn-primary  active">
                                <input type="checkbox">M
                            </label>
                            <label class="btn btn-primary active">
                                <input type="checkbox">L
                            </label>
                            <label class="btn btn-primary active">
                                <input type="checkbox">XL
                            </label>
                        </div>
                    </div>
                </form>
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
            data.addColumn('number', 'XS');
            data.addColumn('number', 'S');
            data.addColumn('number', 'M');
            data.addColumn('number', 'L');
            data.addColumn('number', 'XL');
            pickups = [];
            @foreach(array_keys($pickups) as $year)

                @foreach(array_keys($pickups[$year]) as $month)

                    year = {{$year}}
                    month = {{$month}}
                    XS = {{$pickups[$year][$month]['XS']}}
                    S = {{$pickups[$year][$month]['S']}}
                    M = {{$pickups[$year][$month]['M']}}
                    L = {{$pickups[$year][$month]['L']}}
                    XL = {{$pickups[$year][$month]['XL']}}
                    statistics = {
                        'XS': XS,
                        'S': S,
                        'M': M,
                        'L': L,
                        'XL': XL
                    };

                    {{--pickups.push(month);--}}
//                    pickups.push(new Date(2001, 10, 1), 1, 1, 1, 1, 1);
//                    pickups.push([new Date(year, month), statistics['XS'], statistics['S'], statistics['M'], statistics['L'], statistics['XL'],]);
                    pickups.push([toMonthName(month), statistics['XS'], statistics['S'], statistics['M'], statistics['L'], statistics['XL'],]);

                @endforeach

            @endforeach

            data.addRows(pickups);

//            data.addRows([
//                ['Jannuari', 3, 2, 1],
//                ['Februari', 1, 3, 7],
//                ['Maart', 1, 4, 4],
//                ['April', 1, 1, 2],
//                ['Mei', 2, 4, 1],
//                ['Juni', 3, 2, 1],
//                ['Juli', 1, 3, 7],
//                ['Augustus', 1, 4, 4],
//                ['September', 1, 1, 2],
//                ['Oktober', 2, 4, 1],
//                ['November', 3, 2, 1],
//                ['December', 1, 3, 7],
//            ]);

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
//                console.log(rowSet(pickupsBegin.value, pickupsEind.value));
//                console.log(pickupsBegin.value);
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

//            $('#pickup-form').find('checkbox').change(function() {
//                console.log('test');
//                if (this.checked) {
//                    console.log('test');
//                } else {
//                    // the checkbox is now no longer checked
//                }
//            });

        }
    </script>

@endsection