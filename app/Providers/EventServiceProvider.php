<?php namespace Process\Providers;

use Illuminate\Contracts\Events\Dispatcher as DispatcherContract;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\App;
use Process\Models\BasePlanModel;
use Process\Models\Comment;
use Process\Models\Group;
use Process\Models\Observers\MarkdownDescriptionObserver;
use Process\Models\Project;
use Process\Models\Task;

class EventServiceProvider extends ServiceProvider {

	/**
	 * The event handler mappings for the application.
	 *
	 * @var array
	 */
	protected $listen = [
		'event.name' => [
			'EventListener',
		],
	];

	/**
	 * Register any other events for your application.
	 *
	 * @param  \Illuminate\Contracts\Events\Dispatcher  $events
	 * @return void
	 */
	public function boot(DispatcherContract $events)
	{
		parent::boot($events);

        $markdownDescriptionObserver = app('Process\Models\Observers\MarkdownDescriptionObserver');
		Project::observe($markdownDescriptionObserver);
		Group::observe($markdownDescriptionObserver);
		Task::observe($markdownDescriptionObserver);
		Comment::observe($markdownDescriptionObserver);
	}

}
