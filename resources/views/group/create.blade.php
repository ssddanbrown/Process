
@extends('app')

@section('content-color', $project->color)

@section('content')

    <div class="project-title">
        <div class="container-fluid contained">
            <h1>Create a new group</h1>
        </div>
    </div>

    <div class="container-fluid contained">

        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">Group details</div>
                    <div class="panel-body">
                        {!! Form::open(['url' => $project->getLink() . '/group/new']) !!}

                        @include('group/parts/form')

                        <div class="form-group">
                            <button class="btn btn-success" type="submit">Create group</button>
                            <a class="btn btn-default" href="{{ $project->getLink() }}">Cancel</a>
                        </div>

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection