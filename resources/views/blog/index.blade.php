@extends('layout.master')
@section('meta-information')
<meta name="description" content="Lorem ipsum dolor amet">
<meta name="keywords" content="photography, blog, portfolio, store, prints, posts, nature, travel, landscape">
@endsection
@section('title', 'Butler Photography - Blog')
@section('content')
<div class="container-fluid">
			<div class="row">
				<div class="col-md-12 col-lg-12 padding-0">
					<img src="{{URL::asset('images/header-image.jpg')}}" alt="" class="blog-image-head img-responsive">
				</div>
			</div>
		</div>
		<section id="blog-posts">
			<div class="container">
				<div class="row">
					@foreach($posts as $post)
					<div class="col-md-4 col-lg-4">
						<div class="small-blog-item">
							<h3 class="text-center"><a href="{{route('blog.post', ['slug' => $post->slug])}}">{{$post->title}}</a></h3>
							<h6 class="text-center">{{$post->created_at->format('Y.m.d')}}</h6>
							<img class="img-responsive" src="{{asset($post->url) ? asset($post->url) : 'http://placehold.it/350x150'}}">
							<p>{!!str_limit($post->content, 200)!!}</p>
							<div class="clearfix">
								<a class="continue-reading pull-left" href="{{ route('blog.post', ['slug' => $post->slug]) }}">Continue Reading</a>
							</div>
						</div>
					</div>
					@endforeach
					{!! $posts->links() !!}
				</div>
			</div>
		</section>
		@endsection