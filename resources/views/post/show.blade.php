@extends('app')

@section('content')
    <div class="container-fluid">
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            Author: {{ $post->user->name }}
                            &nbsp;
                            Date: {{ $post->updated_at }}
                        </div>
                        <div class="panel-body">
                            <h2>{{ $post->title  }}</h2>
                            <div>
                                {{ $post->content }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    <div  class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <span class="label label-primary">Comments</span>
            </div>
        </div>
        @foreach( $comments as $comment )
            @include('comment.post-row',['comment'=>$comment])
        @endforeach
        @include('comment.post-create',['post_id'=>$post->id])
    </div>
@endsection