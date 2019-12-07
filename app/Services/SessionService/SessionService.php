<?php

namespace App\Services\SessionService;

class SessionService implements ISessionService
{
    public function store($key, $value)
    {
        session([$key => $value]);
    }

    public function delete($key)
    {
        session()->forget($key);
    }

    public function get($key)
    {
        session()->get($key);
    }

    public function getAndDelete($key)
    {
        session()->pull($key);
    }

    public function flush()
    {
        session()->flush();
    }
}
