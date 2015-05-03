
@extends('app')

@section('content-color', $project->color)

@section('content')

    <div class="project-title">
        <div class="container-fluid contained">
            <h1>Edit project - {{ $project->name }}</h1>
        </div>
    </div>

    <div class="container-fluid contained">
        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">Edit Details</div>
                    <div class="panel-body">
                        {!! Form::model($project, ['url' => $project->getLink() .'/update', 'method' => 'put']) !!}

                        @include('project/form')

                        <div class="form-group">
                            <button class="btn btn-success" type="submit">Save project</button>
                            <a class="btn btn-default" href="{{ $project->getLink() }}">Cancel</a>
                        </div>

                        {!! Form::close() !!}
                    </div>
                </div>

            </div>
            <div class="col-md-4 col-md-offset-2">
                <div class="panel panel-danger">
                    <div class="panel-heading">
                        Delete Project
                    </div>
                    <div class="panel-body">
                        <p>This will delete the project and all associated content.</p>
                        @include('parts/delete-button', ['url' => $project->getLink(), 'text' => 'Delete Project'])
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection