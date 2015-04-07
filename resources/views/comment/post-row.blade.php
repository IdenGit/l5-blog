<div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">
                Author: {{ $comment->user->name }}
                &nbsp;
                Date: {{ $comment->updated_at }}
            </div>
            <div class="panel-body">
                <div>
                    {{ $comment->content }}
                </div>
            </div>
        </div>
    </div>
</div>