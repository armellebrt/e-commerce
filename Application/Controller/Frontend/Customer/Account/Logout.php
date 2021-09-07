<?php

namespace Application\Controller\Frontend\Customer\Account;

use Application\Controller\AbstractController;
use Application\Model\Framework\MessageSession;
use Application\Model\Customer\Session as CustomerSession;
use \Exception;

class Logout extends AbstractController
{
    public function execute()
    {
        try {
            $session = new CustomerSession();
            $session->removeCustomer();
            header('location: index.php');
        } catch (Exception $e) {
            $messageSession = new MessageSession();
            $messageSession->addMessage($e->getMessage());

            header('location: index.php');
        }
    }
}
