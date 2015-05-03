
{!! Form::hidden('group_id', $task->group->id) !!}

<div class="form-group @if ($errors->has('name')) has-error @endif">
    {!! Form::label('name', 'Task name') !!}
    {!! Form::text('name', null, ['placeholder' => 'A name for your task', 'class' => 'form-control']) !!}
    @if ($errors->has('name')) <p class="help-block">{{ $errors->first('name') }}</p> @endif
</div>

<div class="form-group @if ($errors->has('text')) has-error @endif">
    {!! Form::label('text', 'Task details') !!}
    {!! Form::textarea('text', null, ['placeholder' => 'Enter some task details...', 'class' => 'form-control']) !!}
    @if ($errors->has('text')) <p class="help-block">{{ $errors->first('text') }}</p> @endif
</div>