
<div class="list-group">
    @if(count($projects) > 0)
        @foreach($projects as $project)

            <a class="list-group-item" href="{{ $project->getLink() }}">
                {{ $project->name }}
            </a>

        @endforeach
    @else
        <div class="list-group-item">
            No projects available
        </div>
    @endif
</div>