@extends ('admin.layout.adminMaster')
@section ('content')


<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Update About</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-4 col-sm-6 col-xs-12">
                <form role="form" action="{{route('admin.updateAbout')}}" method="POST" enctype="multipart/form-data">
                   <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                   @foreach($about as $bio)
                    <div class="form-group">
                        <input type="hidden" name="id" value="{{$bio->id}}">
                        <label class="control-label" for="about-text">About Me</label>
                        <textarea rows="10" class="form-control" name="about-text" required>{{$bio->bio}}</textarea>
                    </div>
                    <div class="form-group">
                    	<input type="file" class="form-control" name="about-url" required><span>Current Image: {{$bio->image}}</span>
                    </div>
                    @endforeach
                    <div class="form-group">
                        <button type="submit" class="btn btn-success btn-lg">Publish About Me</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection