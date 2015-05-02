
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
        {!! $project->description_html !!}
    </div>

</div>
@endsection