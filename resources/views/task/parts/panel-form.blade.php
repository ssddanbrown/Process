
<div class="panel-form">
    {!! Form::open(['class' => 'form', 'url' => $group->project->getLink() . '/task/create']) !!}
    {!! Form::hidden('group_id', $group->id) !!}
    {!! Form::hidden('return', isset($return) ? $return : 'group') !!}
    <div class="form-group @if ($errors->has('name')) has-error @endif">
        <div class="input-group">
            {!! Form::text('name', null, ['placeholder' => 'Add a new task', 'class' => 'form-control', 'tabindex' => '1', 'required' => true]) !!}
            <span class="input-group-btn">
                <button type="submit" class="btn btn-success">Add task</button>
            </span>
        </div>
        @if ($errors->has('name')) <p class="help-block">{{ $errors->first('name') }}</p> @endif
    </div>
    {!! Form::close() !!}
</div>