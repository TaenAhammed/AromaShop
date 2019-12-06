<?php

namespace App\Services\SessionService;

use Illuminate\Http\Request;

class SessionService implements ISessionService
{
    private $_session;
    public function __construct(Request $request)
    {
        $this->_session = $request->session();
    }

    public function store($key, $value)
    {
        $this->_session->put($key, $value);
    }

    public function delete($key)
    {
        $this->_session->forget($key);
    }

    public function get($key)
    {
        $this->_session->get($key);
    }

    public function getAndDelete($key)
    {
        $this->_session->pull($key);
    }

    public function flush()
    {
        $this->_session->flush();
    }
}
