<?php namespace Process\Http\Controllers;

use Process\Http\Requests;
use Process\Http\Requests\CommentRequest;
use Process\Repos\CommentRepo;
use Process\Repos\GroupRepo;
use Process\Repos\ProjectRepo;
use Process\Repos\TaskRepo;

class CommentController extends Controller {

    protected $commentRepo;

    function __construct(CommentRepo $commentRepo)
    {
        $this->commentRepo = $commentRepo;
    }


    /**
     * Saves a comment against a project.
     *
     * @param int $projectId
     * @param CommentRequest $request
     * @param ProjectRepo $projectRepo
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function saveProjectComment($projectId, CommentRequest $request, ProjectRepo $projectRepo)
    {
        $project = $projectRepo->find($projectId);
        $this->commentRepo->saveNew($request->all(), $project);
        return redirect($project->getLink());
    }

    /**
     * Saves a comment against a group.
     *
     * @param CommentRequest $request
     * @param int $groupId
     * @param GroupRepo $groupRepo
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function saveGroupComment($projectId, $groupId, CommentRequest $request, GroupRepo $groupRepo)
    {
        $group = $groupRepo->find($groupId);
        $this->commentRepo->saveNew($request->all(), $group);
        return redirect($group->getLink());
    }

    /**
     * Saves a comment against a group.
     *
     * @param $projectId
     * @param $taskId
     * @param CommentRequest $request
     * @param TaskRepo $taskRepo
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function saveTaskComment($projectId, $taskId, CommentRequest $request, TaskRepo $taskRepo)
    {
        $task = $taskRepo->find($taskId);
        $this->commentRepo->saveNew($request->all(), $task);
        return redirect($task->getLink());
    }

}
