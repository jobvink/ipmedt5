@extends('layouts.app')
@section('content')
    <table id="articles" class="table table-striped table-bordered table-hover">
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



@endsection

@section('footerscripts')
    <style>
        label {
            font-size: 3em;
            display: inline;
        }
        input {
            display: inline;
        }
    </style>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script type="text/javascript" language="javascript" src="//cdn.datatables.net/1.10.13/js/jquery.dataTables.min.js"></script>
    <script>
        jQuery(document).ready(function($) {
            $(".clickable-row").click(function() {
                window.location = $(this).data("href");
            });
        });
    </script>
    <script type="text/javascript" language="javascript" class="init">
        $(document).ready(function() {
            $('#articles').DataTable( {"language":
                {
                    "sEmptyTable":   	"Er zijn geen articlen om weer te geven",
                    "sInfo":         	"Articlen _START_ tot _END_ van _TOTAL_.",
                    "sInfoEmpty":    	"0 van 0 tot 0 regels",
                    "sInfoFiltered": 	"(gefilterd tot _MAX_ regels)",
                    "sInfoPostFix":  	"",
                    "sInfoThousands":  	".",
                    "sLengthMenu":   	"_MENU_ regels",
                    "sLoadingRecords": 	"Wordt geladen...",
                    "sProcessing":   	"Een moment geduld...",
                    "sSearch":       	"zoeken",
                    "sZeroRecords":  	"Geen articlen gevonden.",
                    "oPaginate": {
                        "sFirst":    	"Eerste",
                        "sPrevious": 	"Vorige",
                        "sNext":     	"Volgende",
                        "sLast":     	"Laatste"
                    },
                    "oAria": {
                        "sSortAscending":  ": aktivieren, um Spalte aufsteigend zu sortieren",
                        "sSortDescending": ": aktivieren, um Spalte absteigend zu sortieren"
                    }


                },

                "paging":   false

            });
            $('#articles_filter').addClass('form-group text-center');
            $('input').addClass('form-control');
            $('#articles_info').addClass('pagination')
        } );
    </script>
@endsection