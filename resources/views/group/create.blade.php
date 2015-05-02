
@extends('app')

@section('content')
    <div class="container">

        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="page-header">
                    <h1>Create a new Group</h1>
                </div>

            </div>
        </div>

        <div class="row">
            <div class="col-md-5 col-md-offset-2">
                {!! Form::open(['url' => $project->getLink() . '/group/new']) !!}

                @include('group/parts/form')

                <div class="form-group">
                    <button class="btn btn-success" type="submit">Create group</button>
                </div>

                {!! Form::close() !!}
            </div>
        </div>

    </div>
@endsection