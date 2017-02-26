@extends ('admin.layout.adminMaster')
@section ('content')


<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">New Photo</h1>
            </div>
        </div>
        @if(Session::has('success'))
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="alert alert-success">
                    {{Session::get('success')}}
                </div>
            </div>
        </div>
        @endif
        <div class="row">
            <div class="col-lg-6 col-md-4 col-sm-6 col-xs-12">
                <form role="form" action="{{route('admin.newPhoto')}}" method="POST" enctype="multipart/form-data">
                   <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                    <div class="form-group">
                        <label class="control-label" for="photo-title">Photo Title</label>
                        <input required type="text" class="form-control" name="photo-title" placeholder="Enter a title for your photo">
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="photo-description">Photo Description</label>
                        <textarea required rows="20" class="form-control" name="photo-description" placeholder="Enter description for your photo"></textarea>
                    </div>
                    <div class="form-group">
                    	<label for="photo-url" class="control-label"></label>
                    	<input type="file" class="form-control" name="photo-url" required>
                    </div>
                    <div class="form-group">
                    	<label for="gallery-id" class="control-label">Select Gallery</label>
                    	<select name="gallery-id" id="">
                    		@foreach($galleries as $gallery)
                    		<option name="gallery-name" value="{{$gallery->id}}">{{$gallery->name}}</option>
                    		@endforeach
                    	</select>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success btn-lg">Add photo</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection