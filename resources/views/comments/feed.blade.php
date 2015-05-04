

<div class="comment-box panel panel-default">
    <div class="panel-heading">Comments</div>
    <div class="panel-form">
        {!! Form::open(['class' => 'form', 'url' => $commentable->getLink() . '/comment']) !!}
        <div class="form-group @if ($errors->has('text')) has-error @endif">


        </div>
        <div class="input-group clearfix">
            {!! Form::textarea('text', null, ['placeholder' => 'Enter a comment', 'class' => 'form-control', 'rows' => 3]) !!}
            <div class="input-group-btn">
                <button type="submit" class="btn btn-success">Comment</button>
            </div>
        </div>
        @if ($errors->has('text')) <p class="help-block">{{ $errors->first('text') }}</p> @endif
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

