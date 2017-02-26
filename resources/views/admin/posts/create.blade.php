@extends ('admin.layout.adminMaster')
@section('content')

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Write Blog Post</h1>
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
                <form role="form" action="{{route('admin.createPost')}}" method="POST" enctype="multipart/form-data">
                   <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                    <div class="form-group">
                        <label class="control-label" for="post-title">Post Title</label>
                        <input type="text" class="form-control" name="post-title" placeholder="Enter a title for your blog post" required>
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="post-content">Post Content</label>
                        <textarea rows="20" class="form-control" name="post-content" placeholder="Enter content for your post" required></textarea>
                    </div>
                    <div class="form-group">
                        <input type="file" class="form-control" name="post-url" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary btn-lg">Post</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
