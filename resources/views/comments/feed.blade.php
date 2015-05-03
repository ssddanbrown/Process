

<div class="comment-box panel panel-default">
    <div class="panel-heading">Comments</div>
    <div class="panel-body">
        {!! Form::open(['class' => 'form', 'url' => $commentable->getLink() . '/comment']) !!}
        <div class="form-group @if ($errors->has('text')) has-error @endif">
            {!! Form::label('text', 'Write a comment') !!}
            {!! Form::textarea('text', null, ['placeholder' => 'Enter your comment', 'class' => 'form-control', 'rows' => 3]) !!}
            @if ($errors->has('text')) <p class="help-block">{{ $errors->first('text') }}</p> @endif
        </div>
        <div class="form-group clearfix">
            <button type="submit" class="pull-right btn btn-success">Comment</button>
        </div>
        {!! Form::close() !!}
    </div>
    <div class="list-group">
        @foreach($commentable->comments as $comment)
            <div class="list-group-item">
                <img class="avatar" src="{{ $comment->user->getAvatar() }}" alt="{{ $comment->user->name }}"/>
                <div class="content">
                    <p class="text-muted">{{ $comment->user->name }} - {{ $comment->created_at->diffForHumans() }}</p>
                    {!! $comment->html !!}
                </div>
            </div>
        @endforeach
    </div>
</div>

