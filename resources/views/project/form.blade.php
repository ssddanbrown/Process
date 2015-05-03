

<div class="form-group @if ($errors->has('name')) has-error @endif">
    {!! Form::label('name', 'Name') !!}
    {!! Form::text('name', null, ['placeholder' => 'A name for your new project', 'class' => 'form-control']) !!}
    @if ($errors->has('name')) <p class="help-block">{{ $errors->first('name') }}</p> @endif
</div>

<div class="form-group @if ($errors->has('text')) has-error @endif">
    {!! Form::label('text', 'Description') !!}
    {!! Form::textarea('text', null, ['placeholder' => 'Enter a short description for your new project', 'class' => 'form-control']) !!}
    @if ($errors->has('text')) <p class="help-block">{{ $errors->first('text') }}</p> @endif
</div>

<div class="form-group @if ($errors->has('color')) has-error @endif">
    {!! Form::label('color', 'Project Color') !!}
    {!! Form::hidden('color', $project->color ? $project->color : 'teal') !!}
    <div class="color-palette">
        <span class="teal"></span>
        <span class="blue"></span>
        <span class="red"></span>
        <span class="grey"></span>
        <span class="green"></span>
        <span class="purple"></span>
    </div>
    @if ($errors->has('color')) <p class="help-block">{{ $errors->first('color') }}</p> @endif
</div>

<script>
    // Javascript for the color picker
    $(document).ready(function() {

        var palette = $('.color-palette').first();
        var formElem = $('#color');

        // Set the currently set color
        var initColor = formElem.val();
        palette.find('.' + initColor).addClass('selected');

        // Click event, Set style and form value
        palette.find('span').click(function() {
            palette.find('.selected').removeClass('selected');
            var color = $(this).attr('class').trim();
            formElem.val(color);
            $(this).addClass('selected');
            $('#content').attr('class', color);
        });

    });
</script>