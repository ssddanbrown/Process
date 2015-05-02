

<div class="form-group @if ($errors->has('name')) has-error @endif">
    {!! Form::label('name', 'Group name') !!}
    {!! Form::text('name', null, ['placeholder' => 'A name for your new group', 'class' => 'form-control']) !!}
    @if ($errors->has('name')) <p class="help-block">{{ $errors->first('name') }}</p> @endif
</div>

<div class="form-group @if ($errors->has('text')) has-error @endif">
    {!! Form::label('text', 'Group details') !!}
    {!! Form::textarea('text', null, ['placeholder' => 'Enter any information about the group', 'class' => 'form-control']) !!}
    @if ($errors->has('text')) <p class="help-block">{{ $errors->first('text') }}</p> @endif
</div>