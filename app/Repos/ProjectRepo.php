<?php namespace Process\Repos;


use Process\Models\Project;
use Illuminate\Contracts\Auth\Guard as Auth;

class ProjectRepo {

    protected $project;
    protected $groupRepo;
    protected $auth;

    function __construct(Project $project, GroupRepo $groupRepo, Auth $auth)
    {
        $this->project = $project;
        $this->groupRepo = $groupRepo;
        $this->auth = $auth;
    }

    /**
     * Gets the projects associated withe the current user.
     *
     * @return mixed
     */
    public function getUserProjects()
    {
        return $this->auth->user()->projects()->get();
    }

    /**
     * A simple find based on ID.
     *
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        return $this->project->findOrFail($id);
    }

    /**
     * Destroy the given Project and all its dependencies.
     *
     * @param Project $project
     */
    public function destroy(Project $project)
    {
        $this->groupRepo->destroyMany($project->groups);
        $project->comments()->delete();
        $project->delete();
    }






}