<?php namespace Process\Http\Controllers;

use Illuminate\Routing\Controller;
use Process\Http\Requests\BasePlanRequest;
use Process\Models\Project;
use Process\Repos\ProjectRepo;
use Process\Services\MessageService as Messages;

class ProjectController extends Controller {

    protected $project;
    protected $projectRepo;
    protected $messages;

    function __construct(Project $project, ProjectRepo $projectRepo, Messages $messages)
    {
        $this->project = $project;
        $this->projectRepo = $projectRepo;
        $this->messages = $messages;
    }


    /**
     * Create a new project.
     */
    public function create()
    {
        return view('project/create');
    }

    /**
     * Show a project
     * @param int $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $project = $this->projectRepo->find($id);
        return view('project/show', ['project' => $project]);
    }

    /**
     * Save a new project.
     * @param BasePlanRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function save(BasePlanRequest $request)
    {
        $this->projectRepo->saveNew($request->all());
        $this->messages->success('New project successfully created');
        return redirect('/');
    }

    /**
     * Edit an existing project.
     *
     * @param $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $project = $this->projectRepo->find($id);
        return view('project/edit', ['project' => $project]);
    }

    /**
     * Update a project.
     *
     * @param $id
     * @param BasePlanRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update($id, BasePlanRequest $request)
    {
        $project = $this->projectRepo->find($id);
        $project->fill($request->all());
        $project->save();
        $this->messages->success('Project successfully updated');
        return redirect($project->getLink());
    }

    /**
     * Deletes a project from the system.
     *
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        $project = $this->projectRepo->find($id);
        $this->projectRepo->destroy($project);
        $this->messages->success('Project successfully deleted');
        return redirect('/');
    }

}