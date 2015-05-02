

<div class="form-group @if ($errors->has('name')) has-error @endif">
    {!! Form::label('name', 'Project Name') !!}
    {!! Form::text('name', null, ['placeholder' => 'A name for your new project', 'class' => 'form-control']) !!}
    @if ($errors->has('name')) <p class="help-block">{{ $errors->first('name') }}</p> @endif
</div>

<div class="form-group @if ($errors->has('description')) has-error @endif">
    {!! Form::label('description', 'Project Description') !!}
    {!! Form::textarea('description', null, ['placeholder' => 'Enter a short description for your new project', 'class' => 'form-control']) !!}
    @if ($errors->has('description')) <p class="help-block">{{ $errors->first('description') }}</p> @endif
</div>