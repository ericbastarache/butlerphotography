@extends ('admin.layout.adminMaster')
@section ('content')

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">All photos</h1>
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
             <span><a class="btn btn-rounded" href="{{route('admin.newPhoto')}}"><i class="fa fa-fw fa-plus"></i> </a></span>
             <div class="table-responsive">
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th>Photo ID</th>
                            <th>Photo Title</th>
                            <th>Photo Description</th>
                            <th>Photo Image</th>
                            <th>Update</th>
                            <th>Delete</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($photos as $photo)
                        <tr>
                            <td>{{$photo->id}}</td>
                            <td>{{$photo->title}}</td>
                            <td>{{str_limit($photo->description, 150)}}</td>
                            <td><img src="{{asset($photo->url)}}" alt="photo Image" width="50px" height="50px"></td>
                            <td><a href="{{route('admin.deletePhoto')}}" class="btn btn-danger"><i class="fa fa-fw fa-trash"></i></a></td>
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