<div class="container-fluid">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Create new comment</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="/comment">
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <input type="hidden" name="user_id" value="{{ Auth::getUser()->id }}">
                        <input type="hidden" name="post_id" value="{{ $post_id }}">
                        <div class="form-group">
                            <label class="col-md-1 control-label">Comment</label>
                            <div class="col-md-11">
                                <textarea rows="5" class="form-control" name="content">{{ old('content') }}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-md-5 col-md-offset-1">
                                <button type="submit" class="btn btn-primary" style="margin-right: 15px;">
                                    Post Comment
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>