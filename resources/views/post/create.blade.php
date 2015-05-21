@extends('app')

@section('content')

    @foreach($errors->getBags() as $bag)
        @foreach($bag->getMessages() as $messages)
            @foreach($messages as $message)
                {{ $message }} <br/>
            @endforeach
        @endforeach
    @endforeach

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Create new post</div>
                    <div class="panel-body">
                        <form class="form-horizontal" role="form" method="POST" action="/post">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">

                            <div class="form-group">
                                <label class="col-md-1 control-label">Title</label>
                                <div class="col-md-11">
                                    <input class="form-control" name="title" value="{{ old('title') }}">
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-md-1 control-label">Message</label>
                                <div class="col-md-11">
                                    <textarea rows="15" class="form-control" name="content">{{ old('content') }}</textarea>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="col-md-5 col-md-offset-1">
                                    <button type="submit" class="btn btn-primary" style="margin-right: 15px;">
                                        Post Message
                                    </button>
                                </div>
                            </div>


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection