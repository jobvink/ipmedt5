<ul>
@foreach($products as $product)
    <li>{{$product->article->name}}</li>
@endforeach
</ul>