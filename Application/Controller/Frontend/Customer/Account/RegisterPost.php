<?php

namespace Application\Controller\Frontend\Customer\Account;

use Application\Controller\AbstractController;
use Application\Model\Customer\Customer;
use Application\Model\Framework\MessageSession;
use Application\Model\Customer\ResourceModel\Customer as CustomerResource;

class RegisterPost extends AbstractController
{
    public function execute()
    {
        try {
            if ($_POST['password'] !== $_POST['password_verify']) {
                throw new \Exception('Les mots de passe sont différents');
            }

            $data = $_POST;

            $resourceModel = new CustomerResource();
            if ($resourceModel->isEmailExists($data['email'])) {
                throw new \Exception("Email already exists");
            }

            $helper = new \Application\Helper\Customer();
            $data['password'] = $helper->passwordHash($_POST['password']);

            unset($data['password_verify']);

            $customer = new Customer($data);
            $resourceModel = new \Application\Model\Customer\ResourceModel\Customer();
            $resourceModel->createCustomer($customer);

            header('Location: ?action=customer/login');
        } catch (\Exception $e) {
            $messageSession = new MessageSession();
            $messageSession->addMessage($e->getMessage());
            header('Location: ?action=customer/register');
        }
    }
}
