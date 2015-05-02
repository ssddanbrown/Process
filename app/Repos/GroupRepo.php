<?php namespace Process\Repos;


use Illuminate\Contracts\Auth\Guard as Auth;
use Process\Models\Group;
use Process\Models\Project;

class GroupRepo {

    protected $group;
    protected $taskRepo;
    protected $auth;

    function __construct(Group $group, TaskRepo $taskRepo, Auth $auth)
    {
        $this->group = $group;
        $this->taskRepo = $taskRepo;
        $this->auth = $auth;
    }

    /**
     * A simple find base on ID.
     *
     * @param int $id
     * @return mixed
     */
    public function find($id)
    {
        return $this->group->findOrFail($id);
    }

    /**
     * Saves a new Group.
     *
     * @param array $attributes
     * @param Project $project
     * @return Group
     */
    public function saveNew($attributes, Project $project)
    {
        $this->group->fill($attributes);
        $this->group->user_id = $this->auth->user()->id;
        $project->groups()->save($this->group);
        return $this->group;
    }

    /**
     * Deletes a group and removes all dependencies.
     *
     * @param Group $group
     * @throws \Exception
     */
    public function destroy(Group $group)
    {
        $this->taskRepo->destroyMany($group->tasks);
        $group->comments()->delete();
        $group->delete();
    }

    /**
     * Deletes multiple groups at once.
     *
     * @param Group[] $groups
     */
    public function destroyMany($groups)
    {
        foreach($groups as $group) {
            $this->destroy($group);
        }
    }


}