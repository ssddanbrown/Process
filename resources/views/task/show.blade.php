

@extends('app')

@section('content-color', $task->group->project->color)

@section('content')


    <div class="project-title clearfix">
        <div class="container-fluid contained">
            <h1>{{ $task->name }}</h1>
        </div>
        <div class="button-group">
            <a href="{{ $task->getLink() . '/settings' }}"><i class="fa fa-cog"></i></a>
        </div>
    </div>

    <div class="container-fluid contained">
        <p class="text-muted crumbs">
            <a href="{{ $task->group->project->getLink() }}">{{ $task->group->project->name }}</a> /
            <a href="{{ $task->group->getLink() }}">{{ $task->group->name }}</a>
        </p>
    </div>


    <div class="container-fluid contained">
        <div class="row">

            @if(!empty($task->html))
                <div class="col-md-6">
                    <div class="panel panel-default">
                        <div class="panel-heading">Details</div>
                        <div class="panel-body">
                            {!! $task->html !!}
                        </div>
                    </div>
                </div>
            @endif

            <div class="col-md-6">
                @include('comments/feed', ['commentable' => $task])
            </div>

        </div>

    </div>
@endsection