<?php

namespace App\Services\SessionService;

interface ISessionService
{
    public function store($key, $value);

    public function delete($key);

    public function get($key);

    public function getAndDelete($key);

    public function flush();
}
