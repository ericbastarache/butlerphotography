@extends('layout.master')

@section('meta-information')
<meta name="description" content="Lorem ipsum dolor amet">
<meta name="keywords" content="photography, blog, portfolio, store, prints, photos, travel, landscape, nature">
@endsection

@section('title', 'Butler Photography - Home')

@section('content')
<div id="carousel-id" class="carousel slide" data-ride="carousel">
			<ol class="carousel-indicators">
				<li data-target="#carousel-id" data-slide-to="0" class="active"></li>
				<li data-target="#carousel-id" data-slide-to="1" class=""></li>
				<li data-target="#carousel-id" data-slide-to="2" class=""></li>
				<li data-target="#carousel-id" data-slide-to="3" class=""></li>
				<li data-target="#carousel-id" data-slide-to="4" class=""></li>
			</ol>
			<div class="carousel-inner">
				@foreach($carouselPhotos as $item)
				<div class="item active">
					<img class="img-responsive" alt="First slide" src="{{asset($item->url)}}">
				</div>
				@endforeach
			</div>
			<a class="left carousel-control" href="#carousel-id" data-slide="prev"><span class="glyphicon glyphicon-chevron-left"></span></a>
			<a class="right carousel-control" href="#carousel-id" data-slide="next"><span class="glyphicon glyphicon-chevron-right"></span></a>
		</div>
		<section id="skills">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<h1 class="about-title text-center">Evelyn Butler, Freelance Photographer.</h1>
						<p class="text-center short-info">Based in Toronto, Ontario I specialize in nature, travel and landscape photography.</p>
					</div>
				</div>
				<div class="row">
					<h3 class="special-photography text-center">A few Photos</h3>
				</div>
				<div class="row">
					@foreach($images as $img)
					<div class="col-md-4 col-lg-4">
						<div class="specialty-item">
							<img class="img-responsive" src="{{$img->url}}">
							<h5 class="text-center">{{$img->title}}</h5>
							<p>{{str_limit($img->description, 50)}}</p>
						</div>
					</div>
					@endforeach
					<!--<div class="col-md-4 col-lg-4">
						<div class="specialty-item">
							<img class="img-responsive" src="http://placehold.it/350x150">
							<h5 class="text-center">Travel</h5>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusamus ullam qui dolore quos voluptatum, doloribus voluptates veniam rem quisquam dolorem architecto facilis minima. Soluta minus, illum reprehenderit vero sunt molestias!</p>
						</div>
					</div>
					<div class=" col-md-4 col-lg-4">
						<div class="specialty-item">
							<img class="img-responsive" src="http://placehold.it/350x150">
							<h5 class="text-center">Landscape</h5>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quas magnam facere, ab quae iusto enim, eveniet nostrum. Tenetur libero quasi beatae est aliquam provident suscipit consequatur, veritatis, a nisi similique.</p>
						</div>
					</div>-->
				</div>
			</div>
		</section>
		<section id="mini-gallery">
			<div class="container-fluid">
				<div class="row">
					<h3 class="latest-items text-center">Latest Work</h3>
					<p class="latest-description text-center">Here are just a few of the latest images I've shot. If you'd like to see more, please visit my full gallery by clicking the button below.</p>
				</div>
				<div class="row">
					@foreach($photos as $photo)
					<div class="col-md-2 col-lg-2">
						<img width="350" height="150" class="img-responsive" src="{{asset($photo->url)}}">
					</div>
					@endforeach
				</div>
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 text-center">
						<a href="{{route('gallery')}}" class="btn btn-photography"><i class="fa fa-image"></i> View Full Gallery</a>
					</div>
				</div>
			</div>
		</section>
		<section id="mini-blog">
			<div class="container">
				<div class="row">
					<h3 class="small-blog text-center">Blog Posts</h3>
				</div>
				<div class="row">
					@foreach($posts as $post)
					<div class="col-md-4 col-lg-4">
						<div class="small-blog-item">
							<h3 class="text-center"><a href="{{route('blog.post', ['slug' => $post->slug])}}">{{$post->title}}</a></h3>
							<h6 class="text-center">{{$post->created_at->format('Y.m.d')}}</h6>
							<img class="img-responsive" src="{{$post->url}}">
							<h4 class="text-center"></h4>
							<p>{!!str_limit($post->content, 200)!!}</p>
							<div class="clearfix">
								<a class="continue-reading pull-left" href="{{route('blog.post', ['slug' => $post->slug])}}">Continue Reading</a>
							</div>
						</div>
					</div>
					@endforeach
				</div>
			</div>
		</section>
		<section id="about">
			<div class="container">
				<div class="row">
					<div class="col-md-6 col-lg-6">
						<h3 class="about-me-title">About Me</h3>
						@foreach($about as $bio)
						<img class="img-responsive" height="150" width="150" src="{{asset($bio->image)}}" alt="My Profile Picture">
						<p class="about-me-text">{!!$bio->bio!!}</p>
						@endforeach
					</div>
				</div>
			</div>
		</section>
		@endsection
