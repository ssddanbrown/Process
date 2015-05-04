
@if(count($tasks) > 0)
    @foreach($tasks as $task)
        @include('task/parts/task-item')
    @endforeach
@else
    <div class="list-group-item">
        <p>No tasks added</p>
    </div>
@endif