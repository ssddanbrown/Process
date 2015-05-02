<?php namespace Process\Models\Observers;

use Parsedown;

class MarkdownTextObserver {

    protected $parsedown;

    function __construct(Parsedown $parsedown)
    {
        $this->parsedown = $parsedown;
    }

    public function saving($model)
    {
        $model->html = $this->parsedown->text($model->text);
    }

}