<?php namespace Process\Models;

use Illuminate\Database\Eloquent\Model;

class Group extends Commentable {

    protected $fillable = ['name', 'text'];

    /**
     * Defines the relation to a project.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function project()
    {
        return $this->belongsTo('Process\Models\Project');
    }

    /**
     * Defines the relations to its tasks.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function tasks()
    {
        return $this->hasMany('Process\Models\Task');
    }

    public function getLink()
    {
        return '/project/' . $this->project_id . '/group/' . $this->id;
    }

}
