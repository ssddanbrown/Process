<?php namespace Process\Models;


class Task extends Commentable {

    protected $fillable = ['name', 'text'];

    /**
     * Define the relation to group.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function group()
    {
        return $this->belongsTo('Process\Models\Group');
    }

    public function getLink()
    {
        return '/project/' . $this->group->project->id . '/task/' . $this->id;
    }

}
