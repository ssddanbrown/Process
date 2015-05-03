<?php namespace Process\Http\Controllers;

use Process\Http\Requests;
use Process\Http\Requests\CreateTaskRequest;
use Process\Repos\GroupRepo;
use Process\Repos\TaskRepo;
use Process\Services\MessageService;

class TaskController extends Controller {

    protected $taskRepo;
    protected $groupRepo;
    protected $messages;

    function __construct(TaskRepo $taskRepo, GroupRepo $groupRepo, MessageService $messageService)
    {
        $this->taskRepo = $taskRepo;
        $this->groupRepo = $groupRepo;
        $this->messages = $messageService;
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

        if ($request->has('return') && $request->get('return') == 'project') {
            return redirect($group->project->getLink());
        }

        return redirect($group->getLink());
    }


    /**
     * Show the page to edit a task.
     *
     * @param $projectId
     * @param $taskId
     * @return \Illuminate\View\View
     */
    public function edit($projectId, $taskId)
    {
        $task = $this->taskRepo->find($taskId);
        return view('task/edit', ['task' => $task]);
    }

    /**
     * Updates a task details
     * @param $projectId
     * @param $taskId
     * @param CreateTaskRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($projectId, $taskId, CreateTaskRequest $request)
    {
        $task = $this->taskRepo->find($taskId);
        $task->fill($request->all());
        $task->save();
        $this->messages->success('Task updated successfully');
        return redirect($task->getLink());
    }

    /**
     * Deletes a task an its dependencies.
     *
     * @param $projectId
     * @param $taskId
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($projectId, $taskId)
    {
        $task = $this->taskRepo->find($taskId);
        $group = $task->group;
        $this->taskRepo->destroy($task);
        $this->messages->success('Task successfully deleted');
        return redirect($group->getLink());
    }


    /**
     * Responds to ajax requests to toggle the task's status.
     *
     * @param $projectId
     * @param $taskId
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function apiToggleComplete($projectId, $taskId)
    {
        $task = $this->taskRepo->find($taskId);
        $task->complete = !$task->complete;
        $task->save();
        $this->messages->addComment($task, 'User changed this task\'s status to ' . $task->textStatus());
        return response()->json($task);
    }



}
