<?php namespace Process\Models;


class Task extends BasePlanModel {

    protected $fillable = ['name', 'description'];

    /**
     * Define the relation to group.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function group()
    {
        return $this->belongsTo('Process\Models\Group');
    }

}
