<?php namespace Process\Repos;

use Illuminate\Contracts\Auth\Guard as Auth;
use Process\Models\Group;
use Process\Models\Task;

class TaskRepo {

    protected $task;
    protected $auth;

    function __construct(Task $task, Auth $auth)
    {
        $this->task = $task;
        $this->auth = $auth;
    }

    /**
     * A simple find based on id.
     *
     * @param int $id
     */
    public function find($id)
    {
        return $this->task->findOrFail($id);
    }

    /**
     * Saves a new Task.
     *
     * @param array $attributes
     * @param Group $group
     */
    public function saveNew($attributes, Group $group)
    {
        $this->task->fill($attributes);
        $this->task->user_id = $this->auth->user()->id;
        $group->tasks()->save($this->task);
    }

    /**
     * Destroy the given task and all its dependencies.
     *
     * @param Task $task
     * @throws \Exception
     */
    public function destroy(Task $task)
    {
        $task->comments()->delete();
        $task->delete();
    }

    /**
     * Destroys multiple tasks as once.
     *
     * @param Task[] $tasks
     */
    public function destroyMany($tasks)
    {
        foreach($tasks as $task) {
            $this->destroy($task);
        }
    }



}