<?php namespace Process\Http\Controllers;

use Illuminate\Routing\Controller;


class ProjectController extends Controller {


    /**
     * Create a new project.
     */
    public function create()
    {
        return view('project/create');
    }
}