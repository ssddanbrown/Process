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

    /**
     * Get the url for this task.
     *
     * @return string
     */
    public function getLink()
    {
        return '/project/' . $this->group->project->id . '/task/' . $this->id;
    }


    /**
     * Returns the 'complete' value in text form.
     * @param string $complete
     * @param string $incomplete
     * @return string
     */
    public function textStatus($complete = 'Complete', $incomplete = 'Incomplete')
    {
        return $this->complete ? $complete : $incomplete;
    }

}
