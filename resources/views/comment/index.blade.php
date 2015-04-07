@extends('app')

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                        <div class="row">
                            <div class="col-md-8">
                                Your Comments
                            </div>
                            <div class="col-md-2 col-md-offset-2">
                                <a href="/comment/create" class="btn btn-primary">
                                    New Comment
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="panel-body">
                        @foreach( $comments as $comment )
                            @if( Auth::getUser()->id === $comment->user->id )
                                @include('comment.row',['comment'=>$comment])
                            @endif
                        @endforeach
                    </div>
                    <script>
                        $(function(){
                            $('.js-delete').click(function(){
                                var id = $(this).data('id');
                                $.ajax({
                                    url: '/comment/'+id,
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