
@extends('app')

@section('content-color', $task->group->project->color)

@section('content')

    <div class="project-title">
        <div class="container-fluid contained">
            <h1>Edit Task - {{ $task->name }}</h1>
        </div>
    </div>

    <div class="container-fluid contained">
        <div class="row">

            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">Task details</div>
                    <div class="panel-body">
                        {!! Form::model($task, ['url' => $task->getLink() .'/update', 'method' => 'put']) !!}
                        @include('task/parts/form')
                        <div class="form-task">
                            <button class="btn btn-success" type="submit">Save task</button>
                            <a class="btn btn-default" href="{{ $task->getLink() }}">Cancel</a>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>
            </div>

            <div class="col-md-5 col-md-offset-1">
                <div class="panel panel-danger">
                    <div class="panel-heading">
                        Delete task
                    </div>
                    <div class="panel-body">
                        <p>This will delete the task and all associated content.</p>
                        @include('parts/delete-button', ['url' => $task->getLink(), 'text' => 'Delete Task'])
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection