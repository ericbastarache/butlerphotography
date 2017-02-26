@extends ('admin.layout.adminMaster')
@section ('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Edit Post</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-4 col-sm-6 col-xs-12">
                <form role="form" action="{{route('admin.updatePost')}}" method="POST" enctype="multipart/form-data">
                   <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                   @foreach($posts as $post)
                   <input type="hidden" name="id" value="{{$post->id}}">
                    <div class="form-group">
                        <label class="control-label" for="post-title">Post Title</label>
                        <input type="text" class="form-control" name="post-title" value="{{$post->title}}" placeholder="Enter a title">
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="post-content">Post Content</label>
                        <textarea rows="20" class="form-control" name="post-content" placeholder="Enter content for your post me section">{{$post->content}}</textarea>
                    </div>
                    <div class="form-group">
                        <input type="file" class="form-control" name="post-url" required><span>Current Image: {{$post->url}}</span>
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