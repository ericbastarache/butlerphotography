@extends('admin.layout.adminMaster')
@section('content')

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">New Print</h1>
            </div>
        </div>
        @if(Session::has('success'))
        <div class="row">
            <div class="col-lg-12">
                <div class="alert alert-success">
                {{Session::get('success')}}
                </div>
            </div>
        </div>
        @endif
        <div class="row">
            <div class="col-lg-6 col-md-4 col-sm-6 col-xs-12">
                <form role="form" action="{{route('admin.createPrint')}}" method="POST" enctype="multipart/form-data">
                   <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                    <div class="form-group">
                        <label class="control-label" for="print-title">Print Title</label>
                        <input required type="text" class="form-control" name="print-title" placeholder="Enter a title for your print">
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="print-description">Print Description</label>
                        <textarea required rows="20" class="form-control" name="print-description" placeholder="Enter description for your print"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="print-category" class="control-label">Print Category</label>
                        <input required type="text" class="form-control" name="print-category" placeholder="Enter a category for your print">
                    </div>
                    <div class="form-group">
                        <label for="print-quantity" class="control-label">Enter Print Quantity</label>
                        <input type="number" class="form-control" name="print-quantity" placeholder="Enter quantity of prints" required>
                    </div>
                    <div class="form-group">
                        <label for="print-url" class="control-label">Upload Print Photo</label>
                        <input type="file" class="form-control" name="print-url" required>
                    </div>
                    <div class="form-group">
                        <label for="print-price" class="control-label">Enter a price</label>
                        <input type="text" class="form-control" name="print-price" placeholder="Enter a price for your print" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success btn-lg">Add Print</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



@endsection