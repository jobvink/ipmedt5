@foreach($racks as $rack)
    <h1><a href="/rack/{{$rack->id}}" >{{$rack->id}}</a></h1>
@endforeach