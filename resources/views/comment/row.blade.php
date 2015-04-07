
<div class="container-fluid js-row-{{$comment->id}}">
    <div class="row">
        <div class="col-md-3">
            User : {{ $comment->user->name  }}<br/>
            Date : {{ $comment->created_at }}
        </div>
        <div class="col-md-6">
            Post : <a href="/post/{{ $comment->post->id }}">
                {{ $comment->post->title  }}
            </a>
            <br/>
            Comment: {{ $comment->content }}
        </div>
        <div class="col-md-3">
            <a href="/comment/{{$comment->id}}/edit" class="btn btn-sm btn-default">Изменить</a>
            <span class="btn btn-sm btn-warning js-delete" data-id="{{ $comment->id }}">Удалить</span>
        </div>
    </div>
</div>
