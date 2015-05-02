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

    public function getUserProjects()
    {
        return $this->auth->user()->projects()->get();
    }

}