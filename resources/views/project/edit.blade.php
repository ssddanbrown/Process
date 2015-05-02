
@extends('app')

@section('content')
    <div class="container">


        <div class="page-header">
            <h1>Edit project</h1>
        </div>


        <div class="row">
            <div class="col-md-5">
                {!! Form::model($project, ['url' => '/p/'.$project->id.'/update', 'method' => 'put']) !!}

                @include('project/form')

                <div class="form-group">
                    <button class="btn btn-success" type="submit">Save project</button>
                    <a class="btn btn-default" href="{{ $project->getLink() }}">Cancel</a>
                </div>

                {!! Form::close() !!}
            </div>
            <div class="col-md-5 col-md-offset-1">
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