<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="Cache-Control: max-age=86400" content="public">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta name="author" content="Eric Bastarache">
		@yield('meta-information')
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

		<link rel="stylesheet" href="{{URL::asset('css/font-awesome.min.css')}}">
		@yield('styles')
		<link rel="stylesheet" href="{{URL::asset('css/styles.css')}}">

		<title>@yield('title')</title>
		<style>
			@import url('https://fonts.googleapis.com/css?family=Parisienne');
			@import url('https://fonts.googleapis.com/css?family=Source+Sans+Pro');
			@import url('https://fonts.googleapis.com/css?family=Dosis:200,400');
			@import url('https://fonts.googleapis.com/css?family=Poppins:300,400');
			@import url('https://fonts.googleapis.com/css?family=Roboto+Condensed:400,700');
		</style>
	</head>
	<body>
		<nav class="navbar navbar-photography navbar-fixed-top">
			<div class="container">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
						<span class="sr-only">Toggle navigation</span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</button>
					<a class="navbar-brand" href="{{route('index')}}"><i class="fa fa-camera"></i> Butler Photography</a>
				</div>
		
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse navbar-ex1-collapse">
					<ul class="nav navbar-nav nav-photography navbar-right">
						<li class="active"><a href="{{route('index')}}">Home</a></li>
						<li><a href="{{route('gallery')}}">Gallery</a></li>
						<li><a href="{{route('blog')}}">Blog</a></li>
						<li><a href="{{route('contact')}}">Contact</a></li>
						<li><a href="{{route('shop.index')}}">Shop</a></li>
						@if(Session::has('cart'))
						<li><a href="{{route('shop.cart')}}">Cart<i data-badge="{{Session::get('cart')->totalQuantity}}" class="notification-badge"></i></a></li>
						@else
						<li><a href="{{route('shop.cart')}}">Cart</a></li>
						@endif
					</ul>
					<ul class="social hidden-xs hidden-sm">
						<li>
							<a target="_blank" href="https://www.facebook.com/Butler-Photography-218660738232669/"><i class="fa fa-facebook"></i></a>
						</li>
						<li>
							<a target="_blank" href="#"><i class="fa fa-instagram"></i></a>
						</li>
						<li>
							<a target="_blank" href="https://twitter.com/e_s_butler"><i class="fa fa-twitter"></i></a>
						</li>
					</ul>
				</div><!-- /.navbar-collapse -->
			</div>
		</nav>
		@yield('content')
		<footer class="footer">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
						<p class="text-muted">&copy; 2016 Butler Photography. All rights reserved. Website by <a href="http://ericbastarache.github.io/">Eric Bastarache</a></p>
					</div>
					<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6 hidden-mobile">
						<ul class="footer-icons hidden-xs hidden-sm">
							<li><a class="facebook-icon" href="https://www.facebook.com/Butler-Photography-218660738232669/"><i class="fa fa-facebook"></i></a></li>
							<li><a class="instagram-icon" href="#"><i class="fa fa-instagram"></i></a></li>
							<li><a class="twitter-icon" href="https://twitter.com/e_s_butler"><i class="fa fa-twitter"></i></a></li>
						</ul>
					</div>
				</div>
			</div>
		</footer>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.0.0/jquery.min.js"></script>
		@yield('scripts')
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</body>
</html>