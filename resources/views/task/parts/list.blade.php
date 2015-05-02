<div class="list-group">
    @foreach($tasks as $task)
        <div class="list-group-item">
            <a href="{{ $task->getLink() }}">{{ $task->name }}</a>
        </div>
    @endforeach
</div>