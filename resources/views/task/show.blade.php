


@extends('app')

@section('content')
    <div class="container">

        <div class="page-header clearfix">
            <h1 class="pull-left">
                <a href="{{ $task->group->project->getLink() }}">{{ $task->group->project->name }}</a> /
                <a href="{{ $task->group->getLink() }}">{{ $task->group->name }}</a> /
                {{ $task->name }}
            </h1>
            <div class="button-group pull-right">
                <a class="btn btn-default" href="{{ $task->getLink() . '/settings' }}">Settings</a>
            </div>
        </div>

        <div class="text-muted">
            {!! $task->html !!}
        </div>

        <div class="row">

            <div class="col-md-6">
                @include('comments/feed', ['commentable' => $task])
            </div>

        </div>

    </div>
@endsection