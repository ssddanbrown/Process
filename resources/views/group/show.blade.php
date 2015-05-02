
@extends('app')

@section('content')
<div class="container">
    
    <div class="page-header clearfix">
        <h1 class="pull-left"><a href="{{ $group->project->getLink() }}">{{ $group->project->name }}</a> / {{ $group->name }}</h1>
        <div class="button-group pull-right">
            <a class="btn btn-default" href="{{ $group->getLink() . '/settings' }}">Settings</a>
        </div>
    </div>

    <div class="text-muted">
        {!! $group->html !!}
    </div>

    <div class="row">

        <div class="col-md-6">
            @include('comments/feed', ['commentable' => $group])
        </div>

        <div class="col-md-6">
            <h2>Tasks</h2>
            <div class="list-group">
                @foreach($group->tasks as $task)
                    <div class="list-group-item">
                        <a href="{{ $task->getLink() }}">{{ $task->name }}</a>
                    </div>
                @endforeach
            </div>
            <div class="comment-box panel panel-default">
                <div class="panel-heading">Add a Task</div>
                <div class="panel-body">
                    {!! Form::open(['class' => 'form', 'url' => $group->project->getLink() . '/task/create']) !!}
                        {!! Form::hidden('group_id', $group->id) !!}
                        <div class="form-group @if ($errors->has('name')) has-error @endif">
                            {!! Form::label('name', 'Add a new task') !!}
                            <div class="input-group">
                                {!! Form::text('name', null, ['placeholder' => 'Enter your task', 'class' => 'form-control', 'tabindex' => '1']) !!}
                                <span class="input-group-btn">
                                    <button type="submit" class="btn btn-success">Add Task</button>
                                </span>
                            </div>
                            @if ($errors->has('name')) <p class="help-block">{{ $errors->first('name') }}</p> @endif
                        </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>


    </div>

</div>
@endsection