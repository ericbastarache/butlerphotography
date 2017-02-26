@extends ('admin.layout.adminMaster')
@section ('content')


<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Update Gallery</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-4 col-sm-6 col-xs-12">
                <form role="form" action="{{route('admin.updateGallery')}}" method="POST">
                   <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                    @foreach($gallery as $showcase)
                    <input type="hidden" name="id" value="{{$showcase->id}}">
                    <div class="form-group">
                        <label class="control-label" for="gallery-name">Gallery Name</label>
                        <input type="text" class="form-control" name="gallery-name" value="{{$showcase->name}}" required>
                    </div>
                    @endforeach
                    <div class="form-group">
                        <button type="submit" class="btn btn-success btn-lg">Update Gallery</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection