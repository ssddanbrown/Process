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


    /**
     * Returns a link to access this project.
     */
    public function getLink()
    {
        return '/p/' . $this->id;
    }

}
