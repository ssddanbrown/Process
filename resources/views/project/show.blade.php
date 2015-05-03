
@extends('app')

@section('content-color', $project->color)

@section('content')

<div class="project-title clearfix">
    <div class="container-fluid contained">
        <h1>{{ $project->name }}</h1>
    </div>

    <div class="button-group">
        <a href="{{ $project->getLink() . '/settings' }}"><i class="fa fa-cog"></i></a>
    </div>
</div>

<div class="container-fluid contained">



    <div class="row">

        {{--Left Column--}}
        <div class="col-md-6">

            @if(!empty($project->html))
                <div class="panel panel-default">
                    <div class="panel-heading">Details</div>
                    <div class="panel-body">
                        {!! $project->html !!}
                    </div>
                </div>
            @endif

            @include('comments/feed', ['commentable' => $project])

        </div>

        {{--Right Column--}}
        <div class="col-md-6">
            @include('group/parts/list-with-tasks', ['groups' => $project->groups, 'return' => 'project'])

            <p class="text-center">
                <a class="text-muted" href="{{ $project->getLink() . '/group/new' }}"><i class="fa fa-plus"></i> Add new group</a>
            </p>

        </div>

    </div>

</div>
@endsection

