

@foreach($groups as $group)
    <div class="panel panel-default">
        <div class="panel-heading">
            <a href="{{ $group->getLink() }}">{{ $group->name }}</a>
        </div>
        @if(count($group->tasks) > 0)
            @include('tasks/parts/list', ['tasks' => $group->tasks])
        @else
            <div class="panel-body">
                <p class="text-muted">No tasks have been added</p>
            </div>
        @endif
    </div>
@endforeach