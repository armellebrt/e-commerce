<?php

namespace Application\Model\Framework;

/**
 * Class AbstractSession
 * @package Application\Model\Framework
 */
class Session {
    /**
     * @param string $key
     * @param mixed $value
     */
    public function set(string $key, $value)
    {
        $_SESSION[$key] = $value;
    }

    /**
     * @param string $key
     * @return mixed|null
     */
    public function get(string $key)
    {
        return $_SESSION[$key] ?? null;
    }

    /**
     * @param string $key
     */
    public function remove(string $key)
    {
        unset($_SESSION[$key]);
    }
}