@extends('layout.master')

@section('meta-information')
<meta name="description" content="Lorem ipsum dolor amet">
<meta name="keywords" content="photography, blog, portfolio, store, prints, photos, travel, nature, landscape">
@endsection

@section('title', 'Butler Photography - Gallery')

@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.4.0/css/swiper.min.css">
@endsection

@section('content')

<div class="container-fluid">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 padding-0">
					<img src="{{URL::asset('images/header-image.jpg')}}" alt="" class="blog-image-head img-responsive">
				</div>
			</div>
		</div>
		<div id="gallery-categories" class="container" data-spy="affix" data-offset-top="200">
			<div class="row">
				<div id="navbar" class="col-md-6 col-lg-6 col-md-offset-4 col-lg-offset-4">
					<ul class="categorized-galleries">
						@foreach($galleries as $gallery)
						<li><a id="{{$gallery->name}}" href="#{{strtolower($gallery->name)}}-gallery">{{$gallery->name}}</a></li>
						@endforeach
					</ul>
				</div>
			</div>
		</div>
		@foreach($galleries as $gallery)
		<section id="{{strtolower($gallery->name)}}-gallery">	
				<div class="swiper-container">
					<div class="swiper-wrapper">
						@foreach($gallery->photos as $photo)
						<div class="swiper-slide"><img class="img-responsive" src="{{asset($photo->url)}}"></div>
						@endforeach
					</div>
				<div class="swiper-pagination"></div>
				<div class="swiper-scrollbar"></div>
			</div>
		</section>
		@endforeach
		@endsection
		@section('scripts')
		<script src="https://cdnjs.cloudflare.com/ajax/libs/Swiper/3.4.0/js/swiper.jquery.min.js"></script>
		<script src="{{URL::asset('js/swiper.js')}}"></script>
		<script src="{{URL::asset('js/scroll.js')}}"></script>
		@endsection