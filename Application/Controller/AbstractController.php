<?php

namespace Application\Controller;

abstract class AbstractController
{
    abstract function execute();

    public function run()
    {
        $this->execute();
    }
}
