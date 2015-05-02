<?php namespace Process\Services;

use Illuminate\Session\Store as Session;

class MessageService {

    protected $session;

    function __construct(Session $session)
    {
        $this->session = $session;
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

}