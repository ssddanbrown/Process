<?php namespace Process\Http\Controllers;

use Illuminate\Routing\Controller;
use Process\Http\Requests\BasePlanRequest;
use Process\Models\Project;
use Illuminate\Contracts\Auth\Guard as Auth;
use Process\Services\MessageService;

class ProjectController extends Controller {

    protected $project;
    protected $auth;
    protected $messages;

    function __construct(Project $project, Auth $auth, MessageService $messages)
    {
        $this->project = $project;
        $this->auth = $auth;
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
        $project = $this->project->findOrFail($id);
        return view('project/show', ['project' => $project]);
    }

    /**
     * Save a new project.
     * @param BasePlanRequest $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function save(BasePlanRequest $request)
    {
        $this->project->fill($request->all());
        $this->auth->user()->projects()->save($this->project);
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
        $project = $this->project->findOrFail($id);
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
        $project = $this->project->findOrFail($id);
        $project->fill($request->all());
        $project->save();
        $this->messages->success('Project successfully updated');
        return redirect($project->getLink());
    }

    public function destroy($id)
    {
        $project = $this->project->findOrFail($id);
        $project->delete();
        $this->messages->success('Project successfully deleted');
        return redirect('/');
    }

}