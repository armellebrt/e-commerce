<?php

namespace Application\Helper;

/**
 * Class Customer
 * @package Application\Helper
 */
class Customer {
    /**
     * @param string $password
     * @return false|string|null
     */
    public static function passwordHash(string $password)
    {
        return password_hash($password, PASSWORD_DEFAULT);
    }

    /**
     * @param string $password
     * @param string $hash
     * @return bool
     */
    public static function passwordVerify(string $password, string $hash): bool
    {
        return password_verify($password, $hash);
    }
}