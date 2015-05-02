<?php namespace Process\Models\Observers;

use Parsedown;

class MarkdownDescriptionObserver {

    protected $parsedown;

    function __construct(Parsedown $parsedown)
    {
        $this->parsedown = $parsedown;
    }

    public function saving($model)
    {
        $model->description_html = $this->parsedown->text($model->description);
    }

}