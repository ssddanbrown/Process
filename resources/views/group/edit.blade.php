
@extends('app')

@section('content-color', $group->project->color)

@section('content')


    <div class="project-title">
        <div class="container-fluid contained">
            <h1>Edit Group - {{ $group->name }}</h1>
        </div>
    </div>

    <div class="container-fluid contained">
        <div class="row">
            <div class="col-md-6">
                <div class="panel panel-default">
                    <div class="panel-heading">Group details</div>
                    <div class="panel-body">
                        {!! Form::model($group, ['url' => $group->getLink() .'/update', 'method' => 'put']) !!}

                        @include('group/parts/form')

                        <div class="form-group">
                            <button class="btn btn-success" type="submit">Save group</button>
                            <a class="btn btn-default" href="{{ $group->getLink() }}">Cancel</a>
                        </div>

                        {!! Form::close() !!}
                    </div>
                </div>

            </div>
            <div class="col-md-5 col-md-offset-1">
                <div class="panel panel-danger">
                    <div class="panel-heading">
                        Delete Group
                    </div>
                    <div class="panel-body">
                        <p>This will delete the group and all associated content.</p>
                        @include('parts/delete-button', ['url' => $group->getLink(), 'text' => 'Delete Group'])
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection