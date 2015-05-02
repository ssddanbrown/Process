<?php namespace Process\Http\Controllers;

use Process\Http\Requests;
use Process\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Process\Http\Requests\BasePlanRequest;
use Process\Models\Group;
use Process\Repos\ProjectRepo;
use Illuminate\Contracts\Auth\Guard as Auth;
use Process\Services\MessageService;

class GroupController extends Controller {


    protected $group;
    protected $projectRepo;
    protected $auth;
    protected $messages;

    function __construct(Group $group, ProjectRepo $projectRepo, Auth $auth, MessageService $messages)
    {
        $this->group = $group;
        $this->projectRepo = $projectRepo;
        $this->auth = $auth;
        $this->messages = $messages;
    }

    /**
     * Gets a new group filled group.
     *
     * @param Request $request
     * @return Group
     */
    private function getNewGroup(Request $request)
    {
        $this->group->fill($request->all());
        $this->group->user_id = $this->auth->user()->id;
        return $this->group;
    }


    /**
     * Shows the page for a group.
     *
     * @param $projectId
     * @param $groupId
     * @return \Illuminate\View\View
     */
    public function show($projectId, $groupId)
    {
        $group = $this->group->findOrFail($groupId);
        return view('group/show', ['group' => $group]);
    }

    /**
     * Show the page to create a new group.
     *
     * @param $projectId
     * @return \Illuminate\View\View
     */
	public function create($projectId)
    {
        $project = $this->projectRepo->findOrFail($projectId);
        return view('group/create', ['project' => $project]);
    }

    /**
     * Saves a new group against a project.
     *
     * @param $projectId
     * @param BasePlanRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function save($projectId, BasePlanRequest $request)
    {
        $project = $this->projectRepo->findOrFail($projectId);
        $group = $this->getNewGroup($request);
        $project->groups()->save($group);
        return redirect($project->getLink());
    }

    /**
     * Shows the page to edit a group.
     * @param $projectId
     * @param $groupId
     * @return \Illuminate\View\View
     */
    public function edit($projectId, $groupId)
    {
        $group = $this->group->findOrFail($groupId);
        return view('group/edit', ['group' => $group]);
    }

    public function update($projectId, $groupId, BasePlanRequest $request)
    {
        $group = $this->group->findOrFail($groupId);
        $group->fill($request->all());
        $group->save();
        $this->messages->success('Group updated successfully');
        return redirect($group->getLink());
    }

    /**
     * Deletes the group and its comments.
     *
     * @param $projectId
     * @param $groupId
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($projectId, $groupId)
    {
        $group = $this->group->findOrFail($groupId);
        $project = $group->project;
        $group->comments()->delete();
        $group->delete();
        $this->messages->success('Group successfully deleted');
        return redirect($project->getLink());
    }

}
