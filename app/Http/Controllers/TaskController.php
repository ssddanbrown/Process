<?php namespace Process\Http\Controllers;

use Process\Http\Requests;
use Illuminate\Contracts\Auth\Guard as Auth;
use Process\Http\Requests\CreateTaskRequest;
use Process\Http\Requests\Request;
use Process\Models\Group;
use Process\Models\Task;

class TaskController extends Controller {

    protected $task;
    protected $group;
    protected $auth;

    function __construct(Task $task, Group $group, Auth $auth)
    {
        $this->task = $task;
        $this->group = $group;
        $this->auth = $auth;
    }

    private function getNewTask(Request $request)
    {
        $task = $this->task->fill($request->all());
        $task->user_id = $this->auth->user()->id;
        return $task;
    }


    /**
     * Save the new task against a group
     *
     * @param $projectId
     * @param CreateTaskRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
	public function save($projectId, CreateTaskRequest $request)
    {
        $group = $this->group->findOrFail($request->get('group_id'));
        $task = $this->getNewTask($request);
        $group->tasks()->save($task);
        return redirect($group->getLink());
    }

}
