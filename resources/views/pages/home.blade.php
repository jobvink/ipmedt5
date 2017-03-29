@extends('layouts.app')
@section('content')
	<div class="section">
	<div class="col-md-12">
		<h1 class="text-center">Zoek product</h1>
	</div>
	<div class="col-md-offset-3 col-md-6">
		<form role="form">
			<div class="form-group">
				<div class="input-group">
					<input type="text" class="form-control" placeholder="Product nummer of beschrijving"> <span class="input-group-btn"> <a class="btn btn-success" type="submit">Zoek<br></a> </span> </div>
				</div>
			</form>
		</div>
</div>
<div class="mt-3" style="margin-top: 10%;"></div>
<div class="section">
	<div class="container">
		<div class="row">
		<div class="col-md-12 col-12">
			<?php foreach ($products as $product) {
			    echo $product->name . '-' . $product->description . '<br>';?>
			<?php } ?>
				<div class="col-md-4 col-sm-6"> 
					<img src="http://pingendo.github.io/pingendo-bootstrap/assets/placeholder.png" class="img-responsive">
					<a href="#" class="btn btn-primary btn-lg btn-block" style="margin-top: 2%;" role="button" aria-pressed="true">Details</a>
				</div>
				<div class="col-md-8 col-sm-12">
					<h1>Product naam</h1>
					<h3>Artikel nummer</h3>
					<p>Beschrijving -&nbsp;Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem.</p>
					<div class="col-md-12">
						<table class="table">
							<thead>
								<tr>
									<th>Maat</th>
									<th>Aantal op voorraad</th>
								</tr>
							</thead>
							<tbody>
								<tr>
									<td>1</td>
									<td>10</td>
								</tr>
								<tr>
									<td>2</td>
									<td>14</td>
								</tr>
								<tr>
									<td>3</td>
									<td>1</td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
@stop
