@extends ('admin.layout.adminMaster')
@section ('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Edit Print</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-4 col-sm-6 col-xs-12">
                <form role="form" action="{{route('admin.updatePrint')}}" method="POST" enctype="multipart/form-data">
                   <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                   @foreach($prints as $print)
                   <input type="hidden" name="id" value="{{$print->id}}">
                    <div class="form-group">
                        <label class="control-label" for="print-title">Print Title</label>
                        <input required type="text" class="form-control" name="print-title" value="{{$print->title}}">
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="print-description">Print Description</label>
                        <textarea required rows="20" class="form-control" name="print-description">{{$print->description}}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="print-category" class="control-label">Print Category</label>
                        <input required type="text" class="form-control" name="print-category" value="{{$print->category}}">
                    </div>
                    <div class="form-group">
                        <label for="print-quantity" class="control-label">Enter Print Quantity</label>
                        <input type="number" class="form-control" name="print-quantity" value="{{$print->quantity}}" required>
                    </div>
                    <div class="form-group">
                        <label for="print-url" class="control-label">Upload Print Photo</label>
                        <input type="file" class="form-control" name="print-url" required><span>{{$print->url}}</span>
                    </div>
                    <div class="form-group">
                        <label for="print-price" class="control-label">Enter a price</label>
                        <input type="text" class="form-control" name="print-price" value="{{$print->price}}" required>
                    </div>
                    @endforeach
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-lg">Update</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>



@endsection