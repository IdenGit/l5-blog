@extends('app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-8">
                                posts
                            </div>
                            <div class="col-md-2 col-md-offset-2">
                                <a href="/post/create" class="btn btn-primary">
                                    New Post
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        @foreach( $posts as $post )
                            @if( Auth::getUser()->id === $post->user->id )
                                @include('post.row',['post'=>$post])
                            @endif
                        @endforeach
                    </div>
                    <script>
                        $(function(){
                            $('.js-delete').click(function(){
                                var id = $(this).data('id');
                                $.ajax({
                                    url: '/post/'+id,
                                    method: 'DELETE',
                                    data: '_token={{ csrf_token() }}',
                                    success: function(response) {
                                        $('.js-row-'+id).remove();
                                    }
                                });
                            });
                        });
                    </script>
                </div>
            </div>
        </div>
    </div>
@endsection