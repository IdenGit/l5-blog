@extends('app')
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Create new comment</div>
                    <div class="panel-body">
                        <form class="form-horizontal js-form" role="form">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="user_id" value="{{ Auth::getUser()->id }}">
                            <div class="form-group">
                                <label class="col-md-1 control-label">Theme</label>
                                <div class="col-md-11">
                                    <select class="form-control" name="post_id">
                                        @foreach( App\Models\Post::all() as $post )
                                            @if( $comment->post->id == $post->id )
                                                <option value="{{$post->id}}" selected="selected">
                                                    {{$post->title}}
                                                </option>
                                            @else
                                                <option value="{{$post->id}}">{{$post->title}}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-1 control-label">Comment</label>
                                <div class="col-md-11">
                                    <textarea rows="15" class="form-control" name="content">{{ $comment->content }}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-5 col-md-offset-1">
                                    <button type="submit" class="btn btn-primary js-send" style="margin-right: 15px;">
                                        Edit Comment
                                    </button>
                                </div>
                            </div>
                        </form>
                        <script>
                            $('.js-send').click(function(event){
                                event.preventDefault();
                                $.ajax({
                                    url: '/comment/{{ $comment->id }}',
                                    method: 'PUT',
                                    data: $('.js-form').serialize(),
                                    success: function(response) {
                                        $('body').html(response);
                                    }
                                });
                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection