@extends ('admin.layout.adminMaster')
@section ('content')

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">About</h1>
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
            <span><a class="btn btn-rounded" href="{{route('admin.createAbout')}}"><i class="fa fa-fw fa-plus"></i> </a></span>
                @foreach($about as $bio)
                <div class="well">
                	<p>{{$bio->bio}}</p>
                    <img src="{{asset($bio->image)}}" alt="Profile Picture">
                    <a class="btn btn-sm btn-danger" href="{{route('admin.editAbout', ['id' => $bio->id])}}"><i class="fa fa-pencil"></i></a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection