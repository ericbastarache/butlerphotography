@extends('layout.master')

@section('title', 'Butler Photography - Cart')
@section('content')
<section id="cart">
	@if(Session::has('cart'))
			<div class="container">
				<div class="row">
					<div class="col-md-12 col-lg-12">
						<div class="row">
							<div class="col-xs-2">
								<h4><strong>Product</strong></h4>
							</div>
							<div class="col-xs-2">
								<h4><strong>Price</strong></h4>
							</div>
							<div class="col-xs-2">
								<h4><strong>Quantity</strong></h4>
							</div>
							<div class="col-xs-2">
								<h4><strong>Subtotal</strong></h4>
							</div>
							<div class="col-xs-2">
								
							</div>
						</div>
						<hr>
					</div>
				</div>
				<div class="row">
					@foreach($products as $product)
					<div class="col-md-12 col-lg-12">
						<div class="row">
							<div class="col-xs-2">
								<img src="http://placehold.it/50x50" class="img-responsive">
							</div>
							<div class="col-xs-2">
								<span>{{$product['price']}}</span>
							</div>
							<div class="col-xs-2">
								<input name="product-quantity" type="text" class="text-center" value="{{$product['quantity']}}" disabled="true">
							</div>
							<div class="col-xs-1">
								<a class="btn btn-primary btn-sm" href="{{route('shop.update', ['id' => $product['item']['id']])}}"><i class="fa fa-plus"></i></a>
							</div>
							<div class="col-xs-1">
								<a href="{{route('shop.removeOne', ['id' => $product['item']['id']])}}" class="btn btn-primary btn-sm"><i class="fa fa-minus"></i></a>
							</div>
							<div class="col-xs-2">
								<a href="{{route('shop.remove', ['id' => $product['item']['id']])}}" class="btn btn-danger btn-sm"><i class="fa fa-trash-o"></i></a>
							</div>
						</div>
						<hr>
					</div>
					@endforeach
				</div>
				<div class="row">
					<div class="col-md-12 col-lg-12">
						<div class="row">
							<div class="col-xs-6 col-xs-offset-1">
								<span class="pull-right"><strong>Total: ${{$totalPrice}}</strong></span>
							</div>
						</div>
						<div class="clearfix">
							<a class="btn btn-warning pull-left" href="{{route('shop.index')}}"><i class="fa fa-arrow-left"></i> Continue Shopping</a>
							<a class="btn btn-success pull-right" href="{{route('checkout')}}">Checkout <i class="fa fa-arrow-right"></i></a>
						</div>
					</div>
				</div>
				@else
				<div class="row">
					<div class="col-md-12 col-lg-12">
						<div class="row">
							<div class="col-xs-6 col-xs-offset-5">
								<h2>No Items In Cart.</h2>
								<a href="{{route('shop.index')}}" class="btn btn-primary"><i class="fa fa-arrow-left"></i> Back To Shop</a>
							</div>
						</div>	
					</div>
				</div>
			</div>
			@endif
		</section>
		@endsection