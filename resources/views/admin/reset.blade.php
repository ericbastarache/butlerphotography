@extends('admin.layout.adminMaster')

@section('content')

<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Change Password</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-4 col-sm-6 col-xs-12">
                <form role="form" action="{{route('admin.changePassword')}}" method="POST">
                   <input type="hidden" name="_token" value="{{{ csrf_token() }}}" />
                    <div class="form-group">
                        <label class="control-label" for="new-password">New Password</label>
                        <input type="password" class="form-control" name="new-password" placeholder="Enter a new password">
                    </div>
                    <div class="form-group">
                        <label class="control-label" for="confirm-password">Confirm Password</label>
                        <input type="password" class="form-control" name="confirm-password" placeholder="Confirm new password">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-success btn-lg">Update Password</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@endsection