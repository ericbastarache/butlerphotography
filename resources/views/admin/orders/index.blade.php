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
				<div class="col-md-12 col-lg-12">
					<div class="panel panel-default">
						<div class="panel-heading">
							<h3 class="panel-title"><i class="fa fa-money fa-fw"></i> Transactions Panel</h3>
						</div>
						<div class="panel-body">
							<div class="table-responsive">
								<table class="table table-bordered table-hover table-striped">
									<thead>
										<tr>
											<th>Order #</th>
											<th>Order Name</th>
											<th>Order Address</th>
											<th>Order Date</th>
											<th>Payment ID</th>
											<th>Order Details</th>
										</tr>
									</thead>
									<tbody>
										@foreach($orders as $order)
										<tr>
											<td>{{$order->id}}</td>
											<td>{{$order->name}}</td>
											<td>{{$order->address}}</td>
											<td>{{$order->created_at->format('Y-m-d')}}</td>
											<td>{{$order->payment_id}}</td>
											<td><a class="btn btn-sm btn-primary" href="{{route('admin.orderDetails', ['id' => $order->id])}}"><i class="fa fa-eye"></i></a></td>
										</tr>
										@endforeach
										{!! $orders->links() !!}
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>



	@endsection