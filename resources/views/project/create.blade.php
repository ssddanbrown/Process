
@extends('app')

@section('content')
<div class="container">

    <div class="row">
        <div class="col-md-8 col-md-offset-1">
            <h1>Create a project</h1>
        </div>
    </div>

    <div class="row">
        <div class="col-md-5 col-md-offset-1">
            <form class="form" action="/new" method="POST">
                <input type="hidden" name="_token" value="{{ csrf_token() }}"/>

                <div class="form-group @if ($errors->has('name')) has-error @endif">
                    <label for="name">Project Name</label>
                    <input type="text" id="name" class="form-control" name="name" placeholder="A name for your new project" value="{{ Input::old('name') }}">
                    @if ($errors->has('name')) <p class="help-block">{{ $errors->first('name') }}</p> @endif
                </div>
            </form>
        </div>
    </div>

</div>
@endsection