<?php namespace Process\Repos;


use Process\Models\Project;
use Illuminate\Contracts\Auth\Guard as Auth;

class ProjectRepo {

    protected $project;
    protected $auth;

    function __construct(Project $project, Auth $auth)
    {
        $this->project = $project;
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
     * Finds a project with the given ID or, If it
     * does not exist, it fails.
     *
     * @param $id
     * @return mixed
     */
    public function findOrFail($id)
    {
        return $this->project->findOrFail($id);
    }

}