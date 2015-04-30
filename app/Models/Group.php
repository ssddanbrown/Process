<?php namespace Process\Models;

use Illuminate\Database\Eloquent\Model;

class Group extends BasePlanModel {

    protected $fillable = ['name', 'description'];

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

}
