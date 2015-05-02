
@extends('app')

@section('content')
<div class="container">
    
    <div class="page-header clearfix">
        <h1 class="pull-left">{{ $project->name }}</h1>
        <div class="button-group pull-right">
            <a class="btn btn-default" href="{{ $project->getLink() . '/settings' }}">Settings</a>
        </div>
    </div>

    <div class="text-muted">
        {!! $project->html !!}
    </div>

    <div class="row">

        <div class="col-md-6">
            @include('comments/feed', ['commentable' => $project])
        </div>

        <div class="col-md-6">
            <div class="clearfix">
                <h2 class="pull-left">Groups</h2>
                <div class="pull-right">
                    <a class="btn btn-success" href="{{ $project->getLink() . '/group/new' }}">New Group</a>
                </div>
            </div>
            @include('group/parts/list-with-tasks', ['groups' => $project->groups])
        </div>

    </div>

</div>
@endsection