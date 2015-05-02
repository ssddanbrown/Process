<?php namespace Process\Models;

use Illuminate\Database\Eloquent\Model;
use Parsedown;

class Comment extends Model {

	protected $fillable = ['description'];

    /**
     * Define the polymorphic relation.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function commentable()
    {
        return $this->morphTo();
    }


}
