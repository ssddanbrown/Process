<?php namespace Process\Http\Controllers;

use Process\Http\Requests;
use Process\Http\Requests\CommentRequest;
use Process\Http\Requests\Request;
use Process\Models\Comment;
use Process\Models\Group;
use Process\Repos\ProjectRepo;
use Illuminate\Contracts\Auth\Guard as Auth;

class CommentController extends Controller {

    protected $comment;
    protected $projectRepo;
    protected $auth;

    function __construct(Comment $comment, ProjectRepo $projectRepo, Auth $auth)
    {
        $this->comment = $comment;
        $this->projectRepo = $projectRepo;
        $this->auth = $auth;
    }

    /**
     * Creates a new comment with its properties set correctly.
     *
     * @param Request $request
     * @return Comment
     */
    public function getNewComment(Request $request)
    {
        $this->comment->fill($request->all());
        $this->comment->user_id = $this->auth->user()->id;
        return $this->comment;
    }

    /**
     * Saves a comment against a project.
     *
     * @param CommentRequest $request
     * @param int $projectId
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function saveProjectComment(CommentRequest $request, $projectId)
    {
        $project = $this->projectRepo->findOrFail($projectId);
        $comment = $this->getNewComment($request);
        $project->comments()->save($comment);
        return redirect($project->getLink());
    }

    /**
     * Saves a comment against a group.
     *
     * @param CommentRequest $request
     * @param int $groupId
     * @param Group $injectGroup
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function saveGroupComment($projectId, $groupId, CommentRequest $request, Group $injectGroup)
    {
        $group = $injectGroup->findOrFail($groupId);
        $comment = $this->getNewComment($request);
        $group->comments()->save($comment);
        return redirect($group->getLink());
    }

}
