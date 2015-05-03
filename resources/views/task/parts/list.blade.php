
@if(count($tasks) > 0)
    @foreach($tasks as $task)
        <div class="list-group-item task-item @if($task->complete) complete @endif">
            <span class="task-checkbox" data-task-url="/api{{ $task->getLink() }}/check">
                <i class="fa fa-square-o"></i>
                <i class="fa fa-check-square-o"></i>
            </span>
            <a href="{{ $task->getLink() }}">{{ $task->name }}</a>
        </div>
    @endforeach
@else
    <div class="list-group-item">
        <p>No tasks added</p>
    </div>
@endif