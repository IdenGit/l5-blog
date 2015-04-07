@extends('app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Create new post</div>
                    <div class="panel-body">
                        <form class="form-horizontal js-form" role="form" method="POST" action="/post/{{ $post->id  }}">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <div class="form-group">
                                <label class="col-md-1 control-label">Title</label>
                                <div class="col-md-11">
                                    <input class="form-control" name="title" value="{{ $post->title }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-1 control-label">Message</label>
                                <div class="col-md-11">
                                    <textarea rows="15" class="form-control" name="content">{{ $post->content }}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-5 col-md-offset-1">
                                    <button type="submit" class="btn btn-primary js-send" style="margin-right: 15px;">
                                        Post Message
                                    </button>
                                </div>
                            </div>
                        </form>
                        <script>
                            $('.js-send').click(function(event){
                                event.preventDefault();
                                $.ajax({
                                    url: '/post/{{ $post->id }}',
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