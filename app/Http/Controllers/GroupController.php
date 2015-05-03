<?php namespace Process\Http\Controllers;

use Process\Http\Requests;
use Process\Http\Requests\BasePlanRequest;
use Process\Repos\GroupRepo;
use Process\Repos\ProjectRepo;
use Process\Services\MessageService as Messages;

class GroupController extends Controller {

    protected $groupRepo;
    protected $projectRepo;
    protected $messages;

    function __construct(GroupRepo $groupRepo, ProjectRepo $projectRepo, Messages $messages)
    {
        $this->groupRepo = $groupRepo;
        $this->projectRepo = $projectRepo;
        $this->messages = $messages;
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
        $group = $this->groupRepo->find($groupId);
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
        $project = $this->projectRepo->find($projectId);
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
        $project = $this->projectRepo->find($projectId);
        $this->groupRepo->saveNew($request->all(), $project);
        return redirect($project->getLink());
    }

    /**
     * Shows the page to edit a group.
     *
     * @param $projectId
     * @param $groupId
     * @return \Illuminate\View\View
     */
    public function edit($projectId, $groupId)
    {
        $group = $this->groupRepo->find($groupId);
        return view('group/edit', ['group' => $group]);
    }

    /**
     * Updates a group.
     *
     * @param $projectId
     * @param $groupId
     * @param BasePlanRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($projectId, $groupId, BasePlanRequest $request)
    {
        $group = $this->groupRepo->find($groupId);
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
        $group = $this->groupRepo->find($groupId);
        $project = $group->project;
        $this->groupRepo->destroy($group);
        $this->messages->success('Group successfully deleted');
        return redirect($project->getLink());
    }

}
