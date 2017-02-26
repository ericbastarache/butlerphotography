@extends('layout.master')
@section('meta-information')
<meta name="description" content="Lorem ipsum dolor amet">
<meta name="keywords" content="photography, blog, portfolio, store, prints, contact, email, phone">
@endsection
@section('title', 'Butler Photography - Contact')

@section('content')
<section id="contact">
	<div class="container">
		<div class="row">
			<div class="col-md-6 col-lg-6">
				<h2>Feel Free to Shoot Me a Message</h2>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Tenetur earum magni esse, ipsum aspernatur natus modi dicta nemo excepturi sit repellat qui rem! Deleniti consequuntur illum sint expedita tempore quasi.</p>
				<form action="post" class="form-horizontal">
					<div class="form-group">
					<input type="text" id="name" name="name" placeholder="Enter your name" class="form-control" required>
					</div>
					<div class="form-group">
						<input type="text" id="email" name="email" placeholder="Enter your email" class="form-control" required>
					</div>
					<div class="form-group">
						<textarea class="form-control" name="message" id="message" placeholder="Enter your message" rows="5" required></textarea>
					</div>
					<div class="form-group">
						<button class="btn">Submit</button>
					</div>
				</form>
			</div>
			<div class="col-md-6 col-lg-6">
				<h2 class="address-head">Address</h2>
				<address>
					Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nemo omnis a adipisci dolores recusandae sed culpa ea quia accusamus cum maiores illo rerum incidunt magni, aliquid laudantium architecto deleniti, praesentium!<br><br>
					<strong>Butler Photography</strong><br><br>
					134 Hillingdon Avenue<br>
					Toronto, Ontario, M4C 5S4<br>
					P: <span>(416) 837-9149</span><br>
					E: <a href="mailto:aibhlin.b031913@hotmail.ca">aibhlin.b031913@hotmail.ca</a>
				</address>
			</div>
		</div>
	</div>
</section>
@endsection