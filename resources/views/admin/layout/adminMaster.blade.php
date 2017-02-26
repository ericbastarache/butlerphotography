<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="Cache-Control: max-age=86400" content="public">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin - Bootstrap Admin Template</title>

    <!-- Bootstrap Core CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="{{asset('css/sb-admin.css')}}" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>

    <div id="wrapper">

        <!-- Navigation -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="{{route('admin.dashboard')}}">Butler Photography Admin</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                   @if (Auth::check())
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user"></i> {{Auth::user()->name}} <b class="caret"></b></a>
                    @endif
                    <ul class="dropdown-menu">
                        <li>
                            <a href="{{route('admin.changePassword')}}"><i class="fa fa-fw fa-gear"></i> Change Password</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="{{route('admin.logout')}}"><i class="fa fa-fw fa-power-off"></i> Log Out</a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <li class="{{(Request::is('/admin/') ? 'active' : '')}}">
                        <a href="{{route('admin.dashboard')}}"><i class="fa fa-fw fa-dashboard"></i> Dashboard</a>
                    </li>
                    <li class="{{(Request::is('/about') ? 'active' : '')}}">
                        <a href="{{route('admin.about')}}"><i class="fa fa-fw fa-user"></i> About</a>
                    </li>
                    <li class="{{(Request::is('admin/dashboard/posts/*') ? 'active' : '')}}">
                        <a href="javascript:;" data-toggle="collapse" data-target="#blog"><i class="fa fa-fw fa-pencil"></i> Blog <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="blog" class="collapse">
                           <li>
                                <a href="{{route('admin.listPosts')}}"><i class="fa fa-fw fa-eye"></i> All Posts</a>
                            </li>
                            <li>
                                <a href="{{route('admin.createPost')}}"><i class="fa fa-fw fa-pencil"></i> Write Post</a>
                            </li>
                        </ul>
                    </li>
                    <li class="{{(Request::is('admin/dashboard/gallery/*') ? 'active' : '')}}">
                        <a href="javascript:;" data-toggle="collapse" data-target="#galleries"><i class="fa fa-fw fa-image"></i> Galleries <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="galleries" class="collapse">
                            <li>
                                <a href="{{route('admin.gallery')}}"><i class="fa fa-fw fa-image"></i> View Galleries</a>
                            </li>
                            <li>
                                <a href="{{route('admin.createGallery')}}"><i class="fa fa-fw fa-pencil"></i> Create New Gallery</a>
                            </li>
                        </ul>
                    </li>
                    <li class="{{(Request::is('admin/dashboard/photos/*') ? 'active' : '')}}">
                        <a href="javascript:;" data-toggle="collapse" data-target="#photos"><i class="fa fa-fw fa-image"></i> Photos <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="photos" class="collapse">
                            <li>
                                <a href="{{route('admin.showPhotos')}}"><i class="fa fa-eye"></i> View Photos</a>
                            </li>
                            <li>
                                <a href="{{route('admin.newPhoto')}}"<i class="fa fa-arrow-up"></i> Upload Photos</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="{{route('admin.orders')}}"><i class="fa fa-fw fa-money"></i> Orders</a>
                    </li>
                    <li class="{{(Request::is('admin/dashboard/prints/*') ? 'active' : '')}}">
                        <a href="javascript:;" data-toggle="collapse" data-target="#prints"><i class="fa fa-fw fa-image"></i> Prints <i class="fa fa-fw fa-caret-down"></i></a>
                        <ul id="prints" class="collapse">
                            <li>
                                <a href="{{route('admin.listPrints')}}"><i class="fa fa-eye"></i> View Prints</a>
                            </li>
                            <li>
                                <a href="{{route('admin.createPrint')}}"><i class="fa fa-plus"></i> Add Prints</a>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a target="_blank" href="{{route('index')}}"><i class="fa fa-fw fa-dashboard"></i> View Site</a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>
        @yield('content')

    </div>
    <!-- /#wrapper -->

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.3/jquery.min.js"></script>
    <script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

</body>

</html>
