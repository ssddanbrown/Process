<?php namespace Process\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model {

	protected $fillable = ['text'];

    /**
     * Define the polymorphic relation.
     *
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function commentable()
    {
        return $this->morphTo();
    }

    public function user()
    {
        return $this->belongsTo('Process\User');
    }


}
