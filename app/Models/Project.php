<?php namespace Process\Models;

class Project extends BasePlanModel {

	protected $fillable = ['name', 'description'];


    /**
     * Define the relation to its groups.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function groups()
    {
        return $this->hasMany('Process\Models\Group');
    }

}
