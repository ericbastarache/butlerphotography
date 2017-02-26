@extends('layout.master')
@section('meta-information')
<meta name="description" content="Lorem ipsum dolor amet">
<meta name="keywords" content="photography, blog, portfolio, store, prints, shop, nature, landscape, travel, photos">
@endsection
@section('title', 'Butler Photography - Shop')

@section('content')
<div class="container-fluid">
			<div class="row">
				<div class="col-md-12 col-lg-12 padding-0">
					<img src="{{URL::asset('images/header-image.jpg')}}" alt="" class="blog-image-head img-responsive">
				</div>
			</div>
			@if(Session::has('success'))
			<div class="row">
				<div class="col-md-12 col-lg-12">
					<div class="alert alert-success">
						{{Session::get('success')}}
					</div>
				</div>
			</div>
			@endif
		</div>
		<section id="shop">
			<div class="container">
				<div class="row">
					@foreach($prints as $print)
					<div class="col-md-4 col-lg-4">
						<div class="small-blog-item">
							<h3 class="text-center"><a href="">{{$print->title}}</a></h3>
							<h6 class="text-center">{{$print->updated_at->format('Y.m.d')}}</h6>
							<img class="img-responsive" src="{{$print->url}}">
							<h4 class="text-center">{{$print->category}}</h4>
							<p>{{$print->description}}</p>
							<div class="clearfix">
								<a class="btn shop-button pull-left" href="{{ route('shop.addToCart', ['id' => $print->id]) }}">Add To Cart</a>
								@if($print->quantity > 0)
								<span class="prod-quantity pull-left">In-Stock: {{$print->quantity}}</span>
								@else
								<span class="no-stock pull-left">Out of Stock</span>
								@endif
								<span class="prod-price pull-right"><i class="fa fa-usd"></i>{{$print->price}}</span>
							</div>
						</div>
					</div>
					@endforeach
				</div>
			</div>
		</section>
		@endsection