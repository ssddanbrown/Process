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

    /**
     * Override the normal save function to automatically
     * save the generated html description.
     *
     * @param array $options
     * @param Parsedown $parsedown
     * @return bool|void
     */
    public function save(array $options = array(), Parsedown $parsedown)
    {
        $this->descriptionHtml = $parsedown->text($this->description);
        parent::save($options);
    }

}
