@extends('app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Post Created</div>
                    <div class="panel-body">
                        <a href="/post" class="btn btn-default">All Posts</a>
                        <a href="/post/create" class="btn btn-default">Create another one</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection