@extends('layouts.app')
@section('content')
    <html>
    <head>
        <!--Load the AJAX API-->
        <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
        <script type="text/javascript">

            // Load the Visualization API and the corechart package.
            google.charts.load('current', {'packages':['corechart']});

            // Set a callback to run when the Google Visualization API is loaded.
            google.charts.setOnLoadCallback(drawChart);

            // Callback that creates and populates a data table,
            // instantiates the pie chart, passes in the data and
            // draws it.
            function drawChart() {

                // Create the data table.
                var data = new google.visualization.DataTable();
                data.addColumn('string', 'Topping');
                data.addColumn('number', 'Aantal keer');
                data.addRows([
                    ['Januari', 3],
                    ['Februari', 1],
                    ['Maart', 1],
                    ['April', 1],
                    ['Mei', 2],
                    ['Juni', 5]
                ]);

                // Set chart options
                var options = {'title':'Aantal keer beweging gedetecteerd',
                    'width':1050,
                    'height':550};

                // Instantiate and draw our chart, passing in some options.
                var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
                chart.draw(data, options);
            }
        </script>
    </head>

    <body>
    <!--Div that will hold the pie chart-->
    <div id="chart_div"></div>
    </body>
    </html>
@endsection