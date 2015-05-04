
<div class="list-group-item task-item @if($task->complete) complete @endif">
            <span class="task-checkbox" data-task-url="/api{{ $task->getLink() }}/check">
                <i class="fa fa-square-o"></i>
                <i class="fa fa-check-square-o"></i>
            </span>
    <a href="{{ $task->getLink() }}">{{ $task->name }}</a>
</div>