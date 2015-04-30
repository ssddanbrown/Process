<?php namespace Process\Http\Composers;


use Illuminate\Contracts\View\View;
use Process\Repos\ProjectRepo;

class ProjectPartsComposer extends NamedComposer {

    protected $projectRepo;

    function __construct(ProjectRepo $projectRepo)
    {
        $this->projectRepo = $projectRepo;
    }

    public function listOwn(View $view)
    {
        $projects = $this->projectRepo->getUserProjects();
        return $view->with('projects', $projects);
    }

}