
@if(count($groups) > 0)

    @foreach($groups as $group)
        <div class="panel panel-default">
            <div class="panel-heading">
                <a href="{{ $group->getLink() }}">
                    <strong>{{ $group->name }}</strong>
                </a>
            </div>
            <div class="list-group">
                @if(count($group->outstandingTasks()) > 0)
                    @include('task/parts/list', ['tasks' => $group->outstandingTasks()])
                @else
                    <div class="list-group-item">
                        <p class="text-muted">No tasks have been added</p>
                    </div>
                @endif
            </div>
            @include('task/parts/panel-form', ['group' => $group])
        </div>

    @endforeach

@else
    <p class="text-muted text-center">No groups have been added</p>
@endif