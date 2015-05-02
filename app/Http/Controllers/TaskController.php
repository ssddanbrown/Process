<?php namespace Process\Http\Controllers;

use Process\Http\Requests;
use Process\Http\Requests\CreateTaskRequest;
use Process\Repos\GroupRepo;
use Process\Repos\TaskRepo;

class TaskController extends Controller {

    protected $task;
    protected $taskRepo;
    protected $groupRepo;
    protected $auth;

    function __construct(TaskRepo $taskRepo, GroupRepo $groupRepo)
    {
        $this->taskRepo = $taskRepo;
        $this->groupRepo = $groupRepo;
    }

    /**
     * Shows the task page.
     *
     * @param $projectId
     * @param $taskId
     * @return \Illuminate\View\View
     */
    public function show($projectId, $taskId)
    {
        $task = $this->taskRepo->find($taskId);
        return view('task/show', ['task' => $task]);
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
        $group = $this->groupRepo->find($request->get('group_id'));
        $this->taskRepo->saveNew($request->all(), $group);
        return redirect($group->getLink());
    }

}
