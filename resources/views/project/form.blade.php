

<div class="form-group @if ($errors->has('name')) has-error @endif">
    {!! Form::label('name', 'Project name') !!}
    {!! Form::text('name', null, ['placeholder' => 'A name for your new project', 'class' => 'form-control']) !!}
    @if ($errors->has('name')) <p class="help-block">{{ $errors->first('name') }}</p> @endif
</div>

<div class="form-group @if ($errors->has('text')) has-error @endif">
    {!! Form::label('text', 'Project description') !!}
    {!! Form::textarea('text', null, ['placeholder' => 'Enter a short description for your new project', 'class' => 'form-control']) !!}
    @if ($errors->has('text')) <p class="help-block">{{ $errors->first('text') }}</p> @endif
</div>