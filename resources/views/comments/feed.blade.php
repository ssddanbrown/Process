<h2>Comments</h2>
@foreach($commentable->comments as $comment)
    <div class="panel panel-default">
        <div class="panel-heading">{{ $comment->user->name }}</div>
        <div class="panel-body">
            {!! $comment->html !!}
        </div>
    </div>
@endforeach
<div class="comment-box panel panel-default">
    <div class="panel-heading">Add a comment</div>
    <div class="panel-body">
        {!! Form::open(['class' => 'form', 'url' => $commentable->getLink() . '/comment']) !!}
        <div class="form-group @if ($errors->has('text')) has-error @endif">
            {!! Form::label('text', 'Comment') !!}
            {!! Form::textarea('text', null, ['placeholder' => 'Enter your comment', 'class' => 'form-control']) !!}
            @if ($errors->has('text')) <p class="help-block">{{ $errors->first('text') }}</p> @endif
        </div>
        <div class="form-group clearfix">
            <button type="submit" class="pull-right btn btn-success">Comment</button>
        </div>
        {!! Form::close() !!}
    </div>
</div>