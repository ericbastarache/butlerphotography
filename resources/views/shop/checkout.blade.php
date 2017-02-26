@extends('layout.master')

@section('title', 'Shopping Cart')

@section('content')

<section id="checkout">
	<div class="container">
		<div class="row">
			<div class="col-sm-6 col-md-4 col-md-offset-4 col-sm-offset-3">
				<h1>Checkout</h1>
				<h4>Your Total: $ {{ $total }}</h4>
				<div class="payment-errors alert alert-danger {{ !Session::has('error') ? 'hidden' : '' }}">
					{{ Session::get('error') }}
				</div>
				<form action="{{ route('checkout') }}" name="checkoutForm" method="post" id="checkout-form">
					<div class="row">
						<div class="col-xs-12">
							<div class="form-group">
								<label for="name">Name</label>
								<input type="text" name="cust_name" id="name" class="form-control" placeholder="Enter Your Name" required>
							</div>
						</div>
						<div class="col-xs-12">
							<div class="form-group">
								<label for="address">Address</label>
								<input type="text" name="address" id="address" class="form-control" placeholder="Enter Your Full Address" required>
							</div>
						</div>
						<hr>
						<div class="col-xs-12">
							<div class="form-group">
								<label for="card-name">Card Holder</label>
								<input type="text" data-stripe="name" id="card-name" class="form-control" placeholder="Enter Card Holder Name" required>
							</div>
						</div>
						<div class="col-xs-12">
							<div class="form-group">
								<label for="card-number">Card Number</label>
								<input type="text" id="card-number" class="form-control" placeholder="0000 0000 0000 0000" data-stripe="number" required>
							</div>
						</div>
						<div class="col-xs-12">
							<div class="row">
								<div class="col-xs-6">
									<div class="form-group">
										<label for="card-expiry-month">Expiration Month</label>
										<input maxlength="2" type="text" id="card-expiry-month" class="form-control" placeholder="MM" data-stripe="exp_month" required>
									</div>
								</div>
								<div class="col-xs-6">
									<div class="form-group">
										<label for="card-expiry-year">Expiration Year</label>
										<input maxlength="2" type="text" id="card-expiry-year" class="form-control" placeholder="YY" data-stripe="exp_year" required>
									</div>
								</div>
							</div>
						</div>
						<div class="col-xs-12">
							<div class="form-group">
								<label for="card-cvc">Card CVC</label>
								<input type="text" id="card-cvc" class="form-control" placeholder="###" data-stripe="cvc" required>
							</div>
						</div>
					</div>
					{{ csrf_field() }}
					<button type="submit" class="btn btn-success">Buy Now</button>
				</form>
			</div>
		</div>
	</div>
</section>



@endsection
@section ('scripts')
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
<script type="text/javascript" src="{{ URL::to('js/checkout.js') }}"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery.payment/3.0.0/jquery.payment.min.js"></script>
<!--<script type="text/javascript" src="{{URL::to('js/validateForm.js')}}"></script>-->
@endsection