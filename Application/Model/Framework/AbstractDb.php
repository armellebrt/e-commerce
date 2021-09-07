<?php

namespace Application\Model\Framework;

use PDO;

abstract class AbstractDb
{
    protected function getConnection(): PDO
    {
        return Connection::getConnection();
    }
}
