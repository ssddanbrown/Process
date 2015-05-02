<?php namespace Process\Models;


use Illuminate\Database\Eloquent\Model;

class Commentable extends Model {

    /**
     * Defines the relation to comments. Every model that
     * extends this class will have access to comments.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphMany
     */
    public function comments()
    {
        return $this->morphMany('Process\Models\Comment', 'commentable');
    }


}