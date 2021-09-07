<?php

namespace Application\Controller\Frontend\Customer\Account;

use Application\Controller\AbstractController;
use Application\Helper\Customer as CustomerHelper;
use Application\Model\Customer\ResourceModel\Customer as CustomerResource;
use Application\Model\Customer\Session as CustomerSession;
use Application\Model\Framework\MessageSession;
use Exception;

class LoginPost extends AbstractController
{
    public function execute()
    {
        try {
            $password = $_POST['password'];
            $email = $_POST['email'];

            $resourceModel = new CustomerResource();
            $customer = $resourceModel->getByEmail($email);

            $helper = new CustomerHelper();

            if (!$helper->passwordVerify($password, $customer->getPassword())) {
                throw new Exception('Invalid password');
            }

            $session = new CustomerSession();
            $session->setCustomer($customer);

            header('location: ?action=customer/account');
        } catch (Exception $e) {

            $messageSession = new MessageSession();
            $messageSession->addMessage($e->getMessage());

            header('location: ?action=customer/login');
        }
    }
}
