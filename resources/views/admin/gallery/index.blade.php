@extends ('admin.layout.adminMaster')
@section ('content')

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Galleries</h1>
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
                @foreach($galleries as $gallery)
                <div class="well">
                	<h1>{{$gallery->name}}</h1>
                    <a class="btn btn-sm btn-success" href="{{route('admin.editGallery', ['id' => $gallery->id])}}"><i class="fa fa-pencil"></i></a>
                    <a class="btn btn-sm btn-danger" href="{{route('admin.deleteGallery', ['id' => $gallery->id])}}"><i class="fa fa-trash-o"></i></a>
                </div>
                @endforeach
            </div>
        </div>
    </div>
</div>

@endsection