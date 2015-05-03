
@extends('app')

@section('content-color', $group->project->color)

@section('content')
    
<div class="project-title clearfix">
    <div class="container-fluid contained">
        <h1>{{ $group->name }}</h1>
    </div>

    <div class="button-group">
        <a href="{{ $group->getLink() . '/settings' }}"><i class="fa fa-cog"></i></a>
    </div>
</div>

<div class="container-fluid contained">
    <p class="text-muted crumbs">
        <a href="{{ $group->project->getLink() }}">{{ $group->project->name }}</a>
    </p>
</div>

<div class="container-fluid contained">
    <div class="row">

        <div class="col-md-6">

            @if(!empty($group->html))
                <div class="panel panel-default">
                    <div class="panel-heading">Details</div>
                    <div class="panel-body">
                        {!! $group->html !!}
                    </div>
                </div>
            @endif

            @include('comments/feed', ['commentable' => $group])
        </div>

        <div class="col-md-6">
            <div class="comment-box panel panel-default">
                <div class="panel-heading">Tasks</div>
                <div class="list-group">
                    @include('task/parts/list', ['tasks' => $group->tasks])
                </div>
                @include('task/parts/panel-form', ['group' => $group])
            </div>
        </div>


    </div>

</div>
@endsection