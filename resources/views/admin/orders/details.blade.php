@extends('admin.layout.adminMaster')

@section('content')


<div class="page-wrapper">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<h1 class="page-header">
					Orders <small>Orders Overview</small>
				</h1>
				<ol class="breadcrumb">
					<li class="active">
						<i class="fa fa-money"></i> Orders
					</li>
				</ol>
			</div>
		</div>
		<div class="row">
		@foreach($orders as $order)
			<div class="col-md-12 col-lg-12">
				<h3>Order ID: {{$order->id}}</h3>
				<p><strong>Customer Name:</strong> {{$order->name}}</p>
				<p><strong>Customer Address:</strong> {{$order->address}}</p>
				<p><strong>Order Placed:</strong> {{$order->created_at->format('Y-m-d')}}</p>
				@foreach($order->cart->items as $item)
				<p><strong>Order Total:</strong> ${{$item['price']}}</p>
				<p><strong>Item ID: </strong>{{$item['item']['id']}}</p>
				<p><strong>Item Name:</strong> {{$item['item']['title']}}</p>
				<p><strong>Total Quantity Ordered:</strong> {{$item['quantity']}}</p>
				@endforeach
			</div>
		@endforeach
		</div>
	</div>
</div>



@endsection