<?php namespace Process\Repos;


use Illuminate\Support\Facades\Auth;
use Process\Models\Project;

class ProjectRepo {

    protected $project;

    function __construct(Project $project)
    {
        $this->project = $project;
    }

    public function getUserProjects()
    {
        return Auth::user()->projects()->get();
    }

}