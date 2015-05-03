<?php namespace Process\Services;

use Illuminate\Session\Store as Session;
use Process\Models\Commentable;
use Process\Repos\CommentRepo;


/**
 * Class MessageService
 *
 * This service manages all messaging activity that
 * the controllers may want to interact with.
 * This includes flash messages & Comment control.
 *
 * @package Process\Services
 */
class MessageService {

    protected $session;
    protected $commentRepo;

    function __construct(Session $session, CommentRepo $commentRepo)
    {
        $this->session = $session;
        $this->commentRepo = $commentRepo;
    }

    /**
     * Writes a success message to the session.
     *
     * @param $message
     */
    public function success($message)
    {
        $this->session->flash('success', $message);
    }

    /**
     * Writes an error message to the session.
     *
     * @param $message
     */
    public function error($message)
    {
        $this->session->flash('error', $message);
    }


    /**
     * Saves a comment against a commentable.
     * By default the text is italicised.
     *
     * @param Commentable $commentable
     * @param string $message
     * @param bool $styled
     * @return \Process\Models\Comment
     */
    public function addComment($commentable, $message, $styled = true)
    {
        if ($styled) {
            $message = '*' . $message . '*';
        }
        return $this->commentRepo->saveNew(['text' => $message], $commentable);
    }

}