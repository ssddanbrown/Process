
@extends('app')

@section('content-color', $task->group->project->color)

@section('content')
    <div class="container">


        <div class="page-header">
            <h1>Edit Task</h1>
        </div>

        <div class="row">
            <div class="col-md-5">
                {!! Form::model($task, ['url' => $task->getLink() .'/update', 'method' => 'put']) !!}

                @include('task/parts/form')

                <div class="form-task">
                    <button class="btn btn-success" type="submit">Save task</button>
                    <a class="btn btn-default" href="{{ $task->getLink() }}">Cancel</a>
                </div>

                {!! Form::close() !!}
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