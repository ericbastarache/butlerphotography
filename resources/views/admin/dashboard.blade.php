@extends('admin.layout.adminMaster')
@section('content')
<div id="page-wrapper">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">
                    Dashboard <small>Site Overview</small>
                </h1>
                <ol class="breadcrumb">
                    <li class="active">
                        <i class="fa fa-dashboard"></i> Dashboard
                    </li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Formatting Guide</h3>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>Markup</th>
                                        <th>What it does</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><code>&lt;p&gt;Content here&lt;/p&gt;</code></td>
                                        <td>Allows you to break content up into multiple paragraphs rather than just one large paragraph.</td>
                                    </tr>
                                    <tr>
                                        <td><code>&lt;br /&gt;</code></td>
                                        <td>Inserts a single line break where you specify.</td>
                                    </tr>
                                    <tr>
                                        <td><code>&lt;u&gt;Underlines content&lt;/u&gt;</code></td>
                                        <td><u>Underlines</u> content you specify to underline.</td>
                                    </tr>
                                    <tr>
                                        <td><code>&lt;i&gt;&lt;/i&gt;</code></td>
                                        <td><i>Italicizes</i> content you specify to be italicized.</td>
                                    </tr>
                                    <tr>
                                        <td><code>&lt;strong&gt;&lt;/strong&gt;</code></td>
                                        <td><strong>Emphasizes</strong> content you specify to need emphasis.</td>
                                    </tr>
                                    <tr>
                                        <td><code>&lt;b&gt;&lt;/b&gt;</code></td>
                                        <td><b>Bolds</b> content you specify to be bold. Note: <code>&lt;b&gt;&lt;/b&gt;</code> should be used to bold content so as to avoid confusion for anyone who wishes to "hear" the tags on your site (accessibility for all).</td>
                                    </tr>
                                    <tr>
                                        <td><code>&lt;em&gt;&lt;/em&gt;</code></td>
                                        <td><em>Emphasizes</em> italicized content you want to be italicized.</td>
                                    </tr>
                                    <tr>
                                        <td><code>&lt;mark&gt;&lt;/mark&gt;</code></td>
                                        <td><mark>Highlights</mark> content you want to be highlighted.</td>
                                    </tr>
                                    <tr>
                                        <td><code>&lt;small&gt;&lt;/small&gt;</code></td>
                                        <td>Makes text <small>smaller</small> wherever needed in your content.</td>
                                    </tr>
                                    <tr>
                                        <td><code>&lt;del&gt;&lt;/del&gt;</code></td>
                                        <td>Specifies text which was originally in the content but was <del>deleted.</del> Important if you want to make corrections but still want your users to know what was needing to be corrected in the first place.</td>
                                    </tr>
                                    <tr>
                                        <td><code>&lt;ins&gt;&lt;/ins&gt;</code></td>
                                        <td>Shows text that was <ins>inserted</ins> into your content. Useful for accessibility purposes as well as to show content that was added later.</td>
                                    </tr>
                                    <tr>
                                        <td><code>&lt;sub&gt;&lt;/sub&gt;</code></td>
                                        <td>Defines text that was <sub>subscripted</sub> within your content.</td>
                                    </tr>
                                    <tr>
                                        <td><code>&lt;sup&gt;&lt;/sup&gt;</code></td>
                                        <td>Defintes text that wa <sup>superscripted</sup> within your content.</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-clock-o fa-fw"></i> Recent Posts</h3>
                    </div>
                    <div class="panel-body">
                        <div class="list-group">
                            @foreach($posts as $post)
                            <a target="_blank" href="{{route('blog.post', ['slug' => $post->slug])}}" class="list-group-item">
                                <div>{{$post->title}}</div>
                            </a>
                            @endforeach
                        </div>
                        <div class="text-right">
                            <a href="{{route('admin.listPosts')}}">View All Posts <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title"><i class="fa fa-money fa-fw"></i> Transactions Panel</h3>
                    </div>
                    <div class="panel-body">
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>Order #</th>
                                        <th>Order Name</th>
                                        <th>Order Address</th>
                                        <th>Order Date</th>
                                        <th>Payment ID</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($orders as $order)
                                    <tr>
                                        <td>{{$order->id}}</td>
                                        <td>{{$order->name}}</td>
                                        <td>{{$order->address}}</td>
                                        <td>{{$order->created_at}}</td>
                                        <td>{{$order->payment_id}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="text-right">
                            <a href="{{route('admin.orders')}}">View All Transactions <i class="fa fa-arrow-circle-right"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection