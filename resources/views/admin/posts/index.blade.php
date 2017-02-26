@extends('admin.layout.adminMaster')
@section('content')

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">All Posts</h1>
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
        @if(Session::has('deleted'))
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="alert alert-warning">
                    {{Session::get('deleted')}}
                </div>
            </div>
        </div>
        @endif
        @if(Session::has('error'))
        <div class="row">
            <div class="col-md-12 col-lg-12">
                <div class="alert alert-danger">
                    {{Session::get('error')}}
                </div>
            </div>
        </div>
        @endif
        <div class="row">
            <div class="col-lg-6 col-md-4 col-sm-6 col-xs-12">
               <span><a class="btn btn-rounded" href="{{route('admin.createPost')}}"><i class="fa fa-fw fa-plus"></i> </a></span>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th>Post ID</th>
                                <th>Post Title</th>
                                <th>Post Slug</th>
                                <th>Post Image</th>
                                <th>Post Content</th>
                                <th>Update</th>
                                <th>Delete</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($posts as $post)
                            <tr>
                                <td>{{$post->id}}</td>
                                <td>{{$post->title}}</td>
                                <td>{{$post->slug}}</td>
                                <td>{{$post->url}}</td>
                                <td>{{str_limit($post->content, 150)}}</td>
                                <td><a href="{{route('admin.editPost', ['id' => $post->id])}}" class="btn btn-success"><i class="fa fa-fw fa-pencil"></i></a></td>
                                <td><a href="{{route('admin.deletePost', ['id' => $post->id])}}" class="btn btn-danger"><i class="fa fa-fw fa-trash"></i></a></td>
                                
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>




@endsection