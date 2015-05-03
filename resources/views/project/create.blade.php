
@extends('app')

@section('content')

    <div class="project-title">
        <div class="container-fluid contained">
            <h1>New project</h1>
        </div>
    </div>

    <div class="container-fluid contained">

        <div class="row">
            <div class="col-md-6">

                <div class="panel panel-default">
                    <div class="panel-heading">Project details</div>
                    <div class="panel-body">
                        {!! Form::open(['url' => '/new']) !!}
                        @include('project/form')
                        <div class="form-group">
                            <button class="btn btn-success" type="submit">Create project</button>
                        </div>
                        {!! Form::close() !!}
                    </div>
                </div>

            </div>
        </div>

    </div>
@endsection