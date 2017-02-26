@extends('layout.master')
@section('title', 'Butler Photography - title?')

@section('content')
<div class="container-fluid">
			<div class="row">
				<div class="col-md-12 col-lg-12 padding-0">
					<img src="{{URL::asset('images/header-image.jpg')}}" alt="" class="blog-image-head img-responsive">
				</div>
			</div>
		</div>
		<section id="blog-post">
			<div class="container">
				<div class="row">
					<div class="col-md-8 col-lg-8">
						@foreach($post as $blogPost)
						<div class="blog-item">
							<h3 class="text-center">{{$blogPost->title}}</h3>
							<h6 class="text-center">{{$blogPost->created_at->format('Y.m.d')}}</h6>
							<img src="{{asset($blogPost->url) ? asset($blogPost->url) : 'http://placehold.it/150x150'}}" alt="{{$blogPost->url ? 'Blog post image' : 'Placeholder image'}}" class="post-img img-responsive">
							<ul class="text-center blog-share-icons">
								<li><button class="twitter-icon">Tweet</button></li>
							</ul>
							<p>{!! $blogPost->content !!}</p>
						</div>
						@endforeach
						<div class="author-section">
							<h3>About Evelyn</h3>
							<img src="http://placehold.it/100x100" alt="" class="img-responsive">
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Earum consequuntur tempore harum, nulla repellat! Accusamus est fuga vitae dolorum non aut magnam, nulla eveniet nobis praesentium ab dolorem explicabo officia.</p>
							<ul class="author-share-icons">
								<li><a class="facebook-icon" href="https://www.facebook.com/Butler-Photography-218660738232669/"><i class="fa fa-facebook"></i></a></li>
								<li><a class="instagram-icon" href="#"><i class="fa fa-instagram"></i></a></li>
								<li><a class="twitter-icon" href="https://twitter.com/e_s_butler"><i class="fa fa-twitter"></i></a></li>
							</ul>
						</div>
					</div>
					<div class="col-md-4 col-lg-4">
						<form action="{{route('search')}}" class="form-horizontal" method="GET">
							<div class="input-group">
								<input type="text" name="q" class="form-control" placeholder="Search for Posts">
								<span class="input-group-btn">
									<button type="submit" class="btn btn-search">Find</button>
								</span>
							</div>
						</form>
						<h4 class="recent-posts">Recent Posts</h4>
						@foreach($recentPosts as $recent)
						<div class="post-item">
							<img width="50px" height="50px" src="{{asset($recent->url) ? asset($recent->url) : 'http://placehold.it/70x70'}}" alt="Blog post image" class="img-responsive">
							<h5 class="post-title"><a href="{{route('blog.post', ['slug' => $recent->slug])}}">{{$recent->title}}</a></h5>
							<h6 class="post-date">{{$recent->created_at->format('Y.m.d')}}</h6>
						</div>
						@endforeach
					</div>
				</div>
			</div>
		</section>
		@endsection
		@section('scripts')
		<script src="{{asset('js/tweetScript.js')}}"></script>
		@endsection