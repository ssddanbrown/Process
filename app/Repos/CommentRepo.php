<?php namespace Process\Repos;


use Illuminate\Contracts\Auth\Guard as Auth;
use Process\Models\Comment;
use Process\Models\Commentable;

class CommentRepo {

    protected $comment;
    protected $auth;

    function __construct(Comment $comment, Auth $auth)
    {
        $this->comment = $comment;
        $this->auth = $auth;
    }

    /**
     * A simple find based on id.
     *
     * @param $id
     * @return mixed
     */
    public function find($id)
    {
        return $this->comment->findOrFail($id);
    }


    /**
     * Saves a new Comment with its dependencies.
     *
     * @param array $attributes
     * @param Commentable $commentable
     * @return Comment
     */
    public function saveNew($attributes, Commentable $commentable)
    {
        $this->comment->fill($attributes);
        $this->comment->user_id = $this->auth->user()->id;
        $commentable->comments()->save($this->comment);
        return $this->comment;
    }




}