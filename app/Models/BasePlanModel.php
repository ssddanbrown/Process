<?php namespace Process\Models;


use Illuminate\Database\Eloquent\Model;
use Parsedown;

class BasePlanModel extends Model {

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


    /**
     * Override the normal save function to automatically
     * save the generated html description.
     *
     * @param array $options
     * @param Parsedown $parsedown
     * @return bool|void
     */
    public function save(array $options = array())
    {
        //$this->descriptionHtml = $this->parsedown->text($this->description);
        parent::save($options);
    }


}